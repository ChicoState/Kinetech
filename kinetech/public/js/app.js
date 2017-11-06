//global array for storing brands we are showing to the user
//temp solution, should do this in local storage or the session
var brandArray = [];
var minPrice = -100;
var maxPrice = -100;
/**
 * @author  Elliott Allmann <elliott.allmann@gmail.com>
 * @brief   Modifys the array of Brands
 * @details Adds or removes the given brand
 *          from the brandArray. Used for 
 *          filtering products by brand.
 * 
 * @param   The brand we are going to add/sub from array
 * @return  None
 */
function filterBrand(newBrand){
	var brand = newBrand.value.trim();
	var index = brandArray.indexOf(brand);
	if(index == -1){
		brandArray.push(brand);
	}
	else{
		brandArray.splice(index, 1);
	}
	filter();
}

/**
 * author   Elliott Allmann <elliott.allmann@gmail.com>
 * @brief   Sets a new minimum price
 * @details Checks to see if the new minPrice is greater than -1. If the
 *          user passes a negative, just set it to 0.
 * 
 * @param   The minimum price
 * @return  None
 */
function setMinPrice(newMinPrice){
	if(newMinPrice >= 0){
		minPrice = newMinPrice;
	}
	else{
		minPrice = 0;
	}
	filter();
}

/**
 * author   Elliott Allmann <elliott.allmann@gmail.com>
 * @brief   Sets a new maximum price
 * @details Checks to see if the new maxPrice is greater than -1. If the
 *          user passes a negative, just set it to 0.
 * 
 * @param   The maximum price
 * @return  None.
 */
function setMaxPrice(newMaxPrice){
	if(newMaxPrice >= 0 ){
		maxPrice = newMaxPrice;
	}
	else{
		maxPrice = 0;
	}
	filter();
		
}
function filter(){	
$('.product').each(function(){
		var price = parseFloat($(this).attr('price'));
		
		//if both maxPrice and minPrice are set
		if(maxPrice > -100 && minPrice > -100){
			if(price > parseFloat(maxPrice) || price < parseFloat(minPrice)){
				$(this).hide();
			}
			else{
				$(this).show();
			}
		}
		//else if just maxPrice is set
		else if(maxPrice > -100){
			if(price > parseFloat(maxPrice)){
				$(this).hide();
			}
			else{
				$(this).show();
			}
		}
		//else if just minPrice is set
		else if(minPrice > -100){
			if(price < parseFloat(minPrice)){
				$(this).hide();
			}
			else{
				$(this).show();
			}
		}
		//filter by the brand
		if(brandArray.length > 0){
			var brand = $(this).attr('brand').trim();
			if(brandArray.indexOf(brand) == -1 ){
				$(this).hide();
			}
			else if(maxPrice >= price && minPrice <=  price){
				$(this).show();
			}
		}
	});
}



function isInt(n){
    return Number(n) === n && n % 1 === 0;
}

function isFloat(n){
    return Number(n) === n && n % 1 !== 0;
}