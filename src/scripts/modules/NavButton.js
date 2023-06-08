import { module as M } from '@19h47/modular';

class NavButton extends M {
	constructor(m) {
		super(m);

		this.events = {
			click: 'toggle',
		};
	}

	toggle(event) {
		event.stopPropagation();
		this.call('toggle', null, 'Nav', 'main');
	}
}

export default NavButton;
