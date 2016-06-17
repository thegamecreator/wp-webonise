/* zerif_latestparties_title */
	wp.customize( 'zerif_latestparties_title', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( 'section.latest-parties .section-header h2' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			else {
				$( 'section.latest-parties .section-header h2' ).addClass( 'zerif_hidden_if_not_customizer' );
			}
			$( 'section.latest-parties .section-header h2' ).html( to );
		} );
	} );
	
	/* zerif_latestparties_subtitle */
	wp.customize( 'zerif_latestparties_subtitle', function( value ) {
		value.bind( function( to ) {
			if( to != '' ) {
				$( 'section.latest-parties .section-header div.section-legend' ).removeClass( 'zerif_hidden_if_not_customizer' );
			}
			else {
				$( 'section.latest-parties .section-header div.section-legend' ).addClass( 'zerif_hidden_if_not_customizer' );
			}
			$( 'section.latest-parties .section-header div.section-legend' ).html( to );
		} );
	} );