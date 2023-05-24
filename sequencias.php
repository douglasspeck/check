<?php

if(!isset($_SESSION)) {
    session_start();
}

if($_SESSION['logged'] == false) {
    header("Location: login.php");
} else {
    if (isset($_SESSION['id_student'])) { 

?>

<!DOCTYPE html>
<html lang="pt-BR">
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 'On');

        include 'assets/php/errors.php';

        require_once 'assets/php/mysqli/db.php';

        $notebook = isset($_GET['notebook']) ? $_GET['notebook'] : 1;
        $sequence = isset($_GET['sequence']) ? $_GET['sequence'] : 1;

        $title = 'Frações - Sequência ' . $sequence;
        $keywords = 'Check, CACs, Cadernos Auto-corretivos, Frações';
        $resources = [];
        include 'assets/php/head.php';
    ?>
    <body id="home">
        <?php include 'assets/php/header.php' ?>
        <main>
            <?php

                include 'assets/php/create_activity.php';

                $data = getSequence($db, $notebook, $sequence);

                echo '<h1>Sequência 1</h1>
                <section class="gallery">';

                for ($i = 0; $i < count($data); $i++) {

                    $item = json_decode($data[$i]['parameters'],true);

                    create_activity($item);

                }

                echo '</section>';

            ?>
        </main>
        <?php include 'assets/php/scripts.php' ?>
    </body>
</html>

<?php
    }
}
?>

<!--

Array (

    [0] => Array (
        [id_activity] => 1
        [parameters] => {
            type:1,
            elements:[
                {shape: rect,sections: 2,fill: 1},
                [{num: 1,den: 2},{num: 5,fill: 2},{num: 8}]
            ],
            example: true
        }
    )
    
    [1] => Array ( [id_activity] => 2 [parameters] => {type:1, elements:[{shape: rect,sections: 3,fill: 1},{num: 1,den: 3}], example: true} )
    
    [2] => Array ( [id_activity] => 3 [parameters] => {type:1, elements:[{shape: square,sections: 4,fill: 1},{num: 1}]} )
    
    [3] => Array ( [id_activity] => 4 [parameters] => {type:1, elements:[{shape: rect,sections: 5,fill: 1},{num: 1}]} )
    
    [4] => Array ( [id_activity] => 5 [parameters] => {type:1, elements:[{shape: rect,sections: 6,fill: 1},{num: 1}]} )
    
    [5] => Array ( [id_activity] => 6 [parameters] => {type:1, elements:[{shape: rect,sections: 7,fill: 1},{num: 1}]} )
    
    [6] => Array ( [id_activity] => 7 [parameters] => {type:1, elements:[{shape: rect,sections: 8,fill: 1},{num: 1}]} )
    
    [7] => Array ( [id_activity] => 8 [parameters] => {type:1, elements:[{shape: square,sections: 9,fill: 1},{num: 1}]} )

)

-->