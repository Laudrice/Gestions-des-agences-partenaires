<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>


<!-- Contrat -->
<div class="container mx-auto px-5 mt-8">
    <h1 class="text-2xl text-center mb-6 font-bold">Contrat</h1>
    <div class="bg-white border rounded-lg shadow-md p-4 mb-6">
        <h2 class="text-lg font-semibold mb-2">Informations du contrat</h2>
        <hr class="my-3">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="mb-3">
                <span class="font-bold">N° contrat:</span>
                <span class="ml-2"><?= $contrat->num_contrat ?></span>
            </div>
            <div class="mb-3">
                <span class="font-bold">Date du contrat:</span>
                <span class="ml-2"><?= $contrat->date_contrat ?></span>
            </div>
            <div class="mb-3">
                <span class="font-bold">Agence d'encadrement:</span>
                <span class="ml-2"><?= $contrat->nom_agc ?></span>
            </div>
            <div class="mb-3">
                <span class="font-bold">Téléphone:</span>
                <span class="ml-2"><?= $contrat->tel_agc ?></span>
            </div>
            <div class="mb-3">
                <span class="font-bold">Adresse:</span>
                <span class="ml-2"><?= $contrat->adresse_agc ?></span>
            </div>
            <div class="mb-3">
                <span class="font-bold">Mail:</span>
                <span class="ml-2"><?= $contrat->mail_agc ?></span>
            </div>
        </div>
    </div>
    <div class="bg-white border rounded-lg shadow-md p-4">
        <h2 class="text-lg font-semibold mb-2">Terroirs associés</h2>
        <hr class="my-3">
        <?php if (!empty($terroirs)) : ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <?php foreach ($terroirs as $terroir) : ?>
                    <div class="bg-white border rounded-lg shadow-md p-4">
                        <div class="text-xl font-semibold mb-2"><?= $terroir->nom_terroir ?></div>
                        <div class="text-gray-600 mb-2"><?= $terroir->code_terroir ?></div>
                        <a href="<?= base_url('contrats/listIntervention/' . $terroir->code_terroir) ?>" class="block text-center px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600">Voir</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Aucun terroir trouvé pour ce contrat.</p>
        <?php endif; ?>
    </div>
</div>


<br>
<script src="<?= base_url('assets/js/jquery-3.7.0.js') ?>"></script>





<?= $this->endSection() ?>