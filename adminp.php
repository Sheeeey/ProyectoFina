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
          echo "<a class='nav-link active' aria-current='page' href='./bajarcsvprof.php'>Bajar CSV</a>";
        }       
        ?>
          
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./admin.php"href="">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./adminalu.php">Alumnos</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
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
    //     echo "<script> window.location='./index.php'</script>";    
}
include './proc/conexion.php';
?>
<br>
<form action="./proc/filtro_admin.php">
<div class="tabla-filtro">
<th><input class="outlinenone" type="text" maxlength="20" name="tabla_dni_prof" id="tabla_dni_prof" placeholder="DNI"></th>

                        <th><input class="outlinenone" type="text" maxlength="20 " name="tabla_nom_prof" id="tabla_nom_prof" placeholder="Nombre"></th>
                        
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_cognom1_prof" id="tabla_cognom1_prof" placeholder="1r Apellido"></th>
                      
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_cognom2_prof" id="tabla_cognom2_prof" placeholder="2n Apellido"></th>
                       
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_email_prof" id="tabla_email_prof" placeholder="Correo"></th>
                       
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_classe_prof" id="tabla_classe_prof" placeholder="Departamento"></th>
                        
                        <th><input class="outlinenone" type="text" maxlength="20" name="tablatelf_profl" id="tablatelf_profl" placeholder="Telefono"></th>
                        <th><input class="outlinenone" type="submit" value="Buscar"></th>
                        </div>
                        </form>
                      

<?php

$cantPorPagina = 10;
$sql = "SELECT * FROM tbl_professor;";
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

//La query final
$sql = "SELECT id_professor, dni_prof, nom_prof, cognom1_prof, cognom2_prof, email_prof, telf, d.nom_dept as 'dept', passwd_prof
FROM tbl_professor 
INNER JOIN tbl_dept d 
ON dept = d.id_dept LIMIT $inicioPagina, $cantPorPagina;";
$queryProf = mysqli_query($connection, $sql);

// $sql1 = "SELECT * FROM tbl_professor;";


echo '<table>';
echo '<tr>';
echo '<th>DNI</th>';
echo '<th>Nombre</th>';
echo '<th>1r Apellido</th>';
echo '<th>2n Apellido</th>';
echo '<th>Correo</th>';
echo '<th>Telefono</th>';
echo '<th>Departamento</th>';
if (!$_SESSION['login2']) {
echo '<th>Borrar</th>';
echo'<th>Modificar</th>';
echo'<th>Email</th>';
echo '</tr>';
}


foreach ($queryProf as $professor) {
      
    // echo $rutacompleta;
    echo '<tr>';
    echo "<td>{$professor['dni_prof']}</td>";
    echo "<td>{$professor['nom_prof']}</td>";
    echo "<td>{$professor['cognom1_prof']}</td>";
    echo "<td>{$professor['cognom2_prof']}</td>";
    echo "<td>{$professor['email_prof']}</td>";
    echo "<td>{$professor['telf']}</td>";
    echo "<td>{$professor['dept']}</td>";
    
    if (!$_SESSION['login2']) {
      echo "<td><button type='button' class='btn btn-outline-danger' onClick=\"aviso('borrarp.php?id={$professor['id_professor']};')\">Borrar</button></td>";
     
      echo "<td><button type='button' class='btn btn-outline-primary' onClick=\"aviso('modificarp.php?id={$professor['id_professor']};')\">Modificar</button></td>";
  
      echo "<td><button type='button' class='btn btn-outline-warning' onClick=\"aviso('correop.php?id={$professor['id_professor']};')\">Email</button></td>";
      
    }  
}

echo '</table>';
  // echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";  //Botones
  echo" <nav class='paddingl' aria-label='Page navigation example'>
  <ul class='pagination pg-blue'>
    <li class='page-item'></li>
    ";
    for($i=1;$i<=$cantidadPaginas;$i++) {
      echo "<li class='page-item'><a class='page-link' href='adminp.php?pag=$i'>$i</a></li>
    ";
}
echo "<li class='page-item'></li>
  </ul>
</nav>
";
echo '</table>';
?>

    <?php
/*echo '</table>';
for($i=1;$i<=$cantidadPaginas;$i++) {
  echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";
}*/
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
</body>
</html>

