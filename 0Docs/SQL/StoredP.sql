$consultaCat  = mysqli_query($conexion,'CALL sp_cat(2, "'.$Category.'");');
$consultaCat = mysqli_fetch_array($consultaCat);  //Devuelve un array o NULL
while(mysqli_next_result($conexion)){;}

#_______________________________________________________________________
    
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

#_______________________________________________________________________

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

#_______________________________________________________________________

delimiter =)
create procedure sp_neg
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		SELECT Nombre, ID_Negocio
        FROM negocios
        WHERE Nombre = idBtn;
			
	end if;
    if paccion = 2 then
        SELECT ID_Negocio
        FROM negocios
        WHERE ID_Negocio=idBtn;
    
    end if;
    if paccion = 3 then
        SELECT ID_Negocio, Nombre FROM negocios;

    end if;
    if paccion = 4 then
        SELECT Nombre 
        FROM negocios 
        WHERE ID_Negocio = idBtn;
    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_1Var
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		SELECT ID_Registro 
        FROM registro
        WHERE Username = idBtn;
	end if;
    if paccion = 2 then
        SELECT ID_Entrega, Fecha 
        FROM entregas
        WHERE ID_User = idBtn
        ORDER BY Fecha DESC;
    end if;
    if paccion = 3 then
        SELECT ID_Entrega, Fecha  
        FROM entregas
        ORDER BY Fecha DESC;
    end if;
    if paccion = 4 then
        SELECT ID_Producto, Nombre FROM productos;
    end if;
    if paccion = 5 then
        SELECT ID_Registro, Username FROM registro;
    end if;
    if paccion = 6 then
        SELECT ID_Producto
        FROM productoxwl
        WHERE ID_Producto=idBtn;
    end if;
    if paccion = 7 then
        SELECT ID_Wishlist
        FROM productoxwl
        WHERE ID_Producto=idBtn;
    end if;
    if paccion = 8 then
        SELECT Nombre 
        FROM wishlist 
        WHERE ID_Wishlist = idBtn;
    end if;
    if paccion = 9 then
        SELECT W.ID_Wishlist, PW.ID_Producto, P.Nombre, P.Descripcion, P.Precio, P.PrecioCant
        FROM wishlist W
        INNER JOIN productoxwl PW ON W.ID_Wishlist = PW.ID_Wishlist
        INNER JOIN productos P ON PW.ID_Producto = P.ID_Producto
        WHERE W.ID_Wishlist = idBtn;
    end if;
    if paccion = 0 then
        SELECT PC.ID_Producto, C.Categoria
        FROM productoxcat PC
        INNER JOIN categorias C ON PC.ID_Categoria = C.ID_Categoria
        WHERE PC.ID_Producto = idBtn;
    end if;


	END =)
delimiter ;