$(function() {
	$('.progress').hide();
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
	
	var paths = $("input[name='path']");
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
		$('.progress').show();
		var button = $("input[name='buildThumb']");
		button.button('loading');
		var size = $('#ImageThumbForm_size');
		buildThumb(size.val(), 0);
		return false;
	})
});

function buildThumb(size, index) {
	var url = $('#buildThumbUrl');
	var jqXhr = $.ajax({
		type: 'GET',
		url: url.val(),
		dataType: 'json',
		data: {'size': size, 'index': index},
		success: function(data) {
			$('#progressMessage').html(data.message);
			$('progress').val(data.pos);
			$('.progress-bar').width(data.pos + '%');
			buildThumb(size, data.nextIndex);
		}
	});	
}
