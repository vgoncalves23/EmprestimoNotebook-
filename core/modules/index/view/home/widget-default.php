<?php
$rents = OperationData::getRents();
?>
<div class="row">
    <div class="col-md-12">
        <h2><?php echo L::titles_homepage; ?></h2>
        <a href="#laterents" class="sr-only">Pular para Tabela de Empréstimos Atrasados</a>
        <a href="#explain" class="sr-only">Pular para Explicação do Sistema</a>
        <hr>
    </div>
    <div class="col-md-5">
        <h3>Bem vindo ao Sistema de Emprestimo de Notebook</h3>
        <p>Sistema de Gestão para Equipamentos TI. Para verificar a diponibilidade de entrega para cada colaborador ao realizar um emprestimo de notebook</p>
        <ul>
            <li>Cadastro de Solicitantes: Cadastrar usuário que utilizará um dos notebook's</li>
            <li>Notebooks: Cadastro de Notebooks Açoforja  </li>
            <li>Novo Emprestimo: Realizar o emprestimo do notebook para o determinado solicitante  </li>

        </ul>
    
        <h4>Saiba Mais</h4>
        <ul>
           
        </ul>
    </div>
    <div class="col-md-7">
        <?php ob_start(); ?>
        <h3><?php echo L::titles_late_rents; ?></h3>
        <?php
        foreach ($rents as $rent)
        {
            if (strtotime(Dates::convertDateTypesToDB($rent->finish_at)) < strtotime(date('Y-m-d')))
                $none = false;
            else
                if (!isset($none)) $none = true;
        }
        if (isset($none)) if (!$none):
        ?>
         <table id="datatable" class="table table-hover">
            <thead>
            <tr>
                <th><?php echo L::fields_copie; ?></th>
                <th><?php echo L::fields_book; ?></th>
                <th><?php echo L::fields_client; ?></th>
                <th><?php echo L::fields_expire; ?></th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($rents as $rent):
                $item = $rent->getItem();
                $book = $item->getBook();
                $client = $rent->getClient();

                if (strtotime(Dates::convertDateTypesToDB($rent->finish_at)) < strtotime(date('Y-m-d'))):
            ?>
            <tr>
                <td><?php echo $item->code; ?></td>
                <td><?php echo $book->title; ?></td>
                <td><?php echo $client->name." ".$client->lastname; ?></td>
                <td><?php echo $rent->finish_at; ?></td>
            </tr>
            <?php
            endif;
            endforeach;
            ?>
        </table>
        <?php
        $content = ob_get_contents();
        ob_end_flush();
        ?>
        <form target="_blank" action="index.php?action=pdfreports" method="post">
            <textarea name="table" id="contenttable" cols="30" rows="10" style="display: none !important;"><?php echo $content; ?></textarea>
            
        </form>
        <?php
        else: echo '<p class="alert alert-info">' . L::messages_no_late_rents . '</p>';
        endif;
        else echo '<p class="alert alert-info">' . L::messages_no_late_rents . '</p>';
        ?>
    </div>

</div>
