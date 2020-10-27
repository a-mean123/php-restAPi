<?php

require_once("model.php");

class ModelTest extends Model{
    private $id= NULL;
    private $titre;
   
  
   
    protected static $table = 'test';
    protected static $primary = 'id';
   


    public function __construct( $titre = NULL)
    {
        if (!is_null($titre) ) {
            $this->$titre = $titre;       
           }
        
    }

  



}


?>