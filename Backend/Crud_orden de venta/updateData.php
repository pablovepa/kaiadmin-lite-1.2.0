<?php include("includes/header.php")?>
<?php include("db.php")?>

<?php
if(isset($_GET['id'])){
$codigo = $_GET['id'];
$query = "SELECT * FROM tbl_usuarios WHERE id = $codigo";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) ==1) {
    $row = mysqli_fetch_array($result);
    $nombres = $row['nombre'];
    $email=$row['email'];
    $telefono = $row['telefono'];    
    $usuario= $row['usuario'];
    $clave= $row['clave'];
    $tipo= $row['tipo_usuario'];
    
    }
}
if (isset($_POST['update2'])){
    $codigo = $_GET['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $usuario=$_POST['usuario'];
    $clave= $_POST['clave'];
    $tipos= $_POST['tipo'];

    $query = "UPDATE tbl_usuarios 
                     SET nombre = '$nombre', 
                         email = '$email',
                         telefono = '$telefono',                        
                         usuario = '$usuario',
                         clave = '$clave',
                         tipo_usuario = $tipos
                          WHERE id = $codigo";
                        // die( $query);
    $result = mysqli_query($conn,$query);
    if (!$result){
        echo "El query de actualizar falló";
    }else{
        ?>
        <script>alert("Registro actualizado");</script>
        <script>
        window.location = "index.php";
        </script>
        <?php 
    }
}
?>
<div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">ACTUALIZAR DATOS</h1>
            <p class="card-text">Los siguientes son los datos seleccionados para actualizar:</p>
         
            <form action="updateData.php?id=<?php echo $_GET['id']; ?>" method="POST">
            
            <div class="form-group"  for="name">Nombre: 
            <input type="text" name="nombre" clas="form-control" placeholder="Actualizar Nombre" value="<?php print $nombres;?>">
            </div>

            <div class="form-group" for="name"> Email:
            <input type="text" name="email" clas="form-control" placeholder="Actualizar email" value="<?php print $email;?>">
            </div>          
          

            <div class="form-group" for="name">Telefono:
            <input type="text" name="telefono" clas="form-control" placeholder="Actualizar telefono" value="<?php print $telefono;?>">
            </div>

            <div class="form-group" for="name">Usuario:
            <input type="text" name="usuario" clas="form-control" placeholder="Actualizar telefono" value="<?php print $usuario;?>">
            </div>            
            
            <div class="form-group" for="name">Clave:
            <input type="text" name="clave" clas="form-control" placeholder="Actualizar telefono" value="<?php print $clave;?>">
            </div>            
            
            <div class="form-group">
            <label for="select">Tipo Usuarios</label>
                <select name="tipo" id="tipo">                   
                    <?php
                    $query = "SELECT * FROM tbl_tipos_usuarios;";                   
                    $result_pais = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result_pais)){
                            if($tipo==$row['id']){
                            ?>
                              <option value="<?php echo $row['id']?>" selected="selected"><?php echo $row['nombre']?></option>
                        <?php }else{ ?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nombre']?></option>
                            <?php }}?>
                </select>
            </div>
           
            <button class="btn btn-success" name="update2">Actualizar</button>
            </form>
        </div>
    </div>    

<?php include("includes/footer.php")?>
     
    
    