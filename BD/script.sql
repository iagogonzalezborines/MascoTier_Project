DROP DATABASE IF EXISTS mascotier;
CREATE DATABASE IF NOT EXISTS mascotier;
use mascotier;

-- Create table user
CREATE TABLE user(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(75),--Comes form email could be changed manually by the user
    email VARCHAR(255) NOT NULL,
    pwd VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    has_place BOOLEAN, -- 0 as False, 1 as true
    area VARCHAR(40)
    verified BOOLEAN -- 0 as False, 1 as true
);

-- Create table owner
CREATE TABLE owner (
    user_id INT PRIMARY KEY,
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

-- Create table carer
CREATE TABLE carer (
    user_id INT PRIMARY KEY,
    full_name VARCHAR(100),
    rating INT,
    is_available BOOLEAN, -- 0 as false, 1 as true
    id_doc VARCHAR(15),
    descr VARCHAR(2000),
    FOREIGN KEY (user_id) REFERENCES user(user_id)
);

-- Create table pet
CREATE TABLE pet (
    pet_id INT PRIMARY KEY AUTO_INCREMENT,
    user_owner_id INT NOT NULL,
    descr VARCHAR(300),
    pet_type VARCHAR(50),
    pet_rating FLOAT,
    FOREIGN KEY (user_owner_id) REFERENCES user(user_id)
);

-- Create table request
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

-- Create table requests_pets (Relationship table between request and pet)
CREATE TABLE requests_pets (
    request_id INT NOT NULL,
    pet_id INT NOT NULL,
    PRIMARY KEY (request_id, pet_id),
    FOREIGN KEY (request_id) REFERENCES request(request_id),
    FOREIGN KEY (pet_id) REFERENCES pet(pet_id)
);
