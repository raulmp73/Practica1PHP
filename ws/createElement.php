<?php

declare(strict_types=1);

require_once __DIR__ . '/models/Element.php';
require_once __DIR__ . '/common.php';

$nombre = field('nombre');
$descripcion = field('descripcion');
$categoria = field('categoria');
$cantidad = filter_var(field('cantidad'), FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($cantidad === false) {
    fail('La cantidad debe ser un número entero mayor que cero.', 422);
}

$element = new Element($nombre, $descripcion, $categoria, $cantidad);
saveRecord($element, 'elementos.txt');
