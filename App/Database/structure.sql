use mymvc;


CREATE TABLE IF NOT EXISTS portfolio (
   id INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(255),
   overview TEXT,
   PRIMARY KEY(id)
);


 CREATE TABLE if NOT EXISTS contatti(
 id INT PRIMARY KEY AUTO_INCREMENT ,
 nome VARCHAR(100),
 email VARCHAR(100),
 messaggio TEXT
 
 );
 
 insert INTO portfolio(title, overview) 
values('Titolo del primo portofolio','Descrizione del primo portofolio');
insert INTO portfolio(title, overview)
 VALUES('Titolo del secondo portofolio','Descrizione del secondo portofolio');
 
 