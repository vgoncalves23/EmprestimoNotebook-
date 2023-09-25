<?php
$book = BookData::getById($_GET["id"]);
$categories = CategoryData::getAll();
$authors = AuthorData::getAll();
$editorials = EditorialData::getAll();

?>

<div class="row">
<div class="col-md-12">
<h2><?php echo $book->title; ?> <small>Editar Notebook</small></h2>
<form class="form-horizontal" role="form" method="post" action="./?action=updatebook" id="addbook">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Codigo</label>
    <div class="col-lg-10">
      <input type="text" name="isbn" class="form-control" value="<?php echo $book->isbn; ?>" id="inputEmail1" placeholder="Codigo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><?php echo L::fields_title; ?></label>
    <div class="col-lg-10">
      <input type="text" name="title" required class="form-control" value="<?php echo $book->title; ?>" id="inputEmail1" placeholder="<?php echo L::fields_title; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><?php echo L::fields_subtitle; ?></label>
    <div class="col-lg-10">
      <input type="text" name="subtitle" class="form-control" value="<?php echo $book->subtitle; ?>" id="inputEmail1" placeholder="<?php echo L::fields_subtitle; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label"><?php echo L::fields_description; ?></label>
    <div class="col-lg-10">
    <textarea class="form-control" name="description" placeholder="<?php echo L::fields_description; ?>"><?php echo $book->description; ?></textarea>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id" value="<?php echo $book->id; ?>">
      <button type="submit" class="btn btn-success">Adiconar Notebook</button>
      <button type="reset" class="btn btn-default" id="clear"><?php echo L::buttons_clean_fields; ?></button>
    </div>
  </div>
</form>

</div>
</div>
