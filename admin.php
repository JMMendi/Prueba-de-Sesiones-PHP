<?php
session_start();

if (!isset($_SESSION['usuarioFinal'])) {
    header("Location:login.php");
    die();
}
if (!$_SESSION['perfil']) {
    header("Location:home.php");
    die();
}
$user = $_SESSION['usuarioFinal'];
$perfil = ($_SESSION['perfil']) ? "Administrador" : "Usuario";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Portal Web</title>
</head>

<body class="p-12 bg-purple-300">
    <h1 style='text-align:center'><b>Portal de Administrador</b></h1>
    <h2 style='text-align:center'>ALERTA! Gran cantidad de información y poderes sensible</h2>
    <div class="mt-12 flex p-6 border-4 shadow-x1 rounded-x1 justify-around">
        <a href="logout.php" class="mx-10 px-10 py-1 rounded text-white bg-blue-500 hover:bg-blue-700 font-bold mr-2 ">Cerrar Sesión</a>

        <a href="user.php" class="mx-10 px-10 py-1 rounded text-white bg-gray-500 hover:bg-gray-700 font-bold mr-2 ">Web Usuario</a>

        <a href="home.php" class="mx-10 px-10 py-1 rounded text-white bg-green-500 hover:bg-green-700 font-bold mr-2 ">Portal Web</a>

    </div>

</body>

</html>