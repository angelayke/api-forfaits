<?php 
  include_once('controleurs/forfaits.php'); 
?>

  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">Détails</h1>
	<!-- Afficher le forfait détaillé via le lien appelé par le bouton  -->
	<!-- Les informations à afficher sont le nom , la description et le prix -->
    <?php
    $controlerForfaits=new ControleurForfait;
    $controlerForfaits->afficherUnForfait();
    ?>
	
  </div>