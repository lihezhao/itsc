$(function() {
	storage(0);
});

function storage(index) {
	var url = $('#doStorageUrl').val();
	var path = $('#path').val();
	$.ajax({
		type: 'POST',
		url: url,
		data: {'path': path, 'index': index},
		dataType: 'json',
		success: function(data) {
			$('progress').val(data.pos);
			$('.progress-bar').width(data.pos + '%');
			storage(data.nextIndex);
		}
	});
}