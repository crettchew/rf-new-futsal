<script type="text/javascript">
	$(document).ready(function() {
		//$('#download_regras').hide();
	});

</script>
<div class="container">
	<div class="title">
		Bem vindo à aplicação <b>IndoorGuest</b>
	</div>
	<div class="sub-title">
		Aplicação de apoio à realização e gestão de torneios de futsal realizados pela Associação Progressiva de Santo António do
		Alva.
	</div>
	<div id="body">
		<?php   echo $form_login;?>
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
