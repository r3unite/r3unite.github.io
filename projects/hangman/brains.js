//start date: 10:26 2021.8.25. ---
//JAVASCRIPT HANGMAN

let word = '';
let health = 1;
let wordHides = [];
let points = 0;
let plusCombo = 1;
let minusCombo = 1;
let lostGame = false;
let wonGame = false;
let lettersToTest = [];
let usedGoodLetters = [];
let usedBadLetters = [];
let difficulty = 2;
let dict = [
  
  'abajgat' ,
  'abakusz' ,
  'abál' ,
  'absztrakt ' ,
  'abszurd ',
  'abszurdum ' ,
  'arisztás' ,
  'abajgat' ,
  'abakusz' ,
  'abál' ,
  'abált' ,
  'abaposztó' ,
  'abárol' ,
  'abba' ,
  'abbahagy' ,
  'abbahagyat' ,
  'abbahagyogat' ,
  'abbamarad' ,
  'abban' ,
  'abbé' ,
  'abbeli' ,
  'abbizony' ,
  'abbreviatúra' ,
  'abcúg' ,
  'abcúgol' ,
  'ábécé' ,
  'ábécérend' ,
  'ábécés' ,
  'ábécéskönyv' ,
  'aberráció' ,
  'aberrált' ,
  'aberráns' ,
  'abesszin' ,
  'abesszíniai' ,
  'abház' ,
  'ablak' ,
  'ablakbélés' ,
  'ablakdeszka' ,
  'ablakemelő' ,
  'ablakfa' ,
  'ablakfülke' ,
  'ablakhőmérő' ,
  'ablakkeret' ,
  'ablakkönyöklő' ,
  'ablakköz' ,
  'ablakmélyedés' ,
  'ablakmosó' ,
  'folyadék' ,
  'ablakmosó' ,
  'ablaknyílás' ,
  'ablakocska' ,
  'ablakos' ,
  'ablakoz' ,
  'ablakpárkány' ,
  'ablakpárna' ,
  'ablakrács' ,
  'ablakráma' ,
  'ablakredőny' ,
  'ablakrózsa' ,
  'ablaksor' ,
  'ablakszárny' ,
  'ablakszem' ,
  'ablaktábla' ,
  'ablaktalan' ,
  'ablaktisztító' ,
  'ablaktok' ,
  'ablaktörlő' ,
  'ablakú' ,
  'ablaküveg' ,
  'ablakvasalás' ,
  'abnormális' ,
  'abnormis' ,
  'abnormitás' ,
  'abortál' ,
  'abortusz' ,
  'ábra' ,
  'ábrahámhegyi' ,
  'abrak' ,
  'abrakadabra' ,
  'abrakol' ,
  'abrakos' ,
  'abrakostarisznya' ,
  'abraktakarmány' ,
  'ábránd' ,
  'ábrándít' ,
  'ábrándkép' ,
  'ábrándos' ,
  'ábrándozás' ,
  'ábrándozik' ,
  'ábrándul' ,
  'ábrándvilág' ,
  'ábrázat' ,
  'ábrázol' ,
  'ábrázolás' ,
  'ábrázolat' ,
  'ábrázoló' ,
  'abroncs' ,
  'abroncsol' ,
  'abroncsos' ,
  'abroncsoz' ,
  'abroncsszoknya' ,
  'abroncsvas' ,
  'abrosz' ,
  'abroszos' ,
  'abszcissza' ,
  'abszint' ,
  'abszolút' ,
  'érték' ,
  'abszolút' ,
  'abszolúte' ,
  'abszolutisztikus' ,
  'abszolutizmus' ,
  'abszolutórium' ,
  'abszolútum' ,
  'abszolvál' ,
  'abszorbeál' ,
  'abszorbens' ,
  'abszorpció' ,
  'absztinens' ,
  'absztrahál' ,
  'absztrakció' ,
  'absztrakt' ,
  'abszurd' ,
  'abszurdum' ,
  'arisztás',
	'bab',
	'báb',
	'baj',
	'báj',
	'bak',
	'bal',
	'bál',
	'bán',
	'bar',
	'bár',
	'bég',
	'bej',
	'bel',
	'bél',
	'bír',
	'bit',
	'biz',
	'bíz',
	'boa',
	'bob',
	'bog',
	'bók',
	'bon',
	'bor',
	'bór',
	'bot',
	'boy',
	'bőg',
	'bök',
	'bőr',
	'búb',
	'búg',
	'búj',
	'búr',
	'bús',
	'bűn',
	'bűz',
	'baba',
	'bába',
	'bábu',
	'baci',
	'bagó',
	'baja',
	'baka',
	'baki',
	'bakó',
	'bála',
	'báli',
	'bank',
	'bánt',
	'bárd',
	'bari',
	'báró',
	'basa',
	'báva',
	'bead',
	'beás',
	'bébi',
	'becő',
	'becs',
	'beég',
	'beél',
	'beér',
	'befő',
	'befú',
	'begy',
	'beír',
	'béka',
	'béke',
	'bele',
	'bibe',
	'bibi',
	'bidé',
	'bige',
	'bika',
	'bili',
	'bíró',
	'birs',
	'bitó',
	'biza',
	'bizi',
	'blőd',
	'blúz',
	'bobi',
	'boci',
	'bocs',
	'bódé',
	'body',
	'bohó',
	'bója',
	'bojt',
	'boka',
	'bólé',
	'bolt',
	'boly',
	'bonc',
	'bong',
	'bont',
	'bóra',
	'bors',
	'ború',
	'borz',
	'bőgő',
	'bögy',
	'böjt',
	'bőrű',
	'bősz',
	'brit',
	'bróm',
	'bubi',
	'buci',
	'bucó',
	'budi',
	'buga',
	'búgó',
	'buja',
	'bújó',
	'bujt',
	'buké',
	'bukó',
	'buli',
	'bumm',
	'bura',
	'busa',
	'busó',
	'busz',
	'buta',
	'búvó',
	'búza',
	'buzi',
	'büfé',
	'bükk',
	'bürü',
	'bütü',
	'babér',
	'babos',
	'bábos',
	'báboz',
	'bácsi',
	'badar',
	'bádog',
	'baing',
	'bajai',
	'bájol',
	'bajor',
	'bajos',
	'bájos',
	'bakfű',
	'báláz',
	'balek',
	'balga',
	'balhé',
	'balin',
	'bálna',
	'balog',
	'balos',
	'balra',
	'balta',
	'balti',
	'bamba',
	'bambi',
	'bámul',
	'banán',
	'bánás',
	'bánat',
	'banda',
	'bangó',
	'bánik',
	'banka',
	'banki',
	'bankó',
	'bántó',
	'bantu',
	'banya',
	'bánya',
	'barát',
	'bárca',
	'bárha',
	'barit',
	'barka',
	'bárka',
	'bárki',
	'barkó',
	'bármi',
	'barna',
	'bárói',
	'barom',
	'baszk',
	'batár',
	'batik',
	'batka',
	'bátor',
	'bátya',
	'batyu',
	'bazár',
	'bázis'
 ]

