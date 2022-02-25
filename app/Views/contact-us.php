<?= $this->extend('template/base') ?>
<!-- Title -->
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('mainContent') ?>
<!-- Form -->
<div class="container">
    <h2>Contact Us Page <?= $email; ?></h2>

    <!-- Errors -->
    <? //if (isset($form_error)) : 
    ?>
    <?php // echo $form_error; 
    ?>
    <? //endif; 
    ?>

    <?= $c_f['form_open'] ?>
    <div class="form-group mb-3">
        <?= form_label('Email') ?>
        <?= $c_f['email'] ?>
        <?php if ($form_error != null && $form_error->hasError('email')) : ?>
        <?= $form_error->showError('email', 'my_single'); ?>
        <?php endif; ?>
    </div>
    <div class="form-group mb-3">
        <?= form_label('Name') ?>
        <?= $c_f['name'] ?>
        <?php if ($form_error != null && $form_error->hasError('name')) : ?>
        <?= $form_error->showError('name', 'my_single'); ?>
        <?php endif; ?>
    </div>
    <div class="form-group mb-3">
        <?= form_label('Message') ?>
        <?= $c_f['message'] ?>
        <?php if ($form_error != null && $form_error->hasError('message')) : ?>
        <?= $form_error->showError('message', 'my_single'); ?>
        <?php endif; ?>
    </div>

    <?= form_submit(['value' => 'Contact Us', 'class' => 'btn btn-primary', 'name' => 'submit']) ?>

    <?= form_close(); ?>
</div>

<!-- End Main Content -->
<?= $this->endSection() ?>