<!--  R3UNITE -->
<?php
	session_start();

	if (isset($_GET['id']))
	{
	$articleNameID = $_GET['id'];
	
	include 'requirements.php';
			
	$articleData = importArticleData($articleNameID);
	}
	else
	{
		header('location: category.php');
	}
	
	
	if ($articleData['discount']> 99 || $articleData['discount']< 0)
		{
			header('location: category.php');
		
		}
	
	
?>
<!DOCTYPE html> 
<html> 
 <head> 
  <title> UNIKUS - Tervező </title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="pragma" content="no-cache"/>
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<link rel="stylesheet" href="mainElements/scripts/alertify.css">

<script>

var toggleSideBar = false;

function styleActivePage() {
	
	
	var path = window.location.pathname;
	var page = path.split("/").pop();
	
	if (page == "contactus.php")
	{
		var element = document.getElementById("contactButton");
		element.classList.add("active");
	}
	else if (page == "article.html" || page == "articles.html")
	{
		var element = document.getElementById("articlesButton");
		element.classList.add("active");	
	}
	else if (page == "index.php")
	{
		var element = document.getElementById("homeButton");
		element.classList.add("active");	
	};

}
</script>
<a href="#" id="floatingButton" class="float" onclick="toggleNav();">&#10145;
<i class="fa fa-plus my-float"></i>
</a>

<div id="mySidenav" class="sidenav">
  <hr/>
  <img src="mainElements/hangerLogo.png" onclick="closeNav()"></img>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
   <a href="login.php"> <img class="icon" src="mainElements\icons\login-white.svg"></img> 
   
   			   				<?php
		

				if(isset($_SESSION["loggedin"])){
				echo '<span style="color: #7dff86;">',strtok($_SESSION["username"],'@'),'</span>';					
				}else
				{
				echo 'Bejelentkezés';	
				}

				
				?>
   
   
   </a>
   <a href="register.php"> <img class="icon" src="mainElements\icons\register-white.svg"></img> Regisztráció</a>
   <a href="#"> <img class="icon" src="mainElements\icons\cart-white.svg"></img> Kosár</a>
   <?php

	if(isset($_SESSION["loggedin"])){
	echo '<a href="logout.php"> <img class="icon" src="mainElements\icons\logout-white.svg"></img> Kijelentkezés</a>';		
	}
	?>
  <hr/>
  <a href="index.php"> <img class="icon" src="mainElements\icons\home-white.svg"></img> Főoldal</a>
  <a href="#"> <img class="icon" src="mainElements\icons\product-white.svg"></img> Termékeink</a>
  <a href="#"> <img class="icon" src="mainElements\icons\search-white.svg"></img> Keresés</a>
  <a href="#"> <img class="icon" src="mainElements\icons\category-white.svg"></img> Kategóriák</a>
  <a href="#"> <img class="icon" src="mainElements\icons\star-white.svg"></img> Új!</a>  
  <a href="#"> <img class="icon" src="mainElements\icons\star-white.svg"></img> Népszerű</a>
  <a href="#"> <img class="icon" src="mainElements\icons\discount-white.svg"></img> Akciós</a>    
  <hr/>  
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> GYIK</a>  
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> ÁSZF</a>  
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> Szállítás</a> 
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> Adatvédelem</a> 
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> Visszatérítés</a>   
  <hr/ style="height:50%;">

</div>

 
 
<div id="navbar">
  <a id="moreButton" style="font-size:30px;cursor:pointer" onclick="toggleNav();">&#9776;</a>
  
  <a id="homeButton" href="index.php">Főoldal</a>
  <a id="articlesButton" href="javascript:void(0)">Termékeink</a>
  <a id="contactButton" href="contactus.php">Kapcsolat</a>
    <div class="img-container"> <!-- Block parent element -->
		<img class="logo" src="mainElements/hangerLogo.png" alt="unikus" >
    </div>
	<div class=  "search-container">
				   <a href="#" class="tooltip"> 
				   <img class="icon" src="mainElements\icons\cart-white.svg"></img><span class="tooltiptext">Kosár</span></a>
			   <a href="login.php" class="tooltip"> <img class="icon" src="mainElements\icons\login-white.svg"></img><span class="tooltiptext">
			   
			   				<?php
		

				if(isset($_SESSION["loggedin"])){
				echo '<span style="color: #7dff86;">',$_SESSION["username"],'</span>';					
				}else
				{
				echo 'Bejelentkezés';	
				}

				
				?>
			   </span></a>
   <a href="register.php" class="tooltip"> <img class="icon" src="mainElements\icons\register-white.svg"></img><span class="tooltiptext">Regisztráció</span></a>
   <?php

	if(isset($_SESSION["loggedin"])){
	echo ' <a href="logout.php" class="tooltip"> <img class="icon" src="mainElements\icons\logout-white.svg"></img><span class="tooltiptext">Kijelentkezés</span></a>';		
	}
	?>
		<input type="search" id="search" name="search" placeholder="Mi érdekel?"> 

    </div>	
	
