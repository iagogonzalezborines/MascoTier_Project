DROP DATABASE IF EXISTS mascotier;
CREATE DATABASE IF NOT EXISTS mascotier;
use mascotier;

-- Create table user
--TYPES HAS TO BE CHANGED, THESE ARE JUST TEMPORAL!!!!!!
CREATE TABLE users (
    userId INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    area VARCHAR(100),
    verified TINYINT(1) DEFAULT 0,
    type ENUM('owner', 'carer') NOT NULL,
    contactNumber VARCHAR(20),
    pets TEXT,
    hasPlace TINYINT(1),
    idDocument VARCHAR(100),
    place VARCHAR(255),
    rating VARCHAR(10)
);


#-- Create table pet
CREATE TABLE pet (
    pet_id INT PRIMARY KEY AUTO_INCREMENT,
    user_owner_id INT NOT NULL,
    descr VARCHAR(300),
    pet_type VARCHAR(50),
    pet_rating FLOAT,
    FOREIGN KEY (user_owner_id) REFERENCES user(user_id)
);

#-- Create table request
CREATE TABLE request (
    request_id INT PRIMARY KEY AUTO_INCREMENT,
    user_owner_id INT NOT NULL,
    user_carer_id INT NOT NULL,
    amount DECIMAL(10, 2),
    date_time DATETIME NOT NULL,
    status VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_owner_id) REFERENCES user(user_id),
    FOREIGN KEY (user_carer_id) REFERENCES user(user_id)
);

#-- Create table requests_pets (Relationship table between request and pet)
CREATE TABLE requests_pets (
    request_id INT NOT NULL,
    pet_id INT NOT NULL,
    PRIMARY KEY (request_id, pet_id),
    FOREIGN KEY (request_id) REFERENCES request(request_id),
    FOREIGN KEY (pet_id) REFERENCES pet(pet_id)
);
