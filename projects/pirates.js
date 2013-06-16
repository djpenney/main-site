/*jshint globalstrict: true*/

// Define helper functions
var randNum = function(number) {
    "use strict";
    return Math.floor(Math.random() * number + 1);
};

var setBoard = function(tileName,tileX,tileY) {
    "use strict";
    switch(tileName)
    {
        case 'wtr':
            board.rows[tileY].cells[tileX].innerHTML = '<img src="/images/pirates/pWater.png">';
            break;
        case 'prt':
            board.rows[tileY].cells[tileX].innerHTML = '<img src="/images/pirates/pPortal.png">';
            break;
        case 'wreck':
            board.rows[tileY].cells[tileX].innerHTML = '<img src="/images/pirates/pWreck.png">';
            break;
        case 'isl':
            board.rows[tileY].cells[tileX].innerHTML = '<img src="/images/pirates/pIsland.png">';
            break;
        default:
            return false;
    }
};

var playerX = 0, playerY = 0;


// Set board variable and populate with default images
var board = document.getElementById("board");

for (var y=0; y<=8; y+=1) {
    for (var x=0; x<=8; x+=1) {
        setBoard('wtr',x,y);
    }
}

setBoard('prt',0,0);
setBoard('prt',8,0);
setBoard('prt',0,8);
setBoard('prt',8,8);

for( var i=0; i < 2; i++) {
    var islX = randNum(board.rows.length-1);
    var islY = randNum(board.rows.length-1);
    setBoard('isl',islX,islY);
} 

playerX = randNum(8);
playerY = randNum(8);

board.rows[playerY].cells[playerX].innerHTML = '<img src="/images/pirates/pShip.png">';

