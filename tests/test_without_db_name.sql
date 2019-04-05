DROP TABLE IF EXISTS `mytable`;
create table `mytable`
(
`_id` integer primary key not null auto_increment,
`id` varchar(255),
`name` varchar(255),
`age` varchar(255),
`group` varchar(255)
);
INSERT INTO `mytable`
(
`id`,
`name`,
`age`,
`group`
)VALUES
("1","John","29","1"),
("2","Tom","12","1"),
("3","Takashi","35","2"),
("4","Kaito","11","3"),
("5","Pako","9","3"),
("6","Piiko","56","3");
