<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Identifiant</th>
                        <th>Nom</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    foreach ($categories as $category) {
                        echo '<tr>
                            <td><a href="/book-crossing/category/' . $category->getId() . '"> ' . $category->getId() . '</a></td>                            
                            <td>' . $category->getCategoryName() . '</td>                                                        
                            <td><a href="/book-crossing/category/edit/' . $category->getId() . '">Modifier</a></td>
                            <td><a href="/book-crossing/category/delete/' . $category->getId() . '">Supprimer</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>