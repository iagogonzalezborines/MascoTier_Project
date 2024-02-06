CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';

GRANT SELECT, INSERT, UPDATE, DELETE ON `database_name`.`table_name` TO 'user'@'localhost';
