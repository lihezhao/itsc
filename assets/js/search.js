;(function($) {
	$.fn.searchForm = function(options) {
		$.fn.searchForm.settings = $.extend({}, options || {});
		$(this).children().each(function() {
			var id = $(this).attr('id');
			$.ajax({
				type: 'GET',
				url: $.fn.searchForm.getUrl(id),
				success: function(data) {
					$(id).replaceWith(data);
				}
			});
		});
	};
	
	$.fn.searchForm.getUrl = function(id) {
		var settings = $.fn.searchForm.settings;
		return settings.url + '/id/' + id;
	};
})(jQuery);