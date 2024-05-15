<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap4.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('Dashboard') ?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <?php if ($this->session->userdata("level") === 'admin'): ?>
                <li class="nav-item">
                <a class="nav-link" href="<?= site_url('PokjaMil') ?>">Pokja</a>
            </li>
            <?php else: ?>
            <p></p>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Paket') ?>">Paket</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Penjelasan') ?>">Penjelasan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Evaluasi') ?>">Evaluasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Klarifikasi') ?>">Klarifikasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('login/logout') ?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>
