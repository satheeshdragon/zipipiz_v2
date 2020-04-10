<!DOCTYPE html>
<html>
<head>
	<title>ZipiPiz</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="assert/favi.png">
<link rel="stylesheet" href="assert/css/bootstrap.min.css">
<script src="assert/js/jquery.min.js"></script>
<script src="assert/js/bootstrap.min.js"></script> 
<script src="assert/js/baguetteBox.min.js"></script>

    <link rel="stylesheet" href="assert/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assert/css/gallery-grid.css">

</head>
<body>
<!-- 	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ZipiPiz</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Pic</a></li>
      <li><a href="video.php">Video</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li> 
    </ul>
  </div>
</nav> -->

<div class="container"> 

<div class="">
	<div class="tz-gallery">
<!-- Search Form -->
	<form  id="myForm" >

			  <div class="form-group">
			  	<div class="row">
			  		<div class="col-lg-12">
			  		<div class="col-lg-4"></div>
			  		<div class="col-lg-4 text-center">  
			  			<h2 for="inputsm" style="    color: aliceblue;">PiZ</h2> </div>
			  		<div class="col-lg-4"></div>	
			  		</div>
			  		
			  	</div>
			    <input class="form-control input-sm" id="inputsm" type="text" name="search" <?php if (isset($_POST['search'])) echo 'value="'.$_POST['search'].'"';?>>
			  </div>
			   <div class="form-group">

				   <div class="col-md-4 text-center">
				   	<button type="button" class="btn btn-success" onclick="start()">Search</button>
				   </div>

				   <div class="col-md-4 text-center">
		 		   	 <select name="count" id="count" class="form-control">
					  <option value="1">25</option>
					  <option value="2">50</option>
					  <option value="3">75</option>
					  <option value="4">100</option>
					  <option value="5">125</option>
					  <option value="6">150</option>
					  <option value="7">175</option>
					  <option value="8">200</option>
					  <option value="9">225</option>
					</select> 
				   </div>	

					<div class="col-md-4 text-center">
					    <!-- <label><input type="checkbox"> Check me out</label> -->						
					    <button type="button" value ="download" name = "download_center" class="btn btn-danger" onclick="start(this.value)">Download</button>	
					</div>
			  </div>
	</form>

	<div style="padding-top: 50px"></div>

  
<div id ="result">	</div>

</div>
</div>
</div>

<script>
baguetteBox.run('.tz-gallery', {
		    animation: 'fadeIn',
		    noScrollbars: true,
		    preload: 1000
		});
    //alert(datastring);
$( document ).ready(function() {
	$(window).scroll(function() {
	   if($(window).scrollTop() + $(window).height() == $(document).height()) {
	   		 var current = document.getElementById("count").selectedIndex;
	   		document.getElementById("count").selectedIndex = current+1;
	   		start();
	   }
	});
});	

function start(value)
{
	
	var download_btn = value;
	//alert(download_btn);
	var data_f;
    data_f = $('#myForm').serializeArray();
    data_f = JSON.stringify(data_f);
    console.log(data_f);

$.ajax({
    type: "POST",
    url: "fetch/fetch.php",
    data: {data:data_f,download:download_btn},
    success: function(data) {
    	document.getElementById('result').innerHTML = data;
    	// baguetteBox.run('.tz-gallery');
    	baguetteBox.run('.tz-gallery', {
		    animation: 'fadeIn',
		    noScrollbars: true,
		    preload: 1000
		});

    },
});
}

$(document).ready(function(){
	var play = '<button type="button" aria-label="Previous" class="baguetteBox-button playon">Play</button>';
	$('#baguetteBox-overlay').append(play);
});


 $("#baguetteBox-overlay").on("click", "button.playon", function(){

 	baguetteBox.run('.tz-gallery', {
		    animation: 'fadeIn',
		    noScrollbars: true,
		    preload: 1000
		});

	  var sum = 0;
      $(".full-image").each(function() {
              sum = sum + 1;
      });
    for (var i = 1; i < sum; i++) {
    	(function(index) {
        	setTimeout(function() { 
        		 $('#baguetteBox-slider').css('transform','translate3d(-'+index+'00%, 0px, 0px)');
        	}, i * 4000);
    	})(i);
    }
 });


</script>


  <div class="pre" style="display: none;">
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve" width="30" height="30">

		<rect fill="#FBBA44" width="15" height="15">
      <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="1.7s" values="0,0;15,0;15,15;0,15;0,0;" repeatCount="indefinite"/>
		</rect>	

		<rect x="15" fill="#E84150" width="15" height="15">
      <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="1.7s" values="0,0;0,15;-15,15;-15,0;0,0;" repeatCount="indefinite"/>
		</rect>	
      
		<rect x="15" y="15" fill="#62B87B" width="15" height="15">
      <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="1.7s" values="0,0;-15,0;-15,-15;0,-15;0,0;" repeatCount="indefinite"/>
		</rect>	

		<rect y="15" fill="#2F6FB6" width="15" height="15">
      <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="1.7s" values="0,0;0,-15;15,-15;15,0;0,0;" repeatCount="indefinite"/>
		</rect>
    </svg>
  </div>

  <style>
  	body {
  background: #111d27;
}
.pre  {
  position: absolute;
  top: 50%;
  left: 50%;
  margin-top: -15px;
  margin-left: -15px;
}
  </style>

<style> img[src*="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"] { display: none;} </style>﻿
</body>
</html>
