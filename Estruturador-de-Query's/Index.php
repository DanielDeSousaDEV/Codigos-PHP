<pre>
<?php
  //SELECT -> READ (R)
  function createSelectQuery(string $tbName, $search = null){
      $query = 'SELECT * FROM ' . $tbName;
      
      if($search === null){
          return $query;
      };
      
      $query .= ' WHERE ';
      
      foreach($search as $key => $value){
        $queryFin .= $key . ' = ' . $value . ' , ';
      };
      
      $regex = '/[ ][,][ ]$/';
      $replace = ';';
      $subject = $queryFin;

      $queryFin = preg_replace($regex, $replace, $subject);
    
      $query = $query . $queryFin;
    
      return $query;
  };

  //INSERT -> CREATE (C)
  function createInsertQuery(string $tbName, ...$values){
      $query = 'INSERT INTO ' . $tbName;
    
      //não sei como escreve a query de insert
      //insert into tbname (value1,value2,value3)
      //pode passar o id como null se for auto-increment
  }


  //DELETE -> DELETE (D)
  function createDeleteQuery(string $tbName, $conditions = null){
      $query = 'DELETE * FROM ' . $tbName;
      
      if($conditions === null){
          return $query;//COM COMCATENAR COM PONTO VIRGULA
      };
    
      $query .= ' WHERE ';
      
      foreach($conditions as $key => $value){
        $queryFin .= $key . ' = ' . $value . ' , ';
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
  function createUpdateQuery(){
      
  }



  
  $tbNameTest = 'tb_aluno';
  $searchTest = [
      'id_aluno' => '07',
      'nome_aluno' => 'Daniel'
  ];
  
  $testeFunc = createDeleteQuery($tbNameTest, $searchTest);

  //$testeFunc = createSelectQuery($tbNameTest, $searchTest);

  //VERIFICAR SE É UMA STRING
  var_dump($testeFunc);
?>
</pre>
