
<?php

    
require_once("{$ROOT}{$DS}model{$DS}modelFormation.php");
require_once("{$ROOT}{$DS}model{$DS}modelUser.php");



header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");



$controller = "formation";

if(isset($_REQUEST['action']))	
/* recupère l'action passée dans l'URL*/
	$action = $_REQUEST['action'];
/* NB: On a ajouté un comportement par défaut avec action=readAll.*/
	else $action="getall";	
	
switch ($action) {


    case "consulte":
       
       
          $tab_p = ModelFormation::getAll();
           echo json_encode($tab_p);
             break;

             case "getThree":
       
       
                $tab_p = ModelFormation::getThree();
                 echo json_encode($tab_p);
                   break;

             case "getFormationByCategorie":
       
                if(isset($_REQUEST['categorie'])){
                    $cat = $_REQUEST['categorie'];
                $tab_p = ModelFormation::getByCat($cat);
                 echo json_encode($tab_p);
                }
                   break;
      
      


  
    case "createdFormation":
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
        

        
                             
                        $titre = $_REQUEST['titre'];
                        $description = $_REQUEST['description'];


                        $date = $_REQUEST['date'];
                        $dateremise = $_REQUEST['dateremise'];

                        $duree = $_REQUEST['duree'];

                        $image = $imagename;
                        $etat = $_REQUEST['etat'];
                        $categorie = $_REQUEST['categorie'];


                              $id = NULL;

            
                $u = new ModelFormation($titre , $description , $date , $dateremise ,$duree  , $image, $etat , $categorie);	
                $tab = array(
                    "id" => $id,  
                   
                      "titre" =>$titre,
                      "description" =>$description,
                      "date"=> $date,
                      "dateremise"=> $dateremise,

                      "duree"=> $duree,

                    
                      "image" => $image,
                      "etat" => $etat,
                      "categorie" =>$categorie
                );			
               $res = $u->insert($tab);	
               $etu = modelUser::getAllEtudiant();
               $for = modelUser::getAllFormatteur();
               $lenEtu = count($etu);
               $lenFor = count($for);
               $emailArray = []; 

               for($i=0;$i<$lenEtu;$i++){
              
                array_push($emailArray,$etu[$i]['email']);
               }

               for($i=0;$i<$lenFor;$i++){
              
                array_push($emailArray,$for[$i]['email']);
               }

               echo (json_encode($emailArray));
        
        break;
  
      
                   
                
              



                

                 

                    case "updated":

                     
                        $id = $_REQUEST["id"];

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
                        
                   
                                             
                                                 
                              
                        $titre = $_REQUEST['titre'];
                        $description = $_REQUEST['description'];


                        $date = $_REQUEST['date'];
                        $dateremise = $_REQUEST['dateremise'];

                        $duree = $_REQUEST['duree'];

                        $image = $imagename;
                        $etat = $_REQUEST['etat'];
                        $categorie = $_REQUEST['categorie'];


            
                $u = new ModelFormation($titre , $description , $date , $dateremise ,$duree  , $image, $etat , $categorie);	
                $tab = array(
                    "id" => $id,  
                   
                      "titre" =>$titre,
                      "description" =>$description,
                      "date"=> $date,
                      "dateremise"=> $dateremise,

                      "duree"=> $duree,

                    
                      "image" => $image,
                      "etat" => $etat,
                      "categorie" =>$categorie
                );										
                               
                                    $o = $u->update($tab, $id);		
                                    echo json_encode($o);                            
                                
                        
                        break;


                        case "detail":
                            if(isset($_REQUEST['id'])){
                            $id = $_REQUEST['id'];
                            $u = ModelFormation::select($id);
                            if($u!=null){
                                echo json_encode($u);
                            }
                            }
                            break;
    


                            case "delete":
                               
                                $id = $_REQUEST['id'];
                                $del = ModelFormation::select($id);
                                echo json_encode($del);
                                if($del!=null){
                                $del1 = ModelFormation::delete($id);
                                echo json_encode('1');
                                }
                         
                            break;
}



 
?>