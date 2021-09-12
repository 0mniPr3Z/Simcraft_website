
/*ajouter un article*/
INSERT INTO `articles`
(`id`, `autor`, `title`, `intro`, `content`, `likes`, `publi_date`, `last_update`)
VALUES
(NULL, <valeur>, <valeur>, <valeur>, <valeur>,, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);

/*Modifier element article*/
UPDATE `articles`
SET `content` = '<text>'
WHERE `articles`.`id` = <id>;

INSERT INTO `articles`
(`autor`,	`lang`,		`title`,	`intro`,	`content`,	`etiquette`)
VALUES
(<valeur>,	<!$lang!>,	<valeur>,	<valeur>,	<valeur>,	<!$topic!>);

