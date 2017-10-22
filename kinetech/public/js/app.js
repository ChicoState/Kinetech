//global array for storing brands we are showing to the user
//temp solution, should do this in local storage or the session
var brandArray = [];

/**
 * @author     Elliott Allmann <elliott.allmann@gmail.com>
 * @brief Modifys the array of Brands
 * @details Adds or removes the given brand
 *          from the brandArray. Used for 
 *          filtering products by brand.
 * 
 * @param  The brand we are going to add/sub from array
 * @return None
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
 * author     Elliott Allmann <elliott.allmann@gmail.com>
 * @brief Filters all elements on the products page
 * @details Modifys the array of brands to filter by,
 *          and then either hides or shows all objects
 *          on the page depending on their brand's state
 *          in the array
 * 
 * @param  The brand we are going to modify
 * @return None
 */
function filterBrand(newBrand){
	modifyArray(newBrand);
	$('.product').each(function(){
		brand = $(this).attr('brand').trim();
		if(brandArray.indexOf(brand) == -1){
			console.log('hide');
			$(this).hide();
		}
		else{
			console.log('show');
			$(this).show();
		}
	});
}