class Character {
	/*
	var name;
	var level;
	var maxHP;
	var HP;
	var ATK;
	var DEF;
	var SPD;
	var message;
	var player; //boolean for human player
	var inventory;
	*/
	constructor (n, lvl, max, hp, atk, def, spd, msg, pl, ava){
		this.name = n;
		this.level = lvl;
		this.maxHP = max;
		this.HP = hp;
		this.ATK = atk;
		this.DEF = def;
		this.SPD = spd;
		this.message = msg;
		this.player = pl;
		this.avatar = ava;
	}
	
}

function speedTest(one, two){
	var order = new Array();
	if (one.SPD > two.SPD){
		order.push(one);
		order.push(two);
	}
	else if (one.SPD <= two.SPD){
		order.push(two);
		order.push(one);
	}
	
	return order;
}

function boolToInt(value){
	if (value == true)
		return 1;
	
	return 0;
}

function Battle(player, enemy){
	var order = speedTest(player, enemy);
	var current = 0;
	//simulate turn base battle system
	while (order[0].HP > 0 && order[1].HP > 0){
		var opp = boolToInt(!current);
		var damage = order[current].ATK - order[opp].DEF; //simple equation to figure out damage
		
		if(damage <= 0)
			damage = 1;
		
		order[opp].HP -= damage;
		console.log(order[current].name + " " + order[current].message);
		
		current = boolToInt(!current);
		console.log(order[0].name + ": " + order[0].HP + " | " + order[1].name + ": " + order[1].HP);
	}
}

function setUpCharacter(character){
	document.getElementById("avatar").src = character.avatar;
	document.getElementById("username").innerHTML = character.name;
}

function showStats(character){
	document.getElementById("stat-box").innerHTML =
		"Level: " + character.level + "<br>" +
		"HP: " + character.HP + "/" + character.maxHP + "<br>" +
		"ATK: " + character.ATK + "<br>" +
		"DEF: " + character.DEF;
}

function updateStats(){
}