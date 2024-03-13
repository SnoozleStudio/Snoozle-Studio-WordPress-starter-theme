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
		const toggleBtnSpans = toggleBtn.querySelectorAll('span');
		const headerBg = document.querySelector('header .site-header__bg');
		const headerContent = document.querySelector(
			'header .site-header__content'
		);
		const headerWrapper = document.querySelector(
			'header .site-header__wrapper'
		);

		let isOpen = false;

		toggleBtn.addEventListener('click', () => {
			toggleBtnSpans.forEach((el) => {
				el.classList.toggle('site-header__btn--hide');
			});

			if (!isOpen) {
				// Change background color to black
				gsap.to(headerBg, {
					backgroundColor: '#193a4d',
					opacity: 0.34,
					ease: 'power2.inOut',
				});
				gsap.to(headerWrapper, {
					backdropFilter: 'blur(21px)',
					ease: 'power2.inOut',
				});
				gsap.to(headerContent, {
					opacity: 1,
					delay: 0.34,
					ease: 'power2.inOut',
				});
				isOpen = true;
			} else {
				// Change background color to original
				gsap.to(headerBg, {
					backgroundColor: '#193a4d',
					opacity: 0,
					ease: 'power2.inOut',
				});
				gsap.to(headerWrapper, {
					backdropFilter: 'blur(0px)',
					ease: 'power2.inOut',
				});
				gsap.to(headerContent, {
					opacity: 0,
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

		// // Get the text content of the button
		// const buttonContent =
		// 	document.querySelector('.site-header__btn').textContent;

		// // Remove leading and trailing whitespace from the button content
		// const trimmedContent = buttonContent.trim();

		// // Split the text content into an array of characters
		// const buttonCharArray = trimmedContent.split('');

		// let buttonHTML = '';

		// // Construct HTML markup for each non-space character
		// buttonCharArray.forEach((char) => {
		// 	if (char !== ' ') {
		// 		buttonHTML +=
		// 			'<span class="single-box"><span class="single-char">' +
		// 			char +
		// 			'</span><span class="single-char">' +
		// 			char +
		// 			'</span></span>';
		// 	}
		// });

		// // Append the generated HTML markup to the button
		// document.querySelector('.site-header__btn').innerHTML = buttonHTML;

		// // Select all the characters within the button
		// const chars = document.querySelectorAll('.single-char');

		// // Add event listeners for mouse enter and mouse leave events
		// document
		// 	.querySelector('.site-header__btn')
		// 	.addEventListener('mouseenter', () => {
		// 		gsap.to(chars, {
		// 			y: '-100%',
		// 			repeat: 0,
		// 			stagger: 0.034,
		// 			duration: 0.34,
		// 		});
		// 	});

		// document
		// 	.querySelector('.site-header__btn')
		// 	.addEventListener('mouseleave', () => {
		// 		gsap.to(chars, {
		// 			y: '0%',
		// 			repeat: 0,
		// 			stagger: 0.034,
		// 			duration: 0.34,
		// 		});
		// 	});
	},
};

export default header;
