<?php

/*
 PAPILDOMAS
 7. Parašykite programą, kuri sugeneruotų ornamentą: https://iili.io/H3J974e.png . 
 Ornamentas turi būti sugeneruotas naudojant HTML ir PHP. (2 balai)
*/
?>

<html lang="">
<head>
    <style>
        .collumn {
            width: 100px;
            height: 100px;
            border: solid 1px black
        }

        .odd {
            background-color: #FFFFFF;
            border: solid 1px;
        }

        .even {
            background-color: burlywood;
            border: solid 1px;
        }
    </style>
    <title></title>
</head>
<body>
<table>
    <tbody>
    <?php for ($j = 0; $j < 7; $j++) { 
        $a = 6;
        ?>
        <tr>
            <?php for ($i = 0; $i < 7; $i++) {
                $displayClass = "odd";
                if ($j == $i){
                    $displayClass = "even";
                }
                if ($a == $j){
                    $displayClass = "even";
                }
                $a--;
                ?>
                <td class="collumn <?= $displayClass; ?>"></td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>
</body>
</html>