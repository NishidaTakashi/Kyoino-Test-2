create database Kyoino_Test;
grant all on Kyoino_Test. * to dbuser@localhost identified by "123456789";
use Kyoino_Test;
create table tax2(
  id int not null auto_increment primary key,
  start date not null,
  rate int not null
);

insert into tax2 (start,rate) VALUES
  ("1989-04-01","3"),
  ("1989-11-01","3"),
  ("1989-04-05","3"),
  ("1989-04-11","3"),
  ("1989-11-11","3"),
  ("1989-04-01","1"),
  ("1989-04-01","11"),
  ("2000-04-01","3"),
  ("2001-04-01","1"),
  ("2001-04-01","11");
