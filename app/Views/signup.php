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
    <form class="d-flex flex-column" method="POST" action="<?= base_url('signup') ?>">
        <h2><?= $title ?></h2>

        <?= csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= isset($errors['name']) ? 'is-invalid' : "" ?>" name="name"
                    value="<?= old('name') ?>" placeholder="Full Name">
            </div>
            <?php if (isset($errors['name'])) : ?>
            <p class="invalid-feedback d-block">
                <?= $errors['name'] ?>
            </p>
            <?php endif; ?>

        </div>
        <div class="form-group mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= isset($errors['username']) ? 'is-invalid' : "" ?>"
                    name="username" value="<?= old('username') ?>" placeholder="Username">
            </div>
            <?php if (isset($errors['username'])) : ?>
            <p class="invalid-feedback d-block">
                <?= $errors['username'] ?>
            </p>
            <?php endif; ?>
        </div>
        <div class="form-group mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : "" ?>" name="email"
                    value="<?= old('email') ?>" placeholder="sohail@gmail.com">
            </div>
            <?php if (isset($errors['email'])) : ?>
            <p class="invalid-feedback d-block">
                <?= $errors['email'] ?>
            </p>
            <?php endif; ?>
        </div>
        <div class="form-group mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : "" ?>"
                    name="password" placeholder="Password">
            </div>
            <?php if (isset($errors['password'])) : ?>
            <p class="invalid-feedback d-block">
                <?= $errors['password'] ?>
            </p>
            <?php endif; ?>
        </div>
        <div class="form-group mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control <?= isset($errors['pass_confirm']) ? 'is-invalid' : "" ?>"
                    name="pass_confirm" placeholder="Confirm Password">
            </div>
            <?php if (isset($errors['pass_confirm'])) : ?>
            <p class="invalid-feedback d-block">
                <?= $errors['pass_confirm'] ?>
            </p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection() ?>