<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Image Processing Library</title>

<link rel="stylesheet" type="text/css" href="style/style.css" />
<link rel="stylesheet" type="text/css" href="style/colour.css" />
<link rel="stylesheet" type="text/css" href="style/image_viewer.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>

<?php
session_start();
if(!isset($_SESSION['username'])) {
header( "refresh:2;url=login.php" );
die( "Not logged in; redirecting.");
}

?>


<div id="logo">
  <h1>Image Processing Library</h1>
  <div id="links"></div>
</div>
<div id="menu">
  <ul>
    <!--<li><a class="selected" href="#">Home</a></li>
    <li><a href="about.php">Search</a></li>
    <li><a href="contact.php">Uploaded Images</a></li>-->
  </ul>
  <div id="colours"></div>
</div>
<div id="site_content">
  <div id="side_menu">
    <div class="side_menu_item"> <a class="selected" href="#"><img src="style/series_one.jpg" alt="" width="142" height="50" /></a> <span class="info">Collection One</span> </div>
    <div class="side_menu_item"> <a href="#"><img src="style/series_two.jpg" alt="" width="142" height="50" /></a> <span class="info">Collection Two</span> </div>
    <div class="side_menu_item"> <a href="#"><img src="style/series_three.jpg" alt="" width="142" height="50" /></a> <span class="info">Collection Three</span> </div>
    <div class="side_menu_item"> <a href="#"><img src="style/series_four.jpg" alt="" width="142" height="50" /></a> <span class="info">Collection Four</span> </div>
    <div class="side_menu_item"> <a href="#"><img src="style/series_five.jpg" alt="" width="142" height="50" /></a> <span class="info">Collection Five</span> </div>
  </div>
  <div id="content">
    <h1>Collection One Photographs<span class="sub">[click on thumbnails to view]</span></h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
       Select image to upload:
       <input type="file" name="fileToUpload" id="fileToUpload">
       <input type="submit" value="Upload Image" name="submit">
    </form>
    <script>
    $(document).ready(function(){

    	var i = 1;
    	var n = 0;
  	var username = "<?php echo $_SESSION['username'] ?>";
	var fetch = setInterval(loadImages,200);
	var collectionNumber = 1;
	displayFirstImage();
	
	//mkdir("/images/users/test", 0700);
	//mkdir("/images/users/".test."/1", 0700);
	
    	$(".thumbnail").click(function(){
        	$("#mainimg").attr("src",$(this).find("img").attr("src"));

    	});
    	
    	function displayFirstImage() {
        	$("#mainimg").attr("src",$("#thumbs").find("img:first").attr("src"));
    	}
    	
    	function loadImages() {
  		//alert(username);
    		//while (i >= 0) {
    			var url = "images/users/"+username+"/"+collectionNumber+"/"+i+".jpg";
    			//alert(url);
    			
	    		$.ajax({url: url,
	  			success: function(data){
	    				//alert('exists');
	    				//i++;
	    				$("#thumbs").find("img:eq("+n+")").attr("src", url);
	    				n++;
	  			},
	  			error: function(data){
	    				//alert('does not exist');
	    				clearInterval(fetch);
	  			},
			});
		//}
		i++;
    	}
    });
    </script>
    <div id="gallery"> <img id="mainimg"/> <em id="thumbs"> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> <a class="thumbnail"><img alt="" /></a> </em> </div>
  </div>
</div>

<table>
 <form action="logout.php" method="POST">
 <div class="marg">
<tr><td><input class="buttonstyle" type="submit" name="logout" value="logout" /></td></tr>
</div>

</form>
</table>

</body>
</html>