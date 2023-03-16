<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Images Upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
    	output{
  width: 100%;
  min-height: 150px;
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
  gap: 15px;
  position: relative;
  border-radius: 5px;
}

output .image{
  height: 100px;
  width: 100px;
  border-radius: 5px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
  overflow: hidden;
  position: relative;
}

output .image img{
  height: 100%;
  width: 100%;

}

output .image span {
  position: absolute;
  top: -4px;
  right: 4px;
  cursor: pointer;
  font-size: 22px;
  color: white;
}

output .image span:hover {
  opacity: 0.8;
}

output .span--hidden{
  visibility: hidden;
}
output .row {
  width: 100%;
}
.delete,.upload {
  cursor: pointer;
  margin-top: 50px;
  float:right;
  padding: 0 40px;
}
.progress-wrapper {
    width:100%;
}
.progress-wrapper .progress {
    background-color:green;
    width:0%;
    height: 30px;
    padding:5px 0px 5px 0px;
}
.col-sm-12 .inline {
    display: inline-block;
}
.image_container,.image_description {
  padding:10px;
  float: left;
}
.name{
  padding-top: 15px;
  font-size: 20px;
}.size{
  color:grey;
}
.container {
  margin-top:100px;
}
.image_description  {
  width: 300px;
  text-align: left;
}
.row {
  padding:10px;
  background-color: #a19fa354;
  border-radius: 15px;
}
    </style>
</head>
<body>

<div class="container text-center ">
	<input type="file" multiple accept="image/jpeg, image/png, image/jpg">
	<output></output>
</div>

<script type="text/javascript">
	const input = document.querySelector("input")
	const output = document.querySelector("output")
	let imagesArray = []
	input.addEventListener("change", () => {
		var files = input.files
		for (let i = 0; i < files.length; i++) {
      let obj = {'elm':files[i],'uploaded':false};
			imagesArray.push(obj)
		}
		displayImages()
	})
	function displayImages() {
	let images = "";
  var upload_svg ='<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-cloud-upload" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/><path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/></svg>';
  var delete_svg = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>';
	imagesArray.forEach((image, index) => {
    var image= image.elm ;
  	console.log(image)
  	images += `<div  class="row">
                <div class="col-sm-12"> 
                <div class="image_container inline">
                <img class="image" src="${URL.createObjectURL(image)}" alt="image"></div>
                <div class="image_description inline">
                <div class="name">${(image.name)}</div></br>
                <div class="size">${formatSizeUnits(image.size)}</div></br>
                  <div id="bar-${index}" class="progress-wrapper d-none">
                    <div id="progress-bar-file-${index}" class="progress"></div>
                  </div>
                </div>
               

  	            <div class="delete inline" onclick="deleteImage(${index})">${delete_svg}</div>
                  <div class="upload inline" onclick="uploadImage(${index})">
                  ${upload_svg}  
                
                </div>
  	          </div>
              </div>`;
	})
  output.innerHTML = images ;

}
  function deleteImage(index) {
   imagesArray.splice(index, 1)
    displayImages()
  }
function formatSizeUnits(bytes){
  if      (bytes >= 1073741824) { bytes = (bytes / 1073741824).toFixed(2) + " GB"; }
  else if (bytes >= 1048576)    { bytes = (bytes / 1048576).toFixed(2) + " MB"; }
  else if (bytes >= 1024)       { bytes = (bytes / 1024).toFixed(2) + " KB"; }
  else if (bytes > 1)           { bytes = bytes + " bytes"; }
  else if (bytes == 1)          { bytes = bytes + " byte"; }
  else                          { bytes = "0 bytes"; }
  return bytes;
}
function uploadImage(index)
{
  var image = imagesArray[index].elm;
    var formdata = new FormData();

    formdata.append('image', image);
    formdata.append('_token', '{{ csrf_token() }}');

    var request = new XMLHttpRequest();

    request.upload.addEventListener('progress', function (e) {
        var file1Size = image.size;
        var bar = document.getElementById('progress-bar-file-'+index);
        document.getElementById('bar-'+index).classList.remove("d-none");
        if (e.loaded <= file1Size) {
            var percent = Math.round(e.loaded / file1Size * 100);
            bar.style.width = percent + '%';
            bar.innerHTML = percent + '%';
        } 

        if(e.loaded == e.total){
            bar.style.width = '100%';
            bar.innerHTML = '100%';
        }
    });   

    request.open('post', '/uploadImage');
    request.onload = function(event){ 
      var res =  JSON.parse( event.target.response);
      if(res.success)
      {
        alert(res.success)
      }
      else
      {
        var error = '';
        for (e in res.error) {
          error += ' , '+ res.error[e];
        }
        alert(error);
      }
    
  }; 
    request.timeout = 45000;
    request.send(formdata);

}
</script>
</body>
</html>
