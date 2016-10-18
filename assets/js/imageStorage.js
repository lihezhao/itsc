$(function() {
	var paths = $('.path');
	var url = $('#scanUrl');
	$.each(paths, function() {
		var path = $(this);
		var p = path.parent();
		var fc = p.find('.fileCount');
		var dc = p.find('.folderCount');
		var dfc = p.find('.folderFileCount');
		var jqXhr = $.ajax({
			type: 'GET',
			url: url.val(),
			dataType: 'json',
			data: {'path': path.val()},
			success: function(data) {
				fc.text(data.fileCount);
				dc.text(data.folderCount);
				dfc.text(data.folderFileCount);
			}
		});
	});
})
