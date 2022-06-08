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
  
    <a href="index.php">Formulaire d'ajout animal</a>

    <table border = 1 cellspacing = 0 cellpadding = 10 align="center">
      <tr>
        <td>Nom</td>
        <td>Adresse</td>
        <td></td>
        <td>Image</td>
      </tr>
      <?php
      $i = 1;
      $rows = mysqli_query($conn, "SELECT * FROM tb_upload ORDER BY id DESC")
      ?>
      <?php foreach ($rows as $row) : ?>
      <tr>
        <?php $id = $row["id"]; ?>
        <td><?php echo $row["name"]; ?></td>
        <td><?php echo $row["adress"]; ?></td>
        <td><?php echo "<a href='details.php?id=$id'>Voir plus</a>" ; ?></td>
        <td> <img src="img/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
      </tr>
      <?php endforeach; ?>
    </table>
    <br>
  </body>
</html>