<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
            $funcao = function ($novaIdade)
            {
                $this->idade = $novaIdade;
                return $this->idade;;
            };

            $pessoa1 = new pessoa(10);
            
            var_dump($funcao->call($pessoa1, 5));
            
        ?>
        <hr />
        <?php
    
            class pessoa {
    
                public function __construct(
                    public int $idade
                )
                {}
                
                public function atribuirIdade($num)
                {
                    $this->idade += $num;
                }
            }
            
            $pessoa1 = new pessoa(10);
            $pessoa2 = new pessoa(20);
            
            $funcao = function ()
            {
                return $this->idade;
            };

            //copia de um objeto que é atualizado automaticamente
            $closurePessoa = $funcao->bindTo($pessoa1);

            var_dump($closurePessoa);

            $pessoa1->atribuirIdade(5);
    
            var_dump($closurePessoa);
        ?>
        <hr />
    </pre>
</body>
</html>