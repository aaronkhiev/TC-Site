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

// Modify HTML using DOM to generate p tag text.
function generateSummary() {
    for (let index = 0; index < item.length; index++) {
        // Switch statements again, much handier than ifs and also do great for fixed elements and text.
        switch (index) {
            case 0:
                //Strength Message
                const para = document.createElement("p");
                const low = document.createTextNode("You have a low strength score...you're modifier is gonna be pretty scrawny.");
                const high = document.createTextNode("You have a high strength score! You're modifier is gonna be fine.");
                
                if(blankchar.str >= 10) {
                    para.appendChild(high);
                }
                else {
                    para.appendChild(low);
                }
                const element = document.getElementsByClassName('summarystat')[0];
                element.appendChild(para);
                break;
            case 1:
                //Dexterity
                const para1 = document.createElement("p");
                const low1 = document.createTextNode("You have a low dexterity score...you're modifier is clumsy...yikes");
                const high1 = document.createTextNode("You have a high dexterity score! You're modifier is gonna be fine.");
                
                if(blankchar.dex >= 10) {
                    para1.appendChild(high1);
                }
                else {
                    para1.appendChild(low1);
                }
                const element1 = document.getElementsByClassName('summarystat')[1];
                element1.appendChild(para1);
                break;
            case 2:
                //Constitution
                const para2 = document.createElement("p");
                const low2 = document.createTextNode("You have a low constitution score...you're modifier is gonna need a doctor.");
                const high2 = document.createTextNode("You have a high constitution score! You're modifier is gonna be fine.");
                
                if(blankchar.con >= 10) {
                    para2.appendChild(high2);
                }
                else {
                    para2.appendChild(low2);
                }
                const element2 = document.getElementsByClassName('summarystat')[2];
                element2.appendChild(para2);
                break;
            case 3:
                //Intelligence
                const para3 = document.createElement("p");
                const low3 = document.createTextNode("You have a low intelligence score...you're modifier is not the brightest...");
                const high3 = document.createTextNode("You have a high intelligence score! You're modifier is gonna be fine.");
                
                if(blankchar.int >= 10) {
                    para3.appendChild(high3);
                }
                else {
                    para3.appendChild(low3);
                }
                const element3 = document.getElementsByClassName('summarystat')[3];
                element3.appendChild(para3);
                break;
            case 4:
                //Wisdom
                const para4 = document.createElement("p");
                const low4 = document.createTextNode("You have a low wisdom score...you're modifier is uh...yeah");
                const high4 = document.createTextNode("You have a high wisdom score! You're modifier is gonna be fine.");
                
                if(blankchar.wis >= 10) {
                    para4.appendChild(high4);
                }
                else {
                    para4.appendChild(low4);
                }
                const element4 = document.getElementsByClassName('summarystat')[4];
                element4.appendChild(para4);
                break;
            case 5:
                //Charisma
                const para5 = document.createElement("p");
                const low5 = document.createTextNode("You have a low charisma score...you ever heard of plastic surgery?");
                const high5 = document.createTextNode("You have a high charisma score! You're modifier is gonna be fine.");
                
                if(blankchar.cha >= 10) {
                    para5.appendChild(high5);
                }
                else {
                    para5.appendChild(low5);
                }
                const element5 = document.getElementsByClassName('summarystat')[5];
                element5.appendChild(para5);
                break;
            default:
                break;
        }
    }
}

// Event Handler
var sumUp = document.getElementById('gen');
sumUp.addEventListener('click', generateSummary, false);