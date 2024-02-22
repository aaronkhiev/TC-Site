// Constructor for a blank character with no scores.
function character(str, dex, con, int, wis, cha){
	this.str = str;
    this.dex = dex;
    this.con = con;
    this.int = int;
    this.wis = wis;
    this.cha = cha;
}
var blankchar = new character(0, 0, 0, 0, 0, 0);
var item = document.getElementsByClassName('summarystat');
// Generate a number between 1 - 6
function rollD6() {
    var d6 = Math.floor(Math.random() * 6) + 1;
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

function generateSummary() {
    $(".summarystat").each(function(index) { 
        if (index == 0) {
            if(blankchar.str >= 10) {
                $(".summarystat")[0].append("You have a high strength score! You're modifier is gonna be fine.");
            }
            else {
                $(".summarystat")[0].append("You have a low strength score...you're modifier is gonna be pretty scrawny.");
            }
        }
        if (index == 1) {
            if(blankchar.dex >= 10) {
                $(".summarystat")[1].append("You have a high dexterity score! You're modifier is gonna be fine.");
            }
            else {
                $(".summarystat")[1].append("You have a low dexterity score...you're modifier is clumsy...yikes.");
            }
        }
        if (index == 2) {
            if(blankchar.con >= 10) {
                $(".summarystat")[2].append("You have a high constitution score! You're modifier is gonna be fine.");
            }
            else {
                $(".summarystat")[2].append("You have a low constitution score...you're modifier is gonna need a doctor.");
            }
        }
        if (index == 3) {
            if(blankchar.int >= 10) {
                $(".summarystat")[3].append("You have a high intelligence score! You're modifier is gonna be fine.");
            }
            else {
                $(".summarystat")[3].append("You have a low intelligence score...you're modifier is not the brightest...");
            }
        }
        if (index == 4) {
            if(blankchar.wis >= 10) {
                $(".summarystat")[4].append("You have a high wisdom score! You're modifier is gonna be fine.");
            }
            else {
                $(".summarystat")[4].append("You have a low wisdom score...you're modifier is uh...yeah.");
            }
        }
        if (index == 5) {
            if(blankchar.cha >= 10) {
                $(".summarystat")[5].append("You have a high charisma score! You're modifier is gonna be fine.");
            }
            else {
                $(".summarystat")[5].append("You have a low charisma score...you ever considered of plastic surgery?");
            }
        }
    });
}

// Event Handler
$("#gen").on('click', function() {
    generateSummary();    
});