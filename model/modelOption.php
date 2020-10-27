<?php

require_once("model.php");

class ModelOption extends Model{
    private $id= NULL;
    private $titre;
    private $text;
    private $question;


  


   
  
   
    protected static $table = 'option';
    protected static $primary = 'id';
   


    public function __construct( $titre = NULL , $text= NULL , $question= NULL)
    {
        if (!is_null($titre ) && !is_null($text )  && !is_null($question ) ) {
            $this->$titre = $titre;
            $this->$text = $text;
            $this->$question = $question;


          

           }
        
    }

  



}


?>