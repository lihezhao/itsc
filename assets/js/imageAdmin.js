$(function() {
	init();
	
	

	$(document).on('click', '.sticky .value', function(){
		$(this).hide();
		$(this).next().show().get(0).focus();
	});
	

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
	});
	
	$('.sticky .input-group').each(function(){
		var value;
		$(this).children('textarea').each(function() {
			value = $(this).html();
		});
		$(this).children('input').each(function() {
			value = $(this).val();
		});
		if(this.tagName=='SELECT')
			value=this.options[this.selectedIndex].text;
		
		if(value=='')
			value='[empty]';
		$(this).before('<div class="value">'+value+'</div>').hide();
	});
	
	$('button[name=saveDescription]').click(function() {
		var jDescription = $(this).prev();
		var jParent = $(this).parent();
		var jqXhr = $.ajax({
			type: 'POST',
			url: $(this).val() + '&id=' + $(this).attr('id') + '&description=' + jDescription.val(),
			success: function() {
				jParent.hide();
				jParent.prev().show();
				jParent.prev().html(jDescription.val());
			}
		});
	});
	$('button[name=saveTags]').click(function() {
		var jTags = $(this).parent().prev();
		var jParent = $(this).parent().parent();
		var jqXhr = $.ajax({
			type: 'POST',
			url: $(this).val() + '&tags=' + jTags.val(),
			success: function() {
				jParent.hide();
				jParent.prev().show();
				jParent.prev().html(jTags.val());
			}
		});
	});
	
}

function adminLoadImages() {
	init();
	loadImages();

}