-- Agregar tuplas a la tabla user
INSERT INTO users (username, email, pwd, phone, area, verified, type, contactNumber, pets, hasPlace, idDocument, place, rating)
VALUES
('user1', 'user1@example.com', '$2y$10$n/3fzfBckHrK7SMK/vIrFuQ.6zc.fPPY5uKhkFGy0DiRQv/CfOrPS', '+123456789', 'Area A', 1, 'owner', '+987654321', 'dog', NULL, NULL, NULL, NULL),
('user2', 'user2@example.com', 'password2', '+987654321', 'Area B', 1, 'carer', NULL, NULL, 1, 'ID123', 'Place X', '4.5'),
('user3', 'user3@example.com', 'password3', NULL, NULL, 0, 'owner', '+555666777', 'cat', NULL, NULL, NULL, NULL),
('user4', 'user4@example.com', 'password4', '+111222333', 'Area C', 1, 'carer', NULL, NULL, 1, 'ID456', 'Place Y', '3.8'),
('user5', 'user5@example.com', 'password5', NULL, 'Area D', 1, 'owner', '+999888777', 'bird', NULL, NULL, NULL, NULL),
('user6', 'user6@example.com', 'password6', '+444555666', 'Area E', 0, 'carer', NULL, NULL, 0, 'ID789', 'Place Z', '4.2'),
('user7', 'user7@example.com', 'password7', NULL, NULL, 1, 'owner', '+777888999', 'hamster', NULL, NULL, NULL, NULL),
('user8', 'user8@example.com', 'password8', '+666777888', 'Area F', 0, 'carer', NULL, NULL, 1, 'ID321', 'Place W', '4.9'),
('user9', 'user9@example.com', 'password9', NULL, 'Area G', 1, 'owner', '+222333444', 'snake', NULL, NULL, NULL, NULL),
('user10', 'user10@example.com', 'password10', '+555444333', NULL, 0, 'carer', NULL, NULL, 0, 'ID654', 'Place V', '3.5'),
('user11', 'user11@example.com', 'password11', NULL, 'Area H', 1, 'owner', '+777999111', 'rabbit', NULL, NULL, NULL, NULL),
('user12', 'user12@example.com', 'password12', '+888999000', 'Area I', 1, 'carer', NULL, NULL, 1, 'ID987', 'Place U', '4.7'),
('user13', 'user13@example.com', 'password13', NULL, NULL, 0, 'owner', '+111222333', 'fish', NULL, NULL, NULL, NULL),
('user14', 'user14@example.com', 'password14', '+333222111', 'Area J', 1, 'carer', NULL, NULL, 0, 'ID456', 'Place T', '3.2'),
('user15', 'user15@example.com', 'password15', '+222333444', 'Area K', 1, 'owner', '+444555666', 'dog', NULL, NULL, NULL, NULL);

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
