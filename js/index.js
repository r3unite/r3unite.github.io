let currentSlide = 1
let slideNumber = 0;
let mainLang;


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
		floatNavEl.innerHTML += '<div class="selectorButton" onclick="jumpToSlide('+i+')" style="margin-top: '+height*(margins/100)+'px; margin-bottom: '+height*(margins/100)+'px;"><span class="tooltiptext">'+ slideTitle +'</span></div><br>'

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
		console.log('found:'+i);
		slideNumber = i;
		i++;
	}
	
	
}

function chk_scroll(e)
{
    var elem = $(e.currentTarget);
    if (elem[0].scrollHeight - elem.scrollTop() == elem.outerHeight()) 
    {
        console.log("bottom");
		//nextSlide();
    }

}

function nextSlide()
{
	hideSlide(currentSlide)
	currentSlide++
	showSlide(currentSlide)
}

function hideSlide(s)
{
	let slide = document.getElementById("slide-"+s)
	slide.style.display = "none"
}

function showSlide(s)
{
	let slide = document.getElementById("slide-"+s)
	slide.style.display = "block"
	//slide.scrollTop = 0;
}

function jumpToSlide(s)
{
	if (s !== currentSlide)
	{
		hideSlide(currentSlide)
		currentSlide = s
		showSlide(s)
	}else
	{
		alert('niga u alredy on this slide');
	}
}