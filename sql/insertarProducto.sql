DELIMITER //

CREATE TRIGGER productosInsertarBitacora
AFTER INSERT ON productos
FOR EACH ROW
BEGIN
    INSERT INTO bitacora (id, accion, fecha, diferencia, sentencia, contraSentencia)
    VALUES (NEW.IDProducto, 'Producto insertado', CURRENT_TIMESTAMP, 1, "INSERT", "DELETE");
END //

DELIMITER ;