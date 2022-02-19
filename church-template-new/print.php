<?php  
	require "assets/config.php";
	function gerarexcel($produtosnotas){
		// print_r($produtosnotas);echo "<br><br>";exit;
		$dadosXls  = "";
		$dadosXls .= "  <table border='1' >";
		$dadosXls .= "          <tr>";
		$dadosXls .= "          <th>NOME</th>";
		$dadosXls .= "          <th>TELEFONE</th>";
		$dadosXls .= "          <th>EMAIL</th>";
		$dadosXls .= "          <th>LIDER?</th>";
		$dadosXls .= "          <th>TELEFONE LIDER</th>";
		$dadosXls .= "          <th>RESPONSAVEL</th>";
		$dadosXls .= "      </tr>";

		foreach($produtosnotas as $res){
		    $dadosXls .= "      <tr>";
		    $dadosXls .= "          <td>".$res['nomecompleto']."</td>";
		    $dadosXls .= "          <td>".$res['telefone']."</td>";
		    $dadosXls .= "          <td>".$res['email']."</td>";
		    $dadosXls .= "          <td>".$res['lideranca']."</td>";
		    $dadosXls .= "          <td>".$res['telefonelider']."</td>";
		    $dadosXls .= "          <td>".$res['nomeresponsavel']."</td>";
		    $dadosXls .= "      </tr>";
		}
		$dadosXls .= "  </table>";

		$arquivo = "lista.xlsx";

		header('Content-Type: application/vnd.ms-excel; charset=utf-8');
		header('Content-Disposition: attachment;filename="'.$arquivo.'"');
		header('Cache-Control: max-age=0');
		header('Cache-Control: max-age=1');
		echo $dadosXls;  
		exit;
	}
	$queryinscritos = "
		SELECT 
			inscricaoevento.datacadastro,
			contato.nomecompleto,
			contato.email,
			contato.telefone,
			contato.lideranca,
			contato.telefonelider,
			contato.nomeresponsavel
		FROM inscricaoevento
			JOIN contato ON contato.contatoID = inscricaoevento.contatoID
		WHERE inscricaoevento.eventoID = '1'
		ORDER BY inscricaoevento.datacadastro DESC
	";
	$numinscritos = $database->num_rows($queryinscritos);
	if ($numinscritos > 0) {
		$inscritoslist = $database->get_results($queryinscritos);
		gerarexcel($inscritoslist);
	}
	exit;
?>