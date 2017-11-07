$(document).ready(function(){
	var alterarProd = document.getElementsByClassName("alteraProduto");
	var ultimoAlt = alterarProd[alterarProd.length - 1];
	ultimoAlt.setAttribute("class", "ultimoAltera");
	ultimoAlt.setAttribute("dusk", "ultimoAltera");

	var removerProd = document.getElementsByClassName("removeProduto");
	var ultimoRem = removerProd[removerProd.length - 1];
	ultimoRem.setAttribute("class", "ultimoRemove")
	ultimoRem.setAttribute("dusk", "ultimoRemove")
})
