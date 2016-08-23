$(function() {
	var images = $('.img-thumbnail');
	var url = $('#imageUrl').val();
	var count = 0;
	$.each(images, function() {
		var image = this;
		var jqXhr = $.ajax({
			type: 'GET',
			url: url  + "&id=" + image.id + "&width=256&height=256",
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
	$('.custom-control-input').click(function() {
		$('#search-form').submit();
	});

});