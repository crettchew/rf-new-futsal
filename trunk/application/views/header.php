<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<title>APSAA - IndoorGest</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/styles.css") ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/smoothness/jquery-ui-1.8.16.custom.css") ?>">
		<script type="text/javascript" src="<?php echo base_url("js/jquery_1_6_3.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/jquery.dataTables.min.js") ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("js/jquery-ui-1.8.16.custom.min.js") ?>"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				//$('body').hide();
				//$('body').fadeIn('slow');

				// a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
				$("#dialog:ui-dialog").dialog("destroy");

				$("#dialog-message").dialog({
					modal : true,
					buttons : {
						Ok : function() {
							$(this).dialog("OK");
						}
					}
				});

				$("ul.subnav").parent().append("<span> <\/span>");
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
				});

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
				<li>
					<?php     echo anchor('', 'Página Inicial');?>
				</li>
				<?php

if (!isset($this->session->userdata['logged_in'])){
$logged_in = FALSE;
}
else{
$logged_in = $this->session->userdata['logged_in'];
}

if ($logged_in){
				?>

				<li>
					<?php     echo anchor('app/intro', 'Torneios');?>
					<ul class="subnav">
						<li>
							<?php     echo anchor('app', 'Visualizar dados do Torneio');?>
						</li>
						<li>
							<?php     echo anchor('home/torneios', 'Editar dados do Torneio');?>
						</li>
					</ul>
				</li>
				<li>
					<?php     echo anchor('app', 'Grupos');?>
					<ul class="subnav">
						<li>
							<?php     echo anchor('app', 'Listar Grupos');?>
						</li>
						<li>
							<?php     echo anchor('app', 'Criar Novo Grupo');?>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Equipas</a>
					<ul class="subnav">
						<li>
							<a href="#">Listar Equipas</a>
						</li>
						<li>
							<a href="#">Criar Nova Equipa</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Jodagores</a>
					<ul class="subnav">
						<li>
							<a href="#">Listar Jogadores</a>
						</li>
						<li>
							<a href="#">Criar Jogadores</a>
						</li>
						<li>
							<a href="#">Listar Jogadores por Equipa</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Jornadas</a>
					<ul class="subnav">
						<li>
							<a href="#">Listar Jogos</a>
						</li>
						<li>
							<a href="#">Criar Novo Jogo</a>
						</li>
						<li>
							<a href="#">Listar Jogadores por Equipa</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Relatórios</a>
					<ul class="subnav">
						<li>
							<a href="#">Classificação Geral</a>
						</li>
						<li>
							<a href="#">Melhor Marcador</a>
						</li>
						<li>
							<a href="#">Jogador Mais Novo</a>
						</li>
						<li>
							<a href="#">Classificação Geral</a>
						</li>
						<li>
							<a href="#">Classificação Geral</a>
						</li>
						<li>
							<a href="#">Classificação Geral</a>
						</li>
						<li>
							<a href="#">Classificação Geral</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Administração</a>
					<ul class="subnav">
						<li>
							<?php     echo anchor('administracao/Utilizadores', 'Gestão de Utilizadores');?>
						</li>
						<li>
							<?php     echo anchor('area/Torneios', 'Gestão de Torneios');?>
						</li>
						<li>
							<?php     echo anchor('app', 'Gestão de Equipas de Arbitragem');?>
						</li>
						<li>
							<?php     echo anchor('home/Links', 'Gestão de Calendário');?>
						</li>
					</ul>
				</li>
				<?php     }?>
				<li>
					<a href="#">Links</a>
					<ul class="subnav">
						<li>
							<?php     echo anchor('home/Links', 'Links Úteis');?>
						</li>
						<li>
							<?php

								$image_properties = array(
										'src' => 'images/pdf-logo.png',
										'alt' => 'Clique para aceder às regras do Futsal definidas pela FIFA',
										'class' => 'post_images',
										'width' => '20',
										'height' => '20',
										'title' => 'Clique para aceder às regras do Futsal definidas pela FIFA'
								);

								echo anchor(base_url("files/leis_futsal_2010_11.pdf"), 'Regras do Futsal definidas pela FIFA ' . img($image_properties), 'target="_blank"');
							?>
						</li>
					</ul>
				</li>
				<?php if ($logged_in){
				?>
				<li>
					<?php     echo anchor('home/processalogout', 'Sair');?>
				</li>
				<?php     }?>
			</ul>
		</div>
		<div id="breadcrumbs">
			<table style="width: 100%;">
				<tr align="left">
					<td>
					<div class="breadcrumbs">
						<?php
							$this -> load -> helper('breadcrumb');
							$exclude = array(
									'0' => 'home',
									'1' => 'processalogin',
									'2' => 'app',
									'3' => 'processalogout',
									'4' => 'area'
							);
							echo set_breadcrumb(' > ', $exclude);
						?>
					</div></td>
					<td align="right" style="padding-right: 10px;"><?php
						if ($logged_in) {
							//var_dump($this->session->userdata);
							echo "Olá <b>" . $this -> session -> userdata['username'] . "</b>. Bem vindo à aplicação.<br>";
							//Acesso IP: " . $this -> session -> userdata['ip_address'] . "";
						}
					?></td>
				</tr>
			</table>
		</div>
