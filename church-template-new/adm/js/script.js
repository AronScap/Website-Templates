// autocomplet : this function will be executed every time we change the text
function autocomplet(idc) {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id'+idc).val(); 
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_refresh.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#country_list_id'+idc).show();
				if($('#country_id'+idc).val() == '')$('#country_list_id'+idc).hide();
				$('#country_list_id'+idc).html(data);
			}
		}); 
	} else {
		$('#country_list_id'+idc).hide();
	} 
}

// set_item : this function will be executed when we select an item
function set_item(item,id,unidade) {
	// change input value
	var i = $('#idCampo').val();
	$('#country_id'+i).val(item);
	$('#id_produto'+i).val(id);
	// hide proposition list
	$('#country_list_id'+i).hide();	
	$('#unidadejjj'+i).val(unidade);
} 

// autocomplet : this function will be executed every time we change the text
function autocomplet2( ) {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#forn_id' ).val(); 
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'ajax_forn.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#forn_list_id').show();
				if($('#forn_id').val() == '')$('#forn_list_id').hide();
				$('#forn_list_id').html(data);
			}
		}); 
	} else {


		$('#forn_list_id').hide();
	} 
}

// set_item : this function will be executed when we select an item
function set_item2(item,id) {
	// change input value 

	$('#forn_id').val(item);
	$('#id_fornecedor').val(id);
	// hide proposition list 
	$('#id_protecao').focus();
	$('#forn_list_id').hide();	

} 