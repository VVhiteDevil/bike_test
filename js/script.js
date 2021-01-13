(function( $ ) {
	$( document ).ready( function() {
			$( "#to-top-btn" ).on( 'click', function( event ) {
				if ( this.hash !== "" ) {
					event.preventDefault();
					var hash = this.hash;
					$( 'html, body' ).animate( {
						scrollTop: $( hash ).offset().top
					}, 800, function() {
						window.location.hash = hash;
					} )
				}
			} )
			$( "#items-count" ).change( function() {
				$( "#items-counter" ).submit();
			} )
			$( "#sort" ).change( function() {
				$( "#sort-by" ).submit();
			} )
			/* Add quote icon quote*/
			var quote_icon_tag = "<i></i>";
			$( "blockquote p" ).append( quote_icon_tag );
			$( "blockquote i" ).addClass( "fas fa-quote-left" );
			/* Add quote icon link*/
			var link_icon_tag = "<i></i>";
			$( ".link p" ).append( quote_icon_tag );
			$( ".link p i" ).addClass( "fas fa-link" );
		} );
} )( jQuery );