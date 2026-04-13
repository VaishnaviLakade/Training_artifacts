-- =========================================
-- ADVANCED DATABASE CONCEPTS
-- FLIGHT DATABASE
-- MySQL Triggers
-- =========================================

-- =========================================
-- STEP 1: DROP OLD TABLES
-- =========================================
DROP TABLE IF EXISTS flight_log;
DROP TABLE IF EXISTS flight_backup;
DROP TABLE IF EXISTS flight;

-- =========================================
-- STEP 2: CREATE MAIN TABLE
-- =========================================
CREATE TABLE flight (
    id INT PRIMARY KEY,
    f_name VARCHAR(50),
    src VARCHAR(50),
    dest VARCHAR(50),
    price INT,
    seats INT
);

-- =========================================
-- STEP 3: CREATE LOG TABLE
-- =========================================
CREATE TABLE flight_log (
    log_id INT AUTO_INCREMENT PRIMARY KEY,
    msg VARCHAR(100),
    f_id INT,
    f_name VARCHAR(50),
    old_price INT,
    new_price INT,
    action_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =========================================
-- STEP 4: CREATE BACKUP TABLE FOR DELETE
-- =========================================
CREATE TABLE flight_backup (
    id INT,
    f_name VARCHAR(50),
    src VARCHAR(50),
    dest VARCHAR(50),
    price INT,
    seats INT
);

-- =========================================
-- STEP 5: INSERT INITIAL DATA
-- =========================================
INSERT INTO flight VALUES
(1, 'IndiGo', 'Pune', 'Delhi', 5000, 120),
(2, 'AirIndia', 'Mumbai', 'Bangalore', 6500, 100),
(3, 'SpiceJet', 'Nagpur', 'Hyderabad', 4000, 80),
(4, 'Vistara', 'Delhi', 'Chennai', 7000, 90);

-- =========================================
-- TRIGGER 1: BEFORE INSERT
-- Purpose: set minimum price and seats
-- =========================================
DELIMITER //

CREATE TRIGGER trg_before_insert_flight
BEFORE INSERT ON flight
FOR EACH ROW
BEGIN
    IF NEW.price < 3000 THEN
        SET NEW.price = 3000;
    END IF;

    IF NEW.seats < 1 THEN
        SET NEW.seats = 1;
    END IF;
END //

DELIMITER ;

-- =========================================
-- TRIGGER 2: AFTER INSERT
-- Purpose: log new inserted flight
-- =========================================
DELIMITER //

CREATE TRIGGER trg_after_insert_flight
AFTER INSERT ON flight
FOR EACH ROW
BEGIN
    INSERT INTO flight_log(msg, f_id, f_name, new_price)
    VALUES ('Flight inserted', NEW.id, NEW.f_name, NEW.price);
END //

DELIMITER ;

-- =========================================
-- TRIGGER 3: BEFORE UPDATE
-- Purpose: prevent negative price/seats
-- =========================================
DELIMITER //

CREATE TRIGGER trg_before_update_flight
BEFORE UPDATE ON flight
FOR EACH ROW
BEGIN
    IF NEW.price < 3000 THEN
        SET NEW.price = OLD.price;
    END IF;

    IF NEW.seats < 1 THEN
        SET NEW.seats = OLD.seats;
    END IF;
END //

DELIMITER ;

-- =========================================
-- TRIGGER 4: AFTER UPDATE
-- Purpose: log price updates
-- =========================================
DELIMITER //

CREATE TRIGGER trg_after_update_flight
AFTER UPDATE ON flight
FOR EACH ROW
BEGIN
    INSERT INTO flight_log(msg, f_id, f_name, old_price, new_price)
    VALUES ('Flight updated', NEW.id, NEW.f_name, OLD.price, NEW.price);
END //

DELIMITER ;

-- =========================================
-- TRIGGER 5: BEFORE DELETE
-- Purpose: store deleted row in backup table
-- =========================================
DELIMITER //

CREATE TRIGGER trg_before_delete_flight
BEFORE DELETE ON flight
FOR EACH ROW
BEGIN
    INSERT INTO flight_backup(id, f_name, src, dest, price, seats)
    VALUES (OLD.id, OLD.f_name, OLD.src, OLD.dest, OLD.price, OLD.seats);
END //

DELIMITER ;

-- =========================================
-- TRIGGER 6: AFTER DELETE
-- Purpose: log deleted flight
-- =========================================
DELIMITER //

CREATE TRIGGER trg_after_delete_flight
AFTER DELETE ON flight
FOR EACH ROW
BEGIN
    INSERT INTO flight_log(msg, f_id, f_name, old_price)
    VALUES ('Flight deleted', OLD.id, OLD.f_name, OLD.price);
END //

DELIMITER ;

-- =========================================
-- TESTING TRIGGERS
-- =========================================

-- Test BEFORE INSERT + AFTER INSERT
INSERT INTO flight VALUES
(5, 'Akasa', 'Pune', 'Goa', 2000, 0);

-- Check inserted row
SELECT * FROM flight WHERE id = 5;

-- Check insert log
SELECT * FROM flight_log;

-- =========================================

-- Test BEFORE UPDATE + AFTER UPDATE
UPDATE flight
SET price = 7500
WHERE id = 1;

-- Check updated row
SELECT * FROM flight WHERE id = 1;

-- Check update log
SELECT * FROM flight_log;

-- =========================================

-- Test 

DELETE FROM flight
WHERE id = 3;

-- Check main table
SELECT * FROM flight;

-- Check deleted row backup
SELECT * FROM flight_backup;

-- Check delete log
SELECT * FROM flight_log;