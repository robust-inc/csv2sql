use mydb;
DROP TABLE IF EXISTS `mydb`.`mytable`;
create table `mydb`.`mytable`
(
`_id` integer primary key not null auto_increment,
`col_1` varchar(255)
);
INSERT INTO `mydb`.`mytable`
(
`col_1`
)VALUES
("John"),
("Tom"),
("Takashi"),
("Kaito"),
("Pako"),
("Piiko");
