## School project

School administrator app

### Database
MYSQL

#### C9 mysql login commands

mysql-ctl start
mysql-ctl cli
 select @@hostname;
 USE c9
 show tables;
 desc employee;
#### SQL Querys
```sql
CREATE TABLE employees (
  id INT NOT NULL AUTO_INCREMENT,
  rfc VARCHAR(50),
  imss INT,
  first_name VARCHAR(50),
  middle_name VARCHAR(50),
  last_name VARCHAR(50),
  email VARCHAR(50),
  phone_number INT,
  mobile_number INT,
  emergency_phone_number INT,
  emergency_contact VARCHAR(50),
  active_flag INT,
  created_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP, 
  updated_at TIMESTAMP  DEFAULT 0,
  PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS alumni (
    id INT AUTO_INCREMENT,
    name  VARCHAR(255) NOT NULL,
    active_flag INT,
    created_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP  DEFAULT 0,
    PRIMARY KEY (id)
);


CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT,
    alumni_id INT,
    employee_id INT,
    start_date TIMESTAMP NULL DEFAULT 0,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    notes TEXT,
    INDEX (alumni_id),
    INDEX (employee_id),
    FOREIGN KEY (alumni_id)
        REFERENCES alumni(id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (employee_id)
        REFERENCES employees(id)
        ON UPDATE CASCADE,
    active_flag INT,
    created_at TIMESTAMP  DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP  DEFAULT 0,
    PRIMARY KEY (id)
);

DELIMITER |
CREATE TRIGGER events_updated_at
BEFORE UPDATE ON events
    FOR EACH ROW 
BEGIN
    SET new.updated_at = CURRENT_TIMESTAMP ;
END |
DELIMITER ;
```