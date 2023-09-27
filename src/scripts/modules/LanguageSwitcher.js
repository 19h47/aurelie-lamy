import { module as M } from '@19h47/modular';

class LanguageSwitcher extends M {
	constructor(m) {
		super( m );

		this.events = {
			change: 'change',
		}
	}

	change({ target }) {
		this.call( 'goTo', target.value, 'Load' );
	}
}

export default LanguageSwitcher;
