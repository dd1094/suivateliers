drop database if exists suivateliers;
create database suivateliers ;

use suivateliers;

Create table Client(
numero int primary key not null auto_increment,
nom varbinary(100),
prenom varbinary(100),
login varchar(150),
mdp varchar(150),
ville varbinary(100)
);

Create table Responsable Ateliers(
numero int primary key not null auto_increment,
nom varbinary(100),
prenom varbinary(100),
login varchar(150),
mdp varchar(150),
ville varbinary(100)
);

Create table Ateliers(
numero int primary key not null auto_increment, 
dateEnre varchar(30),
dateheureProg varchar(30),
duree int,
nbPlace int,
theme varchar(30)
);

Create table Participer(
    numAte int,
    numClt int,
    primary key (numClt,numAte),
    foreign key (numClt) references Client(numero) ,
    foreign key (numAte) references Ateliers(numero)
);

insert into Client (`nom`,`prenom`,`login`,`mdp`,`ville`) values ('LUKOMBO',"Desanges","desanges","azerty","Nogent");
insert into Client (`nom`,`prenom`,`login`,`mdp`,`ville`) values ("BARNIS","Pierre","pierre","azertyy","Nogent");
insert into Client (`nom`,`prenom`,`login`,`mdp`,`ville`) values ("JADIS","Benoit","benoit","azertyyy","Nogent");

insert into Ateliers (`dateEnre`,`dateheureProg`,`duree`,`nbPlace`,`theme`)values("10-04-2021","10-04-2021 15:00",2,25,"Lecture");
insert into Ateliers (`dateEnre`,`dateheureProg`,`duree`,`nbPlace`,`theme`)values("11-04-2021","11-04-2021 18:00",4,85,"Football");
insert into Ateliers (`dateEnre`,`dateheureProg`,`duree`,`nbPlace`,`theme`)values("12-04-2021","12-04-2021 12:00",3,4,"Basket");
insert into Ateliers (`dateEnre`,`dateheureProg`,`duree`,`nbPlace`,`theme`)values("13-04-2021","13-04-2021 17:00",1,1,"Documentation");
insert into Ateliers (`dateEnre`,`dateheureProg`,`duree`,`nbPlace`,`theme`)values("14-04-2021","14-04-2021 22:00",8,32,"Cinema");

insert into Participer values (1,1);
insert into Participer values (1,2);
insert into Participer values (1,3);
insert into Participer values (2,1);
insert into Participer values (3,2);
insert into Participer values (4,3);

select numero,aes_decrypt(nom,"Clé"),aes_decrypt(prenom,"Clé"),aes_decrypt(ville,"Clé") from Participer as p
inner join Client as c
on p.numClt = c.numero
where numAte = 1;

select * from Client;

select * from Ateliers;

select * from Participer;
