<p>(Podrás editar la ventana de tu producto pero éste aún deberá de ser aprobado por el administrador)</p><br>

<p>Nombre del producto: </p>
<input id="prodName" name="prodName" type="text"><br><br>

<p>Precio: </p>
<input type="radio" name="precio" class="precio" value="1"><input type="number" name="money" class="precio" placeholder="00.00">
<label><input type="radio" name="precio" class="precio" value="0">A cotizar</label><br><br>

<label>Categoría(s):</label><br><br>
<?php
    
    include("../PhpDocs/Conexion.php");

    $consulta = "SELECT ID_Categoria, Categoria FROM categorias";
    $ejecutar = $conexion->query($consulta);
    while($fila = $ejecutar->fetch_array()):
        
?>
        
    <input type="checkbox" class="CB" name="checkbox" value="<?php $fila['Categoria'] ?>"><label> <?php echo $fila['Categoria']; ?></label>

<?php endwhile; ?> 
    
<br><br><label>Disponibilidad: </label><input type="number" name="disp" class="precio" placeholder="0"><br><br>
    
<label>Descripción:</label><br><textarea id="txtid" name="txtname" rows="4" cols="50" maxlength="200"></textarea><br><br>  

<div><button id="buy" type="submit">Agregar</button></div>