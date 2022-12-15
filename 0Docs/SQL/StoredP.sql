delimiter =)
create procedure sp_LogIn
(
	paccion tinyint,
	pname varchar(45)
)
BEGIN
declare name varchar(45);
set name=pname;

	if paccion = 1 then 
	    SELECT ID_Registro, Nombres, Apellidos, Rol, FechaNac, Email, Username, Contrasenia, ID_media
	    FROM registro
	    WHERE Username=name;
    end if;
	
	END =)
delimiter ;



delimiter =)
create procedure sp_cat
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		SELECT Categoria 
        FROM categorias 
        WHERE ID_Categoria = idBtn;
			
	end if;
    if paccion = 2 then
        SELECT ID_Categoria
        FROM categorias
        WHERE Categoria = idBtn;
    
    end if;
    if paccion = 3 then
        SELECT C.ID_Categoria, CN.ID_negocio, N.Nombre
        FROM categorias C
        INNER JOIN categoriaxnegocio CN ON C.ID_Categoria = CN.ID_categoria
        INNER JOIN negocios N ON CN.ID_negocio = N.ID_Negocio
        WHERE C.ID_Categoria = idBtn;

    end if;
    if paccion = 4 then
        SELECT C.ID_Categoria, CN.ID_Producto, N.Nombre
        FROM categorias C
        INNER JOIN productoxcat CN ON C.ID_Categoria = CN.ID_Categoria
        INNER JOIN productos N ON CN.ID_Producto = N.ID_Producto
        WHERE C.ID_Categoria = idBtn;
	
    end if;
    if paccion = 5 then
        SELECT Categoria
        FROM categorias
        WHERE Categoria=idBtn;

    end if;
    if paccion = 6 then
        SELECT ID_Categoria, Categoria FROM categorias;

    end if;

	END =)
delimiter ;