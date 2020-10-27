<?php

require_once("model.php");

class ModelCours extends Model{
    private $id= NULL;
    private $titre;
    private $date;
    private $fichier;
    private $formation;


   
  
   
    protected static $table = 'cours';
    protected static $primary = 'id';
   


    public function __construct( $titre = NULL, $date = NULL,$fichier = NULL ,$formation = NULL )
    {
        if (!is_null($titre ) && !is_null($date ) && !is_null($fichier) && !is_null($formation) ) {
            $this->$titre = $titre;
            $this->$date =$date;       
            $this->$fichier = $fichier;
            $this->$formation = $formation;       


           }
        
    }

  



}


?>