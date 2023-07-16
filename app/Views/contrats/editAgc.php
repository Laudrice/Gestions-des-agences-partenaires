<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 className="text-white font-bold text-xl">Modifier les informations de l'agence</h1>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('') ?>" method="post">
                        <?php foreach ($contrats as $contrat) : ?>
                            <div class="contrat">
                                <div class="mb-4">
                                    <label for="num_contrat" class="block text-gray-700 text-sm font-bold mb-2">N° contrat</label>
                                    <input type="text" required name="num_contrat" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $contrat->num_contrat ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="nom_agc" class="block text-gray-700 text-sm font-bold mb-2">Nom de l'agence d'encadrement *</label>
                                    <input type="text" required name="nom_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $contrat->nom_agc ?>">
                                </div>
                                <div class=" mb-4">
                                    <label for="adresse_agc" class="block text-gray-700 text-sm font-bold mb-2">Adresse de l'agence *</label>
                                    <input type="text" required name="adresse_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $contrat->adresse_agc ?>">
                                </div>
                                <div class=" mb-4">
                                    <label for="tel_agc" class="block text-gray-700 text-sm font-bold mb-2">Tel *</label>
                                    <input type="text" required name="tel_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $contrat->tel_agc ?>">
                                </div>
                                <div class=" mb-4">
                                    <label for="mail_agc" class="block text-gray-700 text-sm font-bold mb-2">Mail *</label>
                                    <input type="text" required name="mail_agc" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $contrat->mail_agc ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <hr class=" mt-4 mb-4">

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





<?= $this->endSection() ?>