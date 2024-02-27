<?php

// Définissez l'adresse email de destination
$destinataire = "kevin@owlf.school";
// $destinataire = "contact@solstys.net";

$json = file_get_contents('php://input');

// Le convertit en objet PHP
$data = json_decode($json);
// Vérifiez si le formulaire a été soumis
if (isset($data->nom)) {

  // Récupérez les données du formulaire
  $nom = $data->nom;
  $prenom = $data->prenom;
  $email = $data->email;
  $entreprise = $data->entreprise;
  $telephone = $data->numero;
  $poste = $data->poste;
  $service = $data->service;
  $message = $data->message;

  // Créez le message du mail
  $contenu = "Nom : " . $nom . "\n";
  $contenu .= "Prénom : " . $prenom . "\n";
  $contenu .= "Email : " . $email . "\n";
  if (!empty($entreprise)) {
    $contenu .= "Entreprise : " . $entreprise . "\n";
  }
  $contenu .= "Téléphone : " . $telephone . "\n";
  if (!empty($poste)) {
    $contenu .= "Poste : " . $poste . "\n";
  }
  $contenu .= "Service concerné : " . $service . "\n";
  $contenu .= "Message : \n" . $message;

  // Envoyez le mail
  $headers = 'From: ' . $destinataire  . "\r\n" .
             'Reply-To: ' . $email . "\r\n" .
             'Content-Type: text/plain; charset=UTF-8';

  if (mail($destinataire, "Nouveau message du formulaire de contact", $contenu, $headers)) {
    echo "Votre message a été envoyé avec succès !";
  } else {
    echo "Une erreur est survenue lors de l'envoi du message. Veuillez réessayer plus tard.";
  }

} else {
  // Le formulaire n'a pas été soumis, affichez un message d'erreur
  echo '<pre>'; var_dump($data );echo '</pre>';
  echo "Une erreur est survenue. Veuillez réessayer.";
}

?>