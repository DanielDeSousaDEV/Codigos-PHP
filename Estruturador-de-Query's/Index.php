<pre>
<?php
  function createSelectQuery(string $tbName, $search = null){
      $query ='SELECT * FROM ' . $tbName;
      
      if($search === null){
          return $query;
      };
      
      //essa falta de espaço na linha abaixo serve para que no foreach eu possa adicionar espaços tamnto no inicio quanto no fim da string
      $query .= ' WHERE';
      
      foreach($search as $key => $value){
        $queryFin .= ' ' . $key . ' = ' . $value . ' ,';
      };
      
      $regex = '/[ ][,]$/';
      $replace = ';';
      $subject = $queryFin;

      $queryFin = preg_replace($regex,$replace,$subject);
    
      $query = $query . $queryFin;
    
      return $query;
  };
  
  $tbNameTest = 'tb_aluno';
  $searchTest = [
      'id_aluno' => '07',
      'nome_aluno' => 'Daniel'
  ];
  
  $testeFunc = createSelectQuery($tbNameTest, $searchTest);
  var_dump($testeFunc);
?>
</pre>