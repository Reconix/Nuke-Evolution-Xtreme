nuke_jq(function($) {
	$('#admin-select-overlay').live('click', function() {
		$('#admin-select-overlay').fadeOut();
		$('#admin-select-inner').slideUp();
	});

	$('.style-switch-admin').live('click', function(e) {
		e.preventDefault();
		
		// Get the "href" attribute
		var href = $(this).attr('href').replace(/#/, '');
		
		switch(href) {
			// Start style switch process
			case 'new':
			case 'old':
				// Set some global values
				selectedStyle = href, currentPos = $(document).scrollTop();
				$(document).scrollTop(0);
				
				$('div.admin-select-button a').css({
					'border-radius'         : '14px 5px 14px 5px',
					'-moz-border-radius'    : '14px 5px 14px 5px',
					'-webkit-border-radius' : '14px 5px 14px 5px'
				});
				
				$('#admin-select-overlay, #admin-select-inner').prependTo('body');
				
				$('#admin-select-overlay')
					.css({
						height  : $(document).height(),
						opacity : 0.5
					})
					.fadeIn();
					
				$('#admin-select-inner')
					.css({
						'box-shadow'            : '0 0 5px #000000',
						'border-radius'         : '0 0 10px 10px',
						'-moz-box-shadow'       : '0 0 5px #000000',
						'-webkit-box-shadow'    : '0 0 5px #000000',
						'-moz-border-radius'    : '0 0 10px 10px',
						'-webkit-border-radius' : '0 0 10px 10px'
					})
					.slideDown();
			break;
			
			// Finish the process
			case 'yes':
			case 'no':
				if (href === 'no') {
					$('#admin-select-overlay').fadeOut();
					$('#admin-select-inner').slideUp();
					$(document).scrollTop(currentPos);
				} else {
					$.post(admin_file + '.php', {nukeAdminAjax: true, nukeAdminStyle: selectedStyle, adminID: aid}, function(data) {
						if (data.success) {
							$('#admin-select-overlay').fadeOut();
							$('#admin-select-inner').slideUp();
							window.location = admin_file + '.php';
						} else {
							alert(data.error);
							return false;
						}
					}, 'json');
				}
			break;
			
			// Error?
			default:
				alert('Invalid parameter given!');
		}
	});
});