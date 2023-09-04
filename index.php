<?php
require 'config.php';
$toinfo = file_get_contents($webhookUrl);
$info = json_decode($toinfo);


$name = $info->name;
?>

<!DOCTYPE html>
<html>

<head>
  <title>Utilisateurs Discord - <?= $name ?></title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="UTF-8">

</head>

<body>
  <div class="container">
    <h1><?= $name ?></h1>
    <div class="user-list">
      <?php include 'get_users.php'; ?>
    </div>
  </div>

  <footer>
    Ce site utilise l'API <a href="https://discord.com">Discord</a><br><a href="https://discord.gg/cYySPgwXTr">Toi aussi récupère ton site avec les membres de ton discord !</a>
  </footer>
</body>

</html>