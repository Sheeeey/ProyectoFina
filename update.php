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
        
        $dni = $_POST['dni_alu']
        $nom = $_POST['nom_alu'];
        $cog1 = $_POST['cognom1_alu'];
        $cog2 = $_POST['cognom2_alu'];
        $telf = $_POST['telf_alu'];
        $email = $_POST['email_alu']
        $id = $_POST['id_alumne'];

        $sql = "UPDATE tbl_alumne SET dni_alu = '$dni', nom_alu = '$nom', cognom1_alu = '$cog1', cognom2_alu = '$cog2', telf_alu = '$telf', email_alu = $email WHERE id_alumne = $id";
        mysqli_query($conexion, $sql);

    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            Swal.fire({
                    title: 'Alumno modificado',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Volver'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
        }

        aviso('./admin.php');
    </script>

</body>
</html>