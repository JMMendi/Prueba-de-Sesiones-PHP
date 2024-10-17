<?php

$usuarios = [
    "JMMendi" => ['$2y$10$CcekFH.KAiQCqangDVS1k.DUO7HPE9Zfdkp/X2AgyM81SO5qT62Dm', true],
    "Ohno" => ['$2y$10$d78FkbWo.BM4axnOT5lTuO2tKiLZdaBLchm9HmCM9.AlpJMoeC0YW', false],
    "PHPAdmin" => ['$2y$10$CcekFH.KAiQCqangDVS1k.DUO7HPE9Zfdkp/X2AgyM81SO5qT62Dm', false]
];

// echo password_hash("contraseña", PASSWORD_BCRYPT);
// echo password_hash('pupete', PASSWORD_BCRYPT);

function sanearCadenas(string $cadena) : string {
    return htmlspecialchars(trim($cadena));
}

function mostrarErrores(string $error) {
    if (isset($_SESSION[$error])) {
        echo "<p class='text-bold italic text-white'>$_SESSION[$error]</p>";
        unset($_SESSION[$error]);
    }
}

function validarUsuario(string $user, string $password) : bool{
    global $usuarios;
    foreach ($usuarios as $nombre => $datos) {
        if ($user == $nombre) {
            if (password_verify($password, $datos[0])) {
                return true;
            }
        }
    }
    return false;
}

