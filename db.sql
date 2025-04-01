CREATE DATABASE todo_app;
USE todo_app;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

-- Table des catégories
CREATE TABLE categories (
    category_id SERIAL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    user_id INT REFERENCES users(user_id) ON DELETE CASCADE
);

-- Table des tâches
CREATE TABLE tasks (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    priority ENUM('low', 'medium', 'high') DEFAULT 'medium',
    due_date TIMESTAMP,
    status ENUM('pending', 'in_progress', 'completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    user_id INT REFERENCES users(user_id) ON DELETE CASCADE,
    category_id INT REFERENCES categories(category_id) ON DELETE SET NULL
);

-- Table des commentaires (optionnelle)
CREATE TABLE task_comments (
    comment_id SERIAL PRIMARY KEY,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT REFERENCES users(user_id) ON DELETE CASCADE,
    task_id INT REFERENCES tasks(task_id) ON DELETE CASCADE
);

ALTER TABLE tasks 
MODIFY created_at DATETIME;
ALTER TABLE tasks 
MODIFY updated_at DATETIME;

INSERT INTO tasks (title, description, priority, status) VALUES
('Faire les courses', 'Acheter du lait, du pain et des fruits pour la semaine.', 'Haute', 'En cours'),
('Réviser PHP', 'Relire les chapitres sur les classes et les objets.', 'Moyenne', 'En attente'),
('Faire du sport', '30 minutes de cardio et 15 minutes de musculation.', 'Basse', 'Non commencée'),
('Rendre le rapport de projet', 'Finaliser le rapport et l\'envoyer par email.', 'Haute', 'En attente'),
('Organiser une réunion d\'équipe', 'Planifier une réunion pour faire le point sur les objectifs.', 'Moyenne', 'En cours');

ALTER TABLE tasks
MODIFY title VARCHAR(255);
