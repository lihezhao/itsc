;(function($) {
	$.fn.searchForm = function(options) {
		$.fn.searchForm.settings = $.extend({}, options || {});
		$(this).find("div[id^='Exif_']").each(function() {
			var jThis = $(this);
			var id = jThis.attr('id');
			var jqXhr = $.ajax({
				type: 'GET',
				url: $.fn.searchForm.getUrl(id.substring(5)),
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(name, value) {
						html += '<div class="col-md-3">';
						html += '<label class="custom-control custom-checkbox">';
						html += '<input type="checkbox" class="custom-control-input" value="' + name + '" name="Exif[' + id.substring(5) + '][]">';
						html += '<span class="custom-control-indicator"></span><span class="custom-control-description">';
						html += value;
						html += '</span></label></div>';
					});
					jThis.replaceWith(html);
				}
			});
		});
		$(this).find("div[id^='Image_']").each(function() {
			var jThis = $(this);
			var id = jThis.attr('id');
			var jqXhr = $.ajax({
				type: 'GET',
				url: $.fn.searchForm.getUrl(id.substring(6)),
				dataType: 'json',
				success: function(data) {
					var html = '';
					$.each(data, function(name, value) {
						html += '<div class="col-md-3">';
						html += '<label class="custom-control custom-checkbox">';
						html += '<input type="checkbox" class="custom-control-input" value="' + name + '" name="Image[' + id.substring(6) + '][]">';
						html += '<span class="custom-control-indicator"></span><span class="custom-control-description">';
						html += value;
						html += '</span></label></div>';
					});
					jThis.replaceWith(html);
				}
			});
		});
	};
	
	$.fn.searchForm.getUrl = function(id) {
		var settings = $.fn.searchForm.settings;
		return settings.url + '/field/' + id + '/front/' + settings.front;
	};
})(jQuery);