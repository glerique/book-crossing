<section class="hero-banner d-flex align-items-center">
    <div class="container text-center">
        <h2>Ajouter un livre</h2>
    </div>
</section>
<section class="contact-section area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-contact contact_form" method="post" action="/book-crossing/book/create">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                Nom : <input class="form-control" type="text" name="title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                Pages : <input class="form-control" type="text" name="pages">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="service">Autheur : </label>
                        <select class="form-control" name="authorId">
                            <?php foreach ($authors as $author) {
                                echo '<option value =' . $author->getId() . '>' . $author->getLastName() . $author->getFirstName() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service">Categorie : </label>
                        <select class="form-control" name="categoryId">
                            <?php foreach ($categories as $category) {
                                echo '<option value =' . $category->getId() . '>' . $category->getCategoryName() . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" name="ajouter" value="poster">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>