import bootstrap from './_bootstrap';
import bg from './_bg';
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
		bg.init();
		header.resize();
		content.init();
		initGeneral();
	}

};

document.addEventListener('DOMContentLoaded', () => {
	App.init();
});
