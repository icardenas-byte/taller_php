<?php
require_once "../clases/Acronym.php";

$resultado = "";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $frase = $_POST["frase"] ?? "";
    $acronimo = new Acronimo();
    $resultado = $acronimo->generar($frase);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Acrónimos</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <<div class="contenedor">
    <h2>Convertir frase en acrónimo</h2>

    <form method="POST">
        <label>Ingrese la frase:</label>
        <input type="text" name="frase" placeholder="Ej: Portable Network Graphics" required>

        <button type="submit">Generar Acrónimo</button>
    </form>

    <?php if ($resultado !== ""): ?>
        <div class="resultado">
            <strong>Acrónimo generado:</strong> <?= $resultado ?>
        </div>
    <?php endif; ?>
    <a href="../index.php">Volver al menú</a>
</div>
</body>
</html>

