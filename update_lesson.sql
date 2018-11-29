create database Kyoino_Test;
grant all on Kyoino_Test. * to dbuser@localhost identified by "123456789";
use Kyoino_Test;
create table update_lesson(
  id int not null auto_increment primary key,
  name varchar(128) not null,
  password int not null
);

insert into update_lesson (name,password) VALUES
  ("aaaa","123"),
  ("bbbb","456"),
  ("cccc","789");
