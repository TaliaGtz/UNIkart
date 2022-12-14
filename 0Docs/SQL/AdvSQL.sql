#Necesitamos_2_Triggers,_8_views,_2_functions_en_total;

#Views_11;
create view cot_products AS
select Negocio, Nombre, Precio from productos where Precio = 0;

create view mostVisited_products AS
select ID_Producto, Negocio, Nombre, Precio, PrecioCant, Views from productos where Views > 4 order by Views DESC;

create view Total_entregas AS
SELECT sum(Total) AS total, count(ID_Entrega) AS ventas from entregas;

create view avg_categorias AS
SELECT E.ID_Entrega, PK.ID_Producto, P.ID_Categoria, C.Categoria
FROM entregas E
INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
INNER JOIN productoxcat P ON PK.ID_Producto = P.ID_Producto
INNER JOIN categorias C ON P.ID_Categoria = C.ID_Categoria;

create view most_categorias AS
SELECT Categoria, count(Categoria) AS total
FROM avg_categorias
GROUP BY Categoria
ORDER BY 2 DESC
LIMIT 0, 5;

create view avg_products AS
SELECT E.ID_Entrega, PK.ID_Producto, P.Nombre, P.Negocio
FROM entregas E
INNER JOIN productoxkart PK ON E.ID_Entrega = PK.Entrega
INNER JOIN productos P ON PK.ID_Producto = P.ID_Producto;

create view most_products AS
SELECT Nombre, count(Nombre) AS total
FROM avg_products
GROUP BY Nombre
ORDER BY 2 DESC
LIMIT 0, 5;

create view most_pays AS
SELECT Pago, count(Pago) AS total
FROM entregas
GROUP BY Pago
ORDER BY total DESC
LIMIT 0, 1;

create view most_day AS
select DAY(Fecha) AS dia, count(Fecha) AS dTotal
from entregas
GROUP BY DAY(Fecha)
ORDER BY dTotal DESC
LIMIT 0, 1;

create view most_month AS
select MONTH(Fecha) AS mes, count(Fecha) AS mTotal
from entregas
GROUP BY MONTH(Fecha)
ORDER BY mTotal DESC
LIMIT 0, 1;

create view most_year AS
select YEAR(Fecha) AS year, count(Fecha) AS yTotal
from entregas
GROUP BY YEAR(Fecha)
ORDER BY yTotal DESC
LIMIT 0, 1;
