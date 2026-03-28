<?php
class Calculadora {
    private $archivoHistorial = "../historial.txt";
    public function operar($a, $b, $op) {
        switch ($op) {
            case "suma":
                return $a + $b;
            case "resta":
                return $a - $b;
            case "multiplicacion":
                return $a * $b;
            case "division":
                return ($b != 0) ? $a / $b : "Error: división por cero";
            default:
                return "Operación no válida";
        }
    }

    public function guardarHistorial($texto) {
        file_put_contents($this->archivoHistorial, $texto . PHP_EOL, FILE_APPEND);
    }

    public function obtenerHistorial() {
        if (!file_exists($this->archivoHistorial)) {
            return "No hay historial aún.";
        }
        return file_get_contents($this->archivoHistorial);
    }
}