</div>





<script> styleActivePage(); </script>


  </head> 
 <body>
 



 
<div class ="wspContainer">
	<div class ="titleWhitespace">
		<p><strong> <?php echo $articleData['article_name'] ?></strong></p>
	</div>
</div>


<style>
.tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  font-family: archia;
  font-size: 15px;
  padding: 0;
}

.tags li {
  float: left; 
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 18px;
  line-height: 18px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
}

.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {

  border-bottom: 9px solid transparent;
  border-left: 10px solid #eee;
  border-top: 9px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  background-color: crimson;
  color: white;
}

.tag:hover::after {
   border-left-color: crimson; 
}
.side-right {
	    display: table-cell;
	float: right;
  line-height: normal;
    line-height:40px;
	vertical-align: middle;
}

.side-left {
	    display: table-cell;
	float: left;
  line-height: normal;
	vertical-align: middle;
}


.Prices{
	padding: 8px;
	width: 100%;
	color: #9c691d;
	text-shadow: 2px 2px #fffffe;
	font-face: bold;
	margin-top: 10px;
	border-radius: 16px;
	display: block;
background: rgb(255,245,155);
background: radial-gradient(circle, rgba(255,245,155,1) 0%, rgba(249,200,73,1) 39%, rgba(156,105,29,1) 100%);
	
}

.photos {
  text-align: center;
  background-color: #333;

  width: 100%;
  display: inline-block;
}

.photos .mainThumbnail{
	cursor: pointer;
margin-top: 10px;
border-radius: 8px;
width: 65%;

  display: inline-block;
}
.photos .sideThumbnail{
	cursor: pointer;
	border-radius: 8px;
width: 20%;
  opacity: 0.7;
  display: inline-block;
  transition:  1s;
}
.photos .sideThumbnail:hover{
	border-radius: 0px;
  opacity: 1;

}


