<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet"><link rel="stylesheet" href="./styles/style.css">
  <script type="text/javascript" src="./proc/validarcrearalumne.js"></script>
</head>
<body>
    <h2></h2>
<!-- partial:index.partial.html -->
<form class="login" name="formulario"  action=".insertadmin.php" method="post">
    <H3>CREAR ALUMNO</H3>
    <input type="text" placeholder="DNI" name="logDNI">
    <input type="text" placeholder="Nombre" name="lognombre">
    <input type="text" placeholder="1r Apellido" name="logapellido1">
    <input type="text" placeholder="2n Apellido" name="logapellido2">
    <input type="email" placeholder="Email" name="logemail">
    <input type="text" placeholder="Telefono" name="logtelf">
    <input type="text" placeholder="Clase" name="logclase">
    <input type="password" placeholder="Password" name= "logpass">
    <button href="./admin.php" name="insesion" type="submit">Crear</button>
</form>

<a href="https://codepen.io/davinci/" target="_blank">check my other pens</a>
<!-- partial -->
<?php
// if (isset($_GET['msg'])) {
// $msg=$_GET['msg'];
// if ($msg==1) {
// echo "<br>";
// echo "<span>Usuario o Contraseña Incorrecto</span>";
// echo "<br>";
// }else{
// }
// }
?> 
</body>
</html>