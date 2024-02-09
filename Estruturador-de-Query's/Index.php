<pre>
<?php
  function createSelectQuery(string $tbName, $search = null){
      $queryInit ='SELECT * FROM ' . $tbName;
      
      if($search === null){
          return $queryInit;
      };
      
      $query = $queryInit . ' WHERE ';
    
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