<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Welcome to CodeIgniter</title>
<link rel="stylesheet" type="text/css"
	href="<?php echo base_url("css/styles.css") ?>">
<script type="text/javascript"
	src="<?php echo base_url("js/jquery_1_6_3.js") ?>"></script>
<script type="text/javascript">
			$(document).ready(function() {
				//$('body').hide();
				//$('body').fadeIn('slow');

				$("ul.subnav").parent().append("<span></span>");
				//Only shows drop down trigger when js is enabled (Adds empty span tag after ul.subnav*)

				$("ul.topnav li a").mouseover(function() {
					//Following events are applied to the subnav itself (moving subnav up and down)
					$(this).parent().find("ul.subnav").slideDown('fast').show();
					//Drop down the subnav on click

					$(this).parent().hover(function() {
					}, function() {
						$(this).parent().find("ul.subnav").slideUp('fast');
						//When the mouse hovers out of the subnav, move it back up
					});
					//Following events are applied to the trigger (Hover events for the trigger)
				}).hover(function() {
					$(this).addClass("subhover");
					//On hover over, add class "subhover"
				}, function() {//On Hover Out
					$(this).removeClass("subhover");
					//On hover out, remove class "subhover"
				})

				$("ul.topnav li a").click(function() {//When trigger is clicked...

					//Following events are applied to the subnav itself (moving subnav up and down)
					$(this).parent().find("ul.subnav").slideDown('fast').show();
					//Drop down the subnav on click

					$(this).parent().hover(function() {
					}, function() {
						$(this).parent().find("ul.subnav").slideUp('fast');
						//When the mouse hovers out of the subnav, move it back up
					});
					//Following events are applied to the trigger (Hover events for the trigger)
				}).hover(function() {
					$(this).addClass("subhover");
					//On hover over, add class "subhover"
				}, function() {//On Hover Out
					$(this).removeClass("subhover");
					//On hover out, remove class "subhover"
				});
			});

		</script>
</head>
<body>
<div style="background: Black; height: 130px;">
<div id="header_image"></div>
</div>
<div class="clear"></div>
<div id="menu-header">

<ul class="topnav">
	<li><?php echo anchor('', 'Página Inicial'); ?></li>
	<li><?php echo anchor('home/login', 'Login'); ?></li>
	<li><?php echo anchor('app', 'Torneios'); ?>
	<ul class="subnav">
		<li><?php echo anchor('app', 'Visualizar dados do Torneio'); ?></li>
		<li><?php echo anchor('app', 'Editar dados do Torneio'); ?></li>
	</ul>

	</li>
	<li><?php echo anchor('app', 'Grupos'); ?>
	<ul class="subnav">
		<li><?php echo anchor('app', 'Listar Grupos'); ?></li>
		<li><?php echo anchor('app', 'Criar Novo Grupo'); ?></li>
	</ul>

	</li>
	<li><a href="#">Equipas</a>
	<ul class="subnav">
		<li><a href="#">Listar Equipas</a></li>
		<li><a href="#">Criar Nova Equipa</a></li>

	</ul>
	</li>
	<li><a href="#">Jodagores</a>
	<ul class="subnav">
		<li><a href="#">Listar Jogadores</a></li>
		<li><a href="#">Criar Jogadores</a></li>
		<li><a href="#">Listar Jogadores por Equipa</a></li>
	</ul>
	</li>
	<li><a href="#">Jornadas</a>
	<ul class="subnav">
		<li><a href="#">Listar Jogos</a></li>
		<li><a href="#">Criar Novo Jogo</a></li>
		<li><a href="#">Listar Jogadores por Equipa</a></li>
	</ul>
	</li>
	<li><a href="#">Classificação</a>
	<ul class="subnav">
		<li><a href="#">Classificação Geral</a></li>
	</ul>
	</li>
	<li><a href="#">Administração</a>
	<ul class="subnav">
		<li><?php echo anchor('app', 'Gestão de Utilizadores'); ?></li>
		<li><?php echo anchor('app', 'Gestão de Torneios'); ?></li>
		<li><?php echo anchor('app', 'Gestão de Equipas de Arbitragem'); ?></li>
	</ul>
	</li>
	<li><a href="#">Sair da Aplicação</a></li>
</ul>

</div>
<div id="container">