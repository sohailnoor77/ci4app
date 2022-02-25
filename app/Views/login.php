<?= $this->extend('template/base') ?>

<!-- Title -->
<?= $this->section('title') ?>
<?= $title ?>
<?= $this->endSection() ?>
<!-- Initializing Errors -->
<?php
$errors = null;
if (session()->getFlashdata('errors') != null) :
    $errors = session()->getFlashdata('errors');
endif;
// var_dump($errors);
?>

<!-- Main Content -->
<?= $this->section('mainContent') ?>
<?php var_dump($errors); ?>
<div class="container mt-5">
    <!-- Register Success Message -->
    <?php if (session()->getFlashdata('message') != null) : ?>
    <div class="alert alert-success">
        <p><?= session()->getFlashdata('message'); ?></p>
    </div>
    <?php endif; ?>

    <!-- Logout Success Message -->
    <?php if (session()->getFlashdata('logout_msg') != null) : ?>
    <div class="alert alert-success">
        <p><?= session()->getFlashdata('logout_msg'); ?></p>
    </div>
    <?php endif; ?>
    <form class="d-flex flex-column" method="POST" action="<?= base_url('login') ?>">
        <h2><?= $title ?></h2>

        <!-- Login Errors Message -->
        <?php if (session()->getFlashdata('error') != null) : ?>
        <div class="alert alert-danger">
            <p><?= session()->getFlashdata('error'); ?></p>
        </div>
        <?php endif; ?>

        <?= csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" value="<?= old('email'); ?>" id="email"
                    placeholder="Email">
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" value="<?= old('password'); ?>"
                    id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>