//start time: 22:05 2021.08.24. --- 10:25 2021.08.25.
// JAVASCRIPT CALCULATOR!



//bugs: doing multiple operations instead of hitting equals creates a saveNumber() loop!!!
//bugs: clearing value is buggy.


let number1;
let number2;
let operation;

let displayValue = "0";
let buttonsArray = [];
let inputEl
function setUpDomElements(){
	inputEl = document.getElementById('inp-display');
	for(i = 0; i < 10; i++)
	{
		buttonsArray.push(btnEl(i,addNumber.bind(event,i)));
	}

	buttonsArray = [
	...buttonsArray,
	btnEl('plus',doPlus),
	btnEl('minus',doMinus),
	btnEl('multiply',doMultiply),
	btnEl('divide',doDivide),
	btnEl('c',doClear),
	btnEl('ac',doReset),
	btnEl('backspace',doDelete),
	btnEl('equals',doEquals),
	btnEl('negate',doNegate),
	btnEl('comma',addComma)]

	function btnEl(str, evList)
	{
		let el = document.getElementById('btn-'+str,evList);
		el.addEventListener("click", evList);
		return el;
		
	}

}





function doPlus()
{
	console.log('donePlus');
	operation = 'plus';
	saveNumber();
}
function doMinus()
{
	console.log('doneMinus');
		operation = 'minus';
	saveNumber();
}
function doMultiply()
{
	console.log('multiply');
			operation = 'multiply';
	saveNumber();
}
function doDivide()
{
	console.log('divide');
			operation = 'divide';
	saveNumber();
}
function doClear()
{
	displayValue = '0';
	renderNumbers();
	
}



function doReset()
{
	displayValue = '0';
	number1 = undefined;
	number2 = undefined;
	operation = undefined;
	renderNumbers();
}
function doDelete()
{
	displayValue = displayValue.substring(0, displayValue.length - 1)
	renderNumbers();
	console.log('backspace');
}
function doNegate()
{
	console.log('negate');
	
	if (displayValue.includes('-')) { displayValue = displayValue.replace('-', ''); } else { displayValue = '-' + displayValue;}
	renderNumbers();
	
}
function doEquals()
{
	console.log('Equals');
	saveNumber();
	if(operation === 'plus')
	{
		let result = number1 + number2;
		displayValue = result + '';
		displayValue = displayValue.replace('.',',');
		
	} else if (operation === 'minus')
	{
		let result = number1 - number2;
		displayValue = result + '';
		displayValue = displayValue.replace('.',',');
		
	} 
	if(operation === 'divide')
	{
		let result = number1 / number2;
		displayValue = result + '';
		displayValue = displayValue.replace('.',',');
		
	} else if (operation === 'multiply')
	{
		let result = number1 * number2;
		displayValue = result + '';
		displayValue = displayValue.replace('.',',');
		
	}	

	operation = undefined;
	number1 = undefined;
	number2 = undefined;
	renderNumbers();	
	
}
function addComma()
{
	console.log('comma');
	if (displayValue.includes(',') === false)
	{
		displayValue += ',';
	}
	renderNumbers();
}
function addNumber(num)
{
	console.log('number:' + num);
	
	if(displayValue === "0")
	{
		displayValue = ''+num;
	}
	else
	{
		displayValue += num;
	}
	renderNumbers();
}

setUpDomElements();
renderNumbers();
function renderNumbers()
{
	inputEl.value = displayValue;
}

function saveNumber()
{
	if (number1 === undefined)
	{
		number1 = parseFloat(displayValue.replace(',','.'));
	}else if (number2 === undefined)
	{
		number2 = parseFloat(displayValue.replace(',','.'));
	}else
	{
		if(operation === 'plus'){
		number1 = number1 + number2;
		}
		else if(operation === 'minus'){
		number1 = number1 - number2;
		}
		else if(operation === 'multiply'){
		number1 = number1 * number2;
		}
		else if(operation === 'divide'){
		number1 = number1 / number2;
		}
		number2 = undefined;
		renderNumbers();
	}
	displayValue = "0";
}