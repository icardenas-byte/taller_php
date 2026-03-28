<?php
class Acronimo{
    public function generar($frase){
        $frase = str_replace('-' , ' ' , $frase);
        $frase = preg_replace('/[^a-zA-ZáéíóúÁÉÍÓÚñÑ ]/', '' , $frase);
        $palabras = preg_split('/\s+/', trim($frase));
        $acronimos = '';
        foreach ($palabras as $p){
            if($p !== ''){
                 $acronimos .= mb_strtoupper(mb_substr($p, 0, 1));
            }
        }
        return $acronimos;
    }
}



