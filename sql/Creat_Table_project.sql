CREATE TABLE `projects` (
    `id` INT(11) NOT NULL,
    `title` VARCHAR(150) NOT NULL,
    `description` TEXT NOT NULL,
    `skills_used` VARCHAR(120) NOT NULL,
    `image_url` VARCHAR(255) NOT NULL,
    `project_url` VARCHAR(255) NOT NULL,
    `github_url` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `deleted_at` TIMESTAMP NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

ALTER TABLE `projects`
ADD PRIMARY KEY (`id`);

ALTER TABLE `projects`
MODIFY `id` INT(11) NOT NULL AUTO_INCREMENT;
COMMIT;