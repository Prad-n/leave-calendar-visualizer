create table events2 (
  id int auto_increment primary key,
  title varchar(50),
  start date,
  end date
);



insert into events2 (title, start, end) values (
'Conference', '2019-06-11','2019-06-13'
);


insert into events2 (title, start, end) values (
'Meeting all day - city office', '2019-06-12','2019-06-12'
);
