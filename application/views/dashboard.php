<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
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
                <a class="nav-link" href="<?= site_url('user') ?>">Users</a>
            </li>
            <?php else: ?>
            <p></p>
            <?php endif; ?>
            
        
            
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('PokjaMil') ?>">Pokja</a>
            </li>
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
                <a class="nav-link" href="<?= site_url('Pembuktian') ?>">Pembuktian</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Negosiasi') ?>">Negosiasi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('Pemilihan') ?>">Pemilihan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('login/logout') ?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>


    <div class="container mt-4">
        <h2>Welcome to Dashboard</h2>
        <p>Welcome, <?php echo $this->session->userdata("level"); ?>!</p>

        <p>This is a simple dashboard using Bootstrap in CodeIgniter.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
