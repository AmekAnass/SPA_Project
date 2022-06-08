<?php
    require 'connection.php';
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $desc = $_POST["desc"];
        
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;

        move_uploaded_file($tmpName, 'img/'. $newImageName);
        $query = "INSERT INTO tb_upload VALUES('', '$name', '$desc', '$newImageName')";
        mysqli_query($conn, $query);
        echo
        "<script> alert('Image ajoutée !'); </script>"
        ;
    
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Signaler un animal</title>
    </head>
    <body>
        <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            
            <label for="name">Nom : </label>
            <input type="text" name="name" id = "name" required value=""> <br>

            <label for="desc">Description : </label>
            <input type="text" name="desc" id = "desc" required value=""> <br>

            <label for="image">Image : </label>
            <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br>

            <button type="submit" name="submit">Ajouter l'animal</button>
        </form>
        <br>
        <a href="data.php">Catalogue</a>
    </body>
</html>