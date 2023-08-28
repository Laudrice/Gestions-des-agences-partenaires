<?= $this->extend('layouts/frontend.php') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="row">
            <div class="col-md-12">
        <?php if (!empty($terroirs)) : ?>
                <?php foreach ($terroirs as $terroir) : ?>
                    <div class="container mx-auto px-5 mt-8">
                        <div class="card bg-white border rounded-lg shadow-md p-4 mb-6">
                            <div class="card-header flex justify-between items-center mb-3">
                                <h1 class="text-2xl font-bold">Terroir <?= $terroir->nom_terroir ?></h1>
                            </div>
                            <div class="contenu px-5">
                                <div class="text-gray-600 mb-2">
                                    <span class="font-bold">Code terroir:</span> <?= $terroir->code_terroir ?>
                                </div>
                                <?php 
                                    if($terroir -> nombre_intervention_du_terroir != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Nombre d'intervention:</span> <?= $terroir-> nombre_intervention_du_terroir ?>
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> nombre_intervention_terminer != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Nombre d'intervention terminée:</span> <?= $terroir-> nombre_intervention_terminer ?>
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> date_os_collecte_donnee != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Date de la collecte de données:</span> <?= $terroir-> nombre_intervention_du_terroir ?>
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> salaire_prevu_terroir != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Salaire total prévu:</span> <?= $terroir-> salaire_prevu_terroir ?> Ariary
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> salaire_paye != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Salaire payé:</span> <?= $terroir-> salaire_paye ?> Ariary
                                                <span class="font-bold">Salaire payé:</span> <?= $terroir-> salaire_paye_pourcent ?> %
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> salaire_prevu_terroir != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Salaire total prévu:</span> <?= $terroir-> salaire_prevu_terroir ?> Ariary
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> prevision != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Total des prévisions:</span> <?= $terroir-> prevision ?> Ariary
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> facture != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Facture total:</span> <?= $terroir-> salaire_prevu_terroir ?> Ariary
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> date_rapport_demarrage != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Salaire total prévu:</span> <?= $terroir-> date_rapport_demarrage ?>
                                            </div>
                                        <?php
                                    }
                                    if($terroir -> date_rapport_final != NULL)
                                    {
                                        ?>
                                            <div class="text-gray-600 mb-2">
                                                <span class="font-bold">Salaire total prévu:</span> <?= $terroir-> date_rapport_final ?>
                                            </div>
                                        <?php
                                    }
                                ?>
                                <hr class="my-3">
                                <a href="<?= base_url('contrats/terroirOperation/' . $terroir->code_terroir) ?>" class="btn btn-info sm float-end">Opération</a>

                        <?php endforeach; ?>
                <?php else : ?>
                    <p>Aucun terroir trouvé.</p>
                <?php endif; ?>
                            </div>

        <?php if (!empty($interventions)) : ?>
            <h2 class="text-xl font-semibold mt-6 mb-2">Interventions associées</h2>
            <div class="grid sm:grid-cols-2 gap-4">
                <?php foreach ($interventions as $intervention) : ?>
                    <div class="bg-white border rounded-lg shadow-md p-4">
                        <div class="text-xl font-semibold mb-2"><?= $intervention->num_itv ?></div>
                        <div class="text-gray-600 mb-2">
                            <span class="font-bold">État de l'intervention:</span> <?= $intervention->etat_itv ?>
                        </div>
                        <?php
                            if($intervention -> debut_travaux != NULL)
                            {
                                ?>
                                    <div class="text-gray-600 mb-2">
                                        <span class="font-bold">Début des travaux:</span> <?= $intervention-> debut_travaux ?>
                                    </div>
                                <?php
                            }
                            if($intervention -> debut_travaux != NULL)
                            {
                                ?>
                                    <div class="text-gray-600 mb-2">
                                        <span class="font-bold">Début des travaux:</span> <?= $intervention-> debut_travaux ?>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Aucune intervention trouvée.</p>
        <?php endif; ?>
        <br>
        <br>
    </div>
    </div>
<br>
<br>
<br>
</div>

<?= $this->endSection() ?>
