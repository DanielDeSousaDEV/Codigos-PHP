<style>
  *{
      margin: 10px;
      padding: 5px;
  }
</style>

<?php
   if(!isset($_GET['id_perfil'])){
       header('location:index.php');
   }
   require_once('database/conn.php');

   $idPerfil = $_GET['id_perfil'] ?? 1;

   //erro de id não existente

   $query = 'SELECT * FROM tb_user WHERE id_user = ? ;';
   
   $stmt = $conn -> prepare($query);

   $stmt -> bindParam(1, $idPerfil);

   $stmt -> execute();

   //var_dump($stmt -> fetch());
   
   while($data = $stmt -> fetch()){
       ?>
       
       <h2>Perfil de <?=$data['user_name']?></h2>
       <p>E-mail para contato: <em><?=$data['email_user']?></em></p>
       <ul>
           <li>Lista de carros
           <ul>
               <?php
                   
                $queryFK = 'SELECT * FROM tb_carro WHERE fk_dono_carro = ?';
                
                $stmtFK = $conn -> prepare($queryFK);
                
                $stmtFK -> bindParam(1, $data['id_user']);
                
                $stmtFK -> execute();
                
                while($dataFK = $stmtFK -> fetch()){
                    //var_dump($dataFK);
                    
                    echo "<li><em>(ID:$dataFK[id_carro])</em> $dataFK[nome_carro]</li>";
                }
                
               ?>
            <ul>
           </li>
       </ul>
    <?php
   }
?>
