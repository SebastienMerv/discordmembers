<?php
// Utiliser l'API Discord pour récupérer les informations des utilisateurs connectés
// et leurs statuts et biographies correspondants
require 'config.php';


$todata = file_get_contents($webhookUrl);
$newdata = json_decode($todata);



$data = $newdata->{'members'};
$line = 0;



// $response = ... effectuer la requête GET avec le webhookUrl

// $data = ... extraire les données pertinentes de $response

// Boucler à travers les utilisateurs et afficher leurs informations
foreach ($data as $user) {
  $username = $data[$line]->username;
  $avatarUrl = $data[$line]->avatar_url;
  $statusapi = $data[$line]->status;
  $game = isset($user->game) ? $user->game->name : 'Aucun jeu';
  if ($statusapi == 'dnd') {
    $status = 'Ne pas déranger';
  }
  if ($statusapi == 'online') {
    $status = 'En ligne';
  }
  echo '<div class="user">';
  echo '<img class="avatar" src="' . $avatarUrl . '">';
  echo '<div class="info">';
  echo '<div class="username">' . $username . '</div>';
  if ($game != 'Aucun jeu') {
    echo '<div class="game">' . $game . '</div>';
  }
  echo '<div class="status">' . $status . '</div>';
  echo '</div>';
  echo '</div>';
  $line += 1;
}