:not(#navbar):not(a) {box-sizing: border-box;}
.mySlides {display: none;}
.slideshow-container img {vertical-align: middle;  box-sizing: border-box;}

/* Slideshow container */
.slideshow-container {
  width: 100%;
  position: relative;
  margin: 0px;
  display: block;

}

/* Caption text */
.slideshow-container .text {
  color: #000000;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;

  width: 100%;
  
}

.slideshow-container a {
  color: black;
  text-decoration: none;
  text-shadow: none;
    background-color: #ffffff;
	padding: 8px;
}

.slideshow-container:hover a {
  color: white;
  text-decoration: none;
  text-shadow: none;
    background-color: orange;
	padding: 16px;
}

/* Number text (1/3 etc) */
.slideshow-container .numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.slideshow-container .dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.slideshow-container .active {
  background-color: #717171;
}

/* Fading animation */
.slideshow-container .fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */

hr {
    display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1px ;
    padding: 0;
}

.btn {
  background: #e8c900;
  background-image: -webkit-linear-gradient(top, #e8c900, #a88900);
  background-image: -moz-linear-gradient(top, #e8c900, #a88900);
  background-image: -ms-linear-gradient(top, #e8c900, #a88900);
  background-image: -o-linear-gradient(top, #e8c900, #a88900);
  background-image: linear-gradient(to bottom, #e8c900, #a88900);
  -webkit-border-radius: 16;
  -moz-border-radius: 16;
  border-radius: 16px;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 10px 10px 10px;
  margin-bottom: 10px;
  border: solid #8f7700 1px;
  text-decoration: none;
  font-family: archia;
  
}

.btn:hover {
  background: #ffdd45;
  background-image: -webkit-linear-gradient(top, #ffdd45, #c7a600);
  background-image: -moz-linear-gradient(top, #ffdd45, #c7a600);
  background-image: -ms-linear-gradient(top, #ffdd45, #c7a600);
  background-image: -o-linear-gradient(top, #ffdd45, #c7a600);
  background-image: linear-gradient(to bottom, #ffdd45, #c7a600);
  text-decoration: none;
}


body {
  margin: 0;
  font-size: 28px;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url('mainElements/pattern.svg');
 
  
}

.header {

  padding: 30px;
  text-align: center;

}

.tooltip {
  position: relative;
  display: inline-block;

}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  width: min-content;
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 50%;
  margin-left: -60px;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}



.img-comp-container {
  position: relative;
  height: 500px; /*should be the same height as the images*/
  left: 20%;

}

.img-comp-img {
  position: absolute;
  width: auto;
  height: auto;
  overflow:hidden;
}

.img-comp-img img {
  display:block;
  vertical-align:middle;
}

.img-comp-slider {
  position: absolute;
  z-index:9;
  cursor: ew-resize;
  /*set the appearance of the slider:*/
  width: 40px;
  height: 40px;
  background-color: #2196F3;
  opacity: 0.7;
  border-radius: 50%;
}

#articleAd {
background: radial-gradient(circle, rgba(224,205,112,1) 0%, rgba(221,198,89,1) 47%, rgba(199,178,79,1) 81%);

  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 1px 2px;
  width: 100%;
  height: 300px;
  border-radius: 8px;  
  display: inline-block;
  transition: background 0.6s;
	-webkit-box-shadow: 0 10px 6px -6px black;
	   -moz-box-shadow: 0 10px 6px -6px black;
	        box-shadow: 0 10px 6px -6px black;
  transition: height 0.4s;
  margin-top: 20px;
  

}
#articleAd:hover {

	height: 320px;

}


#articleAd img {
 width: 85%;
  height: 75%;
  border-radius: 8px; 
margin-top: 20px;  
}
#articleAd p{
 width: 95%;
 text-shadow: 2px 2px #a8860c;


margin-top: 2px;  
}
#articleAd a{

  background: #575757;
  background-image: -webkit-linear-gradient(top, #575757, #333);
  background-image: -moz-linear-gradient(top, #575757, #333);
  background-image: -ms-linear-gradient(top, #575757, #333);
  background-image: -o-linear-gradient(top, #575757, #333);
  background-image: linear-gradient(to bottom, #575757, #333);
  -webkit-border-radius: 28;
  -moz-border-radius: 28;
  border-radius: 28px;
  -webkit-box-shadow: 0px 3px 6px black;
  -moz-box-shadow: 0px 3px 6px black;
  box-shadow: 0px 3px 6px black;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
 
}

#articleAd a:hover{

  background: #ebd15b;
  background-image: -webkit-linear-gradient(top, #ebd15b, #ab973f);
  background-image: -moz-linear-gradient(top, #ebd15b, #ab973f);
  background-image: -ms-linear-gradient(top, #ebd15b, #ab973f);
  background-image: -o-linear-gradient(top, #ebd15b, #ab973f);
  background-image: linear-gradient(to bottom, #ebd15b, #ab973f);
  text-decoration: none;  
  color: black;
  }

.titleWhitespace {
  padding: 30px 0px 0px;
  margin-top: 50px;
  text-align: center;
  vertical-align: middle;
  font-size: 52px; 
  font-family: archia;  
  text-shadow: 2px 2px #a8860c;
  max-width: 100%;
  display: block;

}

#box_main {

   background-image: url('mainElements/asdasdasd.svg');
  background-size: 300px 300px;
  border-radius: 16px;  
  border-color: #DDC659;
  border-width: 3px;
  border-style: solid;
  transition: border-width 0.3s;
  transition: background-size 0.3s;
  transition: background-position 1s ease-in-out;
  padding: 5px 5px 5px 5px;



}
#div_sizes
{
	width: 100%;
	display: table-cell;
	 vertical-align: middle;
}
#div_sides
{
	width: 100%;
	display: table-cell;
	 vertical-align: middle;
}
#div_nfc
{
	width: 100%;
	display: table-cell;
	 vertical-align: middle;
}
#div_indicator
{
	width: 100%;
	display: block;
	 vertical-align: middle;
	 text-align: center;
	 
}
#div_tags
{
	width:100%
}

#div_submits
{
	width:100%
		display: block;
	 vertical-align: middle;
	 text-align: center;
	 padding: 16px;
}

#box_main:hover{
  border-width: 5px;
    background-size: 350px 350px;
  background-position: -50px; 
}


.cookie-alert {
  position: fixed;
  bottom: 15px;
  right: 15px;
  width: 320px;
  margin: 0 !important;
  z-index: 999;
  opacity: 0;
  transform: translateY(100%);
  transition: all 500ms ease-out;
}

.cookie-alert.show {
  opacity: 1;
  transform: translateY(0%);
  transition-delay: 1000ms;
}


.card-body {
  background :#333;
  opacity: 1;
  border-radius: 4px;
  transform: translateY(0%);
  transition-delay: 1000ms;
}


.footer {
  background-color: #333;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 16px;
  

  height: 100%;
}

.footer a{
color: white;
font-family: archia;
font-size: 18px;
}

.footer p:not([class="card-text"]){
color: white;
font-family: archia;
font-size: 18px;
}
.card-text{
  color: #e0e0e0;
  opacity: 1;
  transform: translateY(0%);
  transition-delay: 1000ms;
  text-align: left;
  padding: 2px 5px;
  font-size: 16px;
  font-family: archia;
}
.card-title{
  color: #e0e0e0;
  font-family:archia;
  font-size:16px;
  opacity: 1;
  transform: translateY(0%);
  transition-delay: 1000ms;
}


.footer .btn-link{
	color: #000000;
	display:block;
	}

.footer .btn-primary{
	color: #000000;
	display:block;
    margin-bottom: 10%;
 
	}
.track {
  background-color: #333;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 1px 16px 5px ;
  width: 100%;
  border-radius: 4px;  
  white-space: nowrap;
  box-shadow: 2px 2px 10px #1a1a1a;
    height: 270px;

}

#trackList {
	align-self: center;
	  overflow-x: auto;
  text-align: right;
  font-size: 12px;  
  white-space: nowrap;
  vertical-align: right;
  
  display:block;


}



#trackList::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #666665;
	
}

#trackList::-webkit-scrollbar
{
	width: 12px;

}

#trackList::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color:#DDC659;
}


#trackCol {
  background: rgb(246,231,158);
  background: radial-gradient(circle, rgba(246,231,158,1) 0%, rgba(221,198,89,1) 63%, rgba(153,137,62,1) 100%);
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 1px 2px;
  width: 130px;
  height: 175px;
  border-radius: 4px;  
  display: inline-block;
  transition: background 0.6s;
  transition: width 0.3s;

  
}

#trackCol img
{
 width: 85%;
  height: 75%;
  border-radius: 8px; 
margin-top: 5px; 

}



#trackCol:hover {
  background: rgb(246,231,158);
  background: radial-gradient(circle, rgba(246,231,158,1) 38%, rgba(221,198,89,1) 78%, rgba(138,125,59,1) 100%);
  width: 170px;
}
#trackCol a
{
font-family: archia;
 color: rgb(255, 140, 0);
   text-decoration: none;

}
#trackCol p
{
font-family: archia;
 width: 95%;
 text-align: center;
 font-size: 12px;
  white-space: normal;
  margin-top: 0px;
 text-shadow: 2px 2px #a8860c;
 max-height:30px;
 height:30px;
  overflow: hidden;
 color: white;
 

}

#trackTitle {
  color: #ccc;
  text-align: center;
  font-size: 12px;
  display:block;
}

#navbar {
  overflow: hidden;
  background-color: #333;
  border-radius: 8px;
vertical-align:middle;
box-shadow: 2px 2px 3px #1a1a1a;
height:65px;
transition: margin-left .5s;
white-space: nowrap;
width:100%;
padding: 20px 0px 0px;
top: -20px;
  z-index: 10;

}

#navbar a:not([id="moreButton"]) {
  float: top;
  display:inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 12px 16px;
  text-decoration: none;
  font-size: 17px;
  height: 41px;
}
.icon {
  float: top;
  display:inline-block;
  text-align: center;
  text-decoration: none;
  height: 15px;
  
}
#moreButton
{
  float: top;
  display:inline-block;
  color: #f2f2f2;
  text-align: center;
  padding: 12px 16px;
  text-decoration: none;
  font-size: 17px;
  height: 41px;	
}


#navbar a:hover {
  background-color: #ddd;
  color: black;


}

#navbar a.active {
  background-color: #DDC659;
  color: black;
}

input[type=search] {
  width: 200px;
  float:right;
  box-sizing: border-box;
  border: 2px solid #DDC659;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('mainElements/searchicon.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 6px 20px 6px 10px; 
  transition: width 0.4s ease-in-out;
  margin-right: 20px;
      
}
input[type=search]:focus {
  padding: 6px 20px 6px 40px;
  border-radius: 2px;
  width: 100%;
}
#navbar .img-container {
  float: center;
	text-align: center;
  display:inline-block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;

}

#navbar .search-container {

  right: 20px;
  float: right;
  	text-align: right;
   display:inline-block;
position:fixed;


}
#navbar .logo{
max-width: 300px;
max-height: 300px;
text-align: center;

}



