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
          echo "<a class='nav-link active' aria-current='page' href='./bajarcsv.php'>Bajar CSV</a>";
        }       
        ?>
          </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./adminp.php" href="">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="./adminalu.php" href="">Alumnos</a>
        </li>
    
      </ul>
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

<form action="./proc/filtro_admin.php" name="formulario_alu">
<div class="tabla-filtro">
<th><input class="outlinenone" type="text" maxlength="20" name="tabla_dni_alu" id="tabla_dni_alu" placeholder="DNI"></th>

                        <th><input class="outlinenone" type="text" maxlength="20 " name="tabla_nom_alu" id="tabla_nom_alu" placeholder="Nombre"></th>
                        
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_cognom1_alu" id="tabla_cognom1_alu" placeholder="1r Apellido"></th>
                      
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_cognom2_alu" id="tabla_cognom2_alu" placeholder="2n Apellido"></th>
                       
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_email_alu" id="tabla_email_alu" placeholder="Correo"></th>
                       
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_classe" id="tabla_classe" placeholder="Clase"></th>
                        
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_telf_alu" id="tabla_telf_alu" placeholder="Telefono"></th>
                        <th><input class="outlinenone" type="submit" value="Buscar"></th>
                        </div>
                        </form>

 
<?php
$cantPorPagina = 10;
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

//La query final
$sql2 = "SELECT id_alumne, dni_alu, nom_alu, cognom1_alu, cognom2_alu, telf_alu, email_alu, c.nom_classe as 'classe', passwd_alu
FROM tbl_alumne 
INNER JOIN tbl_classe c 
ON classe = c.id_classe LIMIT $inicioPagina, $cantPorPagina;";
$queryAlu = mysqli_query($connection, $sql2);

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
if (!$_SESSION['login2']){
echo '<th>Borrar</th>';
echo'<th>Modificar</th>';
echo'<th>Email</th>';
echo '</tr>';
}

