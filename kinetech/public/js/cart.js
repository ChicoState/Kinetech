$(function(){
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
	});
});

function addToCart(sku){
	var myURL = "/addToCart/" + sku;
	console.log(myURL);
	$.get(myURL, function(data){
		console.log(data);
		document.getElementById("cartItems").innerHTML = data;
	});
}
function removeFromCart(sku){
	var index = cart.indexOf(sku);
	if(index != -1){
		cart.splice(index, 1);
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