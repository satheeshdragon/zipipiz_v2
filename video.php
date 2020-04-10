<!DOCTYPE html>
<html>
<head>
	<title>Download Center</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assert/css/bootstrap.min.css">
<script src="assert/js/jquery.min.js"></script>
<script src="assert/js/bootstrap.min.js"></script> 
<script src="assert/js/baguetteBox.min.js"></script>

    <link rel="stylesheet" href="assert/css/baguetteBox.min.css">
    <link rel="stylesheet" href="assert/css/gallery-grid.css">

</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ZipiPiz</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Pic</a></li>
      <li class="active"><a href="video.php">Video</a></li>
<!--      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li> -->
    </ul>
  </div>
</nav>

<div class="container"> 
	<div class="row">
<h1 align="center">YOUTUBE LINK</h1>
        <div align="center">
          <form method="post" action="">
          <input type="text" class="form-group input-sm" name="link"></input>
          <input type="submit" class="btn btn-success" value="GET"></input> 
        </form>
        </div>
	
<div align="center">
<?php

if(isset($_POST['link']))
{
  $url = $_POST['link'];
  //echo $url;
  //echo "<br>";
  $link = strstr($url, '=');
  $link = trim($link,"=");
  //echo $link;

  echo "<br>";
  $data = file_get_contents("https://www.youtube.com/get_video_info?video_id={$link}");
  parse_str($data);
  $arr = explode(",", $url_encoded_fmt_stream_map);
    foreach ($arr as $item) {
      parse_str($item);
      echo "<a href='$url' >$quality / $type </a> </br>";
    }
}

?>
</div>


  </div>
</div>

</body>
</html>