.content {
  padding: 16px;
}

.sticky {
  position: fixed;
  top: -20px;
  width: 100%;
}

.sticky + .content {
  padding-top: 60px;
}




@font-face {
   font-family: archia;
   src: url(mainElements/fonts/Archia/archia-regular-webfont.woff);
}

.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

.button:hover {
  background-color: #45a049;
}


}


input[type=text] {
  width: 75%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #DDC659;
  -webkit-transition: 0.5s;
  transition: 0.45s;
  outline: none;
  border-radius: 8px;
  
  text-align: left;
  display: block;
  margin-left: auto;
  margin-right: auto;
}
textarea {
  width: 75%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 3px solid #DDC659;
  -webkit-transition: 0.5s;
  transition: 0.45s;
  outline: none;
  border-radius: 8px;
  
  text-align: left;
  display: block;
  margin-left: auto;
  margin-right: auto;
   height: 47px;
   resize: none;
}
input[type=text]:focus {
  border: 3px solid #555;
  border-radius: 0px;
}
textarea:focus {
  border: 3px solid #555;
  border-radius: 0px;
  height: 150px;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #3d3d3d;
  overflow-x: hidden;
    overflow-y: auto;
  transition: 0.5s;
  padding-top: 60px;
  margin-top: 65px;
}

