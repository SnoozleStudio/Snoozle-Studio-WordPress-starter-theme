import bootstrap from './_bootstrap';
import background from './_background';
import header from './_header';
import content from './_content';
import General from './_generalScripts';

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
		content.init();
		initGeneral();
	},
};

document.addEventListener('DOMContentLoaded', () => {
	App.init();
});
