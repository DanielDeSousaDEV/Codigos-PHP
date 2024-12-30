<pre>
<?php
  //SELECT -> READ (R)
  function createSelectQuery(string $tbName, $search = null):string{
      $query = 'SELECT * FROM ' . $tbName;
      
      if($search === null){
          return $query . ' ;';
      };
      
      $query .= ' WHERE ';
      
      foreach($search as $key => $value){
        if(is_string($value)){
            $queryFin .= $key . ' = ' . '\'' . $value . '\'' . ' , ';
        }else{
            $queryFin .= $key . ' = ' . $value . ' , ';
        }
      };
      
      $regex = '/[ ][,][ ]$/';
      $replace = ';';
      $subject = $queryFin;

      $queryFin = preg_replace($regex, $replace, $subject);
    
      $query = $query . $queryFin;
    
      return $query;
  };





  //INSERT -> CREATE (C)
  function createInsertQuery(string $tbName, array $fieldsAndValues):string{
    
      //poderia fazer um array associativo com chave sendo o campo e valor o valor a ser inserido
      
      //inserir data tipo 10/12/2024
      
      $query = 'INSERT INTO ' . $tbName;
      
      $fields;
      $values;
    
      foreach($fieldsAndValues as $key => $value){
          //quardar em variaveis arrays diferentes os values e fields
          
          $fields[] = $key;
          $values[] = $value;
      };
      
      $queryFields = ' ( ';
      
      //foreach para criar a parte de campos da query
      foreach($fields as $field){
          $queryFields .= $field . ' , ';
      };
    
      $regex = '/[ ][,][ ]$/';
      $replace = ' ) ';
      $subject = $queryFields;
    
      $queryFields = preg_replace($regex, $replace, $subject);
    
      $queryValues = 'VALUES ( ';
    
      //parte para criar a parte de valores dos campos
      foreach($values as $value){
          if(is_string($value)){
              $queryValues .= '\'' . $value . '\'' . ' , ';
          }else{
              $queryValues .= $value . ' , ';
          }
      };
    
      $regex = '/[ ][,][ ]$/';
      $replace = ' ) ';
      $subject = $queryValues;
    
      $queryValues = preg_replace($regex, $replace, $subject);
    
      $query .= $queryFields . $queryValues;
    
      $regex = '/[ ]$/';
      $replace = ';';
      $subject = $query;
    
      $query = preg_replace($regex, $replace, $subject);
    
    
      return $query;
    
      //pode passar o id como null se for auto-increment
  }





  //DELETE -> DELETE (D)
  function createDeleteQuery(string $tbName, $conditions = null):string{
      $query = 'DELETE * FROM ' . $tbName;
      
      if($conditions === null){
          return $query . ' ;';//COM COMCATENAR COM PONTO VIRGULA
      };
    
      $query .= ' WHERE ';
      
      foreach($conditions as $key => $value){
        if(is_string($value)){
            $queryFin .= $key . ' = ' . '\''. $value . '\'' . ' , ';
        }else{
            $queryFin .= $key . ' = ' . $value . ' , ';
        }
        
      };
      
      $regex = '/[ ][,][ ]$/';
      $replace = ';';
      $subject = $queryFin;
    
      $queryFin = preg_replace($regex, $replace, $subject);
    
      $query = $query . $queryFin;
    
      return $query;
    
      //delete * from tbname where tbcamp = value;
  }

  //UPDATE -> UPDATE (U)
  function createUpdateQuery(string $tbName, array $values, array $conditions):string{
      
    $query = 'UPDATE table_name SET ';
    
    foreach($values as $key => $value){
       if(is_string($value)){
           $queryVal .= $key . ' = ' . '\'' . $value . '\'' . ' , ';
       }else{
           $queryVal .= $key . ' = ' . $value . ' , ';
       }
    }
    
    $regex = '/[ ][,][ ]$/';
    $replace = '';
    $subject = $queryVal;
    
    $query .= preg_replace($regex, $replace, $subject);
    
    $query .= ' WHERE ';
    
    foreach($conditions as $key => $value){
        if(is_string($value)){
            $queryCod .= $key . ' = ' . '\'' . $value . '\'' . ' , ';
        }else{
            $queryCod .= $key . ' = ' . $value . ' , ';
        }
        
    }
    
    $replace = ';';
    $subject = $queryCod;
    
    $queryCod = preg_replace($regex ,$replace, $subject);
    
    $query .= $queryVal . $queryCod;
    
    return $query;
    
    //UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition;
  }



  
  $tbNameTest = 'tb_aluno';
  $searchTest = [
      'id_aluno' => 07,
      'nome_aluno' => 'Daniel'
  ];
  $coditionTest = [
      'id_aluno' => 1,
      'nome_aluno' => 'dan'
  ];
  $valuesTest = [
      'nome_aluno' => 'daniel',
      'email_aluno' => 'dan@gmail.com'
  ];
  
  //$testeFunc = createUpdateQuery($tbNameTest, $valuesTest, $coditionTest);
  //$testeFunc = createInsertQuery($tbNameTest, $valuesTest);
  //$testeFunc = createDeleteQuery($tbNameTest, $searchTest);
  $testeFunc = createSelectQuery($tbNameTest, $coditionTest);

  var_dump($testeFunc);
?>
</pre>