<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/tabla.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php
    include './proc/conexion.php';
 
?>

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
  echo "<span><a href='usuario.php?pag=$i'>$i  |  </a></span>";

}

?>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="usuario.php">Previous</a></li>
    <li class="page-item"><a class="page-link" href="usuario.php">1</a></li>
    <li class="page-item"><a class="page-link" href="usuario.php">2</a></li>
    <li class="page-item"><a class="page-link" href="usuario.php">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</body>
</html>

