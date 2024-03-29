import WebFont from 'webfontloader';
import bootstrap from './_bootstrap';
import background from './_background';
import header from './_header';
import content from './_content';
import General from './_generalScripts';
// import scroll from './_lenis';

const App = {
	/**
	 * App.init
	 */
	init() {
		// General scripts
		function initGeneral() {
			return new General();
		}
		bootstrap.collapse();
		background.init();
		header.resize();
		header.toggler();
		content.init();
		// scroll.control();
		initGeneral();
	},
};

document.addEventListener('DOMContentLoaded', () => {
	WebFont.load({
		google: {
			families: ['PT Sans'],
		},
		active() {
			App.init();
		},
	});
});
