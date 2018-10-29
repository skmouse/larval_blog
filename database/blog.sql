###
create table user(
  `id` int not null auto_increment,
  `email` varchar(50) not null default '',
  `password` varchar(50) not null default '',
  `username` varchar(50) not null default '',
  `created_at` date not null default '',
  `update_at` date not null default '',
  primary key(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

###


