

<?php

require_once("model.php");

class ModelInscrir extends Model{
  
  
    private $id= NULL;
    private $formation;

    private $user;


   
  
   
    protected static $table = 'inscrir';
    protected static $primary = 'id';
   


    public function __construct(  $user= NULL , $formation= NULL)
    {
        if (!is_null($user )  && !is_null($formation )) {
         
            $this->$user = $user;
            $this->$formation = $formation;


          

           }
        
    }

  



}


?>