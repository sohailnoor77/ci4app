<?= $this->extend('template/base') ?>

<!-- Title -->
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('mainContent') ?>

<div class="container mt-5">
    <?php if (session()->getFlashdata('success_msg') != null) : ?>
    <div class="alert alert-success">
        <p><?= session()->getFlashdata('success_msg'); ?></p>
    </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('message') != null) : ?>
    <div class="alert alert-danger">
        <p><?= session()->getFlashdata('message'); ?></p>
    </div>
    <?php endif; ?>
    <h2><?= $title ?></h2>
</div>

<?= $this->endSection() ?>