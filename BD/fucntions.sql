DELIMITER //

CREATE TRIGGER insert_owner_after_pet_insert
AFTER INSERT ON pet
FOR EACH ROW
BEGIN
    INSERT INTO owner (user_id) VALUES (NEW.user_owner_id);
END;
//

DELIMITER ;
