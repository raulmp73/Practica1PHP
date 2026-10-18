<?php

declare(strict_types=1);

require_once __DIR__ . '/models/User.php';
require_once __DIR__ . '/common.php';

$nombre = field('nombre');
$apellidos = field('apellidos');
$contrasena = field('contrasena');
$telefono = field('telefono');
$email = field('email');
$sexo = field('sexo');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    fail('El email no es válido.', 422);
}
if (!preg_match('/^\+?[0-9 ()-]{7,20}$/', $telefono)) {
    fail('El teléfono no es válido.', 422);
}
if (strlen($contrasena) < 8 || strlen($contrasena) > 72) {
    fail('La contraseña debe tener entre 8 y 72 bytes.', 422);
}
if (!in_array($sexo, ['hombre', 'mujer', 'otro'], true)) {
    fail('Selecciona un sexo válido.', 422);
}

// Se conserva el hash, nunca la contraseña en texto plano.
$user = new User($nombre, $apellidos, password_hash($contrasena, PASSWORD_DEFAULT), $telefono, $email, $sexo);
saveRecord($user, 'usuarios.txt');