//tabla alumnos
if(isset($_POST['formulario_alu'])){
    $sql_query = "SELECT FROM tbl_alumne
    WHERE (dni_alu LIKE \"%{$_POST['tabla_dni_alu']}%\" OR dni_alu IS NULL)
    AND (nom_alu LIKE \"%{$_POST['tabla_nom_alu']}%\" OR nom_alu IS NULL)
    AND (cognom1_alu LIKE \"%{$_POST['tabla_cognom1_alu']}%\" OR cognom1_alu IS NULL)
    AND (cognom2_alu LIKE \"%{$_POST['tabla_cognom2_alu']}%\" OR cognom2_alu IS NULL)
   AND (email_alu LIKE \"%{$_POST['tabla_email_alu']}%\" OR email_alu IS NULL)
    AND (classe LIKE \"%{$_POST['tabla_classe']}%\" OR classe IS NULL)
    AND (telf_alu LIKE \"%{$_POST['tabla_telf_alu']}%\" OR telf_alu IS NULL);";
  
  
  $sql = mysqli_query($connection, $sql_query);
  echo true;
}else {
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
  
    if (!$_SESSION['login2']) {
      echo "<td><button type='button' class='btn btn-outline-danger'  onClick=\"aviso('borrar.php?id={$alumno['id_alumne']};')\" >Borrar</button></td>";
     
      echo "<td><button type='button' class='btn btn-outline-primary' onClick=\"aviso('modificar.php?id={$alumno['id_alumne']};')\">Modificar</button></td>";
  
      echo "<td><button type='button' class='btn btn-outline-warning' onClick=\"aviso('correo.php?id={$alumno['id_alumne']};')\">Email</button></td>";
      
    }  
  }
      echo '</table>';
}

      // echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";  //Botones
    // echo" <nav class='paddingl' aria-label='Page navigation example'>
    //   <ul class='pagination pg-blue'>
    //     <li class='page-item'></li>";
    //     for($i=1;$i<=$cantidadPaginas;$i++) {
    //       echo "<li class='page-item'><a class='page-link' href='admin.php?pag=$i'>$i</a></li>
    //     ";
    // }
    // echo "<li class='page-item'</li>
    //   </ul>
    // </nav>
    // ";
?>
<br>
<br>
<br>
<form action="./admin.php" method="POST">

<div class="tabla-filtro">
<th><input   class="outlinenone"type="text" maxlength="20" name="tabla_dni_prof" id="tabla_dni_prof" placeholder="DNI"></th>

                        <th><input class="outlinenone" type="text" maxlength="20 " name="tabla_nom_prof" id="tabla_nom_prof" placeholder="Nombre"></th>
                        
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_cognom1_prof" id="tabla_cognom1_prof" placeholder="1r Apellido"></th>
                      
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_cognom2_prof" id="tabla_cognom2_prof" placeholder="2n Apellido"></th>
                       
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_email_prof" id="tabla_email_prof" placeholder="Correo"></th>
                       
                        <th><input class="outlinenone" type="text" maxlength="20" name="tabla_classe_prof" id="tablaclasse_prof" placeholder="Departamento"></th>
                        
                        <th><input class="outlinenone" type="email" maxlength="20" name="tablatelf_profl" id="tablatelf_profl" placeholder="Telefono"></th>
                        <th><input class="outlinenone" type="submit" value="Buscar"></th>
                        </div>
<?php

$cantPorPagina1 = 10;
$sql1 = "SELECT * FROM tbl_alumne;";
$queryAnim1 = mysqli_query($connection, $sql1);
//mysqli_num_rows = cantidad de registros que me devuelve
$numFilas1 = mysqli_num_rows($queryAnim1);
//                                                               
//mostrar el número de registros                              
//echo $numFilas."<br>";                                       

//Saber la cantidad de páginas según la cantidad de registros por página
$cantidadPaginas1 = ceil($numFilas1/$cantPorPagina1); //CEIL = Redondear al número elevado (ej: 5.1 -> 6)

//Saber si estamos en la página 1 u en otra
if (empty($_GET["pag"])) {
    $inicioPagina1 = 0;
}
else {
    $inicioPagina1 = ($_GET["pag"]-1)*$cantPorPagina1;
}

//La query final
$sql1 = "SELECT id_professor, dni_prof, nom_prof, cognom1_prof, cognom2_prof, email_prof, telf, d.nom_dept as 'dept', passwd_prof
FROM tbl_professor 
INNER JOIN tbl_dept d 
ON dept = d.id_dept LIMIT $inicioPagina1, $cantPorPagina1;";
$queryAlu1 = mysqli_query($connection, $sql1);

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


foreach ($queryAlu1 as $professor) {
      
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
    echo "<td><button type='button' class='btn btn-outline-primary'onClick=\"aviso('modificarp.php?id={$professor['id_professor']};')\">Modificar</button></td>";
    echo "<td><button type='button' class='btn btn-outline-warning' onClick=\"aviso('correo.php?id={$professor['id_professor']};')\" >Email</button></td>";
    }   
}

echo '</table>';
  // echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";  //Botones
  echo" <nav class='paddingl' aria-label='Page navigation example'>
  <ul class='pagination pg-blue'>
    <li class='page-item'></li>
    ";
    for($i=1;$i<=$cantidadPaginas1;$i++) {
      echo "<li class='page-item'><a class='page-link' href='admin.php?pag=$i'>$i</a></li>
    ";
}
echo "<li class='page-item'></li>
  </ul>
</nav>
";
echo '</table>';
?>
<script>

    function aviso(url) {
         Swal.fire({
             title: 'Estas seguro?',
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
/*echo '</table>';
for($i=1;$i<=$cantidadPaginas;$i++) {
  echo "<span><a href='admin.php?pag=$i'>$i  |  </a></span>";
}*/
?>
</body>
</html>