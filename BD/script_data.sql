-- Agregar tuplas a la tabla user
INSERT INTO users (username, email, pwd, phone, area, birth_date, verified, type, contactNumber, pets, hasPlace, idDocument, rating) VALUES
('usuario1', 'usuario1@example.com', '$2y$10$E/eU5cpgtRjk0wfNqE1eJOWfEMo6DOjNi.H31wD.nASKQ16Ew7EPO', '123456789', 'Área1', '1990-01-01', 1, 'owner', '987654321', 'Perro', 1, '123ABC', null),
('usuario2', 'usuario2@example.com', '$2y$10$WsTnqO9eIvLpviNh.dgLCOlwH2R9jic0i2040oZ2GrmLCRjJKPnkm', '987654321', 'Área2', '1995-02-15', 1, 'carer', '123456789', null, 0, '456DEF', '4.5'),
('usuario3', 'usuario3@example.com', 'contraseña3', '555555555', 'Área3', '1988-05-20', 0, 'both', '888888888', 'Perro, Gato', 1, '789GHI', '4.8'),
('usuario4', 'usuario4@example.com', 'contraseña4', '666666666', 'Área4', '1992-11-10', 1, 'owner', '222222222', 'Pájaro', 0, '321JKL', '4.2'),
('usuario5', 'usuario5@example.com', 'contraseña5', '444444444', 'Área5', '1998-07-30', 0, 'carer', '444444444', 'Pez', 1, '654MNO', '4.9'),
('usuario6', 'usuario6@example.com', 'contraseña6', '333333333', 'Área6', '1993-09-25', 1, 'both', '555555555', 'Perro, Gato, Pájaro', 0, '987PQR', '4.7'),
('usuario7', 'usuario7@example.com', 'contraseña7', '222222222', 'Área7', '1985-03-18', 1, 'owner', '333333333', 'Hamster', 1, '147STU', '4.6'),
('usuario8', 'usuario8@example.com', 'contraseña8', '111111111', 'Área8', '1979-12-05', 0, 'carer', '666666666', 'Conejo', 0, '258VWX', '4.3'),
('usuario9', 'usuario9@example.com', 'contraseña9', '999999999', 'Área9', '1983-04-22', 1, 'both', '777777777', 'Perro, Conejo', 1, '369YZA', '4.1'),
('usuario10', 'usuario10@example.com', 'contraseña10', '888888888', 'Área10', '1996-08-12', 0, 'owner', '999999999', 'Gato, Pájaro', 0, '741BCD', '4.4');


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
