<?php	
	class Player{

		private $name = "";
		private $lastName = "";
		private $age = 0;
		private $score = 0;

		//Constructor.
		public function __construct($name, $lastName, $age){

			$this->name = $name;
			$this->lastName = $lastName;
			$this->age = $age;
		}

		//Getters & Setters.
		public function getName(){
			return $this->name;
		}

		public function getLastName(){
			return $this->lastName;
		}

		public function getAge(){
			return $this->age;
		}

		public function getScore(){
			return $this ->score;
		}

		public function setName($name){
			$this->name = $name;
		}

		public function setLastName($lastName){
			$this->lastName = $lastName;
		}

		public function setAge($age){
			$this->age = $age; 
		}

		public function setScore($score){
			$this->score += $score;
		}
	}

?>