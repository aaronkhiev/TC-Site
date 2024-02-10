// Constructor for a blank character with no scores.
function character(str, dex, con, int, wis, cha){
	this.str = str;
    this.dex = dex;
    this.con = con;
    this.int = int;
    this.wis = wis;
    this.cha = cha;
}

// Generate a number between 1 - 6
function rollD6() {
    var d6 = Math.floor(Math.random() * 7) + 1;
    return d6;
}

// Roll 3 times and add that number to create an ability score.
function rollStat() {
    var score = 0;
    var rolls = [];
    for (let index = 0; index < 4; index++) {
        rolls[index] = rollD6();
    }
    rolls.sort(function(a, b){return a - b});
    rolls.splice(0, 1);
    for (let index = 0; index < rolls.length; index++) {
        score = score + rolls[index];
        
    }
    return score;
}

// This is the driver function which will run all of our functions. Doing so will write out score in html, assign the scores to the constructor, and display the rolls.
function writeScore(ability) {
    var rollScore = rollStat();
    var blankchar = new character(0, 0, 0, 0, 0, 0);
    // Switch statement for the onclick events. When this is called, a string is fixed as a parameter depending on the button. Our character object stat is then added to the text.
    switch (ability) {
        case 'str':
            blankchar.str = rollScore;
            document.querySelector("#strscore").innerText = blankchar.str;
            break;
        case 'dex':
            blankchar.dex = rollScore;
            document.querySelector("#dexscore").innerText = blankchar.dex;
            break;
        case 'con':
            blankchar.con = rollScore;
            document.querySelector("#conscore").innerText = blankchar.con;
            break;
        case 'int':
            blankchar.int = rollScore;
            document.querySelector("#intscore").innerText = blankchar.int;
            break;
        case 'wis':
            blankchar.wis = rollScore;
            document.querySelector("#wisscore").innerText = blankchar.wis;
            break;
        case 'cha':
            blankchar.cha = rollScore;
            document.querySelector("#chascore").innerText = blankchar.cha;
            break;
        default:
            break;
    }
}