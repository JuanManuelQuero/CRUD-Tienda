create table articulos(
id int PRIMARY KEY AUTO_INCREMENT,
nombre VARCHAR(60) unique not null,
pvp decimal(6,2) not null,
stock INT UNSIGNED default 0
);

insert into articulos(nombre, pvp, stock) values("Monitor 19", 123.45, 12);
insert into articulos(nombre, pvp, stock) values("Raton USB", 23.95, 13);
insert into articulos(nombre, pvp, stock) values("USB 512GB", 123.45, 14);
insert into articulos(nombre, pvp, stock) values("USB 8GB", 12.45, 14);
insert into articulos(nombre, pvp, stock) values("SET LAPICEROS", 13.15, 32);
insert into articulos(nombre, pvp, stock) values("Stick Wifi", 23, 62);
insert into articulos(nombre, pvp, stock) values("Funda 17", 13.4, 92);
insert into articulos(nombre, pvp, stock) values("Monitor 22", 193.65, 2);
insert into articulos(nombre, pvp, stock) values("Smart TV 52", 453.85, 92);
insert into articulos(nombre, pvp, stock) values("SSD 512GB", 123.45, 2);