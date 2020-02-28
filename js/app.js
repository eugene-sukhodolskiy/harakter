$(document).ready(function(){
	console.log("App Ready");
	
	searchHandlers();
	formHandlers();
	adaptiveMenuHandlers();
	partnersCarousel();
	popupControl();
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

function adaptiveMenuHandlers(){
	$('.sandwitch').on('click', function(){
		$('.navbar').addClass('active');
		setTimeout(function(){
			$('.social-bar').addClass('show');
		}, 200);
		$(this).hide();
		$('.close-nav').show();
	});

	$('.close-nav').on('click', function(){
		$(this).hide();
		$('.sandwitch').show();
		setTimeout(function(){
			$('.navbar').removeClass('active');
		}, 200);
		$('.social-bar').removeClass('show');
	});
}

function popupControl(){
	$('[data-popup]').on('click', function(e){
		e.preventDefault();
		$('.popup.active').removeClass('active');
		let popupName = $(this).attr('data-popup');
		$('.' + popupName).addClass('active');
		$('.popup-back').addClass('active');
		return false;
	});

	$('.popup-back').on('click', function(){
		$('.popup.active').removeClass('active');
		$(this).removeClass('active');
	});
}

function partnersCarousel(){
	$('.partners-carousel').slick({
		dots: false,
		infinite: false,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 6,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 3000,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});
}