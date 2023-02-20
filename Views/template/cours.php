<?php 
use Accrodev\Connection;
use Accrodev\myParser;

    $eldeTitle ='English Alphabet';
    $jours =$_GET['action'] ?? 0;
    $_SESSION['jour'] = $jours;
    $linkrel = [
        '<link rel="stylesheet" href="/../JBBCode/btnAdds.css">'
    ];
?>
<div class="trueNaire container mt-2">
    <?php 
       $arts =  Connection::getArticleIndex( $jours);
       foreach ($arts as $art) : ?>
            <?php
            $_SESSION['headerTitle'] = $art['titre'];
            $_SESSION['date'] = $art['date_Article'];
            $_SESSION['date_update']= $art['Date_update'];
            require('templatAdmin/articlebanner.php');
            print myParser::getHtml($art['content']);
            ?>
       <?php endforeach ?>
       <?php if(isset($jour)): ?>
       <div class="div">
        <div class="btn btn-success m-2">
            <a href="/cours-<?= (int)$jour === 0 ? 0 : $jour-1 ?>"> Revenir au jour precedent </a></div>
        <div class="btn btn-success m-2">
            <a href="/cours-<?= $jour+ 1 ?>"> J'ai terminer. Je passe au prochain jour</a></div>
       </div>
       <?php endif; ?>
</div>