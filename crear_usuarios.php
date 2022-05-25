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
<form class="login" name="formulario"  action="./insertadmin.php" method="post" onsubmit="return validaFormulario();">
    <H3>CREAR ALUMNO</H3>
    <input id="logDNI" type="text" placeholder="DNI" name="logDNI" >
    <input id="lognombre" type="text" placeholder="Nombre" name="lognombre" >
    <input id="logapellido1" type="text" placeholder="1r Apellido" name="logapellido1" >
    <input id="logapellido2" type="text" placeholder="2n Apellido" name="logapellido2">
    <input id="logemail" type="email" placeholder="Email" name="logemail" >
    <input id="logtelf" type="text" placeholder="Telefono" name="logtelf" >
    <select id="logclase" name="logclase">
      <option value="">--CLASSE--</option>
      <option value="1">SMX1</option>
      <option value="2">SMX2</option>
      <option value="3">ASIX1</option>
      <option value="4">ASIX2</option>
      <option value="5">DAW1</option>
      <option value="6">DAW2</option>
    </select>
    <input id="logpass" type="password" placeholder="Password" name= "logpass">
    <button onclick="return validaFormulario()" name="insesion" type="submit">Crear</button>
</form>

<a href="https://codepen.io/davinci/" target="_blank">check my other pens</a>
<div class="paddingt paddingl">
  <button type="submit" value="Login" onclick="window.history.go(-1)" class="btn btn-outline-dark">Atrás</button>
</div>
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