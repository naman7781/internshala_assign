/*For creating database*/

CREATE DATABASE BloodBank;
GRANT ALL ON BloodBank.* TO 'Peoples'@'localhost' IDENTIFIED BY 'bank';


/*For using database*/

USE BloodBank; 


/*For creating receiver's table*/

CREATE TABLE receiver (
   user_id INTEGER NOT NULL AUTO_INCREMENT KEY,
   blood_grp VARCHAR(),
   name VARCHAR(128),
   contact_no VARCHAR(),
   email VARCHAR(128),
   password VARCHAR(128),
   INDEX(email)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE hospital (
   user_id INTEGER NOT NULL AUTO_INCREMENT KEY,
   blood_grp VARCHAR(128),
   name VARCHAR(128),
   contact_no VARCHAR(128),
   email VARCHAR(128) UNIQUE,
   password VARCHAR(128),
   INDEX(email)
) ENGINE=InnoDB CHARSET=utf8;

CREATE TABLE requests (
   user_id INTEGER NOT NULL AUTO_INCREMENT KEY,
   blood_grp VARCHAR(128),
   name VARCHAR(128),
   contact_no VARCHAR(128),
   email VARCHAR(128),
   required_in VARCHAR(128),
   fullfilled VARCHAR(128),
   fullfilled_on VARCHAR(128),
   unit VARCHAR(128)
) ENGINE=InnoDB CHARSET=utf8;


ALTER TABLE requests ADD CONSTRAINT FOREIGN KEY (`email`) REFERENCES receiver (`email`);


CREATE TABLE available (
   user_id INTEGER NOT NULL AUTO_INCREMENT KEY,
   blood_grp VARCHAR(128),
   unit VARCHAR(128),
   contact_no VARCHAR(128),
   email VARCHAR(128),
   hospital_name VARCHAR(128)
) ENGINE=InnoDB CHARSET=utf8;
