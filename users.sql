create database Kyoino_Test;
grant all on Kyoino_Test. * to dbuser@localhost identified by "123456789";
use Kyoino_Test;
create table users(
  id int not null auto_increment primary key,
  name varchar(255),
  password varchar(255)
);
