<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Bootstrap v5.2.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>

<body>
    <header>
        <!-- place navbar here -->

        <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" aria-current="page">Dashboard <span
                                    class="visually-hidden">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container" style="margin-top: 100px;">
            <div class="row mt-4">
                <div class="col-512 col-sm-8 col-md-6 m-auto  text-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10
                                    8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                            <form action="<?= base_url() ?>index.php/Login/auto" method="post">
                                <input type="text" name="username" id="username" class="form-control my-4 py-2"
                                    placeholder="Username">
                                <input type="password" name="password" id="password" class="form-control my-4 py-2"
                                    placeholder="Password">
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary w-100">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js">
    </script>
</body>

</html>