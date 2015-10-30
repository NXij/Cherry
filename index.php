<!DOCTYPE html>
<!-- web gallery with upload, infinite scrolling and lazyload Author: Tanel J -->
<!-- Do What the Fuck You Want to Public License. -->
<html>
	<head>
		<title>Folder crawler</title>
		<link rel="stylesheet" type="text/css" href="style_dir.css">
		</head>
		<body>
				<header class="header">
					<h1 class="intro">Drop image here</h1>
				<form class="upload_form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
    					<input type="file" onchange="this.form.submit()" name="fileToUpload" id="fileToUpload">
    					<input type="hidden" name="fileToUpload" value=""/>
			</form>
		</header>
		<center>
			<div class="dank">
			<?php
				extract($_POST);
				extract($_GET);
				error_reporting(0);
				mkdir("./images", 747);
				$dir = "./images/";
				$target_file = $dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					// Check if image file is a actual image or fake image
				if(isset($_POST["fileToUpload"])) {
    			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    			if($check !== false) {
        			$uploadOk = 1;
    			} else {
        			echo '<p class="error">File is not an image.</p>'.PHP_EOL;
        			$uploadOk = 0;
    				}	
				}	
				if ($_FILES["fileToUpload"]["size"] > 1000000) {
    				echo '<p class="error">Im too jewish for such high image size (1MB).</p>'.PHP_EOL;
    				$uploadOk = 0;
				}
				// Check if file already exists
				if (empty($_POST)) {
					
				} elseif (file_exists($target_file)) {
					echo '<p class="error">Sorry, file already exists.</p>'.PHP_EOL;
    				$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
    				echo '<p class="error">Sorry, your file was not uploaded.</p>'.PHP_EOL;
				// if everything is ok, try to upload file
				} else {
    				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        			echo "<p class=success>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</p><br>".PHP_EOL;
				}
				}

				function tits($dir) {
    				$ignored = array('.', '..', '.svn', '.htaccess');

    				$files = array();    
    				foreach (scandir($dir) as $file) {
        				if (in_array($file, $ignored)) continue;
        				$files[$file] = filemtime($dir . '/' . $file);
    				}

    				arsort($files);
    				$files = array_keys($files);

    				return ($files) ? $files : false;
					}

		
				$files = tits($dir);
				$count = count($files);
				foreach ( $files as $file => $count ) {
					echo '<div class="trash"><img class="lazy" data-original="./images/'. $files[$file] .'"><br><noscript><img src="./images/'. $files[$file] .'"></noscript></div>'.PHP_EOL;
				}
			?>
		</div>
			</center>
		<script src="jquery-2.1.4.min.js"></script>
		<script src="jquery.lazyload.min.js"></script>
		<script>
			$("img.lazy").lazyload();
			</script>
		<script type="text/javascript" src="infi.js"></script>
		</body>
</html>