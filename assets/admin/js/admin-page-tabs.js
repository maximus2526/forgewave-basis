// Options page tabs
jQuery( document ).ready(
	function ($) {

		$( '.nav-tab-wrapper a' ).click(
			function (event) {
				event.preventDefault();
				var tab_id = $( this ).attr( 'href' );

				$( '.nav-tab-wrapper a' ).removeClass( 'nav-tab-active' );
				$( this ).addClass( 'nav-tab-active' );

				if (tab_id === '#all_tab') {
					$( '.fwb-section' ).show();
				} else {
					$( '.fwb-section' ).hide();
					$( 'div[id^="' + tab_id.substr( 1 ) + '"]' ).show();
				}
				localStorage.setItem( 'activeTab', tab_id );
			}
		);

		var activeTab = localStorage.getItem( 'activeTab' );
		if (activeTab) {
			$( '.nav-tab-wrapper a[href="' + activeTab + '"]' ).addClass( 'nav-tab-active' ).siblings().removeClass( 'nav-tab-active' );
			$( activeTab ).closest( '.fwb-container' ).find( '.fwb-section' ).show();
		} else {
			$( '.nav-tab-wrapper a:first' ).addClass( 'nav-tab-active' );
			$( '.fwb-section:first' ).show();
		}

		$( '.nav-tab-wrapper a[href="' + activeTab + '"]' ).trigger( 'click' );

		$( 'form' ).submit(
			function () {
				var activeTab = $( '.nav-tab-wrapper .nav-tab-active' ).attr( 'href' );
				localStorage.setItem( 'activeTab', activeTab );
			}
		);
	}
);
