
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelUser.php");
require_once("{$ROOT}{$DS}controller{$DS}jwt.php");


header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');

$controller = "user";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="dashboard";	
	
switch ($action) {


    
    case "consulte":
       
       
        $tab_p = modelUser::getAll();
         echo json_encode($tab_p);
           break;

           case "getAllProf":
       
       
            $tab_p = modelUser::getAllFormatteur();
             echo json_encode($tab_p);
               break;

               case "getFour":
       
       
                $tab_p = modelUser::getFour();
                 echo json_encode($tab_p);
                   break;
    
               case "getAllEtudiant":
       
       
                $tab_p = modelUser::getAllEtudiant();
                 echo json_encode($tab_p);
                   break;
    
  
    case "createdAdmin":
      
                      

                        $image=$_FILES['image']['name']; 
                        $expimage=explode('.',$image);
                        $imageexptype=$expimage[1];
                        date_default_timezone_set('Australia/Melbourne');
                        $date = date('m/d/Yh:i:sa', time());
                        $rand=rand(10000,99999);
                        $encname=$date.$rand;
                        $imagename=md5($encname).'.'.$imageexptype;
                        $imagepath="assets/".$imagename;
                        move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                        

        
                              $name =$_REQUEST["name"];
                              $lastname = $_REQUEST["lastname"];
                              $email = $_REQUEST["email"];
                              $login = $_REQUEST["login"];
                              $adress = $_REQUEST["adress"];

                              $phone = $_REQUEST["phone"];

                              $password = $_REQUEST["password"];
                              $photo = $imagename;
                              $Role = "admin";
                              $enable = "1";
                              $categorie = "";
                              
          
        
            
                              $id = NULL;

            
                $u = new ModelUser($name, $lastname, $email, $login, $adress ,$phone ,$password ,$photo, $Role , $enable , $categorie);	
                $tab = array(
                    "id" => $id,  
                    
                "name" =>$name,
                "lastname" =>$lastname,
                "email" =>$email,
                "login" =>$login,
                "adress" =>$adress,

                "phone" =>$phone,    
                "password" => $password,
                "photo" => $photo,
                "Role" => $Role,
                "enable"=>$enable,
                "categorie"=>$categorie

              
                );				
               $res = $u->insert($tab);
            
            echo ($res);
        
        break;
  
        case "createdProf":
            $image=$_FILES['image']['name']; 
            $expimage=explode('.',$image);
            $imageexptype=$expimage[1];
            date_default_timezone_set('Australia/Melbourne');
            $date = date('m/d/Yh:i:sa', time());
            $rand=rand(10000,99999);
            $encname=$date.$rand;
            $imagename=md5($encname).'.'.$imageexptype;
            $imagepath="assets/".$imagename;
            move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
            


                  $name =$_REQUEST["name"];
                  $lastname = $_REQUEST["lastname"];
                  $email = $_REQUEST["email"];
                  $login = $_REQUEST["login"];
                  $adress = $_REQUEST["adress"];

                  $phone = $_REQUEST["phone"];

                  $password = $_REQUEST["password"];
                  $photo = $imagename;
                  $Role = "prof";
                  $enable = "1";
                  $categorie = $_REQUEST["categorie"];
                              
          
              
            
                
                $id = NULL;
    
                
                    $u = new ModelUser($name, $lastname, $email, $login, $adress ,$phone ,$password ,$photo, $Role , $enable, $categorie);	
                    $tab = array(
                        "id" => $id,  
                        
                    "name" =>$name,
                    "lastname" =>$lastname,
                    "email" =>$email,
                    "login" =>$login,
                    "adress" =>$adress,
    
                    "phone" =>$phone,    
                    "password" => $password,
                    "photo" => $photo,
                    "Role" => $Role,
                    "enable"=>$enable,
                    "categorie"=>$categorie
                  
                    );	
                    
                    
                    $u1 = modelUser::existe($email);
                    if($u1){
                       
                        echo 0;
                    }else{
                        $res = $u->insert($tab);
                        echo ($res);
                    }			
                    
            
            break;



            case "createdEtudiant":
                $image=$_FILES['image']['name']; 
                $expimage=explode('.',$image);
                $imageexptype=$expimage[1];
                date_default_timezone_set('Australia/Melbourne');
                $date = date('m/d/Yh:i:sa', time());
                $rand=rand(10000,99999);
                $encname=$date.$rand;
                $imagename=md5($encname).'.'.$imageexptype;
                $imagepath="assets/".$imagename;
                move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                


                      $name =$_REQUEST["name"];
                      $lastname = $_REQUEST["lastname"];
                      $email = $_REQUEST["email"];
                      $login = $_REQUEST["login"];
                      $adress = $_REQUEST["adress"];

                      $phone = $_REQUEST["phone"];

                      $password = $_REQUEST["password"];
                      $photo = $imagename;
                      $Role = "etudiant";
                      $enable = "0";
                      $categorie = "";
          
        
            
            $id = NULL;

            
                $u = new ModelUser($name, $lastname, $email, $login, $adress ,$phone ,$password ,$photo, $Role , $enable ,$categorie);	
                $tab = array(
                    "id" => $id,  
                    
                "name" =>$name,
                "lastname" =>$lastname,
                "email" =>$email,
                "login" =>$login,
                "adress" =>$adress,

                "phone" =>$phone,    
                "password" => $password,
                "photo" => $photo,
                "Role" => $Role,
                "enable"=>$enable,
                "categorie"=>$categorie
              
                );	
                $u1 = modelUser::existe($email);
                if($u1){
                   
                    echo 0;
                }else{
                    $res = $u->insert($tab);
                    echo ($res);
                }			
                
            
               
        
                break;
                   
                
                case "login":	
                    
                    $json = file_get_contents('php://input');
                    $data = json_decode($json);
                    
                        $username = $data->login;
                        $password = $data->password;
                       
                        if($username && $password){
                            $u = ModelUser::login($username , $password);
                        
                            if($u){
                                $nb=$u->rowCount();
                
                            }else $nb = 0;
                           
                
                            
                if($nb==0)
                {
                    echo 'erreur';
                }
                else
                {
                    $ligne=$u->fetchObject();
                    
                  
                     
                    
                      $userId = 'USER123456';
                    
                      $serverKey = '5f2b5cdbe5194f10b3241568fe4e2b24';
                   // create a token
                    $payloadArray = array();
                    $payloadArray['user'] = $ligne;

                    $token = JWT::encode($payloadArray, $serverKey);

                    // return to caller

                    $jsonEncodedReturnArray = json_encode($token, JSON_PRETTY_PRINT);
                    echo $jsonEncodedReturnArray;   
                   
                      }

                        }

                       
                        
                    break;




                    case "enable":
                        $id = $_REQUEST["id"];
                        $enable = $_REQUEST["enable"];
                        
                        $u = new ModelUser('', '', '', '' ,'' ,'' ,'', '' ,'');
                        $o = ModelUser::select($id);
                       
                        if($o!=null){
                          
    
                            if($enable == 1){
    
                                $u = ModelUser::enable($id , 0);		
                                echo 'disabled';
                            }
                            else{
                                $u = ModelUser::enable($id , 1);		
                                echo 'enabled';   
                            
                            }
    
    
                           
                        }
    
    
                    break;



                 

                    case "updatedprof":

                        $image=$_FILES['image']['name']; 
                        $expimage=explode('.',$image);
                        $imageexptype=$expimage[1];
                        date_default_timezone_set('Australia/Melbourne');
                        $date = date('m/d/Yh:i:sa', time());
                        $rand=rand(10000,99999);
                        $encname=$date.$rand;
                        $imagename=md5($encname).'.'.$imageexptype;
                        $imagepath="assets/".$imagename;
                        move_uploaded_file($_FILES["image"]["tmp_name"],$imagepath);
                        
        
        
                              $name =$_REQUEST["name"];
                              $lastname = $_REQUEST["lastname"];
                              $email = $_REQUEST["email"];
                              $login = $_REQUEST["login"];
                              $adress = $_REQUEST["adress"];
        
                              $phone = $_REQUEST["phone"];
        
                              $password = $_REQUEST["password"];
                              $photo = $imagename;
                              $Role = "prof";
                              $enable = "1";
                              $categorie = $_REQUEST["categorie"];
        
                            
                              $id = $_REQUEST["id"];
                                echo $id;
                            
                              $u = new ModelUser($name, $lastname, $email, $login, $adress ,$phone ,$password ,$photo, $Role , $enable ,$categorie);	
                                 $tab = array(
                                     "id" => $id,  

                                 "name" =>$name,
                                 "lastname" =>$lastname,
                                 "email" =>$email,
                                 "login" =>$login,
                                 "adress" =>$adress,

                                 "phone" =>$phone,    
                                 "password" => $password,
                                 "photo" => $photo,
                                 "Role" => $Role,
                                 "enable"=>$enable,
                                 "categorie"=>$categorie

                                 );				
                               
                                    $o = ModelUser::update($tab, $id);		
                                    echo json_encode('1');                            
                                
                        
                        break;


                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                          
                            $u = modelUser::select($id);
                            if($u!=null){
                                echo json_encode($u);
                            }
                            }
                            break;

                            case "delete":
                               
                                    $id = $_REQUEST['id'];
                                    $del = ModelUser::select($id);
                                    echo json_encode($del);
                                    if($del!=null){
                                    $del1 = ModelUser::delete($id);
                                    echo json_encode('1');
                                    }
                             
                                break;
    
                    
                      
}



 
?>