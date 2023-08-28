<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <?php
            if (session()->getFlashdata('status')) { ?>

                <div class="alert alert-success" role="alert">
                    A simple success alert—check it out!
                </div>
            <?php
            }
            ?>
            <div class="container mx-auto px-5 mt-8">
                <div class="card bg-white border rounded-lg shadow-md p-4 mb-6">
                    <div class="card-header flex justify-between items-center mb-3">
                        <h1 class="text-2xl font-bold">Contrats</h1>
                        <a href="<?= base_url('contrats/create') ?>" class="btn btn-info sm">Ajouter</a>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                        <?php if ($contrats) : ?>
                            <?php foreach ($contrats as $row) :
                                $num_contrat = $row['num_contrat'];
                            ?>
                                <div class="bg-white border rounded-lg shadow-md p-4">
                                    <div class="text-lg font-semibold mb-2"><?= $row['nom_agc'] ?></div>
                                    <div class="text-gray-600 mb-2">N° contrat: <?= $row['num_contrat'] ?></div>
                                    <div class="text-gray-600 mb-2">Date: <?= $row['date_contrat'] ?></div>
                                    <div class="text-gray-600 mb-2">Nb terroir: <?= $row['nombre_terroir'] ?></div>
                                    <div class="text-gray-600 mb-2">Intervention/terroir: <?= $row['nombre_intervention_par_terroir'] ?></div>
                                    <div class="flex justify-center mt-4">
                                        <a href="<?= base_url('contrats/viewContrat/' . $num_contrat) ?>" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600">Voir</a>
                                        <a href="" class="ml-2 px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600">Supprimer</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <p>Aucun contrat trouvé.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>