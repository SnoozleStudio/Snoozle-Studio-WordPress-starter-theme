import { Collapse } from 'bootstrap';

const bootstrap = {
	collapse() {
		const collapseElementList = document.querySelectorAll('.collapse');
		// eslint-disable-next-line no-unused-vars
		const collapseList = [...collapseElementList].map((collapseEl) => new Collapse(collapseEl, {
			toggle: false
		}));
	}
};

export default bootstrap;