function setUpDomElements()
{
	getText();
	//DOM object
	domObj = {
		startGameBTN: document.getElementById('btn-startGame'),
		startMultiBTN: document.getElementById('btn-startMulti'),
		gameROOM: document.getElementById('room-game'),
		menuROOM: document.getElementById('room-menu'),
		inputROOM: document.getElementById('room-input'),
		winROOM: document.getElementById('room-win'),
		deathROOM: document.getElementById('room-death'),
		hangmanIMG: document.getElementById('div-hangman'),
		letters: document.getElementById('div-letters'),
		points: document.getElementById('points'),
		usedUpLetters: document.getElementById('div-usedLetters'),
		inputBox: document.getElementById('box-input'),
		toggleBTN: document.getElementById('btn-toggleSee') 
	}
	
	//EventListeners
	domObj.startGameBTN.addEventListener('click', startGame);
	domObj.startMultiBTN.addEventListener('click', showInputScreen);
	domObj.toggleBTN.addEventListener('click', toggleSee)

	//EventListeners for keyboard
	
	for (i = 0; i < 26; i++) {

	domObj["key-"+ (i+10).toString(36)] = document.getElementById("btn-"+ (i+10).toString(36));
	domObj["key-"+ (i+10).toString(36)].addEventListener('click', typeKey.bind(domObj["key-"+ (i+10).toString(36)], (i+10).toString(36)));
	}
	
	
	return domObj;
}

