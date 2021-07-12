<section class="hero-banner d-flex align-items-center">
    <div class="container text-center">
        <h2>Modifier un livre !</h2>
    </div>
</section>
<section class="contact-section area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-contact contact_form" method="post" action="/book-crossing/book/update">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="id" value="<?= $book->getId(); ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                Titre : <input class="form-control" type="text" name="title" value="<?= $book->getTitle(); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            Pages : <input class="form-control" type="text" name="pages" value="<?= $book->getPages(); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="author">Auteur : </label>
                        <select class="form-control" name="authorId">
                            <option value="0">Aucun</option>
                            <?php
                            foreach ($authors as $author) { ?>
                                <option value="<?= $author->getId(); ?>" <?= ($author->getId() === $book->getAuthorId()) ? "selected" : "" ?>><?= $author->getFirstName() . ' ' . $author->getLastName(); ?> </option>
                            <?php } ?>
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">Categorie : </label>
                        <select class="form-control" name="categoryId">
                            <?php
                            foreach ($categories as $category) { ?>

                                <option value="<?= $category->getId(); ?>" <?= ($category->getId() === $book->getCategoryId()) ? "selected" : "" ?>><?= $category->getcategoryName(); ?> </option>
                            <?php } ?>
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">Boite : </label>
                        <select class="form-control" name="boxId">
                            <?php
                            foreach ($boxes as $box) { ?>
                                <option value="<?= $box->getId(); ?>" <?= ($box->getId() === $book->getBoxId()) ? "selected" : "" ?>><?= $box->getBoxName(); ?> </option>
                            <?php } ?>
                            ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" name="modifier" value="modifier">
                        <input type="button" class="btn btn-primary" value="Retour" onClick="document.location.href = document.referrer" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>