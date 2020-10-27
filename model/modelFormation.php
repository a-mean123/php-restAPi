<?php

require_once("model.php");

class ModelFormation extends Model{
    private $id= NULL;
    private $titre;
    private $description;

    private $date;
    private $dateremise;

    private $duree;

    private $image;

    private $etat;
    private $categorie;


   
  
   
    protected static $table = 'formation';
    protected static $primary = 'id';
   


    public function __construct( $titre = NULL, $description = NULL, $date = NULL, $dateremise = NULL, $duree = NULL,$image = NULL  ,$etat = NULL ,$categorie = NULL  )
    {
        if (!is_null($titre) && !is_null($description) && !is_null($date) && !is_null($dateremise) && !is_null($duree) && !is_null($image)  && !is_null($etat)  && !is_null($categorie) ) {
            $this->$titre = $titre;
            $this->$description = $description;

            $this->$date =$date;  
            $this->$dateremise =$dateremise;  
            $this->$duree = $duree;

            $this->$image = $image;
           
            $this->$etat = $etat;  

            $this->$categorie = $categorie;       



           }
        
    }

  



}


?>