
CREATE DATABASE IF NOT EXISTS api;
use api;
CREATE TABLE IF NOT EXISTS ingredients 
(
	id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	quantity varchar(255) ,
	prix_unit decimal(15,2)
	
)
engine = innodb charset=utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO ingredients(name,quantity,prix_unit) 
VALUES 
('Tomates',48,200),
('Fromage',25,5000),
('Charcuterie',46,2000),
('Pain',20,2000),
('Mayonnaise',12,3000);