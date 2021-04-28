<?php
class Enigma {
    public $configRot1;
    public $configRot2;
    public $configRot3;
    private $abc = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
                        'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    private $rotor1 = array();
    private $rotor2 = array();
    private $rotor3 = array();

    public function __construct($rot1 = array(), $rot2 =array(), $rot3=array()) {
        $this->setRotor1($rot1);
        $this->setRotor2($rot2);
        $this->setRotor3($rot3);
    }
    public function setRotor1($arrRotor) {
        if(count($arrRotor)>0) {
            $this->rotor1 = $arrRotor;
        } else {
            $this->rotor1 = $this->geraRotor();
        }
    }
    public function setRotor2($arrRotor) {
        if(count($arrRotor)>0) {
            $this->rotor2 = $arrRotor;
        } else {
            $this->rotor2 = $this->geraRotor();
        }
    }
    public function setRotor3($arrRotor) {
        if(count($arrRotor)>0) {
            $this->rotor3 = $arrRotor;
        } else {
            $this->rotor3 = $this->geraRotor();
        }
    }

    public function retornaLetra() {
        return $this->abc[rand(0,25)];
    }

    public function geraArrayRandomico() {
        $array = array();
        $i=0;
        while($i<=25) {
            $indiceNovo = $this->retornaLetra();
            if(in_array($indiceNovo, $array)) {
                $indiceNovo = $this->retornaLetra();
            } else {
                $array[] = $indiceNovo;
                $i++;
            }
        }
        return $array;
    }

    public function geraRotor() {
        return $this->geraArrayRandomico();
    }

    public function retornaMatch($indiceEntrada, $inicioRotor1, array $arrayrotor1, $inicioRotor2, array $arrayRotor2) {
        if ($indiceEntrada > $inicioRotor1) {
            $calculoUm = $indiceEntrada - $inicioRotor1;
            $match = $inicioRotor2 + $calculoUm;
            if($match > count($arrayRotor2) - 1) {
                $match = $match - (count($arrayRotor2) - 1);
                $match = $match -1;
            }

        } elseif ($indiceEntrada < $inicioRotor1) {
            $calculoUm = $inicioRotor1 - $indiceEntrada;
            $match = $inicioRotor2 - $calculoUm;
            if($match<0) {
                $match = ($match*(-1)) -1;
                $arrayRotor2 = array_reverse($arrayRotor2);
            }
            
        } elseif ($indiceEntrada == $inicioRotor1) {
            $match = $inicioRotor2;
        }

        return $match;
    }
}