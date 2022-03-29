<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    foreach ($results as $author) {
                        echo '<tr>
                            <td><a href="/book-crossing/author/' . $author->getId() . '"> ' . $author->getId() . '</a></td>                            
                            <td>' . $author->getLastName() . '</td>
                            <td>' . $author->getFirstName() . '</td>                            
                            <td><a href="/book-crossing/author/edit/' . $author->getId() . '">Modifier</a></td>
                            <td><a href="/book-crossing/author/delete/' . $author->getId() . '">Supprimer</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
                    <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="/book-crossing/authors/<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                    </li>
                    <?php for ($page = 1; $page <= $pages; $page++) : ?>
                        <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="/book-crossing/authors/<?= $page ?>" class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="/book-crossing/authors/<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>