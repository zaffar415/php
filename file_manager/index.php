
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php File Manager</title>

    <style>
        li {
            padding: 10px 50px;
            margin-top:5px;
            background:pink;
            color:darkred;
        }

        input[type="file"] {
            width:80%;
            padding:10px;
            background:lightblue;
        }

        input[type="submit"] {
            background:#07a31b;
            width:18%;
            padding:10px;
        }

        .container {
            padding:50px 100px;
        }
        .image {
            height:150px; width:150px; margin:10px;
        }

        .delete-btn {
            cursor:pointer;
            text-decoration:none;
            position:absolute;
            margin-left:-30px;
            margin-top:10px;
            padding:2px 5px;
            background:red;
            border:none;
            color:black;
            visibility:hidden;
        }
        span:hover a {
            visibility:visible;
        }

        

    </style>
</head>
<body>
    <div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit" value="Upload" name="image_upload">
        </form>
        
</body>
</html>

<?php
if(isset($_REQUEST['image_upload']))
{
    //print_r($_FILES);
    $imageName=$_FILES['image']['name'];
    $type=$_FILES['image']['type'];
    $validate=strstr($type,'image');
    
    if($validate)
    {
        if(move_uploaded_file($_FILES['image']['tmp_name'],"images/$imageName"))
        {
            header("location:index.php");
        }
        else {
            echo "<li>Failed to Upload Image</li>";
        }
    }
    else {
        echo "<li>Upload Images Only</li>";
    }
}

if(@($_GET['d']))
{
    $file=$_GET['d'];
    if(file_exists("images/$file"))
    {
        unlink("images/$file");
    }
    else {
        echo "<li>Image Not Found</li>";
    }
}


$count=count(scandir('images/'));
$files=scandir('images/');
echo '<div class="container">';
foreach($files as $file)
{
    if($file!='.' && $file!='..')
    {
        echo "<span>";
            echo "<a href='images/$file'><image class='image' src='images/$file'></a>";
            echo "<a class='delete-btn' href='index.php?d=$file'>X</a>";
        echo "</span>";
    }
}
echo '</div>';
?>
