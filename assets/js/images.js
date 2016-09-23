$(function() {
	loadImages(null, null);
});

function loadImages(id, data) {
	var images = $('.img-thumbnail');
	var count = 0;
	$.each(images, function() {
		var image = this;
		var jqXhr = $.ajax({
			type: 'GET',
			url: '/itsc/image/thumb/' + image.id + '/256/256',
			dataType:"text",
			success: function(data) {
				$(image).attr("src", data);
				$(image).bind("load", function () {
					count++;
					if (count == images.length) {
						$('.grid').masonry({
							// options
							itemSelector: '.grid-item',
							columnWidth: 6,
							isAnimated: true,
						});
					}
				});
			}
		});
	});
}
