DROP PROCEDURE IF EXISTS mendoglass.update_costo_cat;
CREATE PROCEDURE mendoglass.update_costo_cat(in PORCENT INT, in CAT VARCHAR(100))
begin
	update stock set
	precio = convert (((convert (precio, FLOAT)) / PORCENT ) + (convert (precio, FLOAT)),VARCHAR(100))
	where categoria = CAT;
end;