<script type="text/javascript">
	$(document).ready(function() {
		//$('#download_regras').hide();
		$(document).ready(function() {
			$('.simple_table').dataTable({
				"bPaginate" : true,
				"bLengthChange" : true,
				"bFilter" : true,
				"bSort" : true,
				"bInfo" : true,
				"bAutoWidth" : true,
				"oLanguage" : {
					"sLengthMenu" : "A mostrar _MENU_ registos por página",
					"sZeroRecords" : "Não foram encontrados quaisquer registos",
					"sInfo" : "A mostrar _START_ de _END_ de um total de _TOTAL_ registos",
					"sInfoEmpty" : "A mostrar 0 de 0 de um total de 0 registos",
					"sInfoFiltered" : "(filtrado de um total de _MAX_ registos)",
					"sSearch" : "Pesquisar"
				}

			});
		});
	});

</script>
<div class="container">
	<div class="title">
		Gestão de torneios
	</div>
	<div class="sub-title">
		Neste ecrã poderá visualizar e editar os dados correspondentes aos diferentes torneios existentes na aplicação. Será neste ecrã que poderá criar um novo torneio.
	</div>
	<div id="contents">
		<div style="padding: 10px; background: #f4f4f4">
			<button>
				Criar novo Torneio
			</button>
		</div>
		<?php

			if (isset($torneios))
				echo $torneios;
		?>
		
	</div>
</div>