.sidenav a {
  padding: 8px 8px 8px 8px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;

  display: block;
  transition: 0.3s;
}
.sidenav img:not([class="icon"]) {
  position: absolute;
  top: 15px;
  right: 60px;
  font-size: 36px;
  margin-left: 50px;
  width:70%
}
.sidenav a:hover {
  color: #0f0f0f;
  background-color: #d1bf69;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 5px;
  font-size: 36px;
  margin-left: 50px;
}

#entireCanvas {
	white-space: nowrap;
    display: block;
	max-width: 95%

	

}

#main {
  transition: margin-left .5s;
  padding: 16px;
  margin-left: 200 px;
  
  display: inline-block;
  text-align: center;
	vertical-align:middle;
}
#main p.titleText{
  white-space: normal;
  font-family: archia;
  font-size: 53px;
    text-align: center;
}

#main p.textText{
  white-space: normal;
  font-family: archia ;
  font-size: 23px;
    text-align: left;
}
#main p.leftSideTitle{
  white-space: normal;
  font-family: archia ;
  font-size: 23px;
    text-align: left;
}
#main p.rightSideLinks{
  white-space: normal;
  font-family: archia ;
  font-size: 23px;
    text-align: right;
}


#main label{
   font-family: archia;

}

#leftSide {
  transition: margin-left .5s;
  padding: 16px;

  text-align: middle;
  display: inline-block;
  vertical-align:top;
  white-space: normal;
  

  
}
#leftSide p {
   font-family: archia;
   font-size: 15px;
}
#leftSide label {
   font-family: archia;
      font-size: 15px;
}


.float{
	position:fixed;
	width:60px;
	height:60px;
	left:20px;
	top: 50%;
	background-color:#DDC659;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
	transition: 0.4s;
	opacity: 0.25;

}




.float:hover{
	opacity: 1;
}

.my-float{
	margin-top:22px;
}



.col-1 {width: 100%;}
.col-2 {width: 20%;}
.col-3 {width: 70%;}

.adImageContainer {
  max-height: 400px; /* [1.1] Set it as per your need */
  overflow: hidden; /* [1.2] Hide the overflowing of child elements */

}
.adImageContainer img {
  transition: transform .3s ease;

}
.adImageContainer:hover img {
  transform: scale(1.1);
  filter: brightness(110%);

}

@media only screen and (max-width: 768px) 
{
	.slideshow-container {margin-top: 60px;}
	.slideshow-container img{  object-fit: cover;
  width:230px;
  height:230px;}
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  .sidenav {margin-top: 120px;}
  .sidenav img:not([class="icon"]) { display: none;}
  .img-comp-container{display:none;}
  
  #main p.titleText
  {
    font-size: fit-width;
  }
  
  
  #navbar 
  {
  height: 120px;
  white-space: normal;
  text-align: center;
  width: 100%;



  }
  
  [class*="col-"] 
  {
    width: 95%;
	display:block;
    margin-left: 0 px;
	
  }
	.search-container 
	{

	top: 120px;

	text-align: center;
	display:block;

	}
	#navbar a:not([id="moreButton"]) {

		display: none;

	}
	#navbar .img-container 
	{



	text-align: center;
	display:block;
	width: 100%;


	}

	#entireCanvas 
	{
		width: 100%;
		white-space: normal;
		align: center;
	}
	
	#leftSide 
	{
		width: fit-content;
		white-space: normal;
		align: center;
	}
		
	

	#articleAd 
	{  
		height: 450px;

	}
	#articleAd:hover 
	{

		height: 480px;

	}

}



</style>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="mainElements\scripts\alertify.js"></script>
<script>





</script>


<?php

						if(isset($_SESSION["loggedin"]) && (isset($_GET['signout']))) {
							if (htmlspecialchars($_GET["signin"]) == "success")
							{
																echo '
							<script type="text/javascript">

								
								alertify.success("'. 'Bejelentkeztél, '. strtok($_SESSION["username"],'@') .'");
								
									</script>
								';
							}								
						
						}
							if(isset($_GET['signout']))
							{
							if(htmlspecialchars($_GET["signout"]) == "success")
							{
								echo '
							<script type="text/javascript">alertify.success("Kijelentkeztél!");
							</script>';
							}
							}
						 


	
?>

<script>



window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop ;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}


function openNav() {
		document.getElementById("mySidenav").style.width = "250px";

		if ($(window).width() > 768) {
				document.getElementById("main").style.marginLeft = "125px";
		}

		document.getElementById("floatingButton").style.marginLeft = "250px";   
   		var element = document.getElementById("moreButton");
		element.classList.add("active");
		toggleSideBar = true;
}

function closeNav() {
		document.getElementById("mySidenav").style.width = "0";
		document.getElementById("main").style.marginLeft= "0px";
		document.getElementById("navbar").style.marginLeft = "0";
		document.getElementById("floatingButton").style.marginLeft = "0px";  
		var element = document.getElementById("moreButton");
		element.classList.remove("active");
		toggleSideBar = false;
}
function toggleNav() {

	if (toggleSideBar == false)
	{
	openNav()
	}else
	{
	closeNav()
	}
}

