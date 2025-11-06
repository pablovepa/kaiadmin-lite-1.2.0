<?php include("../includesbe/header.php"); ?>
<?php include("db.php")?>

    <div class ="card text-center">
        <div class="card-body">
            <h1 class="card-title">ACTUALIZAR CLIENTE</h1>
            <p class="card-text">Los siguientes son los datos guardados hasta el momento:</p>
         
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>usuario</th>                          
                            <th>email</th>
                            <th>tipo-usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                              
                        $query = "SELECT u.id,
       u.usuario,
       u.email,
			 tu.nombre as tipo_usuario
from tbl_usuarios U, tbl_tipos_usuarios tu
where u.tipo_usuario=tu.id";
                        $result_alumnos = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_alumnos)){?>
                            <tr>
                                <td><?php echo $row['id']?></td>
                                <td><?php echo $row['usuario']?></td> 
                                 <td><?php echo $row['email']?></td>                             
                                <td><?php echo $row['tipo_usuario']?></td>
                         
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div> 

<?php include("../includesbe/footer.php"); ?>
