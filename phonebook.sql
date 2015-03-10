CREATE DATABASE phonebook DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE phonebook;

CREATE TABLE IF NOT EXISTS contacts (
	id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	first_name varchar(255),
	last_name varchar(255),
	phone_number varchar(255)
);

INSERT INTO contacts (id, first_name, last_name, phone_number) VALUES (1, 'Bart', 'Simpson', '919-212-2929');