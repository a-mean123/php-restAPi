<?php

require_once("model.php");

class ModelCommentaire extends Model{
    private $id= NULL;
    private $name;
    private $lastname;
    private $formation;
    private $commentaire;
 
   
    protected static $table = 'commentaire';
    protected static $primary = 'id';
  


    public function __construct( $name = NULL,
    $lastname = NULL, $formation = NULL , $commentaire = NULL   )
    {
        if (!is_null($name) && !is_null($lastname) && !is_null($formation) && !is_null($commentaire) ) {
            $this->name = $name;
            $this->lastname = $lastname;
            $this->formation = $formation;
            $this->commentaire = $commentaire;
         

          
           }
        
    }

  



}


?>