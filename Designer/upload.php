<?php
// INIT - Sets the target directory that we'll be uploading to AND file extensions to get rid of.
$targetDir = "uploads/";
$badExtensions = array("php", "phps", "phtml", "php3", "php4", "php5", "py", "py23", "pl", "rb", "fcgi", "fpl", "cgi"); 

// Gets the data we need from our POST attributes
$targetFile = $_POST['name'];
$encodedData = $_POST['data'];

// Take care of malicious uploads
// If you wanted to make the naming convention automated (ie, [currentdate + currenttime].txt) this is where you change it.
$targetFile = pathinfo($targetFile);

if (in_array($targetFile['extension'], $badExtensions)) {
	$finalFile = $targetFile['filename'] . ".txt";
} else {
	$finalFile = $targetFile['filename'] . "." . $targetFile['extension'];
}

// Decides where to put and what we'll name the file we've recieved by adding the name to our target directory.
$finalFile = $targetDir . $finalFile;

// Slight hacky-bug-fixy to correctly copy the encoded data
$encodedData = str_replace(' ','+',$encodedData);

// Decodes the now fixed encoded data, and saves it to the string $decodedData
$decodedData = base64_decode($encodedData);

// Creates the new file in the directory
file_put_contents($finalFile, $decodedData);

// Returns the file path to the screen, or in our case, GameMaker
echo $finalFile;

?>