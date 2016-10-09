$(function() {
	storage(0);
});

function storage(index) {
	var url = $('#doStorageUrl').val();
	var path = $('#path').val();
	var jqXhr = $.ajax({
		type: 'GET',
		url: url + '&path='+path+'&index='+index,
		dataType: 'json',
		success: function(data) {
			$('#progressMessage').html(data.message);
			$('progress').val(data.pos);
			$('.progress-bar').width(data.pos + '%');
			storage(data.nextIndex);
		}
	});
}