</script>



<div id="entireCanvas"> 


	<div id="leftSide" class="col-2">
		<?php	
		for ($x = 0; $x <= 3; $x++) {
			echo '	<div  href="article.php?" id="articleAd">';
			echo '		<div  href="article.php?" class="adImageContainer">';
			echo '			<img href="article.php?" src="',$locString,'\thumb_1.png"></img>';
			echo '		</div>';
			echo '			<p>',$articleData["article_name"],'</p>';
			echo '			<a href="article.php?',$articleNameID,'">Megnézem</a>';
			echo '	</div>';
			echo '  ';
		}
		?>	
	</div>

	<div id="main" class="col-3">
		<div id="box_main">

				

			<div class="photos"  style="display: inline-block; height: fit-content; position: relative;">
			<?php 
			
			if ($articleData['discount']> 0)
			{echo '<div id="label-container" style="  position: relative; text-align: center; color: white;">';
				echo '<img src="data/discount-label.png" style="width: 200px; height: 200px;  display: block; margin-top: -50px; margin-right: -50px;position:absolute; float:right; right: 0;">';
				echo '<div style = "display: block;  position:absolute; float:right; right: 10px; top: 10px; font-size: 50px; transform: rotate(+35deg);">'. $articleData['discount'] . '%' .'</div>';
			echo '</div>';
			}
			
			?> 
				
				
				<?php
				$thumbnailFilename = 'data\articles\art_'.$articleNameID.'\thumb_'.$articleData['size_1_path'].'_1.png';
				if (file_exists($thumbnailFilename))
				{
					echo '<a href="#" id="mainThumbnailLink"><img class="mainThumbnail" id="mainThumbnail" src="data\articles\art_'.$articleNameID.'\thumb_'.$articleData['size_1_path'].'_1.png"></a>';
				}
				
				echo '<div class="sidePhotos">';
				
				
				$i = 2;
				$thumbnailFilenameI = 'data\articles\art_'.$articleNameID.'\thumb_'.$articleData['size_1_path'].'_'.$i.'.png';
				while(file_exists($thumbnailFilenameI))
				{
					echo '<img class="sideThumbnail" id="sideThumbnail'.$i-1 .'" src="'.$thumbnailFilenameI.'"  >
					';
					$i++;
					$thumbnailFilenameI = 'data\articles\art_'.$articleNameID.'\thumb_'.$articleData['size_1_path'].'_'.$i.'.png';
					
				}
				echo '</div>';

				?>
				
				
				
				
				<script>

					var imMain = document.getElementById('mainThumbnail');
					document.getElementById('mainThumbnailLink').setAttribute('href', imMain.src);

					var numOfSideThumbs = document.querySelectorAll('.sideThumbnail').length
					
					for(i=1;i<numOfSideThumbs+1;i++)
					{
						document.getElementById('sideThumbnail'+i).setAttribute('onclick', "changeImage(document.getElementById('sideThumbnail" +  i + "'), document.getElementById('mainThumbnail'))");
						
					}
				
					function changeImage(img, destination) 
					{
						var srcSource = img.src;
						var srcDestination = destination.src;
						destination.src = srcSource; 
						img.src = srcDestination;

						document.getElementById('mainThumbnailLink').setAttribute('href', srcSource); ;
					}				

				</script>
			</div></br>
			
			<div class="Prices" style="display: inline-block;">
			
			<?php 
			
			if ($articleData['discount']> 0)
			{
				echo '<label style="text-decoration: line-through; font-size: 17px; color: #a87f32; ">'.$articleData['price'].' Ft'.'</label> </br>';
				$priceToShow = '<label size="font-size: 17px;">'.($articleData['price']- (($articleData['discount']/100)*$articleData['price']))." Ft <sup style='font-size: 14px;'>(-".$articleData['discount'].'%)</sup></label>';
				echo $priceToShow;
			
			}
			else
			{
				$priceToShow = $articleData['price']." Ft";
				echo $priceToShow; 
			}
			?> </br>
			
			</div><br>
			
			
			<div class="Description"  style="display: inline-block;">

			
			<?php echo $articleData['article_description']; ?> </br>
			<?php echo $articleData['types_noun']; ?> : <?php echo $articleData['type_noun'];?> </br>
			</div></br>
					
			<div id="div_sizes"  style="display: block; height: fit-content;">
				<div class="side-left">
					<label >Válassz egy méretet:</label>
				</div>
				
				<div class="side-right">
					<select name="sizes" id="sizes" >
					<?php 
						
						for($i=1;$i<$articleData['sizeNumber']+1;$i++)
						{
							echo '<option id="'.$i.'" value="'.$articleData['size_'. $i.'_path'].'">'. $articleData['size_'. $i.'_noun'] . '</option>';
						}
						
						?>
					</select>
				</div>
				
				</br>
				

			</div> </br>
			<div id="div_indicator" >
				<img style="display: inline-block; width: 215px; height: 215px; border-radius: 16px;" id="sizeIndicator"></img>
			
				
				<script> 
					
					var img = document.getElementById("sizeIndicator");
					var e = document.getElementById("sizes");
					function showImage(){
					  var strUser = e.options[e.selectedIndex].id;
					  console.log(strUser);
					  var queryArticleID = "<?php echo $_GET['id']; ?>";
					  img.src = "data\\articles\\art_"+queryArticleID+"\\sizeIndicator_" + strUser +".png";
					}
					e.onchange=showImage;
					showImage();
					
				</script> 
			</div>
			<div id="div_sides"  style="display: inline-block; height: fit-content;">
			 
				<div class="side-left">
					<label for="sides">Hány oldalat szeretnél személyreszabni:</label>
				</div>
				<div class="side-right">
					<select name="sides" id="sides">	

						<?php
							
							for($i=1;$i<$articleData['sideNumber']+1;$i++)
							{
								echo '<option value="'.'size_'.$i.'">'.$i.' oldalra('. $articleData['side_'. $i.'_noun'] . ')</option>';
							}
							
							?>
					
					</select>	
				</div>						
			</div> </br>
			<div id="div_sideIndicator" >
				<img src="data\articles\art_woodKeychainBrick\sideIndicator_1.png"style="display: inline-block; width: 150px; height: 150px; border-radius: 16px;" id="sizeIndicator"></img>
			<img src="data\articles\art_woodKeychainBrick\sideIndicator_2.png"style="display: inline-block; width: 150px; height: 150px; border-radius: 16px;" id="sizeIndicator"></img>
				

			</div>		
			<div id="div_nfc" style="display: inline-block; height: fit-content;">
			 
				<div class="side-left">
					<label>NFC beépités?</label>
				</div>
				<div class="side-right">
					<input type="checkbox" id="nfc" name="nfc" value="nfc"></input>	
				</div>						
			</div>
			</br>
			
			<div id="div_submits" style="height: fit-content;">
				
				<a href="#" class="btn"> A Kosárba</a>
				<a onclick="inDesigner()" id="intoDesignerBtn" class="btn"> Személyreszabás </a>
						<script>

						function inDesigner()
						{
							var sizes = document.getElementById("sizes");
							selectedArticleSize = sizes.options[sizes.selectedIndex].value;
							nextButton = document.getElementById('intoDesignerBtn');
							articleId = '<?php echo $_GET['id']; ?>';
							
							window.location.replace("designer.php" +'?size=' + selectedArticleSize + '&articleID=' + articleId);

						}
						
						</script>
						
						
			</div>			
			</br>
			
			<div id="div_tags" style="display: inline-block; height: fit-content;">
			 
				<ul class="tags">
				  <li><a href="#" class="tag">Fa</a></li>
				  <li><a href="#" class="tag">Új</a></li>
				  <li><a href="#" class="tag">Tervezhető</a></li>
				</ul>						
			</div>

				

				

		</div>
	</div>

