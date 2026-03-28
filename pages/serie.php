<?php
require_once "../clases/Serie.php";

$resultado = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $numero = intval($_POST["numero"]);
    $operacion = $_POST["operacion"];
    $serie = new Serie();

    if ($operacion === "fibonacci") {
        $resultado = $serie->fibonacci($numero);
    } elseif ($operacion === "factorial") {
        $resultado = $serie->factorialSerie($numero);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fibonacci / Factorial</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="contenedor">
    <h2>Generar Serie: Fibonacci o Factorial</h2>

    <form method="POST">
        <label>Ingrese un número:</label>
        <input type="number" name="numero" min="1" required>
        <label>Seleccione la operación:</label>
        <select name="operacion" required>
            <option value="fibonacci">Sucesión de Fibonacci</option>
            <option value="factorial">Serie de Factoriales</option>
        </select>
        <button type="submit">Generar Serie</button>
    </form>

    <?php if (!empty($resultado)): ?>
        <div class="resultado">
            <strong>Resultado:</strong><br>
            <?= implode(", ", $resultado) ?>
        </div>
    <?php endif; ?>
    <a class="volver" href="../index.php">Volver al menú</a>
</div>
</body>
</html>