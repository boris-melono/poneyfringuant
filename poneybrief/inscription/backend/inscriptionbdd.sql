CREATE TABLE `membres` (
`id` INT( 255 ) NOT NULL AUTO_INCREMENT ,
`membre` VARCHAR( 255 ) NOT NULL ,
`mdp` VARCHAR( 255 ) NOT NULL ,
`email` VARCHAR( 255 ) NOT NULL ,
INDEX ( `id` )
);