</div>


</div>

	<div id="recentList" >
		<div class="form">

			<div class="track" style="width: auto;">
				<div id="trackTitle">
					<p>Nemrég megtekintett termékek</p>
				</div>
				<div id="trackList">
				
					<?php
					
					function generateRandomString($length = 10) {
						$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$charactersLength = strlen($characters);
						$randomString = '';
						for ($i = 0; $i < $length; $i++) {
							$randomString .= $characters[rand(0, $charactersLength - 1)];
						}
						return $randomString;
					}
					
					$articleNameID = 'woodCuttingBoard';
					$articlePrefix = 'art_';
					$articlesFolder = 'articles';
					
					/*for ($x = 0; $x <= 1; $x++) {
						$articleName = generateRandomString();
						echo '<a href="article.php">';
						echo '<div href="article.php" id="trackCol">';
						echo '<img src="data\\',$articlesFolder,'\\',$articlePrefix,$articleNameID,'\thumb_',rand(1,3),'.png"></img>';
						echo '<p>',$articleName,'</p>';
						echo '<a href="article.php?',$articleNameID,'" id="seeArticleButton">Megnézem</a>';
						echo '</div>';
						echo '</a>';
						echo '  ';
					}
					*/

					
					
					?>
					
					
							
							
							
						
					


				</div>
			</div>
		</div>

	</div>






 </body> 
 
 <div class="footer">
 
 <div class="card cookie-alert">
  <div class="card-body">
    <h5 class="card-title">&#x1F36A; Szereted a sütiket?</h5>
    <p class="card-text">Kedves Látogató! Tájékoztatjuk, hogy a honlap felhasználói élmény fokozásának érdekében sütiket alkalmazunk. A honlapunk használatával ön a tájékoztatásunkat tudomásul veszi.</p>
    <div class="btn-toolbar justify-content-end">
      <a href="http://cookiesandyou.com/" target="_blank" class="btn btn-link">Adatvédelmi nyilatkozat</a>
      <a href="#" class="btn btn-primary accept-cookies">Elfogadom</a>
    </div>
  </div> 
