
/*ajouter un article*/
INSERT INTO `articles`
(`id`, `autor`, `title`, `intro`, `content`, `likes`, `publi_date`, `last_update`)
VALUES
(NULL, <valeur>, <valeur>, <valeur>, <valeur>,, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

/*Modifier article*/
UPDATE `articles`
SET `content` = '<text>'
WHERE `articles`.`id` = <id>;


