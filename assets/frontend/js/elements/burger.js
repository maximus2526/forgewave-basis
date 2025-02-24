document.addEventListener(
	'DOMContentLoaded',
	function () {
		var burgerElement = document.querySelector( '.fwb-burger-element' );
		var burgerContent = document.querySelector( '.fwb-burger-content' );

		burgerElement.addEventListener(
			'click',
			function () {
				burgerContent.style.display = 'block';
			}
		);

		var burgerClose = document.querySelector( '.fwb-burger-close' );
		burgerClose.addEventListener(
			'click',
			function () {
				burgerContent.style.display = 'none';
			}
		);
	}
);
