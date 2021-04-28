<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Maquina Enigma</title>
    <link href="css/estilo.css" rel="stylesheet" type="text/css">
    <script src="js/funcoes.js" type="text/javascript"></script>
    <script src="js/jquery-3.5.1.min.js" type="text/javascript"></script>
</head>
<body>
    <div  id="enigma-box">
        <div class="line">
            <div class="descrip">Descriptografar<input type="checkbox" id="decript"></div>
            <div class="rotores">
                <label>Rotor 3</label><input type="text" name="rotor3" id="r3" value="5">
                <label>Rotor 2</label><input type="text" name="rotor2" id="r2" value="8">
                <label>Rotor 1</label><input type="text" name="rotor1" id="r1" value="15">
            </div>
        </div>
        <div class="line">
            <span id="result">Resultado: <span class="resultado">gteertt</span></span>
        </div>
        <div class="line last">
            <?php
                require_once 'classes/Enigma.php';
                $abc = array('a','b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
                for($i=0;$i<count($abc);$i++) {
                    echo '<a href="#" class="letra" id="'.$abc[$i].'">'.strtoupper($abc[$i]).'</a>';
                }
            ?>
        </div>
        <div style="clear:both";></div>
        <?php
            $enigma = new Enigma();
            // var_dump($enigma->geraRotor());
            $array1 = array('a', 'b', 'c', 'd');
            $array2 = array('y', 'x', 'k', 'w');
            $inArr1 = 3;
            $inArr2 = 1;
            $inEntrada = 0;
            echo $enigma->retornaMatch($inEntrada, $inArr1, $array1, $inArr2, $array2);
        ?>
    </div>
</body>
</html>