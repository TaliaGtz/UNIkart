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

#_______________________________________________________________________

delimiter =)
create procedure sp_2Var
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		SELECT Username
        FROM registro
        WHERE Username=idBtn;
	end if;
    if paccion = 2 then
        SELECT ID_media
        FROM registro
        WHERE ID_media=idBtn;
    end if;
    if paccion = 3 then
        SELECT IDChat, Usuario, Mensaje, Fecha FROM chat ORDER BY Fecha DESC;

    end if;
    if paccion = 4 then
        SELECT Nombre, Negocio, Valoracion, Precio, PrecioCant, Disponibilidad, Descripcion, Views  
        FROM productos 
        WHERE ID_Producto = idBtn;

    end if;
    if paccion = 5 then
        SELECT Nombre, Negocio
        FROM productos
        WHERE Nombre = idBtn;

    end if;
    if paccion = 6 then
        SELECT ID_Producto, Nombre 
        FROM productos 
        WHERE Negocio=idBtn;

    end if;
    if paccion = 7 then
        SELECT CODE
        FROM carrito
        WHERE ID_KartList=idBtn;

    end if;
    if paccion = 8 then
        SELECT Fecha, CODE, Total, Lugar, Pago
        FROM entregas 
        WHERE ID_Entrega = idBtn;
    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_3Var
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		UPDATE productoxkart 
        SET status = '1'
        WHERE ID_Cart=idBtn;

	end if;
    if paccion = 2 then
        INSERT INTO entregas (CODE, Total, Fecha, ID_User, ID_Kart) 
        SELECT CODE, Total, FechaKart, ID_User, ID_KartList
        FROM carrito 
        WHERE ID_KartList = idBtn;

    end if;
    if paccion = 3 then
        SELECT E.ID_Entrega, PK.ID_Producto, P.Nombre, P.Negocio
        FROM entregas E
        INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
        INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
        WHERE E.ID_Entrega = idBtn;

    end if;
    if paccion = 4 then
        SELECT E.ID_Entrega, PK.ID_Producto, P.Nombre, P.Negocio, N.Nombre
        FROM entregas E
        INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
        INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
        INNER JOIN negocios N ON P.Negocio = N.ID_Negocio
        WHERE E.ID_Entrega = idBtn;

    end if;
    if paccion = 5 then
        SELECT PC.ID_Producto, C.Categoria
        FROM productoxcat PC
        INNER JOIN categorias C ON PC.ID_Categoria = C.ID_Categoria
        WHERE PC.ID_Producto = idBtn;

    end if;
    if paccion = 6 then
        SELECT ID_Carrito
        FROM carrito
        WHERE ID_Carrito=idBtn;

    end if;
    if paccion = 7 then
        SELECT ID_Carrito, ID_KartList
        FROM carrito
        WHERE ID_Carrito=idBtn;

    end if;
    if paccion = 8 then
        SELECT P.ID_Producto, M.nombre, M.tipo, M.imagen
        FROM productoxmedia P
        INNER JOIN media M ON P.ID_media = M.ID_media
        WHERE P.ID_Producto = idBtn;

    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_4Var
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		SELECT K.ID_KartList, PK.ID_Producto, P.Nombre, P.Descripcion, P.Precio, P.PrecioCant
        FROM carrito K
        INNER JOIN productoxkart PK ON K.ID_KartList = PK.ID_Cart
        INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
        WHERE K.ID_KartList = idBtn AND PK.status = '0';

	end if;
    if paccion = 2 then
        SELECT PC.ID_Producto, C.Categoria
        FROM productoxcat PC
        INNER JOIN categorias C ON PC.ID_Categoria = C.ID_Categoria
        WHERE PC.ID_Producto = idBtn;

    end if;
    if paccion = 3 then
        SELECT ID_KartList 
        FROM carrito 
        WHERE ID_Carrito = idBtn;

    end if;
    if paccion = 4 then
        SELECT Nombre, Negocio, Valoracion, Precio, PrecioCant, Disponibilidad, Descripcion, Views  
        FROM productos 
        WHERE ID_Producto = idBtn;

    end if;
    if paccion = 5 then
        SELECT PC.ID_Producto, C.Categoria
        FROM productoxcat PC
        INNER JOIN categorias C ON PC.ID_Categoria = C.ID_Categoria
        WHERE PC.ID_Producto = idBtn;

    end if;
    if paccion = 6 then
        SELECT video_id, video_name, location FROM `video` WHERE ID_Producto = idBtn;

    end if;
    if paccion = 7 then
        SELECT ID_Wishlist, Imagen, Nombre, Privacidad, Descripcion, ID_User 
        FROM wishlist
        WHERE ID_User = idBtn;

    end if;
    if paccion = 8 then
        SELECT nombre, tipo, imagen 
        FROM media 
        WHERE ID_media = idBtn;

    end if;
    if paccion = 9 then
        SELECT ID_Wishlist, Imagen, Nombre, Privacidad, Descripcion, ID_User 
        FROM wishlist
        WHERE ID_User = idBtn AND Privacidad='0';
    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_5Var
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		SELECT Username, ID_media, Rol, Email
        FROM registro
        WHERE ID_Registro = idBtn;

	end if;
    if paccion = 2 then
        SELECT Fecha, CODE, Total, Lugar, Pago, ID_Entrega
        FROM entregas 
        WHERE ID_Entrega = idBtn;

    end if;
    if paccion = 3 then
        SELECT E.ID_Entrega, PK.ID_Producto, P.Nombre, P.Negocio, P.Disponibilidad
        FROM entregas E
        INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
        INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
        WHERE E.ID_Entrega = idBtn;

    end if;
    if paccion = 4 then
        SELECT E.ID_Entrega, PK.ID_Producto, P.Nombre, P.Negocio, N.Nombre
        FROM entregas E
        INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
        INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto
        INNER JOIN negocios N ON P.Negocio = N.ID_Negocio
        WHERE E.ID_Entrega = idBtn;

    end if;
    if paccion = 5 then
        SELECT PC.ID_Producto, C.Categoria
        FROM productoxcat PC
        INNER JOIN categorias C ON PC.ID_Categoria = C.ID_Categoria
        WHERE PC.ID_Producto = idBtn;

    end if;
    if paccion = 6 then
        SELECT ID_Producto, video_id, video_name, location
		FROM video
		WHERE ID_Producto=idBtn;

    end if;
    if paccion = 7 then
        SELECT video_id, video_name, location FROM `video` ORDER BY `video_id` ASC;

    end if;
    if paccion = 8 then
        SELECT Nombre
        FROM wishlist
        WHERE Nombre=idBtn;

    end if;
    if paccion = 9 then
        SELECT ID_Wishlist, Imagen, Nombre, Privacidad, Descripcion, ID_User 
        FROM wishlist
        WHERE ID_User = idBtn;
    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_ventasRes
