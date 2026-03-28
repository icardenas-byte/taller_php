<?php
class Binario {

    public function convertir($n) {
        if (!is_numeric($n)) {
            return "Entrada no válida";
        }
        $n = intval($n);
        return decbin($n);
    }
}