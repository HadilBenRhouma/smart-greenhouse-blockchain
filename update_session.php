<?php

session_start();



  // Récupérer le prix envoyé par la requête AJAX
  $price = $_POST['price'];

  // Initialiser le total à 0 s'il n'existe pas encore dans la session
  if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
  }

  // Ajouter le prix envoyé au total dans la session
  $_SESSION['total'] += $price;

  // Afficher une alerte avec le total calculé
  echo "<script>alert('Le total est de : " . $_SESSION['total'] . "')</script>";

  // Renvoyer le total calculé

?>