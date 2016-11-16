var count = 0;

$(function() {
	loadImages();
});

function loadImages() {
	var images = $('.img-thumbnail');
	$.each(images, function() {
		var image = this;
		if ($(image).attr('data-original') == 'images/loading.jpg') {
			var jqXhr = $.ajax({
				type: 'GET',
				url: '/itsc/image/thumb/' + image.id + '/256/256',
				dataType:"text",
				success: function(data) {
					$(image).attr("data-original", data);
					count++;
					if (count == images.length) {
						count = 0;
						images.lazyload({
							effect: 'fadeIn',
							threshold : 30,
							load: doMasonry,
						});
						
					}
				}
			});
			$.ajax({
				type: 'GET',
				url: '/itsc/image/thumb/' + image.id + '/1200/1200',
				dataType: 'text',
				success: function(data) {
					$(image).parent().attr('href', data);
				}
			});
		} else {
			count++;
			if (count == images.length) {
				count = 0;
				images.lazyload({
					effect: 'fadeIn',
					threshold : 30,
					load: doMasonry,
				});
			}
		}
		
	});
	
	jQuery("span[id^='rating'] > input").rating({'callback':starRating});
}

function doMasonry() {
	$('.gallery').masonry({
		// options
		itemSelector: '.grid-item',
		columnWidth: 6,
		isAnimated: true,
	});
}

function starRating(value, link) {
	var jId = $(this).parent().parent().find('#id');
	var jMyStar = $(this).parent().parent().find('#mystar_voting');
	var jqXhr = $.ajax({
		type: 'POST',
		url: '/gallery/rating?id=' + jId.val() + '&value=' + value,
		success: function(data) {
			jMyStar.html(data);
		}
	});
}

