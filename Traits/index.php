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

            #metodo somente da trait
            //defino que todo ser vivo deve respirar
            function respirar ()
            {
                echo $this->name . " respirou / metodo " . __METHOD__ . "<br/>";
            }
            
            #metodo da trait e da classe a ser instanciada
            function descansar () 
            {
                echo $this->name . " descansou / metodo " . __METHOD__ . "<br/>";
            }

            #metodo da trait e da classe pai
            public function comprimentar() 
            {
                echo $this->name . " comprimentou / metodo " . __METHOD__ . "<br/>";
            }
        }
        
        class base {
            public string $name;

            public function comprimentar () 
            {
                echo $this->name . " descansou / metodo " . __METHOD__ . "<br/>";               
            }
        }

        class pessoa {
            //defino que pessoa deve ter caracteristicas de ser vivo
            use serVivo;

            public function __construct(
                public string $name
            ){}
                
            //se definir alguma coisa (atributo ou metodo) com o mesmo nome que foi definido na trait ele sera sobrescrito
            public function descansar()
            {
                echo $this->name . " descansou / metodo " . __METHOD__ . "<br/>";
            }
        }
    ?>
    <hr />
    <?php
        $pessoa1 = new pessoa("Daniel");

        $pessoa1->respirar();
        $pessoa1->descansar();
        $pessoa1->comprimentar();
    ?>
</body>
</html>