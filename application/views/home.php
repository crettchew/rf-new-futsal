<script type="text/javascript">
	$(document).ready(function() {
		//$('#download_regras').hide();
	});

</script>
<div class="container">
	<div class="title">
		Bem-vindo(a) à aplicação <b>IndoorGuest</b>
	</div>
	<div class="sub-title">
		O IndoorGuest é uma aplicação de apoio à gestão dos dados desportivos de torneios de futsal realizados pela Associação Progressiva de Santo António do
		Alva.
		<br>Qualquer dúvida ou questão na utilização do sistema, por favor contacte a pessoa responsável pelo torneio.
	</div>
	<div id="body">
		<br>
		<?php
		if (isset($form_login))
			echo $form_login;
		?>
		<div>
			<?php
			if (isset($torneios))
				echo $torneios;
			?>
		</div>
	</div>
	<table cellpadding="10px" border="0" cellspacing="10px" width="100%">
		<tr style="vertical-align:text-top">
			<td><?php
				if (isset($calendario))
					echo $calendario;
			?></td>
			<td><?php
				if (isset($classificacao))
					echo $classificacao;
			?></td>
		</tr>
	</table>
</div>
