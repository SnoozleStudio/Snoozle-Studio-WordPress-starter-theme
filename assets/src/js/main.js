import bootstrap from './_bootstrap';
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
		initGeneral();
	}

};

document.addEventListener('DOMContentLoaded', () => {
	App.init();
});
