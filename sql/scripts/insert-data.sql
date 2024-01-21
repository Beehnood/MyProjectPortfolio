-- Insérer un projet
INSERT INTO projects (title, description, skills_used, project_url, github_url, image_url, created_at, updated_at ) VALUES ('Projet 1', 'Description du projet 1', 'HTML,CSS,PHP,JS',,http://localhost:8888/MyProjectPortfolio/src/portfolio.html', 'https://github.com/Beehnood/MyProjectPortfolio',NOW(),NOW());

-- Insérer une compétence
INSERT INTO skills (name) VALUES ('HTML');

-- Insérer une expérience
INSERT INTO experiences (title, company, description, start_date, end_date) VALUES ('Développeur Web', 'Entreprise XYZ', 'Travail en tant que développeur web', '2022-01-01', '2022-12-31');
