<?php

$categories = CategoryData::getAll();
$authors = AuthorData::getAll();
$editorials = EditorialData::getAll();

?>

<div class="row">
<div class="col-md-12">
<h2>Novo Notebook</h2>
<p class="alert alert-info"><span class="mandatory"><?php echo L::fields_mandatory; ?></span> <?php echo L::messages_mandatory_fields; ?></p>
<form class="form-horizontal" role="form" method="post" action="./?action=addbook" id="addbook">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Hostname</label>
    <div class="col-lg-10">
      <input type="text" name="isbn" class="form-control" id="inputEmail1" placeholder="Hostname">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><?php echo L::fields_title; ?> <span class="mandatory"><?php echo L::fields_mandatory; ?></span></label>
    <div class="col-lg-10">
      <input type="text" name="title" required class="form-control" id="inputEmail1" placeholder="<?php echo L::fields_title; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><?php echo L::fields_subtitle; ?></label>
    <div class="col-lg-10">
      <input type="text" name="subtitle" class="form-control" id="inputEmail1" placeholder="<?php echo L::fields_subtitle; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><?php echo L::fields_description; ?></label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" placeholder="<?php echo L::fields_description; ?>"></textarea>
    </div>

  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Adicionar Notebook</button>
      <button type="reset" class="btn btn-default" id="clear"><?php echo L::buttons_clean_fields; ?></button>
    </div>
  </div>
</form>

</div>
</div>
