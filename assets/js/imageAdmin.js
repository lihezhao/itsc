$(function() {
	init();
});

function init() {
	$('.status').click(function() {
		var btn = $(this).parent().parent().find('.btn');
		var jqXhr = $.ajax({
			type: 'POST',
			url: $(this).attr('href'),
			dataType:"json",
			success: function(data) {
				btn.text(data.status);
			},
			error: function() {
				alert('aa');
			}
		});
		$(this).dropdown('toggle');
		return false;
	})
}

function adminLoadImages() {
	loadImages();
	init();
}