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
        
        foreach($mtz1 as $line){
          for($b = 0; $b < count($mtz1); $b++){
              //$res[∆][∆] = $mtz1[∆][∆] * $mtz2[∆][∆];
                               //b//i//      //i//b//
            
            for($i = 0; $i < count($mtz2[$b]); $i++){
                
                $resLin = $line[$i] * $mtz2[$i][$b];
                
            };
              $res[$lineCont][$b] = $resLin;
          };
          $lineCont++;
        };
        var_dump($res);
      }else{
        return 'não é possível multiplicar as matrizes';
      };
  };

  //Mostragem do dados
  $res = mulMtz($mtz1, $mtz2);
  //var_dump($res);

?>
