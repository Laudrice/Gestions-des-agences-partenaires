<?php
$con = mysqli_connect('localhost', 'root', '', 'gestion_fid');

$query = "SELECT MAX(CAST(SUBSTRING(num_contrat, 5) AS UNSIGNED)) AS max_num_contrat FROM contrat";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$maxNumContrat = $row['max_num_contrat'];

if (empty($maxNumContrat)) {
  $numContrat = "CTAE001";
} else {
  $nxt = intval($maxNumContrat) + 1;
  $numContrat = "CTAE" . sprintf("%03d", $nxt);
}

mysqli_close($con);


$con = mysqli_connect('localhost', 'root', '', 'gestion_fid');

$query = "SELECT MAX(CAST(SUBSTRING(code_terroir, 4) AS UNSIGNED)) AS max_code_terroir FROM terroir";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$maxCodeTerroir = $row['max_code_terroir'];

if (empty($maxCodeTerroir)) {
  $codeTerroir = "TER001";
} else {
  $nxt = intval($maxCodeTerroir) + 1;
  $codeTerroir = "TER" . sprintf("%03d", $nxt);
}
?>

<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Ajouter un contrat
        </div>
        <div class="card-body">
          <form action="<?= base_url('contrats/add') ?>" method="post">
            <!-- Champs du contrat -->
            <div class="contrat">
              <div class="mb-4">
                <label for="num_contrat" class="block text-gray-700 text-sm font-bold mb-2">N° contrat</label>
                <input type="text" required name="num_contrat" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $numContrat ?>">
              </div>
              <div class="mb-4">
                <label for="date_contrat" class="block text-gray-700 text-sm font-bold mb-2">Date du contrat *</label>
                <input type="date" required name="date_contrat" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
              <div class="mb-4">
                <label for="nom_agc" class="block text-gray-700 text-sm font-bold mb-2">Nom de l'agence d'encadrement *</label>
                <input type="text" required name="nom_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
              <div class="mb-4">
                <label for="adresse_agc" class="block text-gray-700 text-sm font-bold mb-2">Adresse de l'agence *</label>
                <input type="text" required name="adresse_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
              <div class="mb-4">
                <label for="tel_agc" class="block text-gray-700 text-sm font-bold mb-2">Tel *</label>
                <input type="text" required name="tel_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
              <div class="mb-4">
                <label for="mail_agc" class="block text-gray-700 text-sm font-bold mb-2">Mail *</label>
                <input type="text" required name="mail_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
              </div>
            </div>
            <hr class="mt-4 mb-4">
            <!-- Champs pour le nombre d'interventions et de terroirs -->
            <div class="flex" style="justify-content: space-around;">
              <div class="w-1/3">
                <label for="nb_terroir" class="block text-gray-700 text-sm font-bold mb-2">Nombre de terroirs *</label>
                <input class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" type="number" id="nb_terroir" name="nb_terroir" placeholder="Nombre de terroirs">
              </div>
              <div class="w-1/3">
                <label for="nb_intervention" class="block text-gray-700 text-sm font-bold mb-2">Nombre d'interventions par terroir *</label>
                <input class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-1/4" type="number" id="nb_intervention" name="nb_intervention" placeholder="Nombre d'interventions">
              </div>
            </div>

            <!-- Container pour les terroirs -->
            <div id="terroirsContainer" class="grid grid-cols-2 gap-4" style="margin: auto;"></div>

            <hr class="mt-4 mb-4">

            <div class="flex justify-center">
              <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/js/jquery-3.7.0.js') ?>"></script>

<script>
  $(document).ready(function() {
    $('#nb_terroir').on('change', function() {
      var nbTerroir = parseInt($('#nb_terroir').val());

      generateTerroirFields(nbTerroir);
    });

    function generateTerroirFields(nbTerroir) {
      $('#terroirsContainer').empty();

      <?php $codeTerroirNumber = intval(substr($codeTerroir, 3)); ?>

      for (var i = 1; i <= nbTerroir; i++) {
        var codeTerroirNumberPadded = String(<?= $codeTerroirNumber ?>).padStart(3, '0');

        var terroirHTML = `
        <div class="card">
          <div class="card-header">
            Terroir ${i}
          </div>
          <div class="card-body">
            <label for="code_terroir_${i}" class="block text-gray-700 text-sm font-bold mb-2">Code : *</label>
            <input type="text" required id="code_terroir_${i}" name="code_terroir[]" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="TER${codeTerroirNumberPadded}">

            <label for="nom_terroir_${i}" class="block text-gray-700 text-sm font-bold mb-2">Terroir : *</label>
            <input type="text" required id="nom_terroir_${i}" name="nom_terroir[]" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

            <label for="salaire_prevu_terroir_${i}" class="block text-gray-700 text-sm font-bold mb-2">Salaire: *</label>
            <input type="text" required id="salaire_prevu_terroir_${i}" name="salaire_prevu_terroir[]" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
          </div>
        </div>
        <br>
        `;

        $('#terroirsContainer').append(terroirHTML);

        // Incrementation
        <?= $codeTerroirNumber++; ?>
      }
    }
  });
</script>





<?= $this->endSection() ?>
