<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title><?= $this->renderSection('title') ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary">
        <div class="container-fluid d-flex justify-content-between">
            <a class="navbar-brand text-white " href="<?= base_url('home') ?>">JMM</a>

            <ul class="navbar-nav">
                <?php if (!loggedIn()) : ?>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('login') ?>">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('signup') ?>">Signup</a>
                </li>
                <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('profile') ?>">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('logout') ?>">Logout</a>
                </li>
                <?php endif; ?>
            </ul>

        </div>
    </nav>
    <?= $this->renderSection('mainContent') ?>
    <!-- Bootstrap JS  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>