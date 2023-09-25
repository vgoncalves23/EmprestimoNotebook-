<?php
$rent = OperationData::getById($_GET['id']);
$products = OperationData::getRents();

?>
<div class="row">
    <div class="col-md-12">
	<h2>Enviar e-mail (Iniciar Emprestimo)</h2>
    
  <form class="form-horizontal" role="form" method="get" action="enviar.php">
      <div class="form-group">

        
      <div class="col-lg-3">
            <label class="control-label">Modelo</label>
        	<select name="modelo" required class="form-control">
        	    <option value=""><?php echo L::fields_select; ?></option>
            	<?php foreach($products as $sell):
                $item = $sell->getItem();
                $book = $item->getBook();
                $client = $sell->getClient();
	            ?>
            	<option value="<?php echo $book->title;  ?>" <?php echo ($rent->client_id == $client->id) ? 'selected' : ''; ?>>
                    <?php echo$book->title;  ?>
                </option>
            	<?php endforeach; ?>
        	</select>
        </div>

      <div class="col-lg-3">
            <label class="control-label">Colaborador</label>
        	<select name="nome2" required class="form-control">
        	    <option value=""><?php echo L::fields_select; ?></option>
            	<?php foreach(ClientData::getAll() as $p):?>
            	<option value="<?php echo $p->name; ?>" <?php echo ($rent->client_id == $p->id) ? 'selected' : ''; ?>>
                    <?php echo $p->name." ".$p->lastname; ?>
                </option>
            	<?php endforeach; ?>
        	</select>
        </div>

        <div class="col-lg-3">
            <label class="control-label">e-mail</label>
        	<select name="email2" required class="form-control">
        	    <option value=""><?php echo L::fields_select; ?></option>
            	<?php foreach(ClientData::getAll() as $p):?>
            	<option value="<?php echo $p->email; ?>" <?php echo ($rent->client_id == $p->id) ? 'selected' : ''; ?>>
                    <?php echo $p->email ?>
                </option>
  
                <?php endforeach; ?>
        	</select>
        </div>

        <div class="col-lg-3">
        <label class="control-label"><?php echo L::fields_start; ?></label>
          <input type="date" name="start_at" required class="form-control" placeholder="<?php echo L::fields_start_date; ?>" value="<?php echo $rent->start_at; ?>">
        </div>
        
        <div class="col-lg-3">
        <label class="control-label"><?php echo L::fields_end; ?></label>
          <input type="date" name="finish_at" required class="form-control" placeholder="<?php echo L::fields_finish_date; ?>"  value="<?php echo $rent->finish_at; ?>">
        </div>

                
        <input type = "submit" value="Enviar e-mail" class="btn btn-primary" style="margin-top: 20px">
      

      

    </form>
	</div>
</div>
