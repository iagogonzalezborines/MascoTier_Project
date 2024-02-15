-- Agregar tuplas a la tabla user
INSERT INTO user (username, email, pwd, phone, has_place, area, verified) VALUES
('pedro_campe', 'pedro@example.com', 'password123', '555-1234', 1, 'City Center', 1),
('maria_campera', 'maria@example.com', 'securepwd', '555-5678', 0, 'Suburbia', 0),
('juan_campeador', 'juan@example.com', 'strongpass', '555-9876', 1, 'Downtown', 1),
('laura_campeona', 'laura@example.com', 'safepassword', '555-4321', 0, 'Countryside', 1),
('carlos_campeón', 'carlos@example.com', 'mypassword', '555-8765', 1, 'Coastal Area', 0);

-- Agregar tuplas a la tabla owner
INSERT INTO owner (user_id) VALUES (1), (2), (3), (4), (5);

-- Agregar tuplas a la tabla carer
INSERT INTO carer (user_id, full_name, rating, is_available, id_doc, descr) VALUES
(6, 'Ana Cuidadora', 4, 1, 'DOC123', 'Experienced pet caregiver specializing in dogs.'),
(7, 'Pablo Cuidador', 5, 1, 'DOC456', 'Loves all animals and provides top-notch care.'),
(8, 'Sofía Cuidadora', 3, 0, 'DOC789', 'Available for cat sitting services.'),
(9, 'Diego Cuidador', 4, 1, 'DOC012', 'Trained in handling exotic pets.'),
(10, 'Elena Cuidadora', 4, 1, 'DOC345', 'Offers dog walking and pet sitting services.');

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
