
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Process</title>
</head>
<body>
    
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<lable class="">Choose Image</lable>
		<input type="file" name="upload_image" required />
	</div>
	
	<input type="submit" name="form_submit" class="btn btn-primary" value="Submit" />
</form>
</body>
</html>

<?php
function resizeImage($resourceType,$image_width,$image_height) {
    $resizeWidth = 200;
    $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}
 
if(isset($_POST["form_submit"])) {
	$imageProcess = 0;
    if(is_array($_FILES)) {
        $fileName = $_FILES['upload_image']['tmp_name']; 
        $sourceProperties = getimagesize($fileName);
        $resizeFileName = time();
        $uploadPath = "./";
        $fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
        $uploadImageType = $sourceProperties[2];
        $sourceImageWidth = $sourceProperties[0];
        $sourceImageHeight = $sourceProperties[1];
        switch ($uploadImageType) {
            case IMAGETYPE_JPEG:
                $resourceType = imagecreatefromjpeg($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                $file=imagejpeg($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_GIF:
                $resourceType = imagecreatefromgif($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                $file=imagegif($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;
 
            case IMAGETYPE_PNG:
                $resourceType = imagecreatefrompng($fileName); 
                $imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight);
                $file=imagepng($imageLayer,$uploadPath."thump_".$resizeFileName.'.'. $fileExt);
                break;
 
            default:
                $imageProcess = 0;
                break;
        }
        move_uploaded_file($file, $uploadPath. $resizeFileName. ".". $fileExt);
        $imageProcess = 1;
    }
 
	if($imageProcess == 1){
	?>
		<div class="alert icon-alert with-arrow alert-success form-alter" role="alert">
			<i class="fa fa-fw fa-check-circle"></i>
			<strong> Success ! </strong> <span class="success-message"> Image Resize Successfully </span>
		</div>
	<?php
	}else{
	?>
		<div class="alert icon-alert with-arrow alert-danger form-alter" role="alert">
			<i class="fa fa-fw fa-times-circle"></i>
			<strong> Note !</strong> <span class="warning-message">Invalid Image </span>
		</div>
	<?php
	}
	$imageProcess = 0;
}
?>

