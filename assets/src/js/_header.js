import gsap from 'gsap';

const header = {
	resize() {
		const resizeHandler = () => {
			const brandLight = document.querySelector(
				'header .site-header__brand--light'
			);
			const brandImg = document.querySelector(
				'header .site-header__brand--img'
			);
			const brandHeight = brandImg.offsetHeight;
			brandLight.style.height = `${brandHeight * 2}px`;
			brandLight.style.width = `${brandHeight * 2}px`;
		};

		// Initial resize
		resizeHandler();

		// Resize event listener
		window.addEventListener('resize', resizeHandler);
	},
	toggler() {
		const toggleBtn = document.querySelector('header .site-header__btn');
		const headerBg = document.querySelector('header .site-header__bg');
		const headerWrapper = document.querySelector(
			'header .site-header__wrapper'
		);

		let isOpen = false;

		toggleBtn.addEventListener('click', () => {
			if (!isOpen) {
				// Change background color to black
				gsap.to(headerBg, {
					backgroundColor: '#193a4d',
					opacity: 0.34,
					// duration: 0.34,
					ease: 'power2.inOut',
				});
				gsap.to(headerWrapper, {
					backdropFilter: 'blur(21px)',
					// duration: 0.34,
					ease: 'power2.inOut',
				});
				isOpen = true;
			} else {
				// Change background color to original
				gsap.to(headerBg, {
					backgroundColor: '#193a4d',
					opacity: 0,
					// duration: 0.34,
					ease: 'power2.inOut',
				});
				gsap.to(headerWrapper, {
					backdropFilter: 'blur(0px)',
					// duration: 0.34,
					ease: 'power2.inOut',
				});
				isOpen = false;
			}
		});

		const menuItems = document.querySelectorAll('.menu > li');

		menuItems.forEach((item) => {
			// const parentLink = item.querySelector('a');
			const subMenu = item.querySelector('.sub-menu');

			if (subMenu) {
				item.classList.add('has-child');
				item.addEventListener('mouseenter', () => {
					subMenu.style.display = 'block';
				});

				item.addEventListener('mouseleave', (event) => {
					// Check if mouse leaves the menu item and its children
					if (!item.contains(event.relatedTarget)) {
						subMenu.style.display = 'none';
					}
				});
			}
		});
	},
};

export default header;
