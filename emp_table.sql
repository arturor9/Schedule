CREATE TABLE employees (
  id INT  AUTO_INCREMENT,
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


INSERT INTO employees (first_name, last_name) VALUES (  'Jose', 'Miramontes');
INSERT INTO employees (first_name, last_name) VALUES (  'Ricardo', 'Ontiveros');
INSERT INTO employees (first_name, last_name) VALUES (  'Saul', ' Arrazate');
INSERT INTO employees (first_name, last_name) VALUES (  'Enrique', ' Rivera');

INSERT INTO alumni (name) VALUES (  'Jose Guadalupe' );
INSERT INTO alumni (name) VALUES (  'Choche Perez' );
INSERT INTO alumni (name) VALUES (  'Ramiro Gonzalez' );
INSERT INTO alumni (name) VALUES (  'Marco Antonio Regil' );
INSERT INTO alumni (name) VALUES (  'Juan Gabriel' );
