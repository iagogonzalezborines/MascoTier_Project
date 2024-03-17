DROP DATABASE IF EXISTS mascotier;
CREATE DATABASE IF NOT EXISTS mascotier;
use mascotier;
-- This should be refactored, this all may not be necesary :/
-- Create table user
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    pwd VARCHAR(1000) NOT NULL,
    phone VARCHAR(20),
    area VARCHAR(100),
	birth_date date,
    verified TINYINT(1) DEFAULT 0,
    type ENUM('owner', 'carer',"both") NOT NULL,
    contactNumber VARCHAR(20),
    pets TEXT,
    hasPlace TINYINT(1),
    idDocument VARCHAR(100),
    rating FLOAT
);


-- Create table pet
CREATE TABLE pet (
    pet_id INT PRIMARY KEY AUTO_INCREMENT,
    user_owner_id INT NOT NULL,
    descr VARCHAR(300),
    pet_type VARCHAR(50),
    pet_rating FLOAT,
    FOREIGN KEY (user_owner_id) REFERENCES users(user_id)
);

-- Create table request
CREATE TABLE request (
    request_id INT PRIMARY KEY AUTO_INCREMENT,
    user_owner_id INT NOT NULL,
    user_carer_id INT NOT NULL,
    amount DECIMAL(10, 2),
    date_time DATETIME NOT NULL,
    status VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_owner_id) REFERENCES users(user_id),
    FOREIGN KEY (user_carer_id) REFERENCES users(user_id)
);
-- Create table requests_pets (Relationship table between request and pet)
CREATE TABLE requests_pets (
    request_id INT NOT NULL,
    pet_id INT NOT NULL,
    PRIMARY KEY (request_id, pet_id),
    FOREIGN KEY (request_id) REFERENCES request(request_id),
    FOREIGN KEY (pet_id) REFERENCES pet(pet_id)
);














-- NOTES: 

-- The user class will be able to SELECT, INSERT, UPDATE and DELETE on the table_name table of the database_name database.
-- Should we add another type of user? (Owner?, Carer?)(e.g. a user that can only SELECT on the table_name table of the database_name database)
-- Add admin with all permits remeber to hide config.ini in orther to not leak the password

-- PURPOSE:
--    The purpose of this script is to create the necessary users 
--   with the proper permissions to interact with the database.


CREATE USER 'mascoadmin'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON *.* TO 'mascoadmin'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

CREATE USER 'connection'@'%' IDENTIFIED BY 'connection';
GRANT SELECT, INSERT, UPDATE ON mascotier.* TO 'connection'@'%';
FLUSH PRIVILEGES;

CREATE USER 'mascouser'@'localhost' IDENTIFIED BY 'password';
GRANT SELECT, INSERT, UPDATE, DELETE ON mascouser.* TO 'mascouser'@'localhost';

FLUSH PRIVILEGES;

-- Path: BD/user_deletion_script.sql

















-- Agregar tuplas a la tabla user
INSERT INTO users (username, email, pwd, phone, area, birth_date, verified, type, contactNumber, pets, hasPlace, idDocument, rating) VALUES
('usuario1', 'usuario1@example.com', '$2y$10$E/eU5cpgtRjk0wfNqE1eJOWfEMo6DOjNi.H31wD.nASKQ16Ew7EPO', '123456789', 'Área1', '1990-01-01', 1, 'owner', '987654321', 'Perro', 1, '123ABC', null),
('usuario2', 'usuario2@example.com', '$2y$10$WsTnqO9eIvLpviNh.dgLCOlwH2R9jic0i2040oZ2GrmLCRjJKPnkm', '987654321', 'Área2', '1995-02-15', 1, 'carer', '123456789', null, 0, '456DEF', 4.5),
('usuario3', 'usuario3@example.com', 'contraseña3', '555555555', 'Área3', '1988-05-20', 0, 'both', '888888888', 'Perro, Gato', 1, '789GHI', 4.8),
('usuario4', 'usuario4@example.com', 'contraseña4', '666666666', 'Área4', '1992-11-10', 1, 'owner', '222222222', 'Pájaro', 0, '321JKL',null),
('usuario5', 'usuario5@example.com', 'contraseña5', '444444444', 'Área5', '1998-07-30', 0, 'carer', '444444444', 'Pez', 1, '654MNO', 4.9),
('usuario6', 'usuario6@example.com', 'contraseña6', '333333333', 'Área6', '1993-09-25', 1, 'both', '555555555', 'Perro, Gato, Pájaro', 0, '987PQR', 4.7),
('usuario7', 'usuario7@example.com', 'contraseña7', '222222222', 'Área7', '1985-03-18', 1, 'owner', '333333333', 'Hamster', 1, '147STU',null),
('usuario8', 'usuario8@example.com', 'contraseña8', '111111111', 'Área8', '1979-12-05', 0, 'carer', '666666666', 'Conejo', 0, '258VWX', 4.3),
('usuario9', 'usuario9@example.com', 'contraseña9', '999999999', 'Área9', '1983-04-22', 1, 'both', '777777777', 'Perro, Conejo', 1, '369YZA', 4.1),
('usuario10', 'usuario10@example.com', 'contraseña10', '888888888', 'Área10', '1996-08-12', 0, 'owner', '999999999', 'Gato, Pájaro', 0, '741BCD',null);


-- Agregar tuplas a la tabla pet
INSERT INTO pet (user_owner_id, descr, pet_type, pet_rating) VALUES
(1, 'Golden Retriever named Max', 'Dog', 4.5),
(2, 'Tabby cat named Whiskers', 'Cat', 4.2),
(3, 'German Shepherd named Rex', 'Dog', 4.8),
(4, 'Siamese cat named Luna', 'Cat', 4.3),
(5, 'Labrador Retriever named Bella', 'Dog', 4.7);

-- Agregar tuplas a la tabla request
INSERT INTO request (user_owner_id, user_carer_id, amount, date_time, status) VALUES
(1, 6, 50.00, NOW(), 'Pending'),
(2, 7, 45.00, NOW(), 'Accepted'),
(3, 8, 60.00, NOW(), 'Pending'),
(4, 9, 55.00, NOW(), 'Accepted'),
(5, 10, 40.00, NOW(), 'Pending');

-- Agregar tuplas a la tabla requests_pets
INSERT INTO requests_pets (request_id, pet_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);



-- actualizar passwords hasheadas

















DELIMITER //

CREATE TRIGGER insert_owner_after_pet_insert
AFTER INSERT ON pet
FOR EACH ROW
BEGIN
    INSERT INTO owner (user_id) VALUES (NEW.user_owner_id);
END;
//

DELIMITER ;


