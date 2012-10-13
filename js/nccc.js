$(document).ready(function() {

	// Load content via ajax
	if ($('#nav_content').length > 0) {
		$('#nav_content div').each(function() {
			var filepath = 'content/' + $(this).attr('id') + '.html';
			$(this).load(filepath);
		});

	}
	// Nav sub-content switcher
	$('#nav_links li').click(function() {
		if ($(this).hasClass('subcontent_selected')) {
			return;
		}

		/* show selection */
		$('#nav_links li').removeClass('subcontent_selected');
		$(this).addClass('subcontent_selected');

		$('#nav_content').children().hide();
		$('#'+$(this).attr('select')).show();

		$('#nav_content').scrollTop(0);
	});

	// paypal directions popup
	/*if ($('#paypal_popup').length > 0) {
		$('#paypal_popup').dialog({ autoOpen: false, title: "Paypal Directions", minWidth: 1000, resizable: false });
		$('#paypal_directions').click(function () {
			$('#paypal_popup').dialog('open');
		});
	}*/

	// world challenge audio popup
	if ($('#wc_audio_popup').length > 0) {
		$('#wc_audio_popup').dialog({ autoOpen: false, title: "David Wilkerson Sermons", minWidth: 500, resizable: false });
		$('.external_link_wc').click(function () {
			$('#wc_audio_popup').dialog('open');
		});
	}

})