<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Buyhome Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

<?= $this->Html->css('admin/bootstrap.min');?>
<?= $this->Html->css('admin/font-awesome.min');?>
<?= $this->Html->css('admin/jquery-ui');?>
<?= $this->Html->css('admin/fullcalendar');?>
<?= $this->Html->css('admin/prettyPhoto');?>
<?= $this->Html->css('admin/rateit');?>
<?= $this->Html->css('admin/bootstrap-datetimepicker.min');?>
<?= $this->Html->css('admin/jquery.cleditor');?>
<?= $this->Html->css('admin/jquery.dataTables');?>
<?= $this->Html->css('admin/jquery.onoff');?>
<?= $this->Html->css('admin/style');?>
<?= $this->Html->css('admin/widgets');?>
<?php
echo $this->Html->script(array(
    '//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js'
));
?>
<?= $this->Html->script('admin/respond.min') ?>


</head>

<body style="background-color:#f8f8f8">

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner" style="background-color:#000;color:fff">

    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
		  <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span>Menu</span>
		  </button>
		  <!-- Site name for smallar screens -->
		  <a href="index.html" class="navbar-brand hidden-lg">Buyhome</a>
		</div>

        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-user"></i> Admin <b class="caret"></b>
            </a>

            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><?= $this->Html->link('Logout','/logout')?></li>
            </ul>
          </li>

        </ul>
      </nav>

    </div>
  </div>


<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">

        <!-- Logo section -->
        <div class="col-md-4">
          <!-- Logo. -->
          <div class="logo">
            <h1><a href="#">Buy<span class="bold">Home</span></a></h1>
          </div>
          <!-- Logo ends -->
        </div>

        <!-- Button section -->
        <div class="col-md-4">

          <!-- Buttons -->

        </div>

        <!-- Data section -->

        <div class="col-md-4">

        </div>

      </div>
    </div>
  </header>

<!-- Header ends -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <li class="has_sub"><a href="#"><i class="fa fa-list-alt"></i> Proyek  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><?= $this->Html->link('Tambah Proyek',array("controller"=>"Projects","action"=>"add"))?></li>
              <li><?= $this->Html->link('List Proyek',array("controller"=>"Projects","action"=>"index"))?></li>
            </ul>
          </li>
          <li class="has_sub"><a href="#"><i class="fa fa-file-o"></i> Order  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
              <li><?= $this->Html->link('List Order',array("controller"=>"Orders","action"=>"adminindex"))?></li>
            </ul>
          </li>
          <li><a href="#"><i class="fa fa-bar-chart-o"></i> Config</a></li>
        </ul>
    </div>

    <!-- Sidebar ends -->

    <?= $this->Flash->render() ?>
    <div class="clearfix">
        <?= $this->fetch('content') ?>
    </div>

   <!-- Mainbar ends -->
   <div class="clearfix"></div>

</div>






<!-- Footer starts -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <!-- Copyright info -->
            <p class="copy">Copyright &copy; 2016 | <a href="#">BuyHome</a> </p>
      </div>
    </div>
  </div>
</footer>

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<?= $this->Html->script('admin/jquery') ?>
<?= $this->Html->script('admin/bootstrap.min') ?>
<?= $this->Html->script('admin/jquery-ui.min') ?>
<?= $this->Html->script('admin/moment.min') ?>
<?= $this->Html->script('admin/fullcalendar.min') ?>
<?= $this->Html->script('admin/jquery.rateit.min') ?>
<?= $this->Html->script('admin/jquery.prettyPhoto') ?>
<?= $this->Html->script('admin/jquery.slimscroll.min') ?>
<?= $this->Html->script('admin/jquery.dataTables.min') ?>
<?= $this->Html->script('admin/jquery.noty') ?>
<?= $this->Html->script('admin/excanvas.min') ?>
<?= $this->Html->script('admin/jquery.flot') ?>
<?= $this->Html->script('admin/jquery.flot.resize') ?>
<?= $this->Html->script('admin/jquery.flot.pie') ?>
<?= $this->Html->script('admin/jquery.flot.stack') ?>

<?= $this->Html->script('admin/themes/default') ?>
<?= $this->Html->script('admin/layouts/bottom') ?>
<?= $this->Html->script('admin/layouts/topRight') ?>
<?= $this->Html->script('admin/layouts/top') ?>

<?= $this->Html->script('admin/sparklines') ?>
<?= $this->Html->script('admin/jquery.cleditor.min') ?>
<?= $this->Html->script('admin/bootstrap-datetimepicker.min') ?>
<?= $this->Html->script('admin/jquery.onoff.min') ?>
<?= $this->Html->script('admin/filter') ?>
<?= $this->Html->script('admin/custom') ?>
<?= $this->Html->script('admin/charts') ?>

</body>
</html>
