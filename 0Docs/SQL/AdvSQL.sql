#Necesitamos_2_Triggers,_8_views,_2_functions_en_total;

#Views_3;
create view cot_products AS
select Negocio, Nombre, Precio from productos where Precio = 0;

create view mostVisited_products AS
select ID_Producto, Negocio, Nombre, Precio, PrecioCant, Views from productos where Views > 4 order by Views DESC;

create view Total_entregas AS
SELECT sum(Total) from entregas;


create view mostVisited_places AS
select Lugar, count(Lugar) as total
from entregas
group by Lugar
order by 2 desc;