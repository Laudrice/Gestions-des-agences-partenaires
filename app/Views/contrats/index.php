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
                                <th>N°</th>
                                <th>Date</th>
                                <th>AGEC</th>
                                <th>Nb terroir</th>
                                <th>Intervention/terroir</th>
                                <th>Total prevision</th>
                                <th>Total Facture</th>
                                <th>fichier_contrat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($contrats) : ?>
                                <?php foreach ($contrats as $row) : ?>
                                    <tr>
                                        <td><?= $row['num_contrat'] ?></td>
                                        <td><?= $row['date_contrat'] ?></td>
                                        <td><?= $row['nom_agc'] ?></td>
                                        <td><?= $row['nombre_terroir'] ?></td>
                                        <td><?= $row['nombre_intervention_par_terroir'] ?></td>
                                        <td><?= $row['total_prevision'] ?></td>
                                        <td><?= $row['total_facture'] ?></td>
                                        <td><?= $row['fichier_contrat'] ?></td>
                                        <td>
                                            <a href="" class="btn btn-primary sm">Modifier</a>
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