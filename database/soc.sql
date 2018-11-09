###
create table `baseline_manage`(
  `id` int not null auto_increment comment '模板id',
  `template_name` varchar(50) not null default '' comment '模板名称',
  `template_explain` varchar(50) not null default '' comment '模板说明',
  `template_type` varchar(20) not null default '' comment '模板类型',
  `system` varchar(20) not null default '' comment '操作系统',
  `cycle` varchar(20) not null default '' comment '检查周期',
  `assets` text comment '资产', 
  `check_line_item` text comment '基线检查项',
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


