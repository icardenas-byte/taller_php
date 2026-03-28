<?php
class Estadistica {
    public function parsear($cadena) {
        $partes = preg_split('/[,\s]+/', trim($cadena));
        return array_map('floatval', array_filter($partes, fn($v) => $v !== ''));
    }

    public function promedio($nums) {
        return array_sum($nums) / count($nums);
    }

    public function mediana($nums) {
        sort($nums);
        $n = count($nums);
        $mid = intdiv($n, 2);
        if ($n % 2 == 0) {
            return ($nums[$mid - 1] + $nums[$mid]) / 2;
        }
        return $nums[$mid];
    }

    public function moda($nums) {
        $comoTexto = array_map(fn($n) => (string)$n, $nums);
        $freq = array_count_values($comoTexto);
        if (empty($freq)) {
            return [];
        }
        $max = max($freq);
        return array_map('floatval', array_keys(array_filter($freq, fn($v) => $v == $max)));
    }
}

