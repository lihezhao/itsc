$(function() {
	var paths = $('.path');
	var url = $('#scanUrl');
	$.each(paths, function() {
		var path = $(this);
		var p = path.parent();
		var fc = p.find('.fileCount');
		var sdc = p.find('.subdirCount');
		var sdfc = p.find('.subdirfileCount');
		var jqXhr = $.ajax({
			type: 'GET',
			url: url.val(),
			dataType: 'json',
			data: {'path': path.val()},
			success: function(data) {
				fc.text(data.fileCount);
				sdc.text(data.subdirCount);
				sdfc.text(data.subdirfileCount);
			}
		});
	});
})
