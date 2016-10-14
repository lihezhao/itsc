$(function() {
	var image = $('#image');
	var url = $('#imageUrl');
	var folderCount = image.find('#folderCount');
	var folderFileCount = image.find('#folderFileCount');

	$.ajax({
		type: 'GET',
		url: url.val(),
		dataType: 'json',
		success: function(data) {
			folderCount.text(data.folderCount);
			folderFileCount.text(data.folderFileCount);
		}
	});
	
	var paths = $('#path');
	url = $('#thumbUrl');
	$.each(paths, function() {
		var path = $(this);
		var p = path.parent();
		var folderCount = p.find('#folderCount');
		var folderFileCount = p.find('#folderFileCount');
		jqXhr = $.ajax({
			type: 'GET',
			url: url.val(),
			dataType: 'json',
			data: {'path': path.val()},
			success: function(data) {
				folderCount.text(data.folderCount);
				folderFileCount.text(data.folderFileCount);
			}
		});
	});
	
	$('#image-thumb-form').submit(function() {
		buildThumb(0);
		return false;
	})
});

function buildThumb(index) {
	var url = $('#buildThumbUrl');
	var size = $('#ImageThumbForm_size');
	$.ajax({
		type: 'GET',
		url: url.val(),
		dataType: 'json',
		data: {'index': index},
		success: function(data) {
			$('#progressMessage').html(data.message);
			$('progress').val(data.pos);
			$('.progress-bar').width(data.pos + '%');
			buildThumb(data.nextIndex);
		}
	});	
}