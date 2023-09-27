import { module as M } from '@19h47/modular';

import { disableScroll, enableScroll } from 'utils/scroll';
import { html } from 'utils/environment';

class Nav extends M {
	constructor(m) {
		super( m );

		this.isActive = this.el.classList.contains( 'is-active' );

		this.events = {
			click: {
				backdrop: 'toggle',
				button: 'toggle',
			},
		};

		document.addEventListener(
			'keydown',
			({ keyCode }) => {
				if (27 === keyCode) {
					this.close();
				}
			}
		);
	}

	toggle() {
		if (this.isActive) {
			return this.close();
		}

		return this.open();
	}

	open() {
		if (this.isActive) {
			return false;
		}

		this.isActive = true;

		html.classList.add( 'nav-is-active' );
		this.el.classList.add( 'is-active' );

		// When Nav is active, disableScroll
		disableScroll();
		this.call( 'stop', false, 'Scroll', 'main' );

		return true;
	}

	close() {
		if ( ! this.isActive) {
			return false;
		}

		this.isActive = false;

		html.classList.remove( 'nav-is-active' );
		this.el.classList.remove( 'is-active' );

		// When Nav is closed, enableScroll
		enableScroll();
		this.call( 'start', false, 'Scroll', 'main' );

		return true;
	}
}

export default Nav;
