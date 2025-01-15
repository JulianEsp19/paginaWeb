DELIMITER //

CREATE TRIGGER productosEliminarBitacora
BEFORE DELETE ON productos
FOR EACH ROW
BEGIN
    INSERT INTO bitacora (id, accion, fecha, diferencia, sentencia, contraSentencia)
    VALUES (OLD.IDProducto, 'producto eliminado', CURRENT_TIMESTAMP, 1, "DELETE", "INSERT");
END //

DELIMITER ;