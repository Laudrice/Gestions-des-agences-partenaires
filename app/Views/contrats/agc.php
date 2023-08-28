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
                    <div class="card-header flex justify-between items-center">
                        <h1 class="text-2xl font-bold">Agences</h1>
                        <a href="<?= base_url('contrats/create') ?>" class="btn btn-info sm">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <?php if ($contrats) : ?>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                <?php foreach ($contrats as $row) :
                                    $num_contrat = $row['num_contrat'];
                                    $nom_agc = $row['nom_agc'];
                                    $adresse_agc = $row['adresse_agc'];
                                    $tel_agc = $row['tel_agc'];
                                    $mail_agc = $row['mail_agc'];
                                ?>
                                    <div class="bg-white border rounded-lg shadow-md p-4">
                                        <div class="text-lg font-semibold mb-2"><?= $nom_agc ?></div>
                                        <div class="text-gray-600 mb-2">Adresse: <?= $adresse_agc ?></div>
                                        <div class="text-gray-600 mb-2">Tel: <?= $tel_agc ?></div>
                                        <div class="text-gray-600 mb-2">Email: <?= $mail_agc ?></div>
                                        <div class="flex justify-center mt-4">
                                            <a href="<?= base_url('contrats/editAgc/' . $num_contrat) ?>" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600">Modifier</a>
                                            <a href="" class="ml-2 px-4 py-2 bg-red-500 text-white rounded-full hover:bg-red-600">Supprimer</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
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