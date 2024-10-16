<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplas Traits</title>
</head>
<body>
    <?php
        trait talkA {
            public function talkDowm()
            {
                echo "a / definido por " . __METHOD__ . "<br/>";
            }
            
            public function talkUp()
            {
                echo "A / definido por " . __METHOD__ . "<br/>";
            }
        }

        trait talkB {
            public function talkDowm()
            {
                echo "b / definido por " . __METHOD__ . "<br/>";
            }
            
            public function talkUp()
            {
                echo "B / definido por " . __METHOD__ . "<br/>";
            }
        }

        class talker {
            /**
             *#Sobrescrita de Traits
             *quando duas traits se sobrescrevem podemos definir qual metodo "prevalecerar" ou simplesmente nomear algum deles e usa-lo normalmente e tambem podemos alterar a visibilidade dos metodos
             *  insteadof - defini qual metodo deve prevalecer
             *  as - renomeia um metodo
             */
            use talkA, talkB {
                talkA::talkDowm insteadof talkB;
                talkB::talkUp insteadof talkA;
                talkB::talkDowm as otherTalk;
                talkA::talkUp as protected anotherTalk;
            }
        }
    ?>
    <hr />
    <?php
        $Talker1 = new talker();

        $Talker1->talkDowm();
        $Talker1->talkUp();
        $Talker1->otherTalk();
        //error por causa do seu escopo
        $Talker1->anotherTalk();
    ?>
</body>
</html>