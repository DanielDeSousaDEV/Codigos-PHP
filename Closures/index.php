<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste De Closure</title>
    <style>
        body{
            margin: 0 1rem;
        }
    </style>
</head>
<body>
    <pre>
        <?php
            class pessoa {
    
                public function __construct(
                    public int $idade = 0
                )
                {}
                
                public function adicionarIdade($num)
                {
                    $this->idade += $num;
                }

                public function atribuirIdadeClosure()
                {
                    //retornando uma função ela é tratada como um closure
                    return function ($num)
                    {
                        $this->idade = $num;
                    };
                }
            }

            var_dump(pessoa::class)
        ?>
        <hr />
        <?php
            $funcao = function ($novaIdade)
            {
                $this->idade = $novaIdade;
                return $this->idade;
            };

            $pessoa1 = new pessoa(10);
            
            //chama uma função como se fosse dentro dela
            var_dump($pessoa1);
            var_dump($funcao->call($pessoa1, 5));
            var_dump($pessoa1);
        ?>
        <hr />
        <?php
            
            $pessoa1 = new pessoa(10);
            $pessoa2 = new pessoa(20);
            
            $funcao = function ()
            {
                return $this->idade;
            };

            //copia de um objeto que é atualizado automaticamente (não sei o porque da função)
            $closurePessoa = $funcao->bindTo($pessoa1);

            var_dump($closurePessoa);

            $pessoa1->adicionarIdade(5);
    
            var_dump($closurePessoa);
        ?>
        <hr />
        <?php
            //copia a função como uma closure
            $funcao = Closure::fromCallable($pessoa1->atribuirIdadeClosure());

            $funcao(50);

            var_dump($funcao);
            var_dump($pessoa1);
        ?>
    </pre>
</body>
</html>