-- Insertar 5 tuplas en la tabla user
INSERT INTO user (email, pwd, phone, has_place, area) VALUES
('user1@example.com', 'password1', '123456789', '1', 'Area1'),
('user2@example.com', 'password2', '987654321', '0', 'Area2'),
('user3@example.com', 'password3', '555555555', '1', 'Area3'),
('user4@example.com', 'password4', '111223344', '0', 'Area4'),
('user5@example.com', 'password5', '999888777', '1', 'Area5');

-- Insertar 5 tuplas en la tabla owner
INSERT INTO owner (user_id) VALUES (1), (2);

-- Insertar 5 tuplas en la tabla carer
INSERT INTO carer (user_id, rating, is_available, id_doc, descr) VALUES
(3, 5, '1', 'Doc3', 'Descr3'),
(4, 2, '0', 'Doc4', 'Descr4'),
(5, 4, '1', 'Doc5', 'Descr5');

-- Insertar 5 tuplas en la tabla pet
INSERT INTO pet (user_owner_id, descr, type) VALUES
(1, 'Pet1 Descr', 'Type1'),
(2, 'Pet2 Descr', 'Type2'),
(3, 'Pet3 Descr', 'Type3'),
(4, 'Pet4 Descr', 'Type4'),
(5, 'Pet5 Descr', 'Type5');

-- Insertar 5 tuplas en la tabla request
INSERT INTO request (user_owner_id, user_carer_id, amount, date_time, status) VALUES
(1, 3, 50.00, '2024-01-25 12:30:00', 'Pending'),
(2, 5, 75.50, '2024-01-25 14:45:00', 'Accepted'),
(3, 1, 30.00, '2024-01-25 16:00:00', 'Pending'),
(4, 4, 90.00, '2024-01-25 18:15:00', 'Accepted'),
(5, 2, 120.00, '2024-01-25 20:30:00', 'Pending');