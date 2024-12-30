<?php

  //Dados
  $mtz1 = [
      [
          1,2
      ],[
          3,4
      ]
  ];

  $mtz2 = [
      [
          5,6
      ],[
          7,8
      ]
  ];

  //Função
  //Multiplicação
  function mulMtz(array $mtz1, array $mtz2){
      //Variaveis
      $res;    //valor a ser retornado ou seja a matriz resultante
      $resLin; //valor resultante da linha
      $lineCont = 0;//contandor da linha
      $i;      //contador necessario para usar o metodo mtz1 linha X mtz2 coluna
      $b;      //contador da correspondencia contraria encontrada necessario para usar o metodo mtz1 linha X mtz2 coluna

      //Verificar se a quantidade de colunas da 1° matriz bate com o numero de linhas da 2° matriz
      if(count($mtz1[0]) === count($mtz2)){

        for($line = 0 ; $line < count($mtz1) ;$line++){
          for($b = 0; $b < count($mtz2[0]); $b++){
              //$res[∆][∆] = $mtz1[∆][∆] * $mtz2[∆][∆];
                               //b//i//      //i//b//

            for($i = 0; $i < count($mtz2[$b]); $i++){

                $resLin = $mtz1[$line][$i] * $mtz2[$i][$b];

            };
            $res[$lineCont][$b] = $resLin;
            $resLin = 0;
            
          };
          $lineCont++;
        };
        return $res;
      }else{
        return 'não é possível multiplicar as matrizes';
      };
  };

?>
<pre>
<?php
  //mostragem dos dados
  $res = mulMtz($mtz1, $mtz2);
  var_dump($res);
?>
</pre>