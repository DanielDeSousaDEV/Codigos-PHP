<pre>
<?php
  function createSelectQuery(string $tbName, $search = null){
      $query ='SELECT * FROM ' . $tbName;
      
      if($search === null){
          return $query;
      };
      
      $query .= ' WHERE ';
    
      foreach($search as $key => $value){
        $queryFin .= $key . ' = ' . $value;
      };
      
      $query = $query . $queryFin;
    
      return $query;
  };
  
  $tbNameTest = 'tb_aluno';

  $searchTest = [
      'id_aluno' => '07',
  ];
  
  $testeFunc = createSelectQuery($tbNameTest, $searchTest);
  var_dump($testeFunc);
?>
</pre>