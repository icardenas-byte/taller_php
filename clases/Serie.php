<?php
class Serie {
    public function fibonacci($n) {
        $serie = [];
        $a = 0;
        $b = 1;
        for ($i = 0; $i < $n; $i++) {
            $serie[] = $a;
            $temp = $a + $b;
            $a = $b;
            $b = $temp;
        }
        return $serie;
    }

    public function factorialSerie($n) {
        $serie = [];
        $fact = 1;
        for ($i = 1; $i <= $n; $i++) {
            $fact *= $i;
            $serie[] = $fact;
        }
        return $serie;
    }
}

