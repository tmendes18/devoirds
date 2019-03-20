
<?php

function actionActualite($twig, $db){
 $form = array();
 $actualite = new Actualite($db);
  $newuser = new Newuser($db);
 if (isset($_POST['btAjouter'])){
  
      $inputTitre = $_POST['inputTitre'];
      $inputContenu = $_POST['inputContenu']; 
      $inputUser =$_POST['inputUser']; 
      
      
       $exec = $actualite->insert($inputTitre,$inputContenu,$inputUser);
 if (!$exec){
 $form['valide'] = false;
 $form['message'] = 'Problème ';
 }
      $form['valide'] = true;
 
    }
 

 $liste = $newuser->select();
  $listeactu = $actualite->select();
 echo $twig->render('actualite.html.twig', array('form'=>$form,'liste'=>$liste,'listeactu'=>$listeactu));
}

?>