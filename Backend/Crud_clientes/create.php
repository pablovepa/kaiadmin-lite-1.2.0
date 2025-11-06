<?php include("../includesbe/header.php"); ?>
<?php include("../db.php")?>

<div class ="card text-center">
    <div class="card-body">
        <h1 class="card-title">Registrar Cliente</h1>
        <p class="card-text">Ingresar Datos</p>

        <form action="save.php" method="POST">
            <div class="form-group">
            <input type="text" name="nombre" clas="form-control" placeholder="Ingrese Nombre" autofocus>
            </div>
            <div class="form-group">
            <input type="text" name="email" clas="form-control" placeholder="Ingrese email">
            </div>
            <div class="form-group">
            <input type="text" name="telefono" clas="form-control" placeholder="Ingrese telefono">
            </div>
            <div class="form-group">
            <input type="text" name="usuario" clas="form-control" placeholder="Ingrese Usuario">
            </div>
             <div class="form-group">
            <input type="text" name="clave" clas="form-control" placeholder="Ingrese clave">
            </div>            
            <div class="form-group">
            <label for="select">Tipos Usuarios</label>
                <select name="tipo" id="tipo">
                    <option value="">Selecionar el tipo</option>
                    <?php
                    $query = "SELECT * FROM tbl_tipos_usuarios;";                                    
                    $result_pais = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_pais)){?>
                         <option value="<?php echo $row['id']?>"><?php echo $row['nombre']?></option>
                        <?php } ?>
                </select>
            </div>
            
            <input type="submit" class="btn btn-success" name="guardar_registro" value="Guardar">
        </form>
    </div>
</div>

<?php include("../includesbe/footer.php"); ?>
