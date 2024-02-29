const content = {
	init() {
		const adjustPaddingTop = () => {
			const header = document.querySelector('.site-header__nav');
			const siteContent = document.querySelector('.site-content');
			const headerHeight = header.offsetHeight;
			siteContent.style.paddingTop = `${headerHeight}px`;
		};

		// Initial adjustment
		adjustPaddingTop();

		// Resize event listener
		window.addEventListener('resize', adjustPaddingTop);
	},
};

export default content;
