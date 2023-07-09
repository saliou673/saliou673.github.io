<?php
// Votre script PHP

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  // Assurez-vous que la requête est de type GET

  $url = "https://visa-fr-gn.capago.eu/WebSite_getUnavailableDayList?capago_center_id=capago_CNK&formula=premium&visa_file_list=[{%22resource_id%22:%2220190517-37FC1%22,%22variation_id%22:%226%22}]&travel_project_relative_url=undefined"; // Remplacez par votre URL
  $result = file_get_contents($url);

  // Vous pouvez effectuer des traitements supplémentaires sur le résultat si nécessaire

  // Envoie du résultat en tant que réponse JSON
  header('Content-Type: application/json');
  echo json_encode($result);
  exit();
} else {
  // La requête n'est pas de type GET, renvoyer une erreur
  header('HTTP/1.1 405 Method Not Allowed');
  exit();
}
?>
