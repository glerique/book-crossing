<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Titre</th>
                        <th>Pages</th>
                        <th>Auteur</th>
                        <th>Category</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($books as $book) {
                        echo '<tr>
                            <td><a href="/book-crossing/book/' . $book->getId() . '"> ' . $book->getId() . '</a></td>                            
                            <td>' . $book->getTitle() . '</td>
                            <td>' . $book->getPages() . '</td>
                            <td>' . $book->getAuthor() . '</td>
                            <td>' . $book->getCategory() . '</td>                                                          
                            <td><a href="/book-crossing/book/edit/' . $book->getId() . '">Modifier</a></td>
                            <td><a href="/book-crossing/book/delete/' . $book->getId() . '">Supprimer</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="/book-crossing/books/<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) : ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="/book-crossing/books/<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="/book-crossing/books/<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>