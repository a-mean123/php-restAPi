<?php

require_once("model.php");

class ModelQuiz extends Model{
    private $id= NULL;
    private $titre;
    private $description;
    private $formation;

  


   
  
   
    protected static $table = 'quiz';
    protected static $primary = 'id';
   


    public function __construct( $titre = NULL , $description= NULL , $formation= NULL)
    {
        if (!is_null($titre ) && !is_null($description )  && !is_null($formation )) {
            $this->$titre = $titre;
            $this->$description = $description;
            $this->$formation = $formation;


          

           }
        
    }

  



}


?>