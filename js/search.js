class Search{
	constructor(){
		this.containers = {
			"searchField": $(".search-bar .go-search"),
			"searchInput": $(".search-input"),
			"clearBtn": $(".clear-search-field"),
			"searchResultContainer": $(".search-results"),
			"adaptiveGoSearchBtn": $(".adaptive-go-search"),
			"adaptiveSearchBar": $(".adaptive-search-bar"),
			"adaptiveClearBtn": $(".adaptive-search-bar .clear-search-field")
		};

		this.initEventHandlers();
		console.log('Search init');
	}

	initEventHandlers(){
		let self = this;

		this.containers.searchField.on('blur', function(){
			let field = $(this);
			setTimeout(function(){
				field.removeClass('active');
				field.val('');
				self.containers.clearBtn.removeClass('show');
			}, 100);
		});

		this.containers.searchField.on('focus', function(){
			$(this).addClass('active');
		});

		this.containers.searchField.on('input', function(){
			if($(this).val().length){
				self.containers.clearBtn.addClass('show');
			}else{
				self.containers.clearBtn.removeClass('show');
			}
		});

		this.containers.clearBtn.on('click', function(){
			self.containers.searchInput.val('');
			self.containers.searchResultContainer.html('');
		});

		this.containers.adaptiveGoSearchBtn.on('click', function(){
			self.containers.adaptiveSearchBar.addClass('active');
		});

		this.containers.adaptiveClearBtn.on('click', function(){
			self.containers.adaptiveSearchBar.removeClass('active');
		});

		this.containers.searchInput.on('input', function(){
			let searchQueryString = $.trim($(this).val());
			if(searchQueryString.length < 2){
				self.containers.searchResultContainer.hide();
				return false;
			}

			let searchData = {
				'action' : 'th_ajax_search',
				'term' : searchQueryString
			}

			$.ajax({
				url: "/wp-admin/admin-ajax.php",
				data: searchData,
				type: "POST",
				beforeSend: function(){
					self.containers.searchResultContainer.hide();
				},
				success: function(result){
					result = JSON.parse(result);
					let html = "";
					let searchQueryReg = RegExp(searchQueryString, 'gi');
					for(let item of result){
						item['title'] = item['title'].replace(searchQueryReg, function(subStr){
							return "<strong>" + subStr + "</strong>";
						});

						html += '<a href="' + item['link'] + '" class="search-item">' + item['title'] + '</a>';
					}
					self.containers.searchResultContainer.html(html);
					self.containers.searchResultContainer.show();
				}
			})
		});
	}
}