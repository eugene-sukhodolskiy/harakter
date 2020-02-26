$(document).ready(function(){
	console.log("App Ready");
	
	searchHandlers();
	formHandlers();
});

function searchHandlers(){
	$('.search-bar .go-search').on('blur', function(){
		$(this).removeClass('active');
		$(this).val('');
		$('.search-bar .clear-search-field.show').removeClass('show');
	});

	$('.search-bar .go-search').on('focus', function(){
		$(this).addClass('active');
	});

	$('.search-bar .go-search').on('input', function(){
		if($(this).val().length){
			$('.search-bar .clear-search-field').addClass('show');
		}else{
			$('.search-bar .clear-search-field.show').removeClass('show');
		}
	});
}

function formHandlers(){
	$('.form-container .input').on('focus', function(){
		$(this).parent().addClass('focus');
	}).on('blur', function(){
		if($(this).val().length){
			return false;
		}

		$(this).parent().removeClass('focus');
	});
}