create table clienti (nome varchar(255), cognome varchar(255), codice_fiscale varchar(255), username varchar(255), password varchar(255));
/*Blob lo trovato su internet(stackoverflow) ed è stato usato per caricare le immagini*/
create table mystery_box (id_box integer, immagine blob, nome varchar (255), descrizione varchar(255), prezzo float);

insert into mystery_box values (1, "https://m.media-amazon.com/images/I/41Ynrpo92VL._AC_.jpg", "Carbonara", "Questa mistery box contiene tutti gli ingredienti per preparare la tua carbonara","15.00");
insert into mystery_box  values (2, "https://m.media-amazon.com/images/I/41Ynrpo92VL._AC_.jpg", "Lasagne","Questa mistery box contiene tutti gli ingredienti per preparare le tue lasagne","20.00");
insert into mystery_box values (3, "https://m.media-amazon.com/images/I/41Ynrpo92VL._AC_.jpg", "Arrabiata", "Questa mistery box contiene tutti gli ingredienti per preparare una fantastica pasta Spicy","13.00");
insert into mystery_box values (4, "https://m.media-amazon.com/images/I/41Ynrpo92VL._AC_.jpg", "Big Mac", "Questa mistery box contiene tutti gli ingredienti per preparare 2 fantastici panini","10.00");
insert into mystery_box values (5, "https://m.media-amazon.com/images/I/41Ynrpo92VL._AC_.jpg", "Pancakes", "Questa mistery box contiene tutti gli ingredienti per preparare uno dei dolci più buoni di sempre","10.00");
insert into mystery_box values (6, "https://m.media-amazon.com/images/I/41Ynrpo92VL._AC_.jpg", "Shawarma", "Questa mistery box contiene tutti gli ingredienti per preparare un piatto che ti porta accanto gli Avengers","20.00");

create table carrello (id_vendita integer primary key auto_increment, id_box integer, immagine blob, nome varchar(255), ordinato_da varchar(255), prezzo float);
