<?php 
	if ((isset($erroresPDF))||(isset($generadoOk))):
		echo "<hr>";
		if ((isset($erroresPDF))):
			echo ''.
			'<div class="alert alert-danger" role="alert">'.
				'<p>'.$erroresPDF.'</p>'.
			'</div>';
		endif;
		if (isset($generadoOk)):
			echo ''.
				'<div class="alert alert-success" role="alert">'.
					'<p>'.$generadoOk.'</p>'.
				'</div>';
		endif;
	endif;
?>