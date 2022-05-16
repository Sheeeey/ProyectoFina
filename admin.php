<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/tabla2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
    include './proc/conexion.php';
 
?>
<a href="./crear_usuarios.php" class="btn btn-success btn-lg" role="button" aria-disabled="true">Crear Usuario</a>
<?php
$sql = "SELECT * FROM tbl_alumne;";
$listadodept= mysqli_query($connection, $sql);

echo '<table>';
echo '<tr>';
echo '<th>DNI</th>';
echo '<th>Nombre</th>';
echo '<th>1r Apellido</th>';
echo '<th>2n Apellido</th>';
echo '<th>Correo</th>';
echo '<th>Clase</th>';
echo '<th>Telefono</th>';
echo '<th>Contraseña</th>';
echo '<th>Borrar</th>';
echo'<th>Modificar</th>';
echo'<th>Email</th>';
echo '</tr>';


foreach ($listadodept as $alumno) {
    
    // echo $rutacompleta;
    echo '<tr>';
    echo "<td>{$alumno['dni_alu']}</td>";
    echo "<td>{$alumno['nom_alu']}</td>";
    echo "<td>{$alumno['cognom1_alu']}</td>";
    echo "<td>{$alumno['cognom2_alu']}</td>";
    echo "<td>{$alumno['email_alu']}</td>";
    echo "<td>{$alumno['classe']}</td>";
    echo "<td>{$alumno['telf_alu']}</td>";
    echo "<td>{$alumno['passwd_alu']}</td>";
    ?>
    <td><button type="button" class="btn btn-danger" onClick="aviso('./borrar.php?id=<?php echo $alumno['id_alumne']; ?>')" >Borrar</button></td>
   
    <td><button class="btn btn-primary" onClick="aviso('./modificar.php?id=<?php echo $alumno['id_alumne']; ?>')">Modificar</button></td>

    <td><button type="button" class="btn btn-warning" onClick="aviso('./borrar.php?id=<?php echo $alumno['id_alumne']; ?>')" >Email</button></td>
    <?php
}
    echo '</table>';



$cantPorPagina = 10;


$sql = "SELECT * from tbl_alumne;";
$queryAnim = mysqli_query($connection, $sql);

$numFilas = mysqli_num_rows($queryAnim);


$cantidadPaginas=ceil($numFilas/$cantPorPagina);

if (empty($_GET['pag'])){
    $inicioPagina =0;
}else{
    $inicioPagina = ($_GET['pag']-1)*$cantPorPagina;
}

$sql2 = "SELECT * from tbl_alumne LIMIT $inicioPagina,$cantPorPagina;";
$queryAnim2 = mysqli_query($connection,$sql2);
  

for($i=1;$i<=$cantidadPaginas;$i++) {
  echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";
}
?>
</body>
</html>