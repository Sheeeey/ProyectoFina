<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        include 'conexion.php';
        $sql = "SELECT * FROM tbl_alumne WHERE id_alumne={$_GET['id_alumne']}";
        $result = mysqli_query($connection, $sql);
        $animal = mysqli_fetch_array($result, MYSQLI_ASSOC);

    ?>

    <form action="./update.php" method="post">

        <input type="text" name="dni_alu" placeholder="DNI" value="<?php echo $animal['dni_alu']; ?>">
        <input type="text" name="nom_alu" placeholder="Nombre" value="<?php echo $animal['nom_alu']; ?>">
        <input type="text" name="cognom1_alu" placeholder="Apellido" value="<?php echo $animal['cognom1_alu']; ?>">
        <input type="text" name="cognom2_alu" placeholder="Apellido" value="<?php echo $animal['cognom2_alu']; ?>">
        <input type="text" name="telf_alu" placeholder="Telefono" value="<?php echo $animal['telf_alu']; ?>">
        <input type="text" name="email_alu" placeholder="Correo" value="<?php echo $animal['email_alu']; ?>">
        <input type="text" name="classe" placeholder="Classe" value="<?php echo $animal['Classe']; ?>">
        <input type="text" name="passwd_alu" placeholder="Password" value="<?php echo $animal['passwd_alu']; ?>">
        <input type="submit" value="Modificar">

    </form>

</body>
</html>