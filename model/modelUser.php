<?php

require_once("model.php");

class ModelUser extends Model{
    private $id= NULL;
    private $name;
    private $lastname;
    private $email;
    private $login;
    private $adress;
    private $phone;
    private $password;
    private $photo;
    private $Role;
    private $enable;
    private $categorie;

  
   
    protected static $table = 'user';
    protected static $primary = 'id';
    protected static $user = 'login';
    protected static $pass = 'password';



    public function __construct( $name = NULL, $password = NULL , $Role = NULL,
    $lastname = NULL, $email = NULL , $login = NULL ,
    $adress = NULL, $phone = NULL , $photo = NULL , $enable = NULL , $categorie = NULL  )
    {
        if (!is_null($name) && !is_null($lastname) && !is_null($email) && !is_null($login) &&
        !is_null($adress) && !is_null($phone) && !is_null($photo) &&
         !is_null($password) && !is_null($Role)  && !is_null($enable) && !is_null($categorie) ) {
            $this->name = $name;
            $this->lastname = $lastname;
            $this->email = $email;
            $this->login = $login;
            $this->adress = $adress;
            $this->phone = $phone;
            $this->photo = $photo;

            $this->password = $password;
            $this->Role = $Role;
            $this->enable = $enable;
            $this->categorie = $categorie;


          
           }
        
    }

  



}


?>