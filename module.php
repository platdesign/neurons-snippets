<?PHP

	
	
	
	
	
	$module = nrns::module("snippets", ['fs']);
	
	
	$module->config(function(){
	
		require 'provider/snippetProvider.php';
	
	});
	
	$module->provider("snippetProvider", "snippets\\snippetProvider");
	
	
	
	
	

?>