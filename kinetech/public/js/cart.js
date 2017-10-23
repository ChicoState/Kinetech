$(function(){
	$.ajaxSetup({
		headers: { 'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')}
	});
});

function addToCart(sku){
	$.post('/cart', {"sku": sku}, 
		function(data){
			console.log(data);
		});
}