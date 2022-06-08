<?php
require 'connection.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Data</title>
    </head>
    <body>
  
    <li><a href="index.php">Formulaire d'ajout animal</a></li>
    <li><a href="data.php">Retour</a></li>

    <table border = 1 cellspacing = 0 cellpadding = 10 align="center">
      <tr>
        <td>Nom</td>
        <td>Adresse</td>
        <td>Disponibilité</td>
        <td>Date de naissance</td>
        <td>Description</td>
        <td>Image</td>
      </tr>
      <?php
      $id = $_GET['id'];
      $sql =  "SELECT * FROM tb_upload WHERE id = $id";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>
      <tr>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["adress"]; ?></td>
        <td><?php echo $row["availablity"]; ?></td>
        <td><?php echo $row["birthDate"]; ?></td>
        <td><?php echo $row["description"]; ?></td>
        <td> <img src="img/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
      </tr>
    </table>
    <br>
  </body>
</html>