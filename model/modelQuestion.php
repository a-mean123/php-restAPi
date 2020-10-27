<?php

require_once("model.php");

class ModelQuestion extends Model{
    private $id= NULL;
    private $text;
    private $reponse;
    private $quiz;
    private $test;



  


   
  
   
    protected static $table = 'question';
    protected static $primary = 'id';
   


    public function __construct( $text = NULL , $reponse= NULL , $quiz= NULL , $test= NULL)
    {
        if (!is_null($text ) && !is_null($reponse )  && (!is_null($quiz ) || !is_null($test ) ) ) {
            $this->$text = $text;
            $this->$reponse = $reponse;
            $this->$quiz = $quiz;
            $this->$test = $test;



          

           }
        
    }

  



}


?>