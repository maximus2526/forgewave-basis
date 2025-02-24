jQuery( document ).ready(
	function ($) {
		jQuery( window ).on(
			'elementor/frontend/init',
			function () {
				var swiperData = $( '.fwb-products.swiper' ).data( 'swiper_attr' );

				var Products = new Swiper(
					'.fwb-products.swiper',
					{
						slidesPerView: swiperData['slides-per-view'],
						spaceBetween: swiperData['space-between'],
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
						},
						autoplay: swiperData['autoplay'] === 'yes' ? {
							delay: swiperData['autoplay-delay'] || 2000,
						} : false,
					}
				);
			}
		);
	}
);
