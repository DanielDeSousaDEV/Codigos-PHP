<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>/Traits</title>
</head>
<body>
    <?php
        //traits são como caracteriscas de uma classe (pode ser usada para uma herança simples)
        trait serVivo {
            //defino que todo ser vivo deve respirar
            function respirar ()
            {
                echo $this->name . " respirou";
            }
        }

        class pessoa {
            //defino que pessoa deve ter caracteristicas de ser vivo
            use serVivo;

            public function __construct(
                public string $name
            ){}
        }
    ?>
    <hr />
    <?php
        $pessoa1 = new pessoa("Daniel");

        $pessoa1->respirar();
    ?>
</body>
</html>