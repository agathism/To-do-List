CREATE DATABASE todo_app;
USE todo_app;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255),
    description VARCHAR(255),
    category VARCHAR(50),
    status ENUM('En cours', 'Terminé') DEFAULT 'En cours',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);