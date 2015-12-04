<?php
	class Dace{

		private $type = null;
		private $value = 0;
		private $image = null;

		public function __construct($daceType){

			$this->type = $daceType;

			switch ($daceType) {
				case 3:
					$this->value = rand(1, 3);
					$this->image = "img/Dice3-".$this->value;
					break;
				case 6:
					$this->value = rand(1, 6);
					$this->image = "img/Dice-".$this->value;
					break;
				case 12:
					$this->value = rand(1, 12);
					$this->image = "img/dodec-".$this->value;
					break;				
			}
		}

		//GETTERS && SETTERS.

		public function getType(){
			return $this->type;
		}

		public function getValue(){
			return $this->value;
		}

		public function getImage(){
			return $this->image;
		}

		public function setType($nType){
			$this->type = $nType;
		}

		public function setValue($nValue){
			$this->value = $nValue;
		}

		public function setImage($nImage){
			$this->image = $nImage;
		}

	}
?>