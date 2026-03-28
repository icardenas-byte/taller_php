<?php
require_once "../clases/Arbol.php";
$resultado = null;
$arbol = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $entrada = $_POST["numeros"] ?? "";
    $nums = preg_split('/[,\s]+/', trim($entrada));
    $nums = array_map('intval', array_filter($nums, fn($v) => $v !== ''));
    $arbol = new Arbol();
    foreach ($nums as $n) {
        $arbol->insertar($n);
    }

    $resultado = [
        "preorden" => $arbol->preorden(),
        "inorden" => $arbol->inorden(),
        "postorden" => $arbol->postorden()
    ];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="contenedor">
    <h2>Árbol Binario - Recorridos y Dibujo</h2>
    <form method="POST">
        <label>Ingrese números separados por coma o espacio:</label>
        <textarea name="numeros" rows="4" placeholder="Ej: 8 3 10 1 6 14 4 7 13" required></textarea>
        <button type="submit">Construir Árbol</button>
    </form>

    <?php if ($resultado): ?>
        <div class="resultado">
            <strong>Preorden:</strong> <?= implode(", ", $resultado["preorden"]) ?><br>
            <strong>Inorden:</strong> <?= implode(", ", $resultado["inorden"]) ?><br>
            <strong>Postorden:</strong> <?= implode(", ", $resultado["postorden"]) ?><br><br>

            <strong>Árbol generado:</strong><br>
            <pre><?= $arbol->dibujar(); ?></pre>
        </div>
    <?php endif; ?>
    <a class="volver" href="../index.php">Volver al menú</a>
</div>
</body>
</html>