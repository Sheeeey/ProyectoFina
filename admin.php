<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="./styles/tabla2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid" >
    <a class="navbar-brand" href="./profeoalu.php">Crear Usuarios</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./bajarcsv.php">Bajar CSV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="">Alumnos</a>
        </li>
    
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>




<?php
session_start();
if(!$_SESSION['login']){
    //     echo "<script> window.location='./login.php'</script>";    
}
include './proc/conexion.php';

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
//tabla alumnos
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

  if (!$_SESSION['login2']) {
    echo "<td><button type='button' class='btn btn-danger' onClick=\"aviso('borrar.php?id={$alumno['id_alumne']};')\" >Borrar</button></td>";
   
    echo "<td><button class='btn btn-primary' onClick='aviso('modificar.php?id={$alumno['id_alumne']};')'>Modificar</button></td>";

    echo "<td><button type='button' class='btn btn-warning' onClick='aviso('borrar.php?id={$alumno['id_alumne']};')'>Email</button></td>";
    
  }  
}
    echo '</table>';
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

<?php

$sql1 = "SELECT * FROM tbl_professor;";
$listadoprof= mysqli_query($connection, $sql1);

echo '<table>';
echo '<tr>';
echo '<th>DNI</th>';
echo '<th>Nombre</th>';
echo '<th>1r Apellido</th>';
echo '<th>2n Apellido</th>';
echo '<th>Correo</th>';
echo '<th>Departamento</th>';
echo '<th>Telefono</th>';
echo '<th>Contraseña</th>';
echo '<th>Borrar</th>';
echo'<th>Modificar</th>';
echo'<th>Email</th>';
echo '</tr>';

foreach ($listadoprof as $professor) {
      
    // echo $rutacompleta;
    echo '<tr>';
    echo "<td>{$professor['nom_prof']}</td>";
    echo "<td>{$professor['cognom1_prof']}</td>";
    echo "<td>{$professor['cognom2_prof']}</td>";
    echo "<td>{$professor['email_prof']}</td>";
    echo "<td>{$professor['telf']}</td>";
    echo "<td>{$professor['dept']}</td>";
    echo "<td>{$professor['passwd_prof']}</td>";
    
    ?>
    <td><button type="button" class="btn btn-danger" onClick="aviso('borrar.php?id=<?php echo $professor['id_professor']; ?>')" >Borrar</button></td> 
    <td><button class="btn btn-primary" onClick="aviso('modificar.php?id=<?php echo $professor['id_professor']; ?>')">Modificar</button></td>
    <td><button type="button" class="btn btn-warning" onClick="aviso('borrar.php?id=<?php echo $professor['id_professor']; ?>')" >Email</button></td>
    <?php
    
}
echo '</table>';
for($i=1;$i<=$cantidadPaginas;$i++) {
  echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";
}
?>
</body>
</html>