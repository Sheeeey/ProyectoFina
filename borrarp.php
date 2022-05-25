<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Document</title>
</head>
<body>
    <?php

        include './proc/conexion.php';
        $id=$_GET['id'];
        $sql = "DELETE FROM tbl_professor WHERE id_professor=$id;";
        $delete = mysqli_query($connection, $sql);

    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            swal.fire ({
                title: 'Registro borrado',
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

        aviso('./adminp.php');
    </script>
</body>
</html>