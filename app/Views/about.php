<?= $this->extend('template/base') ?>

<!-- Title -->
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('mainContent') ?>

<div class="row">
    <div class="col-md-3">
        <?= $this->include('partials/sidebar') ?>
    </div>
    <div class="col-md-6">
        <h2>About Page <?= $name; ?></h2>
    </div>
    <div class="col-md-3">
        <?= $this->include('partials/sidebar') ?>
    </div>
</div>

<?= $this->endSection() ?>