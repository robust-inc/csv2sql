use mydb;
DROP TABLE IF EXISTS `mydb`.`mytable`;
create table `mydb`.`mytable`
(
`_id` integer primary key not null auto_increment,
`col_1` varchar(255),
`col_2` varchar(255),
`col_3` varchar(255),
`col_4` varchar(255)
);
INSERT INTO `mydb`.`mytable`
(
`col_1`,
`col_2`,
`col_3`,
`col_4`
)VALUES
("1","John","29","1"),
("2","Tom","12","1"),
("3","Takashi","35","2"),
("4","Kaito","11","3"),
("5","Pako","9","3"),
("6","Piiko","56","3");
