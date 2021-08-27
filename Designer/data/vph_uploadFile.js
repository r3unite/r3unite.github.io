
function requestFileUpload() 
	{
		

		var g = document.createElement('input');
		g.id = "file";
		g.type = "file";
		g.style = "display: none;"
		g.name="file";
		document.body.appendChild(g);
		
        var fileupload = document.getElementById("file");
        var button = document.getElementById("btn_uploadfile");
		fileupload.click();
        fileupload.onchange = function () {
            var fileName = fileupload.value.split('\\')[fileupload.value.split('\\').length - 1];

			console.log(fileName);
			uploadFile(fileName);			
		
			elem=document.getElementById('file');
			elem.parentNode.removeChild(g);
        };
    };
			// Upload file
function uploadFile(fname) {

   var files = document.getElementById("file").files;

   if(files.length > 0 ){

      var formData = new FormData();
      formData.append("file", files[0]);

      var xhttp = new XMLHttpRequest();

      // Set POST method and ajax file path
      xhttp.open("POST", "uploadxmpl.php", true);

      // call on request changes state
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {

           var response = this.responseText;
           if(response == 1){
              alert("Upload successfully.");
			  gml_Script_gmcallback_setUploadFilename(null, null,fname);			  
           }else if (response == 0){
              alert("File not uploaded.");
           }else if (response == 2){
			  alert("Invalid file extension.");
		   }
         }
      };

      // Send request with data
      xhttp.send(formData);

   }else{
      alert("Please select a file");
   }
}