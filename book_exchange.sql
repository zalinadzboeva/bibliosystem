CREATE IF NOT EXISTS DATABASE book_exchange;
USE book_exchange;

CREATE TABLE users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
phone VARCHAR(50) NOT NULL
);

CREATE TABLE books (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
author VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
user_id INT,
FOREIGN KEY (user_id) REFERENCES users(id)
);
INSERT INTO books(id, title, author, description, user_id) VALUES ('1','dfvdlkn','fklbn','vfvndfndfn','1')