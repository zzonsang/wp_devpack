jQuery(document).ready

( function( $ ) {

	// Add Upgrade Message
	if ('undefined' !== typeof prefixL10n) {
		upsell = $('<br /><a class="prefix-upsell-link"></a>')
			.attr('href', prefixL10n.prefixURL)
			.attr('target', '_blank')
			.text(prefixL10n.prefixLabel)
			.css({
				'display' : 'inline-block',
				'background-color' : '#f18500',
				'color' : '#fff',
				'text-transform' : 'uppercase',
				'margin-top' : '5px',
				'padding' : '4px 10px',
				'font-size': '11px',
				'letter-spacing': '1.25px',
				'line-height': '1.5',
				'clear' : 'both'
			})
		;

		setTimeout(function () {
			$('#accordion-section-themes h3').append(upsell);
		}, 200);

		// Remove accordion click event
		$('.prefix-upsell-link').on('click', function(e) {
			e.stopPropagation();
		});
	}

} )