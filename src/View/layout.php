<html>

<head>
    <meta charset="utf-8">     
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->     
    <link rel="stylesheet" href="/book-crossing/public/css/bootstrap.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Book-crossing</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Livres</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="/book-Crossing/authors" role="button" aria-haspopup="true" aria-expanded="false">Auteurs</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/book-crossing/authors">Liste</a>
                            <a class="dropdown-item" href="/book-crossing/author/new">Ajouter</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="/book-Crossing/boxes" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/book-crossing/categories">Liste</a>
                            <a class="dropdown-item" href="/book-crossing/category/new">Ajouter</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="/book-Crossing/boxes" role="button" aria-haspopup="true" aria-expanded="false">Boites</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/book-crossing/boxes">Liste</a>
                            <a class="dropdown-item" href="/book-crossing/box/new">Ajouter</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?php if (App\Lib\Session::showFlashes('error')) : ?>
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <h4 class="alert-heading">Warning!</h4>
                <?php foreach (App\Lib\Session::getFlashes('error') as $message) : ?>
                    <p><?= $message ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <?php if (App\Lib\Session::showFlashes('success')) : ?>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?php foreach (App\Lib\Session::getFlashes('success') as $message) : ?>
                    <p><?= $message ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>
    </div>
    <div class="container mt-4">
        <?= $pageContent; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>