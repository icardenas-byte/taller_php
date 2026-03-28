<?php
class Conjuntos {
    private function parsear($cadena) {
        $partes = preg_split('/[,\s]+/', trim($cadena));
        $nums = array_map('intval', array_filter($partes, fn($v) => $v !== ''));
        return array_values(array_unique($nums));
    }

    public function procesar($aStr, $bStr) {
        $A = $this->parsear($aStr);
        $B = $this->parsear($bStr);
        $union = array_values(array_unique(array_merge($A, $B)));
        $interseccion = array_values(array_intersect($A, $B));
        $AmenosB = array_values(array_diff($A, $B));
        $BmenosA = array_values(array_diff($B, $A));
        return compact('A', 'B', 'union', 'interseccion', 'AmenosB', 'BmenosA');
    }
}
