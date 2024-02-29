const header = {
	resize() {
		const resizeHandler = () => {
			const info = document.querySelector('header .site-header__info');
			const menu = document.querySelector('header .site-header__menu');
			const infoWidth = info.offsetWidth;
			const menuWidth = menu.offsetWidth;

			if (infoWidth < menuWidth) {
				info.style.width = `${menuWidth}px`;
			} else {
				menu.style.width = `${infoWidth}px`;
			}
		};

		// Initial resize
		resizeHandler();

		// Resize event listener
		window.addEventListener('resize', resizeHandler);
	},
};

export default header;
