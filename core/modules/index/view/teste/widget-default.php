<?php

$rent = OperationData::getById($_GET['id']);
$products = OperationData::getRents();

if($_SESSION["user_id"]!=""){
$operation = OperationData::getById($_GET["id"]);
$item = ItemData::getById($operation->item_id);
$item->avaiable();
$operation->finalize();
$_SESSION['message'] = L::messages_rent_finalized_with_success;
$_SESSION['alert_type'] = 'success';
//Core::redir("./?view=teste");

}

?>
<div class="row">
    <div class="col-md-12">
	<h2>Enviar e-mail (Finalizar Emprestimo)</h2>

    <form class="form-horizontal" role="form" method="get" action="enviar2.php">
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

        <input type = "submit" value="Enviar e-mail" class="btn btn-primary" style="margin-top: 20px">

    </form>

    </div>
</div>