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
            <div class="card">
                <div class="card-header">
                    Contrats
                    <a href="<?= base_url('contrats/create') ?>" class="btn btn-info sm float-end">Ajouter</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>AGEC</th>
                                <th>Adresse</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($contrats) : ?>
                                <?php foreach ($contrats as $row) :
                                    $num_contrat = $row['num_contrat'];
                                    $nom_agc = $row['nom_agc'];
                                    $adresse_agc = $row['adresse_agc'];
                                    $tel_agc = $row['tel_agc'];
                                    $mail_agc = $row['mail_agc'];
                                ?>
                                    <tr>
                                        <td><?= $nom_agc ?></td>
                                        <td><?= $adresse_agc ?></td>
                                        <td><?= $tel_agc ?></td>
                                        <td><?= $mail_agc ?></td>
                                        <td>
                                            <a href="<?= base_url('contrats/editAgc/' . $num_contrat) ?>" class="btn btn-primary sm">Modifier</a>
                                            <a href="" class="btn btn-danger sm">Supprimer</a>
                                        </td>


                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>