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
             *quando duas traits se sobrescrevem podemos definir qual metodo "prevalecerar" ou simplesmente nomear algum deles e usa-lo normalmente 
             *  insteadof - defini qual metodo deve prevalecer
             *  as - renomeia um metodo
             */
            use talkA, talkB {
                talkA::talkDowm insteadof talkB;
                talkB::talkUp insteadof talkA;
                talkB::talkDowm as otherTalk;
            }
        }
    ?>
    <hr />
    <?php
        $Talker1 = new talker();

        $Talker1->talkDowm();
        $Talker1->talkUp();
        $Talker1->otherTalk();
    ?>
</body>
</html>