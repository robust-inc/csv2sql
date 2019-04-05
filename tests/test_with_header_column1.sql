use mydb;
DROP TABLE IF EXISTS `mydb`.`mytable`;
create table `mydb`.`mytable`
(
`_id` integer primary key not null auto_increment,
`name` varchar(255)
);
INSERT INTO `mydb`.`mytable`
(
`name`
)VALUES
("John"),
("Tom"),
("Takashi"),
("Kaito"),
("Pako"),
("Piiko");
