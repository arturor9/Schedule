CREATE TABLE employee (
  emp_id INT NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (emp_id)
);