<section class="hero-banner d-flex align-items-center">
    <div class="container text-center">
        <h2>Modifier une categorie</h2>
    </div>
</section>
<section class="contact-section area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="form-contact contact_form" method="post" action="/book-crossing/category/update">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="id" value="<?= $category->getId(); ?>">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                Nom : <input class="form-control" type="text" name="categoryName" value="<?= $category->getCategoryName(); ?>">
                            </div>
                        </div>
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