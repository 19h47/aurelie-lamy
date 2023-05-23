import { module as M } from '@19h47/modular';

class Video extends M {
	constructor(m) {
		super(m);

		this.muted = true;
		this.isPlaying = true;
		this.autoplay = JSON.parse(this.getData('autoplay'));

		this.events = {
			click: 'toggle',
		};
	}

	init() {
		if (!this.autoplay) {
			this.isPlaying = false;
		}
	}

	toggle() {
		if (this.autoplay) {
			return;
		}

		if (!this.isPlaying) {
			this.isPlaying = true;
			this.$('video')[0].play();
			this.$('button')[0].style.setProperty('display', 'none');
		} else {
			this.isPlaying = false;
			this.$('video')[0].pause();
			this.$('button')[0].style.removeProperty('display');
		}

		this.muted = !this.muted;
		this.$('video')[0].muted = this.muted;
	}
}

export default Video;
