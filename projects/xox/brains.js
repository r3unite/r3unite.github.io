//JAVASCRIPT XO




const sign = {
	x: true,
	o: false,
	empty: undefined
	
};


yourSign = sign.x;
enemySign = ! yourSign;

let cells = 
[undefined,undefined,undefined,
undefined,undefined,undefined,
undefined,undefined,undefined];

let yourTurn = true;

function setUpDomElements() {
	
	
	
	domObj = {
		windowElement: document.getElementById("div-window"),
		windowText: document.getElementById("window-text"),
		windowExitButtonElement: document.getElementById("close-btn")
	};
	
	
	domObj.windowExitButtonElement.onclick = function(){
			domObj.windowElement.style.display = "none";
		}
	

	
	for ( i = 1 ; i < 10 ; i++ )
	{
	domObj['cell-'+i] = document.getElementById('cell-'+i);
	domObj['cell-'+i].addEventListener('click', handleCellClick.bind(domObj['cell-'+i],i));
	}
	
	
	
	return domObj;
	
}

function setCellDOM(cell, val){
	switch(val)
	{
		case true:
			domObj['cell-'+cell].style.backgroundImage = "url(images/x.png)";
			break;
		case false:
			domObj['cell-'+cell].style.backgroundImage = "url(images/o.png)";
			break;
		case undefined:
			domObj['cell-'+cell].style.backgroundImage = "none";
			break;
	}
}

function setCell(cell, val){
	cells[cell] = val;
	
}

function showWindow(winObj){
	let string = '';
	if(winObj.winner === 'player')
	{
		string += 'Gratulálunk, nyertél! '
		switch(winObj.type)
		{
			case 'horizontal':
				string += `Vízszintes kombinációd van a ${winObj.line}. sorban!` 
				break;
			case 'vertical':
				string += `Függőleges kombinációd van a ${winObj.line}. oszlopon!` 
				break;	
			case 'diagonal':
				string += `Ferde kombinációd van!` 
				break;			
		}
		
	}
	else if (winObj.winner === 'enemy')
	{
		string += 'Sajnos, vesztettél! '
		switch(winObj.type)
		{
			case 'horizontal':
				string += `Vízszintes kombinációja van az ellenfelednek a ${winObj.line}. sorban!` 
				break;
			case 'vertical':
				string += `Függőleges kombinációja van az ellenfelednek a ${winObj.line}. oszlopon!` 
				break;	
			case 'diagonal':
				string += `Ferde kombinációja van az ellenfelednek!` 
				break;			
		}
	}
	else if (winObj.winner === 'draw')
	{
		string += 'Döntetlen lett! Nincs kombináció.'
	}
	 
	DOM.windowText.textContent = string
	DOM.windowElement.style.display = 'block';
	
}

function newGame(){
	DOM.windowElement.style.display = 'none';
	
	setAll(cells, undefined)
	render();
	yourTurn = true;
	
}

function setAll(a, v) {
    var i, n = a.length;
    for (i = 0; i < n; ++i) {
        a[i] = v;
    }
}

function handleCellClick(cell){
	
	if(yourTurn)
	{
		setCell(cell-1,yourSign);
		yourTurn = false;
		handleEnemyTurn();
	}
	
	
	render();
}

function handleEnemyTurn(){
	if(checkIfWon().winner !== 'none')
	{
		return endRound(checkIfWon());
	}

	
	let randomCell = Math.floor(Math.random()*9);
	if(cells.includes(undefined)){
		while(cells[randomCell] !== undefined){
			randomCell = Math.floor(Math.random()*9);
			console.log('trying cell: ' + randomCell + ' which is' + cells[randomCell])
		}
		
	}
	else	
	{
		return endRound({winner: 'draw', line: '0', type: 'everywhere'});
	}
	console.log(randomCell)
	setCell(randomCell,enemySign);
	
	

	yourTurn = true;		
	if(checkIfWon().winner !== 'none')
	{
		return endRound(checkIfWon());
	}	
}
	




function render(){
	
	for( i = 0 ; i < cells.length ; i++ )
	{
	setCellDOM(i+1,cells[i])
	}
	
}




function checkIfWon(){
	
	
	
	for(let j = 0; j < 3; j++){	//rows		//Scan horizontally
	let playerSignNumber = 0;
	let enemySignNumber = 0;
		for(let i = 0; i < 3; i++){  //columns
			if(cells[j*3 + i] === yourSign)
			{
				playerSignNumber++;
			}else if(cells[j*3 + i] === enemySign)
			{
				enemySignNumber++;
			}
			
		}
		if(playerSignNumber === 3)
		{
			console.log(`Player Horizontal Combination Found on row: ${j+1} !`);
			return {type: 'horizontal', line: j+1, winner: 'player'}
		}else if(enemySignNumber === 3)
		{
			console.log(`Enemy Horizontal Combination Found on row: ${j+1} !`);
			return {type: 'horizontal', line: j+1, winner: 'enemy'}
		}
		
	}
	
	for(let j = 0; j < 3; j++){	//rows		//Scan horizontally
	let playerSignNumber = 0;
	let enemySignNumber = 0;
		for(let i = 0; i < 3; i++){  //columns
			if(cells[i*3 + j] === yourSign)
			{
				playerSignNumber++;
			}else if(cells[i*3 + j] === enemySign)
			{
				enemySignNumber++;
			}
			
		}
		if(playerSignNumber === 3)
		{
			console.log(`Player Vertical Combination Found on column: ${j+1} !`);
			
			return {type: 'vertical', line: j+1, winner: 'player'}
			
		}else if(enemySignNumber === 3)
		{
			console.log(`Enemy Vertical Combination Found on column: ${j+1} !`);
			return {type: 'vertical', line: j+1, winner: 'enemy'}
		}
		
	}	
	let playerSignNumber = 0;
	let enemySignNumber = 0;
	for(let j = 0; j < 3; j++){
	if(cells[(j + j)*2] === yourSign)
			{
				playerSignNumber++;
			}else if(cells[(j + j)*2] === enemySign)
			{
				enemySignNumber++;
			}
	
	}
	if(playerSignNumber === 3)
	{
		console.log(`Player Diagonal Combination Found!`);
		
		return {type: 'diagonal', line: 1, winner: 'player'}
		
	}else if(enemySignNumber === 3)
	{
		console.log(`Enemy Diagonal Combination Found !`);
		return {type: 'diagonal', line: 1, winner: 'enemy'}
	}
	playerSignNumber = 0;
	enemySignNumber = 0;
	for(let j = 1; j < 4; j++){
	if(cells[j*2] === yourSign)
			{
				playerSignNumber++;
			}else if(cells[j*2] === enemySign)
			{
				enemySignNumber++;
			}
	
	}
	if(playerSignNumber === 3)
	{
		console.log(`Player Diagonal2 Combination Found!`);
		
		return {type: 'diagonal', line: 2, winner: 'player'}
		
	}else if(enemySignNumber === 3)
	{
		console.log(`Enemy Diagonal2 Combination Found !`);
		return {type: 'diagonal', line: 2, winner: 'enemy'}
	}
	
	return {winner: 'none'};
}




function endRound(endObject){
	yourTurn = false;
	
	
	showWindow(endObject);
	
	console.log(`
	Round Ended!
	${endObject.winner} wins!
	${endObject.type} line on ${endObject.line}
	
	`)
	
}


let DOM = setUpDomElements();

console.log(DOM);