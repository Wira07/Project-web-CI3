<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>index.php/DataParkir">Data Parkir</a>
                        </li>
                        <?php if ($this->session->userdata("userdata")->role == "admin"){ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>index.php/DataCustomer">Data Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>index.php/DataAdmin">Data Admin</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url()?>index.php/Login">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
        <form action="<?=base_url()?>index.php/DataParkir/tambah_proses" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Plat Nomor</label>
                <input type="text" class="form-control" name="plat_nomor" id="" aria-describedby="plat_nomor"
                    placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Jenis Kendaraan</label>

                <select name="jenis_kendaraan" id="" class="form-control">
                    <?php foreach ($this->db->get('kategori')->result() as $key) { ?>
                    <option value="<?=$key->id_kategori?>"><?=$key->nm_kategori?></option>
                    <?php } ?>
                </select>
            </div>
            <input name="" id="" class="btn btn-primary" type="submit" value="Simpan">
        </form>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js">
    </script>
</body>

</html>