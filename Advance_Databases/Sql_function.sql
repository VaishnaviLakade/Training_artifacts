-- =========================================
-- ADVANCED DATABASE CONCEPTS
-- FLIGHT DATABASE

-- =========================================

-- =========================================
-- STEP 1: DROP + CREATE TABLE
-- =========================================
DROP TABLE IF EXISTS flight;

CREATE TABLE flight (
    id INT PRIMARY KEY,
    f_name VARCHAR(50),
    src VARCHAR(50),
    dest VARCHAR(50),
    price INT,
    seats INT
);

-- =========================================
-- STEP 2: INSERT DATA
-- =========================================
INSERT INTO flight VALUES
(1, 'IndiGo', 'Pune', 'Delhi', 5000, 120),
(2, 'AirIndia', 'Mumbai', 'Bangalore', 6500, 100),
(3, 'SpiceJet', 'Nagpur', 'Hyderabad', 4000, 80),
(4, 'Vistara', 'Delhi', 'Chennai', 7000, 90);

-- =========================================
-- PART 1: BUILT-IN FUNCTIONS
-- =========================================

-- Total number of flights
SELECT COUNT(*) AS total_flights FROM flight;

-- Average price
SELECT AVG(price) AS avg_price FROM flight;

-- Maximum price
SELECT MAX(price) AS max_price FROM flight;

-- Minimum price
SELECT MIN(price) AS min_price FROM flight;

-- Total seats
SELECT SUM(seats) AS total_seats FROM flight;

-- Flight names in uppercase
SELECT UPPER(f_name) AS flight_name FROM flight;

-- Length of source city
SELECT src, LENGTH(src) AS src_length FROM flight;

-- =========================================
-- PART 2: USER DEFINED FUNCTIONS
-- =========================================

-- 1. Get price using flight id
DELIMITER //

CREATE FUNCTION get_price(p_id INT)
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE p INT;

    SELECT price INTO p
    FROM flight
    WHERE id = p_id;

    RETURN p;
END //

DELIMITER ;

-- Test
SELECT get_price(1);

-- =========================================

-- 2. Get seats using flight id
DELIMITER //

CREATE FUNCTION get_seats(p_id INT)
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE s INT;

    SELECT seats INTO s
    FROM flight
    WHERE id = p_id;

    RETURN s;
END //

DELIMITER ;

-- Test
SELECT get_seats(2);

-- =========================================

-- 3. Increase price by 10%
DELIMITER //

CREATE FUNCTION inc_price(p INT)
RETURNS INT
DETERMINISTIC
BEGIN
    RETURN p + (p * 10 / 100);
END //

DELIMITER ;

-- Test
SELECT f_name, price, inc_price(price) AS new_price
FROM flight;

-- =========================================

-- 4. Price category
DELIMITER //

CREATE FUNCTION price_type(p INT)
RETURNS VARCHAR(10)
DETERMINISTIC
BEGIN
    IF p >= 6000 THEN
        RETURN 'HIGH';
    ELSE
        RETURN 'LOW';
    END IF;
END //

DELIMITER ;

-- Test
SELECT f_name, price, price_type(price) AS type
FROM flight;

-- =========================================

-- 5. Total flights
DELIMITER //

CREATE FUNCTION total_flight()
RETURNS INT
DETERMINISTIC
BEGIN
    DECLARE t INT;

    SELECT COUNT(*) INTO t FROM flight;

    RETURN t;
END //

DELIMITER ;

-- Test
SELECT total_flight();

-- =========================================
-- FINAL CHECK
-- =========================================
SELECT * FROM flight;