(
	paccion tinyint
)
BEGIN

	if paccion = 1 then
		SELECT total, ventas FROM total_entregas;

	end if;
    if paccion = 2 then
        SELECT Categoria, total FROM most_categorias;

    end if;
    if paccion = 3 then
        SELECT Nombre, total FROM most_products;

    end if;
    if paccion = 4 then
        SELECT Pago, total FROM most_pays;

    end if;
    if paccion = 5 then
        SELECT dia FROM most_day;

    end if;
    if paccion = 6 then
        SELECT mes FROM most_month;

    end if;
    if paccion = 7 then
        SELECT year FROM most_year;

    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_6Var
(
	paccion tinyint,
	pidBtn varchar(45)
)
BEGIN
declare idBtn varchar(45);
set idBtn=pidBtn;

	if paccion = 1 then
		SELECT ID_Registro, Nombres, Apellidos, Rol, FechaNac, Email, Username, Contrasenia, ID_media 
        FROM registro
        WHERE Username=idBtn;

	end if;
    if paccion = 2 then
        SELECT nombre, tipo, imagen FROM media;

    end if;
    if paccion = 3 then
        SELECT ID_Registro, Rol
        FROM registro
        WHERE Username = idBtn;

    end if;
    if paccion = 4 then
        SELECT ID_Carrito, ID_KartList
        FROM carrito
        WHERE ID_User=idBtn;

    end if;
    if paccion = 5 then
        SELECT ID_Producto, Nombre, Precio, PrecioCant 
        FROM mostVisited_products;

    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_Registro
(
	paccion tinyint,

    vIDMedia smallint(5),
    vfotoPerfilTxt varchar(100),
    vfotoPerfil mediumblob,
    vfecha varchar(50),

    vID smallint(5),
    vnombres varchar(25),
    vapellidos varchar(25),
    vrol varchar(25),
    vfechaNac datetime,
    vcorreo varchar(50),
    vuser varchar(25),
    vpasswordHash varchar(25)
    
)
BEGIN

	if paccion = 1 then
		INSERT INTO media (ID_media, nombre, imagen, tipo)
        VALUES(
            vIDMedia,
            vfotoPerfilTxt,
            vfotoPerfil,
            vfecha
        );

	end if;
    if paccion = 2 then
		INSERT INTO registro (ID_Registro, Nombres, Apellidos, Rol, FechaNac, Email, Username, Contrasenia, ID_media)
        VALUES(
            vID,
            vnombres,
            vapellidos,
            vrol,
            vfechaNac,
            vcorreo,
            vuser,
            vpasswordHash, 
            vIDMedia
        );

	end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_AddVariables
(
	paccion tinyint,

    vIDNeg smallint(5),
    vnegName varchar(25),
    vDuenioUser smallint(5),
    vadminApproved smallint(5),
    vIDCat smallint(5),
    vIDNeg2 smallint(5),
    vID smallint(5),
    vcatName varchar(25),
    vID_User smallint(5)
    
)
BEGIN

	if paccion = 1 then
		INSERT INTO negocios 
        VALUES(
            vIDNeg,
            vnegName,
            vDuenioUser,
            vadminApproved
        );

	end if;
    if paccion = 2 then
		INSERT INTO categoriaxnegocio 
        VALUES(
            vIDCat,
            vIDNeg2
        );

	end if;
    if paccion = 3 then
    INSERT INTO categorias 
        VALUES(
            vID,
            vcatName,
            vID_User
        );

    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_AddVariables2
