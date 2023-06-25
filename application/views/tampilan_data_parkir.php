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

                <form class="d-flex my-2 my-lg-0" action="<?=base_url()?>index.php/DataParkir" method="GET">
                    <input class="form-control me-sm-2" type="text" placeholder="Search Plat Nomor" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <main class="container">
        <h3>Data Parkir
            <div class="text-right" style="float: right">
                <button type="button" class="btn btn-primary" onclick="print()">Print</button>
            </div>
        </h3>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Plat Nomor</th>
                        <th scope="col">Jenis Kendaraan</th>
                        <th scope="col">Jam Masuk</th>
                        <th scope="col">Jam Keluar</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Status Member</th>
                        <th scope="col">
                            <a name="" id="" class="btn btn-primary" href="<?=base_url()?>index.php/DataParkir/tambah"
                                role="button">Tambah data</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (@$_GET['query']){
                        $query = $this->db->like('data_kendaraan.no_pol', $_GET['query'])->join('kategori', 'data_kendaraan.id_kategori = kategori.id_kategori')->get('data_kendaraan')->result();
                    }else{
                        $query = $this->db->join('kategori', 'data_kendaraan.id_kategori = kategori.id_kategori')->get('data_kendaraan')->result();
                    }
                    foreach ($query as $key => $value) {
                    ?>
                    <tr class="">
                        <td scope="row"><?=$value->id_kendaraan?></td>
                        <td><?=$value->no_pol?></td>
                        <td><?=$value->nm_kategori?></td>
                        <td scope="row"><?=$value->jam_masuk?></td>
                        <td><?=$value->jam_keluar?></td>
                        <td><?=$value->harga?></td>
                        <td><?=$value->status_member?></td>
                        <td>
                            <?php if ($this->session->userdata('userdata')->role == "kasir"){ ?>
                            <a name="" id="" class="btn btn-success"
                                href="<?=base_url()?>index.php/DataParkir/keluar_sekarang/<?=$value->id_kendaraan?>"
                                role="button">Keluar Sekarang</a>
                            <?php } ?>
                            <a name="" id="" class="btn btn-primary"
                                href="<?=base_url()?>index.php/DataParkir/edit/<?=$value->id_kendaraan?>"
                                role="button">Edit</a>
                            <a name="" id="" class="btn btn-danger"
                                href="<?=base_url()?>index.php/DataParkir/hapus/<?=$value->id_kendaraan?>"
                                role="button">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js">
    </script>
</body>

</html>