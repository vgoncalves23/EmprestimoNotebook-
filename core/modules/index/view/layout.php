<?php
if(!is_numeric(Session::getUID()) && (isset($_GET['view']) || isset($_GET['action']))) header('Location: index.php');
elseif(is_numeric(Session::getUID()) && (!isset($_GET['view']) && !isset($_GET['action']))) header('Location: index.php?view=home');
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprestimo Notebooks</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/select2.css" rel="stylesheet">
    <link href="css/select2-bootstrap.css" rel="stylesheet">

    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <style>
        .mandatory {
            background: url('./img/mandatory_fields.png') no-repeat !important;
            background-size: contain !important;
            text-align: left !important;
            text-indent: -20000px !important;
            display: inline-block;
            width: 10px;
            height: 10px;
        }
    </style>
    <script src="js/jquery-1.10.2.js"></script>
    <?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>
    <?php endif; ?>
    <script src='js/select2.min.js'></script>

      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">

      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
  </head>

  <body>
  <a href="#page-wrapper" class="sr-only" accesskey="1">Pular para o Conteúdo</a>
  <a href="#navegacao" class="sr-only" accesskey="2">Pular para o Menu de Navegaçao</a>
    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <div class="navbar-header">

        <img src = "img/acoforja.jpeg" class = "logo" width="50px">
        
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            

            <span class="sr-only"><?php echo L::navbar_toggle_nav; ?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./"><h1 style="font-size: 1em; padding:0; margin:0;">Notebooks</h1></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
<?php
$u=null;
if(Session::getUID()!=""):
  $u = UserData::getById(Session::getUID());
?>
         <ul class="nav navbar-nav" id="navegacao">
          </ul>
          <ul class="nav navbar-nav side-nav" role="menu">
          <li role="menuitem"><a href="index.php?view=home"><i class="fa fa-home"></i> <?php echo L::navbar_home; ?></a></li>
          <li role="menuitem"><a href="index.php?view=rent"><i class="fa fa-cube"></i> <?php echo L::navbar_loan; ?></a></li>
          
          
          <?php if($u->is_admin):?>
          
            <li role="menuitem"><a href="index.php?view=rents"><i class="fa fa-th-large"></i> <?php echo L::navbar_loans; ?></a></li>
          <li role="menuitem"><a href="index.php?view=books"><i class="fa fa-book"></i> Notebooks</a></li>
          <li role="menuitem"><a href="index.php?view=clients"><i class="fa fa-male"></i> <?php echo L::navbar_clients; ?></a></li>
          <li role="menuitem"><a href="index.php?view=reports"><i class="fa fa-area-chart"></i> <?php echo L::navbar_relatories; ?></a></li>
          <li role="menuitem"><a href="index.php?view=users"><i class="fa fa-users"></i> <?php echo L::navbar_users; ?> </a></li>
            
          
          <?php endif;?>
          </ul>




<?php endif;?>



<?php if(Session::getUID()!=""):?>
<?php
$u=null;
if(Session::getUID()!=""){
  $u = UserData::getById(Session::getUID());
  $user = $u->name." ".$u->lastname;

  }?>
          <ul class="nav navbar-nav navbar-right navbar-user">

            <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php echo L::messages_welcome . ' ' . $user; ?> <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=configuration"><?php echo L::navbar_config; ?></a></li>
          <li><a href="logout.php"><?php echo L::navbar_exit; ?></a></li>
        </ul>
        </li>
        </ul>
<?php else:?>
<?php endif; ?>




        </div><!-- /.navbar-collapse -->
      </nav>


      <div id="page-wrapper">
          <?php
          if (isset($_SESSION['message']))
          {
              if (!isset($_SESSION['alert_type'])) $_SESSION['alert_type'] = 'info';
              echo '<p role="alert" aria-live="assertive" class="alert alert-' . $_SESSION['alert_type'] .'">' . $_SESSION['message'] . '</p>';
              unset($_SESSION['message']);
          }

        // puedo cargar otras funciones iniciales
        // dentro de la funcion donde cargo la vista actual
        // como por ejemplo cargar el corte actual
        View::load("login");

        ?>



      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->

<script src="js/bootstrap.min.js"></script>
  <script>
          var table = $('#datatable').DataTable({
              keys: true,
              language : {
                  emptyTable: "<?php echo L::datatables_sEmptyTable; ?>",
                  info: "<?php echo L::datatables_sInfo; ?>",
                  infoEmpty: "<?php echo L::datatables_sInfoEmpty; ?>",
                  infoFiltered: "<?php echo L::datatables_sInfoFiltered; ?>",
                  infoPostFix: "<?php echo L::datatables_sInfoPostFix; ?>",
                  infoThousands: "<?php echo L::datatables_sInfoThousands; ?>",
                  lengthMenu: "<?php echo L::datatables_sLengthMenu; ?>",
                  loadingRecords: "<?php echo L::datatables_sLoadingRecords; ?>",
                  processing: "<?php echo L::datatables_sProcessing; ?>",
                  zeroRecords: "<?php echo L::datatables_sZeroRecords; ?>",
                  search: "<?php echo L::datatables_sSearch; ?>",
                  paginate: {
                      next: "<?php echo L::datatables_oPaginate_sNext; ?>",
                      previous: "<?php echo L::datatables_oPaginate_sPrevious; ?>",
                      first: "<?php echo L::datatables_oPaginate_sFirst; ?>",
                      last: "<?php echo L::datatables_oPaginate_sLast; ?>",
                  },
                  aria: {
                      sortAscending: "<?php echo L::datatables_oAria_sSortAscending; ?>",
                      sortDescending: "<?php echo L::datatables_oAria_sSortDescending; ?>"
                  }
              }
          });

          $('.paginate_button').find('a:first').each(function () {
              if ($.isNumeric($(this)[0].innerHTML)){
                  $(this).attr('aria-label', 'Página ' + $(this)[0].innerHTML);
              }
              else {
                  $(this).attr('aria-label', $(this)[0].innerHTML);
              }
          });

          $('.active').find('a:first').each(function () {
              $(this).attr('aria-selected', 'true');
          });

          function searchDatatable(){
              table.search($("#txtSearch").val()).draw();
              return false;
          }
          $('#datatable_filter').find('label:first').remove();
          $('#datatable_filter').append('<form onsubmit="return searchDatatable()"><label for="txtSearch">Pesquisar</label> <input type="text" id="txtSearch" class="form-control"> <button  type="button" id="filter" class="btn btn-primary">OK</button></form>');

  </script>
</body>
</html>
