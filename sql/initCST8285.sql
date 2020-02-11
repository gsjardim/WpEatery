CREATE DATABASE cst8285;
CREATE USER cst8285@localhost IDENTIFIED BY '1234';
GRANT USAGE ON *.* TO cst8285@localhost ;
GRANT ALL PRIVILEGES ON cst8285.* TO cst8285@localhost;
FLUSH PRIVILEGES;

USE cst8285;

CREATE TABLE employees(
        employeeId int not null,
	firstName VARCHAR(50) NOT NULL,
	lastName VARCHAR(50) NOT NULL,
	PRIMARY KEY (employeeId)
	);
