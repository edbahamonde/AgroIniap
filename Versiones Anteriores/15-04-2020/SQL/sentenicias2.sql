/* 11 de abril del 2020 

Sentenias creadas para la confirmacion del registro
 
 */
select * from agr_usuario

alter table agr_usuario drop column f_asociacio varchar(200);

select * from Agr_tipo_usuario

select * from Agr_estado

SELECT correo FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1


select Agr_estado.nombre_corto from Agr_usuario inner join Agr_estado on agr_usuario.id_estado = agr_estado.id_estado
where agr_usuario.ci = '1714900188'

select * from Agr_estado

select id_estado from Agr_estado where nombre_corto = 'A';

update Agr_usuario set id_estado = (select id_estado from Agr_estado where nombre_corto = 'A')
    where CI = (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)