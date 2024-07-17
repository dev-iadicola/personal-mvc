use mymvc;


CREATE TABLE IF NOT EXISTS portfolio (
   id INT NOT NULL AUTO_INCREMENT,
   title VARCHAR(255),
   overview TEXT,
   PRIMARY KEY(id)
);
insert INTO portfolio(title, overview) 
values('Titolo del primo portofolio','Descrizione del primo portofolio');
insert INTO portfolio(title, overview)
 VALUES('Titolo del secondo portofolio','Descrizione del secondo portofolio');