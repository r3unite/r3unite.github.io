//ball sort

const flaskNumber = 20;
const fullFlasks = flaskNumber - 2;
const slotNumber = 4;
const allowSameColorOnly = true;

let lastTakenFrom;
let hand = undefined;
let handPosition = 0;
let colorsDone = 0;
 
colors = [];
for(i=0;i<fullFlasks;i++)
{
	let col = genRandomColor();
	for(j=0;j<slotNumber;j++)
	{
		colors.push(col);
	}
}

flasks = [];
for(i=0;i<flaskNumber;i++)
{
	let flask = new Array(0);
	for(j=0;j<slotNumber;j++)
	{
		let randomIndex = Math.floor(Math.random()*colors.length)
		flask.push(colors[randomIndex]);
		colors.splice(randomIndex, 1);
	}
	flasks.push(flask);

}



function setUpDom(){
	domObj = {
		flaskContainer: document.getElementById('div-fContainer'),
		spaceContainer: document.getElementById('div-spaceContainer')
	};
	
	for(i=0;i<flaskNumber;i++)
	{
		domObj['flask-'+i] = document.createElement('div');
		domObj['flask-'+i].addEventListener('click', handleClick.bind(domObj['flask-'+i],i))
		domObj['flask-'+i].id = 'flask-'+i;
		domObj.flaskContainer.appendChild(domObj['flask-'+i]);
		for(j=0;j<slotNumber;j++)
		{
			domObj['f-'+i+'-slot'+j] = document.createElement('div');
			domObj['f-'+i+'-slot'+j].id = 'f-'+i+'-slot'+j;
			
				
			
			domObj['flask-'+i].appendChild(domObj['f-'+i+'-slot'+j]);
		}
		domObj['hand-'+i] = document.createElement('div');
		domObj['hand-'+i].style.width = 100/flaskNumber + '%';
		domObj['hand-'+i].id = 'hand-'+i;
		domObj['hand-'+i].className = 'empty';
		domObj.spaceContainer.appendChild(domObj['hand-'+i]);
		
		
	}
}


function genRandomColor(){
	  var letters = '0123456789ABCDEF';
	  var color = '#';
	  for (var i = 0; i < 6; i++) {
		color += letters[Math.floor(Math.random() * 16)];
	  }
	  return color;

	
}



function render(){
	
	for(i=0;i<flasks.length;i++)
	{
		for(j=0;j<slotNumber;j++)
		{
			if( flasks[i][j] !== undefined)
			{
				domObj['f-'+i+'-slot'+j].style.backgroundColor = flasks[i][j];
				domObj['f-'+i+'-slot'+j].textContent = flasks[i][j];
				domObj['f-'+i+'-slot'+j].className = 'full'
			}
			else
			{
				domObj['f-'+i+'-slot'+j].className = 'empty'
			}
			
		}
	}
	
	for(i=0;i<flaskNumber;i++)
	{
		domObj['hand-'+i].className = 'empty';
		domObj['hand-'+i].style.backgroundColor = 'transparent';
	}
	if (hand !== undefined)
	{
		domObj['hand-'+handPosition].className = 'full';
		domObj['hand-'+handPosition].style.backgroundColor = hand;
	}

}


function take(onFlask){
	
	console.log('taken from:' + onFlask);
	
		for(i=0;i<flasks[onFlask].length;i++)
		{
			if(flasks[onFlask][i] !== undefined)
			{
				hand = flasks[onFlask][i];
				flasks[onFlask][i] = undefined;
				lastTakenFrom = onFlask;
				break;
				
			}
		}
	handPosition = onFlask;
	
}

function place(onFlask){
	
	
	for(i=flasks[onFlask].length-1;i>-1;i--)
		{
			if(flasks[onFlask][i] === undefined)
			{
				if (onFlask == lastTakenFrom)
				{
					
					flasks[onFlask][i] = hand;
					hand = undefined;

					break;
				}
				
				if (flasks[onFlask].length-1 == i)
				{
					
					flasks[onFlask][i] = hand;
					hand = undefined;

					break;
				}
				else
				{
					if(flasks[onFlask][i+1] === hand)
					{
						flasks[onFlask][i] = hand;
						hand = undefined;

						break;
					}
				}
				
			}
		}
	handPosition = onFlask;
	
}

function handleClick(onFlask){
	if(hand === undefined)
	{
		take(onFlask);
	}
	else
	{
		place(onFlask);
		
		if (isArrayEqual(flasks[onFlask]))
		{
			for(i=0;i<slotNumber;i++)
			{
				flasks[onFlask][i] = undefined;
				
			}
			colorsDone++;
			alert("Bravo Apuci! " + colorsDone + " szint megcsinaltal!");
		}


		
	}
	testWinIfWon();
	render();
}


let DOM = setUpDom();

render();


function testWinIfWon() {
	let equalArrays = 0;
	for(i=0;i<flasks.length;i++)
	{

		if (isArrayEqual(flasks[i]))
		{
			
		equalArrays++;
		}
		
		
	}
	if(equalArrays == flasks.length)
	{
			alert("Bravo Apuci! " + colorsDone + " KONGRETULEJSONS!");
			//window.location.replace("https://www.youtube.com/watch?v=fJVa_ug4jFA");
			
	}
	
}


function isArrayEqual(arr) {
	let i=1;
	let first = arr[0];
	while(i < arr.length)
	{
		 if(first !== arr[i])
		 {
		   return false;
		 }
		i++;
	}
	return true;
}