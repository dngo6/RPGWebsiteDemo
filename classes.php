<?php
class Character {
	public $username = 'default';
	public $player = false;
	public $avatar = "avatar.png"
	public $level = 1;
	public $MaxHP = 10;
	public $HP = 10;
	public $ATK = 1;
	public $DEF = 1;
	public $SPD = 1;
	public $atkMessage = 'default';
	
	public function jsChar($varName){
		echo "
		<script>
		var $varName = new Character (\"$this->username\", $this->level, $this->MaxHP, $this->HP, $this->ATK, $this->DEF, $this->SPD, \"$this->atkMessage\", \"$this->player\", \"$this->avatar\");
		</script>";
	}
}

class User extends Character{
	/*
	Here, we define the user's Data Structure.
	That is, the web and rpg attributes for the user.
	*/
	
	//methods
	/*public function __construct(){
			$username = 'default';
			$level = 1;
			$MaxHP = 10;
			$HP = 10;
	}*/
	
	public function saveUser($file){
		fwrite($file, "[Character Stats]\n");
		fwrite($file, "$this->level, $this->MaxHP, $this->HP, $this->ATK, $this->DEF, $this->SPD");
	}
	
	public function loadUser($file){
		//skip the first 3 lines of the file
		for ($i = 0; $i < 2; $i++)
			fgets($file);
		
		$this->player = true;
		$this->avatar = fgets($file);
		$this->level = fgets($file);
		$this->MaxHP = fgets($file);
		$this->HP = fgets($file);
		$this->ATK = fgets($file);
		$this->DEF = fgets($file);
		$this->SPD = fgets($file);
		$this->atkMessage = "swung its sword.";
	}
}

class Enemy extends Character{
	public $statCount = 6;
	/******************
	We are going to base our enemy count by increments and multiples of 6.
	[0]Giant Rat
	[1] ....
	[2] ....
	*******************/
	public function loadEnemy($index) {
		$file = fopen("bestiary.txt", 'r');
		$startIndex = $index*$this->statCount; //So we go to the correct line
		$lineNum = 0;
		while ($line = trim(fgets($file))){
			$this->username = $line;
			if($lineNum == $startIndex)
				break;
			$lineNum++;
		}
		
		$this->player = false;
		$this->level = 1;
		$this->MaxHP = trim(fgets($file));
		$this->HP = $this->MaxHP;
		$this->ATK = trim(fgets($file));
		$this->DEF = trim(fgets($file));
		$this->SPD = trim(fgets($file));
		$this->atkMessage = trim(fgets($file));
		
		fclose($file);
	}
	
}
?>