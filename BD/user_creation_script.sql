/* 
NOTES: 

- The user class will be able to SELECT, INSERT, UPDATE and DELETE on the table_name table of the database_name database.
- Should we add another type of user? (Owner?, Carer?)(e.g. a user that can only SELECT on the table_name table of the database_name database)
- Add admin with all permits remeber to hide config.ini in orther to not leak the password

PURPOSE:
    The purpose of this script is to create the necessary users 
    with the proper permissions to interact with the database.

*/

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

