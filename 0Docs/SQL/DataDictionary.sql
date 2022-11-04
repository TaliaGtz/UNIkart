SELECT distinct
        c.column_name,
        c.column_type,
        c.column_default,
        c.column_key,
        c.is_nullable,
        /*t.table_name,*/
        c.column_comment
FROM information_schema.tables AS t
INNER JOIN information_schema.columns AS c
	ON t.table_name = c.table_name
	AND t.table_schema = c.table_schema
WHERE t.table_type IN ('BASE TABLE')
AND t.table_schema = 'sakila'
ORDER BY
		c.column_name,
		c.ordinal_position;
        

ALTER TABLE Registro MODIFY COLUMN Nombres varchar(25) comment 'The yrty where the customer is located';