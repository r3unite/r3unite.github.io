


// DOM SETUP

function setupDOM(){
	
	
	
	domObj = {
		
	cesarEl : document.getElementById('input-cesar'),
	plainTextEl : document.getElementById('input-plainText'),
	shiftEl : document.getElementById('input-shift')
	
	};
	
	
	domObj.cesarEl.addEventListener("change", function()
	{
		importFromDOM();
		decipher();
		
	});
	domObj.plainTextEl.addEventListener("change", function()
	{
		importFromDOM();
		cipher();
	});
	domObj.shiftEl.addEventListener("change", function()
	{
		importFromDOM();
		
		switch(lastOperation)
		{
			case 'cipher':
				cipher();
				break;
			case 'decipher':
				decipher();
				break;
		}
	});
	
	return domObj;
	
}

DOM = setupDOM();

// render()

function render(){
	outputToDOM();
}



// init variables

let cesar = '';
let text = 'exampleText'
let shift = 1; 
let lastOperation = ''


// worklflow

function decipher(){
	
let upperCase = cesar.toUpperCase();		
	text = '';
	for( i = 0; i < cesar.length; i++)
	{
		//String.fromCharCode(arr[i].charCodeAt(0))
		if(cesar.charAt(i)!==' ')
		{
			if(isUpperCase(cesar.charAt(i))==false)
			{
				text += String.fromCharCode(wrapToAlphabet(upperCase.charCodeAt(i)-shift)).toLowerCase();
			}else
			{
				text += String.fromCharCode(wrapToAlphabet(upperCase.charCodeAt(i)-shift));
			}
		} else
		{
			text += ' ';
		}
	}
	lastOperation = 'decipher'
	render();

}

function cipher(){
	
let upperCase = text.toUpperCase();	
	cesar = '';
	for( i = 0; i < text.length; i++)
	{
		
	
		//String.fromCharCode(arr[i].charCodeAt(0))
		if(text.charAt(i)!==' ')
		{
			if(isUpperCase(text.charAt(i))==false)
			{
				cesar += String.fromCharCode(wrapToAlphabet(upperCase.charCodeAt(i)+shift)).toLowerCase();
			}else
			{
				
				cesar += String.fromCharCode(wrapToAlphabet(upperCase.charCodeAt(i)+shift));
			}
		} else
		{
			cesar += ' ';
		}
		
	}
	lastOperation = 'cipher'
	render();
}

function importFromDOM(){
	text = DOM.plainTextEl.value;
	cesar = DOM.cesarEl.value;
	shift = parseInt(DOM.shiftEl.value);
}

function outputToDOM(){
	DOM.plainTextEl.value = text;
	DOM.cesarEl.value = cesar;
	DOM.shiftEl.value = shift;
}
cipher();
decipher();


function wrapToAlphabet(num)
{
	
	while(num > 90)
	{
		num -= 26;
	}
	while(num < 65)
	{
		num += 26;
	}
	
	return num;
	
	
}
function isUpperCase(ch) {
   if (!isNaN(ch * 1)){
      return false;
   }
    else {
      if (ch == ch.toUpperCase()) {
         return true;
      }
      if (ch == ch.toLowerCase()){
         return false;
      }
   }
}
