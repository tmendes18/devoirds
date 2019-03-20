<?php
class Newuser{

 private $db;
 private $insert;
 private $select;



 public function __construct($db){
 $this->db = $db;
 $this->insert = $db->prepare("insert into utilisateur(nom, prenom, adresse, cp, ville) values(:Nom, :Prenom, :Adresse, :Cp, :Ville)");
 $this->select = $db->prepare("select id, nom, prenom, adresse, cp, ville from utilisateur order by nom");

 }
 public function insert($inputNom, $inputPrenom, $inputAdresse, $inputCp ,$inputVille){
 $r = true;
 $this->insert->execute(array(':Nom'=>$inputNom, ':Prenom'=>$inputPrenom, ':Adresse'=>$inputAdresse, ':Cp'=>$inputCp, ':Ville'=>$inputVille));
 if ($this->insert->errorCode()!=0){
 print_r($this->insert->errorInfo());
 $r=false;
 }
 return $r;
 }


 
  public function select(){
 $liste = $this->select->execute();
 if ($this->select->errorCode()!=0){
 print_r($this->select->errorInfo());
 }
 return $this->select->fetchAll();
 }


}
?>
