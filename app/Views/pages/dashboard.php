<?= $this->extend('templates/index'); ?>

<?= $this->section('content'); ?>

<h1><?= $user_name; ?></h1>
<h1><?= $user_email; ?></h1>
<h1><?= $user_role; ?></h1>

<?= $this->endSection(); ?>