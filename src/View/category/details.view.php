<div class="container">
  <h2>Fiche categorier</h2>
</div>
<div class="container">
  <form method="post" action="">

    <div class="form-group mt-2">
      <label for="lastName" class="form-label">Nom : </label>
      <input type="text" class="form-control" name="lastName" value="<?= $result->getCategoryName(); ?>" readonly>
    </div>
    <div class="form-group mt-2"><input type="button" class="btn btn-info" value="Retour" onClick="document.location.href = document.referrer" />
    </div>
  </form>


</div>