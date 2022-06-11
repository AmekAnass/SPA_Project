<?php

    //connection au serveur
    require 'connection.php';

    //initialisation des variables contenant les informations de l'animal aprés le submit par l'utilisateur
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $adress = $_POST["adress"];
        $availablity = $_POST["availablity"];
        $birthDate = $_POST["birthDate"];
        $desc = $_POST["desc"];
        
        //vérification qu'il y'a bien une image télécharger
        if($_FILES["image"]["error"] === 4){
            echo
            "<script> alert('Image existe pas'); </script>"
            ;
        }
        
        //vérification de la taille, l'extension du fichier téléchargé
        else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $tmpName = $_FILES["image"]["tmp_name"];

            //fichier accepté = jpg, jpeg, png
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            
            if(!in_array($imageExtension, $validImageExtension)){
                echo
                "<script> alert('Image est invalide'); </script>"
                ;
    
            }
            
            //la taille du fichier ne doit pas dépassé 100000
            else if($fileSize > 100000){
                echo
                "<script> alert('La taille de limage est tres grande'); </script>"
                ;
    
            }
            
            //si le fichier respecte tout les critères il sera enregistré dans la BDD avec les informations sur l'animal
            else {
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;

                move_uploaded_file($tmpName, 'img/'. $newImageName);
                $query = "INSERT INTO tb_upload VALUES('', '$name','$adress', '$availablity', '$birthDate', '$desc', '$newImageName')";
                mysqli_query($conn, $query);
                echo
                "<script> alert('Image ajoutée !'); </script>"
                ;
    
            }
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/formAjoutAnimal.css">
        <title>Ajout d'animal</title>
    </head>
    <body>
        <h2 style="text-align: center"> Formulaire d'ajout animal  </h2>
        <div class="container">
            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                    <div class="col-25">

                        <label for="name">Nom : </label>
                    </div>
                    
                    <div class="col-75">
                            <input type="text" name="name" placeholder="Tapez le nom de l'animal" id = "name" required value=""> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">

                        <label for="adress">Adresse : </label>
                    </div>
                    
                    <div class="col-75">
                            <input type="text" name="adress" placeholder="Tapez l'adresse l'animal" id = "adress" required value=""> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">

                        <label for="availablity">Disponibilité : </label>
                    </div>
                    
                    <div class="col-75">
                            <input type="text" name="availablity" placeholder="Tapez la disponibilité de l'animal" id = "availablity" required value=""> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">

                        <label for="birthDate">Date de naissance : </label>
                    </div>
                    
                    <div class="col-75">
                            <input type="date" name="birthDate" id = "birthDate" required value=""> <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="desc">Description : </label>
                    </div>
                        
                        <div class="col-75">
                            <textarea type="text" name="desc" placeholder="Tapez une description pour l'animal" id = "desc" required value="" style="height:200px"></textarea> <br>
                        </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-25">

                    <label for="image">Image : </label>
                    </div>

                    <div class="col-75">
                        <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br>
                    </div>
                
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Valider"></input>
                </div>
            </form>
        </div>
            <br>

                <div class="row">
                <a href="data.php">Catalogue</a>
                </div>

    </body>
</html>


