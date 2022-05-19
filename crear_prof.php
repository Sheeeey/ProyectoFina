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
    <form class="login" name="formulario"  action="./insertadminp.php" method="post">
    <H3>CREAR PROFESOR</H3>
    <input type="text" placeholder="DNI" name="log1DNI">
    <input type="text" placeholder="Nombre" name="log1nombre">
    <input type="text" placeholder="1r Apellido" name="log1apellido1">
    <input type="text" placeholder="2n Apellido" name="log1apellido2">
    <input type="email" placeholder="Email" name="log1email">
    <input type="text" placeholder="Telefono" name="log1telf">
    <input type="text" placeholder="Departamento" name="log1dept">
    <input type="password" placeholder="Password" name= "log1pass">
    <button href="./admin.php" name="insesion" type="submit">Crear</button>
</form>

</body>
</html>