(
	paccion tinyint,

    vIDProd smallint(5),
    vIDWL smallint(5),
    vIDChat smallint(5), 
    vnombre varchar(25), 
    vmensaje text,
    vseleccion smallint(5),
    vID smallint(5)
    
)
BEGIN

	if paccion = 1 then
		INSERT INTO productoxwl 
        VALUES(
            vIDProd,
            vIDWL
        );

	end if;
    if paccion = 2 then
		INSERT INTO chat (IDChat, Usuario, Mensaje) 
        VALUES(vIDChat, vnombre, vmensaje);

	end if;
    if paccion = 3 then
        INSERT INTO productoxcat
        VALUES(
            vseleccion,
            vID       
        );

    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_AddVariables3
(
	paccion tinyint,

    vID        smallint(5),
    vnegID     smallint(5),
    vproduct   varchar(25),
    vrate      tinyint(4),
    vprecio    tinyint(1),
    vprecioCant smallint(6),
    vdisp      int(11),
    vdesc      varchar(100),
    vNum       smallint(5),
    vNum2      int(5),
    vID_Com    int(5),
    vID2 smallint(5),
    vimagen blob,
    vwlName varchar(25),
    vPriv tinyint(1),
    vDesc2 varchar(100),
    vProd smallint(5),
    vID_User smallint(5)
    
)
BEGIN

	if paccion = 1 then
		INSERT INTO productos 
        VALUES(
            vID        ,
            vnegID     ,
            vproduct   ,
            vrate      ,
            vprecio    ,
            vprecioCant,
            vdisp      ,
            vdesc      ,
            vNum       ,
            vNum2      ,
            vID_Com    
        );

	end if;
    if paccion = 2 then
		INSERT INTO wishlist 
        VALUES(
            vID2,
            vimagen,
            vwlName,
            vPriv,
            vDesc2,
            vProd,
            vID_User
        );

	end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_AddVariables4
(
	paccion tinyint,

    vuser smallint(5),
    vnull timestamp(6),
    vID_KartList smallint(5),
    vuser2 smallint(5),
    vnull2 varchar(7), 
    vnull3 smallint(5),
    vID_KartList2 smallint(5),
    v1 smallint(10),
    v0 tinyint(1),
    vIDProd smallint(5),
    vEntrega smallint(5)
    
)
BEGIN

	if paccion = 1 then
		INSERT INTO carrito 
        VALUES(
            vuser,
            vnull,
            vID_KartList,
            vuser2,
            vnull2, 
            vnull3
        );

	end if;
    if paccion = 2 then
		INSERT INTO productoxkart 
        VALUES(
            vID_KartList2,
            v1,
            v0,
            vIDProd,
            vEntrega
        );

	end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_AddVariables5
(
	paccion tinyint,

    vIDMedia smallint(5),
    vnow varchar(100), 
    vbinImagen mediumblob, 
    vtipoArchivo varchar(50),
    vidBtn smallint(5),
    vIDMedia2 smallint(5),
    vnombreArchivo varchar(100), 
    vbinImagen2 mediumblob, 
    vtipoArchivo2 varchar(50),
    vnull int(11), 
    vname varchar(100), 
    vlocation varchar(100), 
    vIDBtn2 smallint(5)
    
)
BEGIN

	if paccion = 1 then
		INSERT INTO media
        VALUES(
            vIDMedia,
            vnow, 
            vbinImagen, 
            vtipoArchivo
            );

	end if;
    if paccion = 2 then
		INSERT INTO productoxmedia
        VALUES(
            vidBtn,
            vIDMedia2
            );

	end if;
    if paccion = 3 then
        INSERT INTO media (nombre, imagen, tipo)
        VALUES(vnombreArchivo, vbinImagen2, vtipoArchivo2);
    
    end if;
    if paccion = 4 then
        INSERT INTO `video` 
	    VALUES(vnull, vname, vlocation, vIDBtn2);
    
    end if;


	END =)
delimiter ;

#_______________________________________________________________________

delimiter =)
create procedure sp_ultSelect
(
	paccion tinyint,

    vget varchar(25),
    fecha1 timestamp(6),
    fecha2 timestamp(6),
    fecha3 timestamp(6),
    fecha4 timestamp(6),
    vUser smallint(5)
    
)
BEGIN

	if paccion = 1 then
		SELECT ID_Registro, Username, Contrasenia, Rol FROM registro WHERE Username = vget;

	end if;
    if paccion = 2 then
		SELECT ID_Entrega, Fecha 
        FROM entregas
        WHERE Fecha BETWEEN fecha1 AND fecha2
        ORDER BY Fecha DESC;

	end if;
    if paccion = 3 then
        SELECT ID_Entrega, Fecha 
        FROM entregas
        WHERE Fecha BETWEEN fecha3 AND fecha4 AND ID_User = vUser;
        ORDER BY Fecha DESC;
    
    end if;


	END =)
delimiter ;