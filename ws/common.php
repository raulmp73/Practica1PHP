<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

function fail(string $message, int $status): void
{
    http_response_code($status);
    echo json_encode(['error' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    fail('Debes enviar el formulario mediante POST.', 405);
}

function field(string $name): string
{
    $value = $_POST[$name] ?? null;
    if (!is_string($value) || trim($value) === '') {
        fail('El campo ' . $name . ' es obligatorio y debe ser texto.', 422);
    }
    if (strlen($value) > 5000) {
        fail('El campo ' . $name . ' es demasiado largo.', 422);
    }
    return trim($value);
}

function saveRecord(IToJson $record, string $file): void
{
    try {
        $json = $record->toJson();
        $written = file_put_contents(__DIR__ . '/data/' . $file, $json . PHP_EOL, FILE_APPEND | LOCK_EX);
        if ($written === false) {
            fail('No se ha podido guardar el registro.', 500);
        }
        http_response_code(201);
        echo $json;
    } catch (JsonException $exception) {
        fail('No se ha podido convertir el registro a JSON.', 500);
    }
}
