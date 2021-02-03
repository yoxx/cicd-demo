CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL
);

INSERT INTO users (firstname, lastname) VALUES ("Karel","Appel");
INSERT INTO users (firstname, lastname) VALUES ("Donald","Duck");
INSERT INTO users (firstname, lastname) VALUES ("Raoul","Vos");
INSERT INTO users (firstname, lastname) VALUES ("Pietje","Pot");
