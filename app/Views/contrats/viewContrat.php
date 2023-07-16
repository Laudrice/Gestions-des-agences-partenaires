<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>


<!-- Contrat -->
<div class="w-90 mx-5 px-5 mt-4 p-4 border bg-white">
    <h1 style="font-size: 36px; text-align: center;" class="mb-5"><u><b>Contrats :</b></u></h1>
    <div class="flex">
        <div class="w-1/2">
            <div class="mb-4">
                <label class="font-bold">N° contrat:</label>
                <span class="ml-2"><?= $contrat->num_contrat ?></span>
            </div>
            <div class="mb-4">
                <label class="font-bold">Nom de l'agence d'encadrement:</label>
                <span class="ml-2"><?= $contrat->nom_agc ?></span>
            </div>
            <div class="mb-4">
                <label class="font-bold">Tel:</label>
                <span class="ml-2"><?= $contrat->tel_agc ?></span>
            </div>
        </div>
        <div class="w-1/2">
            <div class="mb-4">
                <label class="font-bold">Date du contrat:</label>
                <span class="ml-2"><?= $contrat->date_contrat ?></span>
            </div>
            <div class="mb-4">
                <label class="font-bold">Adresse de l'agence:</label>
                <span class="ml-2"><?= $contrat->adresse_agc ?></span>
            </div>
            <div class="mb-4">
                <label class="font-bold">Mail:</label>
                <span class="ml-2"><?= $contrat->mail_agc ?></span>
            </div>
        </div>
    </div>
    <hr class="mb-5">
    <!-- Affichage des terroirs associés au contrat dans un tableau -->
    <h1 style="font-size: 36px; text-align: center;" class="mb-5"><u><b>Terroirs :</b></u></h1>

    <?php if (!empty($terroirs)) : ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="text-align: center;">
                <thead>
                    <tr>
                        <th class="d-none">num_contrat</th>
                        <th>N°</th>
                        <th>Nom</th>
                        <th>Intervention</th>
                        <th>Actions</th>
                        <!-- Ajoutez d'autres en-têtes de colonnes selon les besoins -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($terroirs as $terroir) : ?>
                        <tr>
                            <td class="d-none"><?= $terroir->num_contrat ?></td>
                            <td><?= $terroir->code_terroir ?></td>
                            <td><?= $terroir->nom_terroir ?></td>
                            <td>
                                <?php if (!empty($terroir->interventions)) : ?>
                                    <ul>
                                        <?php foreach ($terroir->interventions as $intervention) : ?>
                                            <li><a href=""><?= $intervention->num_itv ?></a> : <?= $intervention->etat_itv ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p>Aucune intervention pour ce terroir.</p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary sm">Voir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else : ?>
        <p>Aucun terroir trouvé pour ce contrat.</p>
    <?php endif; ?>
</div>
<br>
<script src="<?= base_url('assets/js/jquery-3.7.0.js') ?>"></script>





<?= $this->endSection() ?>