$(function() {
	$('.status').click(function() {
		var link = this;
		var jqXhr = $.ajax({
			type: 'POST',
			url: $(this).attr('href'),
			dataType:"text",
			success: function(data) {
				$(link).text(data);
			},
			error: function() {
				alert('aa');
			}
		});
		return false;
	});
});