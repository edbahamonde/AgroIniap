select * from Agr_Provincia order by nombre
insert into agr_Provincia (nombre) values ('Cotopaxi');
insert into agr_Canton (id_provincia, nombre) values (1, 'Puerto Quito');
select * from Agr_Canton
alter table Agr_Caton rename to Agr_Canton
delete from Agr_canton

SELECT Id_Canton,nombre FROM Agr_Canton where Id_Provincia = 1 order by nombre

SELECT Id_Canton,nombre FROM Agr_Parroquia where Id_Canton = 2 order by nombre

insert into agr_Parroquia (id_canton, nombre) values (2, 'Cumbaya');

select * from Agr_Parroquia

truncate Agr_usuario

select CI from Agr_Usuario order by id_Usuario desc limit 1

SELECT * FROM tabla ORDER BY oid DESC LIMIT 1;

alter table Agr_usuario add column Fecha timestamp

select current_date;
select current_timestamp;

select * from Agr_usuario

alter table Agr_usuario drop column Agr_fecha

SELECT * FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1;

 update Agr_usuario set nombres ='Armando Telmo', apellidos ='Cajilema Cuji', correo= 'armandotcajilema@gmail.com' 
  where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1);


insert into Agr_usuario (Nombres, Apellidos, Correo) values ('Armando Telmo', 'Cajilema Cuji', 'armandotcajilema@gmail.com')

IF EXISTS (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1) 
THEN
   insert into Agr_usuario (Nombres, Apellidos, Correo) values ('Armando Telmo', 'Cajilema Cuji', 'armandotcajilema@gmail.com')


