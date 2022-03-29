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

                    foreach ($results as $box) {
                        echo '<tr>
                            <td><a href="/book-crossing/box/' . $box->getId() . '"> ' . $box->getId() . '</a></td>                            
                            <td>' . $box->getBoxName() . '</td>                                                        
                            <td><a href="/book-crossing/box/edit/' . $box->getId() . '">Modifier</a></td>
                            <td><a href="/book-crossing/box/delete/' . $box->getId() . '">Supprimer</a></td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>