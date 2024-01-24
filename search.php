<?php

require_once 'DbManager.php';
require_once 'Parola.php';

$word = $_POST['word'];
//$word = $_GET['word'];

if(!empty($word)){
    $parole =  Parola::fetchAll($word . '%');
    foreach ($parole as $parola){?>
        <ul>
            <li><?php echo $parola->getParola() ?></li>
        </ul>
    <?php }
}else
    echo "Digitare la parola che si vuole cercare";
?>

