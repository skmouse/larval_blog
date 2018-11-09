###
create table user(
  `id` int not null auto_increment,
  `email` varchar(50) not null default '',
  `password` varchar(50) not null default '',
  `username` varchar(50) not null default '',
  `age` tinyint(3) not null default  '0',
  `created_at` date not null default '',
  `update_at` date not null default '',
  primary key(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

###
create table content(
  `id` int not null auto_increment,
  `title` varchar(50) not null default '',
  `content` text not null,
  `author` varchar(50) not null default '',
  `created_at` date not null,
  `update_at` date not null,
  primary key(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


