<?php
class Nodo {
    public $valor;
    public $izq;
    public $der;
    public function __construct($valor) {
        $this->valor = $valor;
        $this->izq = null;
        $this->der = null;
    }
}

class Arbol {
    private $raiz = null;
    public function insertar($valor) {
        $this->raiz = $this->insertarNodo($this->raiz, $valor);
    }
    
    private function insertarNodo($nodo, $valor) {
        if ($nodo === null) {
            return new Nodo($valor);
        }

        if ($valor < $nodo->valor) {
            $nodo->izq = $this->insertarNodo($nodo->izq, $valor);
        } else {
            $nodo->der = $this->insertarNodo($nodo->der, $valor);
        }

        return $nodo;
    }

    public function preorden() {
        $resultado = [];
        $this->recPreorden($this->raiz, $resultado);
        return $resultado;
    }

    private function recPreorden($nodo, &$res) {
        if ($nodo !== null) {
            $res[] = $nodo->valor;
            $this->recPreorden($nodo->izq, $res);
            $this->recPreorden($nodo->der, $res);
        }
    }

    public function inorden() {
        $resultado = [];
        $this->recInorden($this->raiz, $resultado);
        return $resultado;
    }

    private function recInorden($nodo, &$res) {
        if ($nodo !== null) {
            $this->recInorden($nodo->izq, $res);
            $res[] = $nodo->valor;
            $this->recInorden($nodo->der, $res);
        }
    }

    public function postorden() {
        $resultado = [];
        $this->recPostorden($this->raiz, $resultado);
        return $resultado;
    }

    private function recPostorden($nodo, &$res) {
        if ($nodo !== null) {
            $this->recPostorden($nodo->izq, $res);
            $this->recPostorden($nodo->der, $res);
            $res[] = $nodo->valor;
        }
    }

    public function dibujar() {
        if ($this->raiz === null) return "";
        $niveles = [];
        $this->obtenerNiveles($this->raiz, 0, $niveles);
        $salida = "";
        $maxNivel = count($niveles) - 1;

        foreach ($niveles as $nivel => $nodos) {
            $espacios = str_repeat(" ", ($maxNivel - $nivel) * 4);
            $linea = $espacios;
            foreach ($nodos as $n) {
                if ($n === null) {
                    $linea .= "   ";
                } else {
                    $linea .= " " . $n->valor . " ";
                }
                $linea .= str_repeat(" ", 4);
            }
            $salida .= rtrim($linea) . "\n";
            if ($nivel < $maxNivel) {
                $lineaRamas = $espacios;
                foreach ($nodos as $n) {
                    if ($n !== null) {
                        $lineaRamas .= ($n->izq ? "/" : " ");
                        $lineaRamas .= "   ";
                        $lineaRamas .= ($n->der ? "\\" : " ");
                    } else {
                        $lineaRamas .= "     ";
                    }
                    $lineaRamas .= str_repeat(" ", 4);
                }
                $salida .= rtrim($lineaRamas) . "\n";
            }
        }
        return $salida;
    }

    private function obtenerNiveles($nodo, $nivel, &$niveles) {
        if (!isset($niveles[$nivel])) {
            $niveles[$nivel] = [];
        }
        $niveles[$nivel][] = $nodo;
        if ($nodo === null) {
            return;
        }
        $this->obtenerNiveles($nodo->izq, $nivel + 1, $niveles);
        $this->obtenerNiveles($nodo->der, $nivel + 1, $niveles);
    }
}