<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * Função usada para fazer o debug de variáveis.
 * @param $var	var a mostrar no screen
 * @author Romeu Fonseca
 */
function my_debug($var){
	echo '<code><pre>';
	var_dump($var);
	echo '</pre></code>';
}


function format_Error($title_error, $message_error){

	return '
		<div class="error_notification">
		<div class="error_title">'.$title_error.'</div>
		<div class="error_message">'.$message_error.'</div>
		
		<div>  <a id="close_error_message">Fechar Notificação</a> </div>
		
		</div>
		
		<script type="text/javascript">
			 $(document).ready(function(){
			 
			 $("#close_error_message").click(function(){
					$(".error_notification").fadeOut("slow");
				});
			});
		</script>
		
		';

}


?>