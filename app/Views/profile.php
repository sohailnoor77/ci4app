<?= $this->extend('template/base') ?>

<!-- Title -->
<?= $this->section('title') ?>
<?= 'User Profile' ?>
<?= $this->endSection() ?>

<!-- Main Content -->
<?= $this->section('mainContent') ?>

<div class="container mt-5">
    <!-- Update Profile Success Message -->
    <?php if ($message = session()->getFlashdata('profileUpdate')) : ?>
    <div class="alert alert-success" role="alert">
        <strong><?= $message ?></strong>
    </div>
    <?php endif; ?>
    <!-- Cannot Update Profile -->
    <?php if ($message = session()->getFlashdata('cannotUpdate')) : ?>
    <div class="alert alert-danger" role="alert">
        <strong><?= $message ?></strong>
    </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-10">
            <h1><?= session()->get('user')['username'] ?? 'N/A' ?></h1>
        </div>
        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image"
                    class="img-circle img-responsive"
                    src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-center">
                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                <h6>Upload a different photo...</h6>
                <input type="file" class="text-center center-block file-upload">
            </div>
            </hr><br>

        </div>
        <!--/col-3-->
        <div class="col-sm-9">
            <!-- Tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">Change Password</button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content mt-4" id="myTabContent">
                <!-- Home -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">Full Name:</label>
                        <span><?= $name ?? 'N/A' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">Email:</label>
                        <span><?= session()->get('user')['email'] ?? 'N/A' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">Address:</label>
                        <span><?= $address ?? 'N/A' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">City:</label>
                        <span><?= $city ?? 'N/A' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">State:</label>
                        <span><?= $state ?? 'N/A' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">Country:</label>
                        <span><?= $country ?? 'N/A' ?></span>
                    </div>

                </div>

                <!-- Edit Profile -->
                <div class="tab-pane pb-5 fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <?php if (allowEdit(session()->get('user')['username'])) : ?>
                    <form class="row g-3" action="<?= base_url('users/' . $user_id . '/profile') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= session()->get('user')['email'] ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="<?= $address ?? 'N/A' ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">City</label>
                            <input type="text" class="form-control" name="city" id="city" value="<?= $city ?? 'N/A' ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">State</label>
                            <input type="text" class="form-control" name="state" id="state"
                                value="<?= $state ?? 'N/A' ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="inputCity" class="form-label">Country</label>
                            <input type="text" class="form-control" name="country" id="country"
                                value="<?= $country ?? 'N/A' ?>">
                        </div>

                        <div class="col-3">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary">Reset</button>
                        </div>
                    </form>

                    <?php else : ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>You are not allowed to edit this profile.</strong>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Change Password -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <!-- Initializing Errors -->
                    <?php
                    $errors = null;
                    if (session()->getFlashdata('errors') != null) :
                        $errors = session()->getFlashdata('errors');
                    endif;

                    if (session()->getFlashdata('update_password') != null) :
                        $update_password = session()->getFlashdata('errors');
                    endif;

                    ?>

                    <!-- Update Errors Message -->
                    <?php if (session()->getFlashdata('error') != null) : ?>
                    <div class="alert alert-danger">
                        <p><?= session()->getFlashdata('error'); ?></p>
                    </div>
                    <?php endif; ?>

                    <!-- Update Success Message -->
                    <?php if (session()->getFlashdata('update_password') != null) : ?>
                    <div class="alert alert-success">
                        <p><?= session()->getFlashdata('update_password'); ?></p>
                    </div>
                    <?php endif; ?>


                    <?php if (allowEdit(session()->get('user')['username'])) : ?>
                    <form class="row g-3" action="<?= base_url('users/password') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Old Password</label>
                            <input type="password"
                                class="form-control <?= isset($errors['old_password']) ? 'is-invalid' : "" ?>"
                                name="old_password" id="old_password" placeholder="Old Password">
                            <!-- Password Error Show -->
                            <?php if (isset($errors['old_password'])) : ?>
                            <p class="invalid-feedback d-block">
                                <?= $errors['old_password'] ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">New Password</label>
                            <input type="password"
                                class="form-control <?= isset($errors['password']) ? 'is-invalid' : "" ?>"
                                name="password" id="password" placeholder="New Password">
                            <!-- Password Error Show -->
                            <?php if (isset($errors['password'])) : ?>
                            <p class="invalid-feedback d-block">
                                <?= $errors['password'] ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Confirm Password</label>
                            <input type="password"
                                class="form-control <?= isset($errors['pass_confirm']) ? 'is-invalid' : "" ?>"
                                name="pass_confirm" id="pass_confirm" placeholder="Confirm Password">
                            <!-- Password Error Show -->
                            <?php if (isset($errors['pass_confirm'])) : ?>
                            <p class="invalid-feedback d-block">
                                <?= $errors['pass_confirm'] ?>
                            </p>
                            <?php endif; ?>
                        </div>

                        <div class="col-3">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                    <?php else : ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>You are not allowed to edit this profile.</strong>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->

<?= $this->endSection() ?>