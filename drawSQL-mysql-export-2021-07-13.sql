CREATE TABLE `Users`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `fname` VARCHAR(255) NOT NULL,
    `lname` VARCHAR(255) NOT NULL,
    `type` INT NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `remToken` VARCHAR(255) NULL,
    `phone` INT NOT NULL
);
ALTER TABLE
    `Users` ADD PRIMARY KEY `users_id_primary`(`id`);
ALTER TABLE
    `Users` ADD UNIQUE `users_email_unique`(`email`);
ALTER TABLE
    `Users` ADD UNIQUE `users_phone_unique`(`phone`);
CREATE TABLE `Articals`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `sub_title` VARCHAR(255) NOT NULL,
    `body` TEXT NOT NULL,
    `category` INT NOT NULL,
    `user_id` INT NOT NULL
);
ALTER TABLE
    `Articals` ADD PRIMARY KEY `articals_id_primary`(`id`);
CREATE TABLE `Comments`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `body` TEXT NOT NULL,
    `user_id` INT NOT NULL,
    `art_id` INT NOT NULL
);
ALTER TABLE
    `Comments` ADD PRIMARY KEY `comments_id_primary`(`id`);
ALTER TABLE
    `Articals` ADD CONSTRAINT `articals_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `Users`(`id`);
ALTER TABLE
    `Comments` ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `Users`(`id`);
ALTER TABLE
    `Comments` ADD CONSTRAINT `comments_art_id_foreign` FOREIGN KEY(`art_id`) REFERENCES `Articals`(`id`);