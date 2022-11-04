Select * from tabla;

Alter table tabla
	Add Status bit default 1;
	
Describe Table

Delimiter $!
Create procedure sp_RegistroTabla
(
	paccion  tinyint,
	pID_Registro  smallint,   
    pNombres 	varchar(25),
    pApellidos 	varchar(25),
    pFechaNac	datetime,
    pEmail		varchar(50),
    pFotoPerfil	varchar(300),
    pUsername	varchar(25),
    pContrasenia	varchar(25)
)
BEGIN
	declare hoy  datetime;
	set hoy  = now();
	
	If paccion= 1 then
		Insert into tabla(pNombres, pApellidos, pFechaNac, pEmail, pFotoperfil, pUsername, pContrasenia)
			Values(pNombres, pApellidos, pFechaNac, pEmail, pFotoperfil, pUsername, pContrasenia);
	elseif paccion = 2 then
		Update tabla
			Where ID_Registro=pID_Registro;
	elseif paccion= 3 then
		Update tabla
			Set status=0
			Where ID_Registro=pID_Registro;
	elseif paccion=4 then
		Delete from tabla
			Where ID_Registro=pID_Registro;
	elseif paccion= 5 then
		Select tabla
			Where ID_Registro=pID_Registro;
	END IF;
			
END $!
Delimiter ;

call sp_RegistroTabla();
