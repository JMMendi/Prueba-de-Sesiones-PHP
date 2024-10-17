<?php
session_start();

require "utilidades.php";

// Si hay un usuario escrito...
if (isset($_POST['usuario'])) {
    // $_SESSION['errUsuario'] = "*** Error, tiene que introducir un usuario. ***";
    $user = sanearCadenas($_POST['usuario']);
    $contra = sanearCadenas($_POST['password']);

    // Comprobamos errores
    if (!validarUsuario($user, $contra)) {
        $_SESSION['errValidar'] = "*** Error, el usuario o contraseña no son válidos.***";
        header("Location:login.php");
        die();
    }
    // Si todo está en orden los mandamos a home.php
    $_SESSION['usuarioFinal'] = $user;
    $_SESSION['perfil'] = $usuarios[$user][1];
    header("Location:home.php");
    die();
}


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

<body>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Inicio de Sesión
                    </h1>
                    <form class="space-y-4 md:space-y-6" method="POST">
                        <div>
                            <label for="usuario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                            <input type="usuario" name="usuario" id="usuario" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Usuario">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php mostrarErrores('errValidar') ?>

                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>