<pre>
<style>
  caption{
    font-family: 'Helvetica';
    font-weight: bold;
  }
  tr, th, td{
    padding: 5px;
    border: solid 1px #000;
    text-align: center;
  }
  th{
      background-color: #989898;
  }
  td{
      text-transform: capitalize;
  }
</style>
<?php
   require_once('database/conn.php');
   
   $query = 'SELECT * FROM tb_carro ;';
   
   $stmt = $conn -> prepare($query);

   $stmt -> execute();

   //$data = $stmt -> fetch();
   echo '<table>';

   echo '<caption>DataBase Test</caption>';

   echo '<thead>';
   
   echo "<tr>
             <th>ID do carro</th>
             <th>Nome do carro</th>
             <th>Nome do dono do carro</th>
        </tr>";
        
   echo '</thead>';

   while($data = $stmt -> fetch()){
       //var_dump($data);
    
       $queryFK = 'SELECT * FROM tb_user WHERE id_user = ' . $data['fk_dono_carro'] . ' ;';
    
       $stmtFK = $conn -> prepare($queryFK);
    
       $stmtFK -> execute();
            
       echo '<tbody>';
    
       while($dataFK = $stmtFK -> fetch()){
           
            //var_dump($dataFK);
            echo "<tr>
                      <td>$data[id_carro]</td>
                      <td>$data[nome_carro]</td>
                      <td><a href=\"perfil.php?id_perfil=$dataFK[id_user]\" >$dataFK[user_name]</a></td>
                 </tr>";
            
       };
       
       echo '</tbody>';
    
   };
   echo '</table>';
   
   /*
    * HTML TABLE'S STRUTURE
    *
    * <table>
    *   <tr>
    *     <th></th>
    *     <th></th>
    *   </tr>
    *   <tr>
    *     <td></td>
    *     <td></td>
    *   </tr>
    * </table>
    */


   //var_dump($data);


   while($data = $stmt -> fetch()){
       //var_dump($data);
    
       $queryFK = 'SELECT * FROM tb_user WHERE id_user = ' . $data['fk_dono_carro'] . ' ;';
    
       $stmtFK = $conn -> prepare($queryFK);
    
       $stmtFK -> execute();
    
       while($dataFK = $stmtFK -> fetch()){
           
            //var_dump($dataFK);
            echo "<br>O carro $data[nome_carro] <strong>(ID:$data[id_carro])</strong> é do senhor $dataFK[user_name];";
            
       };
    
   };
   
?>
</pre>
