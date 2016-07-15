<?php 
 require 'credentials.php';
 
?>
<?php

    //already have $key from required file

/*$tag = $_POST['search'];
$perPage = 10;
$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
$url.= '&api_key='.$key;
$url.= '&tags='.$tag;
$url.= '&per_page='.$perPage;
$url.= '&format=json';
$url.= '&nojsoncallback=1';
 
$response = json_decode(file_get_contents($url));
$photo_array = $response->photos->photo;
 

 
foreach($photo_array as $single_photo){
 
$farm_id = $single_photo->farm;
$server_id = $single_photo->server;
$photo_id = $single_photo->id;
$secret_id = $single_photo->secret;
$photo_owner = $single_photo->owner;

$size = 'm';
 
$title = $single_photo->title;
 
$photo_url = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_q.jpg';
$flickr_url = 'https://www.flickr.com/photos/'.$photo_owner.'/'.$photo_id;

print "<a href = '" . $flickr_url . "'><img title='".$title."' src='".$photo_url."' height=150 width=150></img></a> ";


*/




?>
<!DOCTYPE html>
<html lang="en">
  
<head>
	<title>Flickr Tag Picker</title>
	<link rel="stylesheet" href="/css/style.css">

	<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->
     <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">

     <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">



</head>
	<body>


	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="index.php">Main Page</a>
        </div>
        
        <!--<div id="navbar" class="collapse navbar-collapse">
        	<ul class="nav navbar-nav">
        		<li><a href="introduction">Intro to APIs</a></li>
            	<li class="active"><a href="getstarted">Get Started</a></li>
            	<li><a href="introapi">flickr API</a></li>
             	<li><a href="moreapi">Using the API</a></li>
              	<li><a href="apidata">Data part I</a></li>
               	<li><a href="apidata2">Data part II</a></li>
                <li><a href="finalproduct">Final Product</a></li>
                <li><a href="demo.php">Demo</a></li>-->
          	</ul>
        </div><!--/.nav-collapse -->
      </div><!-- / .container -->
    </nav><!-- / .navbar-fixed-top -->

	<div class="container">
	  <div class="blog-header">
	        <h1 class="blog-title"></h1>
	        <p class="lead blog-description"></p>
	   </div>
	  <div class = "blog-post">
  </br>
<h3>LIVE DEMO OF THE FLICKR API - REFRESH PAGE FOR NEW PHOTOS</h3>
</br>
	<form method="post">
    <p><label># of Photos to return:</label>
    <input type = "text" name = "numPhotos" id = "numPhotos" maxlength="3" size="4"></p>
  	<p><label>Enter a tag to search for:</label>
  	<input type="text" name="search" id="search">
  <!--<button type="submit" class="btn btn-primary" id="searchTags" onclick="SearchTags()">Search</button>-->
    <input type="submit" class="btn btn-primary" id="searchTags" name="searchTags" /> </p>


<div id = "apiResults">

<!--<h1>The response from flickr for tag(s) {{tags}} is:</h1>-->
<?php

  



echo '<pre><code>' . $response . '</code></pre>'
?>
</div> <!--end results -->

  </form>
<div id = "photoResults">
  <?php 
  // if searchTags button is clicked
  if (isset($_POST['searchTags'])) {

      echo 'set';
      echo $_POST['search'];

      //if the number of photos to display is not completed, set to 10
      If($_POST['numPhotos']=="") {
         
         $perPage = 20;
        
        } else {

          $perPage = $_POST['numPhotos'];
        }


      //if the search field is left empty then go ahead and set a predefined tag to use
      if($_POST['search']=="") {

        $tag = 'London';

        } else {

          $tag = $_POST['search'];
          //$perPage = $_POST['numPhotos'];

      }

  } else {          // if button is not set then display 10 photos of a predefined tag

     $tag = 'London';
     $perPage = 20;
     echo 'Not set';

  }

echo '<h1>The Top ' . $perPage . ' photos returned for the tag: ' . $tag;
echo '<h3>Click on the photo to see it on flickr.com</h3>';
 
$api_key = 'YOUR API KEY';
 
//$tag = 'red';
//$perPage = 10;
$url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
$url.= '&api_key='.$key;
$url.= '&tags='.$tag;
$url.= '&per_page='.$perPage;
$url.= '&format=json';
$url.= '&nojsoncallback=1';
$url.= '&tag_mode=all';


$response = json_decode(file_get_contents($url));
$photo_array = $response->photos->photo;

 
foreach($photo_array as $single_photo){
 
$farm_id = $single_photo->farm;
$server_id = $single_photo->server;
$photo_id = $single_photo->id;
$secret_id = $single_photo->secret;

$photo_owner = $single_photo->owner;

$size = 'm';
 
$title = $single_photo->title;
 
$photo_url = 'https://farm'.$farm_id.'.staticflickr.com/'.$server_id.'/'.$photo_id.'_'.$secret_id.'_q.jpg';
$flickr_url = 'https://www.flickr.com/photos/'.$photo_owner.'/'.$photo_id;

print "<a href = '" . $flickr_url . "'><img title='".$title."' src='".$photo_url."' height=150 width=150></img></a> ";
 
}
 

 unset($_POST['numPhotos']);
 unset($_POST['searchTags']);
 unset($_POST['search']);
?>
</div> <!-- end photoResults div -->

 <p><a class="btn btn-default" href="index" role="button">&laquo; Main Page</a></p>
  </div>  <!-- blog-post-->
      </div> <!-- /.container -->
    
    <footer class="blog-footer">
     
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>
  
</body>
</html>


