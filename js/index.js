let currentSlide = 1
let slideNumber = 0;
let mainLang;
let sliding = false;

const language = {

	welcome : 'Helló!',
	introduce : 'Komáromi Adrián vagyok'

};

function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

$(document).ready(function(){
    
    
	getNumberOfSlidesOnPage()
	for(i=1;i<slideNumber+1;i++)
	{
		$('#slide-'+i).bind('scroll',chk_scroll);
		
		let height = $("#floatNav").height();
		
		let margins = ((100 - (4*slideNumber)) / slideNumber) / 2
		let floatNavEl = document.getElementById('floatNav')
		let slideTitle = document.getElementById("slide-"+i).getElementsByClassName("slide-title")[0].innerHTML
		//floatNavEl.innerHTML += '<div class="selectorButton" onclick="jumpToSlide('+i+')" style="margin-top: '+height*(margins/100)+'px; margin-bottom: '+height*(margins/100)+'px;"><span class="tooltiptext">'+ slideTitle +'</span></div><br>'
		floatNavEl.innerHTML += '<div class="selectorButton" onclick="jumpToSlide('+i+')"><span class="tooltiptext">'+ slideTitle +'</span></div>'

	}
	let querySlide = getParameterByName('sl')
	if(querySlide){
		jumpToSlide(querySlide)
	}
	
	
	
	
	
	
});



function getNumberOfSlidesOnPage()
{
	let i = 1;
	while(document.getElementById("slide-"+i))
	{
		if(i !== 1)
		{
		document.getElementById("slide-"+i).className='hiddenSlide'
		}

		slideNumber = i;
		i++;
	}
	
	
}

function chk_scroll(e)
{
	if (sliding === false)
		
	{
		var elem = $(e.currentTarget);
		if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) 
		{
			console.log(elem)
			elem.scrollTop;
			if (isThereANextSlide())
			{
				nextSlide();
			}
		}
		else if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight() == 0) 
		{
		
			if (isThereAPreviousSlide())
			{
				//previousSlide();
				//previousSlide();
			}
		}
	}

}

function nextSlide()
{
	
	sliding = true;
	hideSlide(currentSlide)
	currentSlide++
	showSlide(currentSlide)
	setHistory();
}

function toggleHidden(element)
{
	console.log('called' + element)
	if(document.getElementById(element).className == 'hidden')
	{
		document.getElementById(element).className = 'shown';
		
		// EXCEPTION! university
		
		if(element === 'spoildiv-university-school')
		{
			setTimeout(function(){
				document.getElementById('university-loadSpinner').style.display = 'none';
				document.getElementById('university-easter-egg').style.display = 'block';
				
				}, 3000);
			
		}
		
		
	}else
	{
		document.getElementById(element).className = 'hidden';
	}
	

}

function isThereANextSlide()
{
	if(currentSlide < slideNumber)
	{
		//alert(currentSlide + ' out of ' +  slideNumber)
		return true;
	}
	else
	{
		return false;
		alert('ran out of slides to show!' + currentSlide + ' out of ' +  slideNumber)
	}
}

function isThereAPreviousSlide()
{
	if(currentSlide > 0)
	{
		//alert(currentSlide + ' out of ' +  slideNumber)
		return true;
	}
	else
	{
		return false;
		alert('ran out of slides to show!' + currentSlide + ' out of ' +  slideNumber)
	}
}
 function setHistory(){

	 const url = new URL(window.location);
	url.searchParams.set('sl', currentSlide);
	 window.history.pushState({}, '', url);
 }

function hideSlide(s)
{
	let slide = document.getElementById("slide-"+s)

	slide.className = 'slidingUp'
	slide.addEventListener('transitionend', handleTransition.bind(slide,slide))
	
	//
}

function handleTransition(slide)
{
	if(sliding)
	{
		slide.className = 'hiddenSlide'
		slide.removeEventListener("transitionend",handleTransition.bind(slide,slide));
		sliding = false;
	}
}


function showSlide(s)
{
	let slide = document.getElementById("slide-"+s)
	slide.className = 'shownSlide'
	//slide.style.display = "block"
	//slide.scrollTop = 0;
}

function jumpToSlide(s)
{
	
	if (s !== currentSlide)
	{
		sliding = true;
	
	
		
		hideSlide(currentSlide)
		currentSlide = s
		showSlide(s)
		setHistory();
	}else
	{
		
	}

}