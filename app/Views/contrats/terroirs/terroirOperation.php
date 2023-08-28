<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1 className="text-white font-bold text-xl">Opération sur le terroir</h1>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('') ?>" method="post">
                        <?php foreach ($terroirs as $terroir) : ?>
                            <div class="terroir">
                                <div class="mb-4">
                                    <label for="code_terroir" class="block text-gray-700 text-sm font-bold mb-2">Code terroir</label>
                                    <input type="text" required name="code_terroir" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $terroir->code_terroir ?>" readonly>
                                </div>
                                <div class="mb-4">
                                    <label for="nom_terroir" class="block text-gray-700 text-sm font-bold mb-2">Nom du terroir *</label>
                                    <input type="text" required name="nom_terroir" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $terroir->nom_terroir ?>">
                                </div>
                                <div class=" mb-4">
                                    <label for="nombre_intervention_du_terroir" class="block text-gray-700 text-sm font-bold mb-2">Nombre d'interventions du terroir *</label>
                                    <input type="text" required name="nombre_intervention_du_terroir" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $terroir->nombre_intervention_du_terroir ?>">
                                </div>
                                <?php
                                    if($terroir->date_rapport_collecte_donnee == NULL )
                                    {
                                        ?>
                                        <div class=" mb-4">
                                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date du rapport de collecte</label>
                                            <input type="date" required name="date_rapport_collecte_donnee" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        </div>
                                        <?php
                                    }else{
                                        ?>
                                        <div class=" mb-4">
                                            <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date du rapport de collecte</label>
                                            <input type="date" required name="date_rapport_collecte_donnee" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $terroir->date_rapport_collecte_donnee ?>">
                                        </div>
                                        <?php
                                            if($terroir->date_rapport_demarrage == NULL){
                                                ?>
                                                <div class=" mb-4">
                                                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date du rapport de démarrage</label>
                                                    <input type="date" required name="date_rapport_demarrage" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                </div>
                                                <?php
                                            }else{
                                                ?>
                                                <div class=" mb-4">
                                                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date du rapport de démarrage</label>
                                                    <input type="date" required name="date_rapport_demarrage" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $terroir->date_rapport_collecte_donnee ?>">
                                                </div>
                                                <?php
                                                if($terroir->date_rapport_final == NULL){
                                                    ?>
                                                    <div class=" mb-4">
                                                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date du rapport finale</label>
                                                        <input type="date" required name="date_rapport_final" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                    </div>
                                                    <?php
                                                }else{
                                                    ?>
                                                    <div class=" mb-4">
                                                        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date du rapport finale</label>
                                                        <input type="date" required name="date_rapport_final" class="w-full border border-gray-300 rounded-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?= $terroir->date_rapport_collecte_donnee ?>">
                                                    </div>
                                                    <?php
                                                }
                                        }
                                        ?>
                                        <?php
                                    }
                                ?>
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
