<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./styles/tabla2.css">
    <link rel="shortcut icon" href="./img/admin.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Registro Alumno</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" >
  <?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  if(!$_SESSION['login2']){
    echo "<a class='navbar-brand' href='./profeoalu.php'>Crear Usuarios</a>";
  }
  ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <?php
        if (session_status() == PHP_SESSION_NONE) {
          session_start();
        }
        if(!$_SESSION['login2']){
          echo "<a class='nav-link active' aria-current='page' href='./bajarcsvalu.php'>Bajar CSV</a>";
        }       
        ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./adminp.php"href="">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Alumnos</a>
        </li>
      </ul>
      <!-- Botón logout -->
      <form class="d-flex">
        <button class="btn btn-outline-success" onclick="window.location.href = './proc/proc_logout.php'" type="button">Logout</button>
      </form>
    </div>
  </div>
</nav>




<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!$_SESSION['login']){
  if(!$_SESSION['login2']){
    echo "<script> window.location='./index.php'</script>";    
  }
           
}
include './proc/conexion.php';

?>
<br>

<form action="adminalu.php"  class="form" name="formulario_alu" method="POST">
  <input type="text" class="outlinenone" id="buscar" name="buscar" placeholder="Buscar" style="width: 300px;">
  <input type="submit" class="outlinenone" role="button" name="ver" value="Ver" area-disabled="true" style="width: 100px;">
</form>

<?php

// Mensaje de número de coincidencias al realizar un filtrado

                        
//Funcionalidad de la paginación
$cantPorPagina = 6;
$sql = "SELECT * FROM tbl_alumne;";
$queryAnim = mysqli_query($connection, $sql);
//mysqli_num_rows = cantidad de registros que me devuelve
$numFilas = mysqli_num_rows($queryAnim);
//                                                               -------------------------------------
//mostrar el número de registros                                | si lees esto eres un nene malo jeje |
//echo $numFilas."<br>";                                         -------------------------------------

//Saber la cantidad de páginas según la cantidad de registros por página
$cantidadPaginas = ceil($numFilas/$cantPorPagina); //CEIL = Redondear al número elevado (ej: 5.1 -> 6)

//Saber si estamos en la página 1 u en otra
if (empty($_GET["pag"])) {
    $inicioPagina = 0;
}
else {
    $inicioPagina = ($_GET["pag"]-1)*$cantPorPagina;
}
$queryAlu = [];

//La query final
if (isset($_POST['ver'])) {

  $sql1="SELECT p.* , pt.nom_classe
  FROM tbl_alumne p INNER JOIN tbl_classe pt 
  ON p.classe=pt.id_classe 
  Where p.nom_alu LIKE '%".$_POST["buscar"]."%' OR p.cognom1_alu LIKE '%".$_POST["buscar"]."%'
  OR p.dni_alu LIKE '%".$_POST["buscar"]."%' OR p.cognom2_alu LIKE '%".$_POST["buscar"]."%'
  OR p.telf_alu LIKE '%".$_POST["buscar"]."%' OR p.email_alu LIKE '%".$_POST["buscar"]."%'
  OR pt.nom_classe LIKE '%".$_POST["buscar"]."%'";

  $queryAlu=mysqli_query($connection, $sql1);
  
}
else {
  $sql2 = "SELECT id_alumne, dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, c.nom_classe as 'classe', passwd_alu
  FROM tbl_alumne 
  INNER JOIN tbl_classe c 
  ON classe = c.id_classe LIMIT $inicioPagina, $cantPorPagina;";
  $queryAlu = mysqli_query($connection, $sql2);
}
// $numFilas1 = mysqli_num_rows($queryAlu);
// if ($numfilas1 == 0) {
//   alert("No hay coincidencias");
// } else {
//   alert("Hay ".$numfilas1." coincidencias");
// }
//ESTE "FOR" SE PONE DEBAJO DE LA TABLA                         ESTE "FOR" SE PONE DEBAJO DE LA TABLA

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
// Sesión del administrador que tiene permiso para usar los botones de borrar, modificar y mandar emails
if (!$_SESSION['login2']){
echo '<th>Borrar</th>';
echo'<th>Modificar</th>';
echo'<th>Email</th>';
echo '</tr>';
}
//tabla alumnos
foreach ($queryAlu as $alumno) {
    
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
  // Sesión del administrador que tiene permiso para usar los botones de borrar, modificar y mandar emails
  if (!$_SESSION['login2']) {
    echo "<td><button type='button' class='btn btn-outline-danger' onClick=\"aviso('borrar.php?id={$alumno['id_alumne']};')\" >Borrar</button></td>";
   
    echo "<td><button type='button 'class='btn btn-outline-primary' onClick=\"aviso('modificar.php?id={$alumno['id_alumne']};')\">Modificar</button></td>";

    echo "<td><button type='button' name= 'enviarCorr'class='btn btn-outline-warning' onClick=\"aviso('correo.php?id={$alumno['id_alumne']};')\">Email</button></td>";
    
  }  
}
    echo '</table>';
      // echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";  //Botones
    echo "<div class= 'paginacion'>";
    echo" <nav class='paddingl' aria-label='Page navigation example'>
      <ul class='pagination pg-blue'>
        <li class='page-item'></li>
        ";
        for($i=1;$i<=$cantidadPaginas;$i++) {
          echo "<li class='page-item'><a class='page-link' href='adminalu.php?pag=$i'>$i</a></li>
          ";
        }
      echo "</ul>";
      echo "<div class= 'paginacion'>";

?>

    <script>

    function aviso(url) {
         Swal.fire({
             title: '¿Estas seguro?',
             icon: 'warning',
             showCancelButton: true,
             confirmButtonColor: '#3085d6',
             cancelButtonColor: '#d33',
             confirmButtonText: 'Yes'
             }).then((result) => {
           if (result.isConfirmed) {
                window.location.href = url;
             }
             })
    }
    
    
    </script>