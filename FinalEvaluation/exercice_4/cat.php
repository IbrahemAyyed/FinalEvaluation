<?php 
class Chat
{
	/*
	*$var string
	*/
	private $prenom;
	/*
	*$var int
	*/
	private $age;
	/*
	*$var string
	*/
	private $couleur;
	/*
	*$var string
	*/
	private $sexe;
	/*
	*$var string
	*/
	private $race;
	// Methode constructeur qui permet d'instancier la classe directement
	public function __construct($prenom, $age, $couleur, $sexe, $race)
	{
		$this->prenom = $prenom;
		$this->age = $age;
		$this->couleur = $couleur;
		$this->sexe = $sexe;
		$this->race = $race;
	}
	// Setter pour le prénom
	private function setPrenom($prenom){
		if($prenom > 3 && $prenom < 20) {
			$this->prenom = $prenom;
			return $this;
		} else {
			echo "Vous devez entrer un prénom entre 3 et 20 charactère.";
		}
	}
	// Setter pour l'age
	private function setAge($age){
		if(is_int($age)) {
			$this->age = $age;
			return $this;
		} else {
			echo "Merci de rentrer un nombre.";
		}
	}
	// Setter pour la couleur
	private function setCouleur($couleur){
		if($couleur > 3 && $prenom < 10) {
			$this->couleur = $couleur;
			return $this;
		} else {
			echo "Vous devez entrer un prénom entre 3 et 10 charactère.";
		}
	}
	// Setter pour le sexe
	private function setSexe($sexe){
		if($sexe == 'male' || $sexe == 'female') {
			$this->sexe = $sexe;
			return $this;
		} else {
			echo "Choisissez entre male ou female.";
		}
	}
	
	 
	private function setRace($race){
		if($race > 3 && $race < 20) {
			$this->race = $race;
			return $this;
		} else {
			echo "Vous devez entrer un prénom entre 3 et 20 charactère.";
		}
	}
	/**
	 * Getter de l'attribut $prenom
	 * 
	 * @param string $prenom
	 * 
	 * $return string
	 */
	public function getPrenom(){
		return $this->prenom;
	}
	/**
	 * Getter de l'attribut $age
	 * 
	 * @param int $prenom
	 * 
	 * $return int
	 */
	public function getAge(){
		return $this->age;
	}
	/**
	 * Getter de l'attribut $couleur
	 * 
	 * @param string $couleur
	 * 
	 * $return string
	 */
	public function getCouleur(){
		return $this->couleur;
	}
	/**
	 * Getter de l'attribut $sexe
	 * 
	 * @param string $sexe
	 * 
	 * $return string
	 */
	public function getSexe(){
		return $this->sexe;
	}
	/**
	 * Getter de l'attribut $race
	 * 
	 * @param string $race
	 * 
	 * $return string
	 */
	public function getRace(){
		return $this->race;
	}
	/**
	 * Méthode qui permet de récupérer tous les informations de chat
	 * 
	 * 
	 * 
	 * $return array
	 */
	public function getInfos(){
		 $infos = array(
			"le nom du chat est ".$this->getPrenom().'.',
			"son age : ".$this->getAge().'.',
			"sa couleur est :".$this->getCouleur().'.',
			"son sexe est ".$this->getSexe().'.',
			"la race est ".$this->getRace().'.<br>'
		);
		return $infos;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Cat</title>
</head>
<body>
<form method="POST">
    		<fieldset>
        		<input type="text" name="prenom" placeholder="name">
        		<input type="number" name="age" placeholder="age">
        		<select name="sexe">
        			<option value="male">Male</option>
        			<option value="female">Female</option>
				</select>
				<input type="text" name="couleur" placeholder="couleur">
				<input type="text" name="race" placeholder="Race">

    		</fieldset>
    		
    	
    		
    		<button type="submit">Submit</button>
    	</form>
</body>
</html>