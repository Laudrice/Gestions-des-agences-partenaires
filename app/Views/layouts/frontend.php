<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter 4</title>
    <link href="https://cdn.tailwindcss.com/2.2.19/tailwind.min.css" rel="stylesheet">

    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">



</head>

<body>

    <div class="app">

        <?= $this->include('layouts/inc/navbar.php') ?>


        <?= $this->renderSection('content') ?>

    </div>


    <script src="<?= base_url('assets/js/jquery-3.7.0.js') ?>"></script>
    <script src="<?= base_url('assets/js/*popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>