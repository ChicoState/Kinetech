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
function modifyArray(newBrand){
	var brand = newBrand.value.trim();
	var index = brandArray.indexOf(brand);
	if(index == -1){
		brandArray.push(brand);
	}
	else{
		brandArray.splice(index, 1);
	}
}

/**
 * author   Elliott Allmann <elliott.allmann@gmail.com>
 * @brief   Filters all elements on the products page
 * @details Modifys the array of brands to filter by,
 *          and then either hides or shows all objects
 *          on the page depending on their brand's state
 *          in the array
 * 
 * @param   The brand we are going to modify
 * @return  None
 */
function filterBrand(newBrand){
	modifyArray(newBrand);
	$('.product').each(function(){
		brand = $(this).attr('brand').trim();
		if(brandArray.indexOf(brand) == -1){
			$(this).hide();
		}
		else{
			$(this).show();
		}
	});
}

/**
 * author   Elliott Allmann <elliott.allmann@gmail.com>
 * @brief   Filters products based on minimum price
 * @details If a product price is less than the minimum price,
 *          it is hidden.
 * 
 * @param   The minimum price
 * @return  None
 */
function setMinPrice(newMinPrice){
	if(newMinPrice >= 0){
		minPrice = newMinPrice;
		filter();
	}
	else{
		minPrice = 0;
		filter();
	}
}

/**
 * author   Elliott Allmann <elliott.allmann@gmail.com>
 * @brief   Filters products based on maximum price
 * @details If a product price is greater than the maximum price,
 *          it is hidden.
 * 
 * @param   The maximum price
 * @return  None.
 */
function setMaxPrice(newMaxPrice){
	if(newMaxPrice >= 0 ){
		maxPrice = newMaxPrice;
		filter();
	}
	else{
		maxPrice = 0;
		filter();
	}
		
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
	});
}

function isInt(n){
    return Number(n) === n && n % 1 === 0;
}

function isFloat(n){
    return Number(n) === n && n % 1 !== 0;
}