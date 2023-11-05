import { module as M } from '@19h47/modular';
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

Swiper.use([Navigation, Pagination]);

/**
 *
 * @constructor
 * @param {object} container
 */
class Carousel extends M {
	init() {
		const parameters = JSON.parse(this.getData('parameters')) || {};

		if (this.$('next')[0]) {
			if (parameters.navigation) {
				[parameters.navigation.nextEl] = this.$('next');
			} else {
				parameters.navigation = {
					nextEl: this.$('next')[0],
				};
			}
		}

		if (this.$('previous')[0]) {
			if (parameters.navigation) {
				[parameters.navigation.prevEl] = this.$('previous');
			} else {
				parameters.navigation = {
					prevEl: this.$('previous')[0],
				};
			}
		}

		// console.log(parameters);

		this.swiper = new Swiper(this.el, {
			...{ slidesPerView: 'auto' },
			...parameters,
		});
	}
}

export default Carousel;
