<?php  
	if (isset($GET['go'])) {
		header("Location: ../index.php?go=".$_GET['go']);
	}
	else
		header("Location: ../index.php");
	exit; ?>