</div>
 <script>
 (function () {
    "use strict";

    var cookieAlert = document.querySelector(".cookie-alert");
    var acceptCookies = document.querySelector(".accept-cookies");

    cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)

    if (!getCookie("acceptCookies")) {
        cookieAlert.classList.add("show");
    }

    acceptCookies.addEventListener("click", function () {
        setCookie("acceptCookies", true, 60);
		alertify.success("Elfogadtad a sütiket!");
        cookieAlert.classList.remove("show");
    });
})();

// Cookie functions stolen from w3schools
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}




 </script> 

<?php

	echo 
	"
	<script>
	

		
	
	function getTitle(art, artData) {

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
				var elem = document.getElementById('title-'+art);
				elem.innerHTML = this.responseText;

				return this.responseText;
		  }
		};
		xmlhttp.open('GET', 'retrieveDataFromArticle.php?q=' + art + '&w=' + artData, true);
		xmlhttp.send();
	  
	}
	function getFirstSizePath(art, artData) {

		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		  if (this.readyState == 4 && this.status == 200) {
				var elem = document.getElementById('photo-'+art);
				elem.src = 'data\\\articles\\\art_' + art + '\\\\thumb_'+this.responseText+'_1.png'

				return this.responseText;
		  }
		};
		xmlhttp.open('GET', 'retrieveDataFromArticle.php?q=' + art + '&w=' + artData, true);
		xmlhttp.send();
	  
	}	
	
	
	
	
	
	var d = new Date();

	if (!getCookie('art?' + '".$_GET['id']."'))
		{
			setCookie('art?' + '".$_GET['id']."', d.getTime() , 60);
		}
		
		var getHistoryCookies = function(){
		  var pairs = document.cookie.split(';');
		  var cookies = {};
		  for (var i=0; i<pairs.length; i++){
			var pair = pairs[i].split('=');
			if((pair[0]+'').trim().includes('art?'))
			{
				cookies[(pair[0]+'').trim()] = unescape(pair.slice(1).join('='));
			}
		  }
		  return cookies;
		}
		
		var historyCookies = getHistoryCookies();

		//console.log(unescape(Object.getOwnPropertyNames(historyCookies)));


		
		var sortable = [];
		for (var cookieName in historyCookies) {
			sortable.push([cookieName, historyCookies[cookieName]]);
		}

		sortable.sort(function(a, b) {
			return a[1] - b[1];
		});
			
		Object.getOwnPropertyNames(sortable).forEach(
		  function (val, idx, array) {
			console.log(val + ' -> ' + sortable[val]);

		var articleStr = sortable[val][0];
		var article = articleStr.replace('art?','');

		var article_name = getTitle(article,'article_name');
		var size_1_path = getFirstSizePath(article,'size_1_path');
		
		var html_block  = '<a href=\"article.php?id='+article+'\">' + '<div href=\"article.php?id='+article+'\" id=\"trackCol\"> ' + '<img id=photo-'+article+' src=\"data\\\articles\\\art_' + article + '\\\\thumb_10x10_1.png\"></img>' + '<p id=title-'+article+'>' +article_name+ '</p>' + '<a href=\"article.php?id='+article+'\" id=\"seeArticleButton\">Megnézem</a>' + '</div>' + '</a>';
		document.getElementById('trackList').innerHTML += html_block;
		

			
		  });
		  
		  
		  
		  

	</script>
	"; 




 ?>


  <p>UNIKUS</br>Copyright 2021 © Minden jog fenntartva!</br>
    <hr/>
  <a href="index.php"> <img class="icon" src="mainElements\icons\home-white.svg"></img> Főoldal</a>
  <a href="#"> <img class="icon" src="mainElements\icons\product-white.svg"></img> Termékeink</a>
  <a href="#"> <img class="icon" src="mainElements\icons\search-white.svg"></img> Keresés</a>
  <a href="#"> <img class="icon" src="mainElements\icons\category-white.svg"></img> Kategóriák</a>
  <a href="#"> <img class="icon" src="mainElements\icons\star-white.svg"></img> Új!</a>  
  <a href="#"> <img class="icon" src="mainElements\icons\star-white.svg"></img> Népszerű</a>
    <a href="#"> <img class="icon" src="mainElements\icons\discount-white.svg"></img> Akciós</a> 
  <hr/>  
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> GYIK</a>  
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> ÁSZF</a>  
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> Szállítás</a> 
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> Adatvédelem</a> 
  <a href="#"> <img class="icon" src="mainElements\icons\faq-white.svg"></img> Visszatérítés</a> 
  <hr/>    
  </p>
  <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
</div>
 
</html>