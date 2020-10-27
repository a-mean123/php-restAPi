<?php

require_once("model.php");

class ModelPost extends Model{
    private $id= NULL;
    private $name;
    private $lastname;
    private $test;
    private $score;
 
   
    protected static $table = 'post';
    protected static $primary = 'id';
  


    public function __construct( $name = NULL,
    $lastname = NULL, $test = NULL , $score = NULL   )
    {
        if (!is_null($name) && !is_null($lastname) && !is_null($test) && !is_null($score) ) {
            $this->name = $name;
            $this->lastname = $lastname;
            $this->test = $test;
            $this->score = $score;
         

          
           }
        
    }

  



}


?>