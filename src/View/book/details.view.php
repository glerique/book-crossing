<div class="container">
    <h2>Fiche livre</h2>
</div>
<div class="container">
    <form method="post" action="">

        <div class="form-group mt-2">
            <label for="lastName" class="form-label">Tritre : </label>
            <input type="text" class="form-control" name="title" value="<?= $book->getTitle(); ?>" readonly>
        </div>
        <div class="form-group mt-2">
            <label for="lastName" class="form-label">Pages : </label>
            <input type="text" class="form-control" name="pages" value="<?= $book->getPages(); ?>" readonly>
        </div>
        <div class="form-group mt-2"><input type="button" class="btn btn-info" value="Retour" onClick="document.location.href = document.referrer" />
        </div>
    </form>


</div>