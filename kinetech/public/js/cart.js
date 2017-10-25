var cart = [];
$(function(){
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
	});
});

function addToCart(sku){

}
function removeFromCart(sku){
	var index = cart.indexOf(sku);
	if(index != -1){
		cart.cplice(index, 1);
	}
}

function printCart(){
	console.log(cart);
}

function addCart(){
	console.log(cart);
	$.ajax({
		method: "POST",
		url: '/addCart',
		data: cart
	}); 
}