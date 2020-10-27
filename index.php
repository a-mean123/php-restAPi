<?php

$ROOT = __DIR__;
$DS = DIRECTORY_SEPARATOR;

$controleur_default = 'home';


if(!isset($_REQUEST['controller']))
    $controller = $controleur_default;

    else $controller = $_REQUEST['controller'];

    switch($controller){
          

               case 'user':
                require("{$ROOT}{$DS}controller{$DS}controllerUser.php");
               break;   


               case 'categorie':
                require("{$ROOT}{$DS}controller{$DS}controllerCategorie.php");
               break;  
               
               
               case 'cours':
                require("{$ROOT}{$DS}controller{$DS}controllerCour.php");
               break;  



               
               case 'quiz':
                require("{$ROOT}{$DS}controller{$DS}controllerQuiz.php");
               break;  


               case 'formation':
                require("{$ROOT}{$DS}controller{$DS}controllerFormation.php");
               break;  

               case 'test':
                require("{$ROOT}{$DS}controller{$DS}controllerTest.php");
               break;  



               case 'question':
                require("{$ROOT}{$DS}controller{$DS}controllerQuestion.php");
               break;  


               case 'option':
                require("{$ROOT}{$DS}controller{$DS}controllerOption.php");
               break;  



               case 'inscrir':
                require("{$ROOT}{$DS}controller{$DS}controllerInscrir.php");
               break;  

               case 'post':
                require("{$ROOT}{$DS}controller{$DS}controllerPost.php");
               break;  



               case 'commentaire':
                require("{$ROOT}{$DS}controller{$DS}controllerCommentaire.php");
               break;  
    }








?>