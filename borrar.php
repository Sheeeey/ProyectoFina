<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
</head>
<body>
    <?php

        include 'conexion.php';
        $sql = "DELETE FROM tbl_alumne WHERE id_alumne={$_GET['id_alumne']}";
        $delete = mysqli_query($connection, $sql);

    ?>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function aviso(url) {
            swal.fire ({
                title: 'Animal borrado',
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