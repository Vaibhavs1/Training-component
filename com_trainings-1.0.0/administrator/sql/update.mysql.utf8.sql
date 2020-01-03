/* Only premium users are allowed to update a component */

ALTER TABLE`#__trainings_list` ADD COLUMN `alias` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '' AFTER `topicname`;
UPDATE `#__trainings_list` AS h1
SET alias = (SELECT CONCAT('id-', ID) FROM (SELECT * FROM `#__trainings_list`) AS h2 WHERE h1.id = h2.id);
CREATE UNIQUE INDEX `aliasindex` ON `#__trainings_list` (`alias`);