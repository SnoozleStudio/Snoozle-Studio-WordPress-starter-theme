// import Lenis from '@studio-freight/lenis';

// const scroll = {
// 	control() {
// 		// console.log('dio porco');
// 		const lenis = new Lenis({
// 			// wrapper: document.getElementById('page'),
// 		});

// 		lenis.on('scroll', (e) => {
// 			// console.log(e);
// 			console.log(e.targetScroll);
// 		});

// 		function raf(time) {
// 			lenis.raf(time);
// 			requestAnimationFrame(raf);
// 		}

// 		requestAnimationFrame(raf);
// 	},
// };

// export default scroll;

// import Lenis from '@studio-freight/lenis';
// import gsap from 'gsap';

// const scroll = {
// 	control() {
// 		const lenis = new Lenis({
// 			// wrapper: document.getElementById('page'),
// 		});

// 		const header = {
// 			resize() {
// 				const resizeHandler = () => {
// 					const brandLight = document.querySelector(
// 						'header .site-header__brand--light'
// 					);
// 					const brandImg = document.querySelector(
// 						'header .site-header__brand--img'
// 					);
// 					const brandHeight = brandImg.offsetHeight;
// 					brandLight.style.height = `${brandHeight * 2}px`;
// 					brandLight.style.width = `${brandHeight * 2}px`;
// 				};

// 				// Initial resize
// 				resizeHandler();

// 				// Resize event listener
// 				window.addEventListener('resize', resizeHandler);
// 			},
// 			toggler() {
// 				const toggleBtn = document.querySelector('header .site-header__btn');
// 				const toggleBtnSpans = toggleBtn.querySelectorAll('span');
// 				const headerBg = document.querySelector('header .site-header__bg');
// 				const headerContent = document.querySelector(
// 					'header .site-header__content'
// 				);
// 				const headerWrapper = document.querySelector(
// 					'header .site-header__wrapper'
// 				);

// 				let isOpen = false;

// 				toggleBtn.addEventListener('click', () => {
// 					toggleBtnSpans.forEach((el) => {
// 						el.classList.toggle('site-header__btn--hide');
// 					});

// 					if (!isOpen) {
// 						// Disable scrolling when the header is open
// 						// lenis.stop();

// 						// Change background color to black
// 						gsap.to(headerBg, {
// 							backgroundColor: '#193a4d',
// 							// eslint-disable-next-line max-len
// 							// background: 'linear-gradient(to bottom,  rgba(0,0,0,0.89) 0%,rgba(0,0,0,0.34) 50%,rgba(0,0,0,0.89) 100%)',
// 							opacity: 0.34,
// 							ease: 'power2.inOut',
// 						});
// 						gsap.to(headerWrapper, {
// 							backdropFilter: 'blur(21px)',
// 							ease: 'power2.inOut',
// 						});
// 						gsap.to(headerContent, {
// 							opacity: 1,
// 							delay: 0.34,
// 							ease: 'power2.inOut',
// 						});
// 						isOpen = true;
// 					} else {
// 						// Enable scrolling when the header is closed
// 						// lenis.start();

// 						gsap.to(headerContent, {
// 							opacity: 0,
// 							ease: 'power2.inOut',
// 						});
// 						gsap.to(headerWrapper, {
// 							backdropFilter: 'blur(0px)',
// 							ease: 'power2.inOut',
// 						});
// 						// Change background color to original
// 						gsap.to(headerBg, {
// 							backgroundColor: '#193a4d',
// 							opacity: 0,
// 							ease: 'power2.inOut',
// 						});
// 						isOpen = false;
// 					}
// 				});

// 				const menuItems = document.querySelectorAll('.menu > li');

// 				menuItems.forEach((item) => {
// 					item.addEventListener('mouseenter', () => {
// 						menuItems.forEach((otherItem) => {
// 							if (otherItem !== item) {
// 								gsap.to(otherItem, {
// 									opacity: 0.55,
// 									ease: 'power2.inOut',
// 								});
// 							}
// 						});
// 					});

// 					item.addEventListener('mouseleave', (event) => {
// 						// Check if mouse leaves the menu item and its children
// 						if (!item.contains(event.relatedTarget)) {
// 							menuItems.forEach((otherItem) => {
// 								gsap.to(otherItem, {
// 									opacity: 1,
// 									ease: 'power2.inOut',
// 								});
// 							});
// 						}
// 					});

// 					// const parentLink = item.querySelector('a');
// 					const subMenu = item.querySelector('.sub-menu');

// 					if (subMenu) {
// 						item.classList.add('has-child');
// 						item.addEventListener('mouseenter', () => {
// 							subMenu.style.display = 'block';
// 						});

// 						item.addEventListener('mouseleave', (event) => {
// 							// Check if mouse leaves the menu item and its children
// 							if (!item.contains(event.relatedTarget)) {
// 								subMenu.style.display = 'none';
// 							}
// 						});
// 					}
// 				});
// 			},
// 		};

// 		// Integration of header resize and toggler methods
// 		header.resize();
// 		header.toggler();

// 		lenis.on('scroll', (e) => {
// 			console.log(e.targetScroll);
// 		});

// 		function raf(time) {
// 			lenis.raf(time);
// 			requestAnimationFrame(raf);
// 		}

// 		requestAnimationFrame(raf);
// 	},
// };

// export default scroll;