function contains(target, pattern){
    let val = 0;
    for(i=0; i< pattern.length; i++)
	{
		if (target.includes(pattern[i]))
		{
			val++;
		}
	}
	console.log(val);
    return val
}


function typeKey(k){
	lettersToTest.length = 0;
	lettersToTest.push(k)
	switch(k)
	{
		case 'a':
			lettersToTest.push('á')
			break;
		case 'e':
			lettersToTest.push('é')
			break;
		case 'i':
			lettersToTest.push('í')
			break;
		case 'o':
			lettersToTest.push('ó')
			lettersToTest.push('ö')
			lettersToTest.push('ő')
			break;
		case 'u':
			lettersToTest.push('ú')
			lettersToTest.push('ü')
			lettersToTest.push('ű')
			break;
	}
	
	
	
	



			if (contains(word, lettersToTest) && contains(k, usedGoodLetters) === 0)
			{
				minusCombo=1;
				plusCombo+=1;
				usedGoodLetters.push(k);

				unHideLetters(lettersToTest);
				points += 100 * (plusCombo/2);
			}
			else
			{
				if ( contains(k, usedBadLetters) === 0){
				usedBadLetters.push(k);}
				minusCombo+=1;
				plusCombo = 1;
				health+=1;
				console.log(health)
				points -= 50 * (minusCombo/2);
			}
		

	if(health === 8)
	{
			
		
		for(el in wordHides)
		{
			wordHides[el] = true;
		}
		lostGame = true;
		setTimeout(function()
			{
				showDeathScreen();
			},3000);
	}
	if(arrayEqual(wordHides) && lostGame === false )
	{
		wonGame = true;
		setTimeout(function()
			{
				showWinScreen();
			},3000);
	}

	render();
}

