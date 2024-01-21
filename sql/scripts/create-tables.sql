-- Table pour les projets
CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    skills_used VARCHAR(255),
    project_url VARCHAR(255),
    github_url VARCHAR(255),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Table pour les compétences
CREATE TABLE skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50)
);

-- Table pour les expériences
CREATE TABLE experiences (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100),
    company VARCHAR(100),
    description TEXT,
    start_date DATE,
    end_date DATE
);