function arrayEqual(arr)
{

  let i=1;
  let first = true;
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
function catchWord(multi)
{
	
	wordHides.length = 0;
	if (multi && DOM.inputBox.value !== '')
	{
		word = DOM.inputBox.value.replace(/[^ - a-z]/gi, '').toLowerCase();
	}
	else
	{
		word = dict[Math.floor(Math.random() * dict.length)];
	}
	
	
	for (var i = 0; i < word.length; i++) {
	  if (word.charAt(i) !== ' ')
	  {
		wordHides.push(false)
	  } else
	  {
		wordHides.push(true)
	  }
	}
}

function setImage(img){
	DOM.hangmanIMG.style.backgroundImage = `url(images/hangman_${img}.png)`
}

function setLetters(str){
	DOM.letters.innerHTML = '';
	for (var i = 0; i < str.length; i++) {
	  if (str.charAt(i) === ' ')
	  {
		DOM.letters.innerHTML += '</br>';
	  }
	  else
	  {
		  if(!wordHides[i])
		  {
			DOM.letters.innerHTML += `
			<div id='letterX-${i}'>
				&nbsp &nbsp &nbsp 
			</div>
			`; 
			  
		  }
		  else
		  {
			DOM.letters.innerHTML += `
			<div id='letterX-${i}'>
				${str.charAt(i)}
			</div>
			`; 
			  
		  }

	  }
	}
}

const DOM = setUpDomElements()


function render(){
	
	if(lostGame === false && wonGame === false)
	{
		setImage(health);
	}else if (lostGame === true)
	{
		setImage('lost');
	}else if (wonGame === true)
	{
		setImage('won');
	}
	setLetters(word);
	DOM.points.textContent = points + '';
	DOM.usedUpLetters.innerHTML = '';
	
	for(i=0 ; i < usedBadLetters.length; i++)
	{
		DOM.usedUpLetters.innerHTML += `
		<div id='usedLetter-${i}'>
		${usedBadLetters[i]}
		</div>
		
		`
	}

	
}

function unHideLetter(letter)
{
	for(i=0;i<word.length;i++)
	{
		
		if (word.charAt(i) === letter)
		{
			wordHides[i] = true;
		}
		
	}
	console.log(wordHides);
}


function unHideLetters(arr)
{
	for(j=0;j<arr.length;j++)
	{
		for(i=0;i<word.length;i++)
		{
			
			if (word.charAt(i) === arr[j])
			{
				wordHides[i] = true;
			}
			
		}
	}
	console.log(wordHides);
}

function unHideDifficulty()
{
	for(i=0;i<difficulty;i++)
	{
	
		wordHides[Math.floor(Math.random()*wordHides.length)] = true;
	console.log(wordHides);
	}
	
}



function startGame(){
	difficulty -= 0.1;
	usedBadLetters.length = 0;
	usedGoodLetters.length = 0;
	
	points = 0;
		lostGame = false;
	wonGame = false;
	health = 1;
	DOM.menuROOM.style.display = 'none';	//hide menu
	DOM.inputROOM.style.display = 'none';	//hide input
	DOM.deathROOM.style.display = 'none';	//hide death room
	DOM.winROOM.style.display = 'none';		//hide win room
	DOM.gameROOM.style.display = 'block';	//show game room
	catchWord(false);
	unHideDifficulty();
	render();
}


function toggleSee(){
	if (DOM.inputBox.type === 'text')
	{
		DOM.inputBox.type = 'password';
	} else if (DOM.inputBox.type === 'password')
	{
		DOM.inputBox.type = 'text';
	}
	
}

function startMulti(){
	
		usedBadLetters.length = 0;
	usedGoodLetters.length = 0;
	points = 0;
	lostGame = false;
	wonGame = false;
	health = 1;
	DOM.menuROOM.style.display = 'none';	//hide menu
	DOM.inputROOM.style.display = 'none';	//hide input
	DOM.deathROOM.style.display = 'none';	//hide death room
	DOM.winROOM.style.display = 'none';		//hide win room
	DOM.gameROOM.style.display = 'block';	//show game room
	catchWord(true)
	render();
}

function showDeathScreen(){
	
	DOM.gameROOM.style.display = 'none';	//hide game room
	DOM.deathROOM.style.display = 'block';	//show death screen
}

function showWinScreen(){
	
	DOM.gameROOM.style.display = 'none';	//hide game room
	DOM.winROOM.style.display = 'block';	//show win screen
}

function showMenuScreen(){
	DOM.deathROOM.style.display = 'none';	//hide  death screen
	DOM.winROOM.style.display = 'none';		//hide  win screen
	DOM.gameROOM.style.display = 'none';	//hide game room
	DOM.menuROOM.style.display = 'block';	//show win screen
}
function showInputScreen(){
	
		DOM.deathROOM.style.display = 'none';	//hide  death screen
	DOM.winROOM.style.display = 'none';		//hide  win screen
	DOM.gameROOM.style.display = 'none';	//hide game room
	DOM.menuROOM.style.display = 'none';	//show win screen
	DOM.inputROOM.style.display = 'block';
}


function getText(){
    var request = new XMLHttpRequest();
	let url = getRoot(window.location.href)+'dict_hun.dic';
    request.open('GET', url, true);
	request.setRequestHeader('Access-Control-Allow-Headers', '*');
    request.setRequestHeader('Access-Control-Allow-Origin', '*');
    request.send(null);
	
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            var type = request.getResponseHeader('Content-Type');
			
			dict = request.responseText.split("\n");
            return request.responseText;
				
				
            
        }
    }
}

function getRoot(url){
	let newStr = '';
	for(i=url.length;i>0;i--)
	{
		
		if(url.charAt(i) !== '/')
		{
			
			newStr = url.slice(0, i)
		}
		else
		{
			return newStr;
		}
	}
	
	
	
}

/*
document.getElementById('file').onchange = function(){

  let file = this.files[0];

  let reader = new FileReader();
  reader.onload = function(progressEvent){
    // Entire file
    console.log(this.result);

    // By lines
    let lines = this.result.split('\n');
    for(var line = 0; line < lines.length; line++){
      console.log(lines[line]);
    }
  };
  reader.readAsText(file);
};

*/
