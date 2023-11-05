const plugin       = require( 'tailwindcss/plugin' );
const defaultTheme = require( 'tailwindcss/defaultTheme' );

const colors = {
	red: {
		'very-soft': '#F3B4AB',
		'very-pale': '#FFECEA',
		vivid: '#F75322',
		'light-grayish': '#FEECEA'
	},
	gray: {
		'very-light': '#EBEBEB',
		light: '#D1D1D1',
		dark: '#7C7C7C',
		'very-dark': '#707070'
	},
	pink: {
		DEFAULT: '#FFD7D3'
			}
			};

			const fontSize = {};

			const maxWidth = {
				280: `${1120 / 16}rem`, // 1120px
			};

			const transitionDuration = {
				'800': '800ms',
			};

			const spacing = {
				'1/5': `${(1 / 5) * 100}%`,
				'0.5/12': `${(0.5 / 12) * 100}%`,
				'2/6': `${(2 / 6) * 100}%`,
				'4/6': `${(4 / 6) * 100}%`,
				'4.5/6': `${(4.5 / 6) * 100}%`,
				'1/12': `${(1 / 12) * 100}%`,
				'1.5/12': `${(1.5 / 12) * 100}%`,
				'2/12': `${(2 / 12) * 100}%`,
				'3/12': `${(3 / 12) * 100}%`,
				'4/5': `${(4 / 5) * 100}%`,
				'4/5.5': `${(4 / 5.5) * 100}%`,
				'0.5/6': `${(0.5 / 6) * 100}%`,
				'1/6': `${(1 / 6) * 100}%`,
				'4/6': `${(4 / 6) * 100}%`,
				'5/6': `${(5 / 6) * 100}%`,
				'4.5/12': `${(4.5 / 12) * 100}%`,
				'5/5.5': `${(5 / 5.5) * 100}%`,
				'5.5/12': `${(5.5 / 12) * 100}%`,
				'6.5/12': `${(6.5 / 12) * 100}%`,
				'1/8': `${(1 / 8) * 100}%`,
				'9/12': `${(9 / 12) * 100}%`,
				4.5: `${18 / 16}rem`,
				7.5: `${30 / 16}rem`,
				10.5: `${42 / 16}rem`, // 42px
				13: `${52 / 16}rem`, // 52px
				15: `${60 / 16}rem`,
				19: `${76 / 16}rem`,
				21: `${84 / 16}rem`, // 84px
				21.5: `${86 / 16}rem`, // 86px
				22: `${88 / 16}rem`, // 88px
				23: `${92 / 16}rem`,
				25: `${100 / 16}rem`,
				26: `${104 / 16}rem`,
				27: `${108 / 16}rem`,
				28: `${112 / 16}rem`,
				29: `${116 / 16}rem`,
				30: `${120 / 16}rem`, // 120px
				31: `${124 / 16}rem`, // 124px
				33.5: `${134 / 16}rem`, // 134px
				34: `${136 / 16}rem`, // 136px
				35: `${140 / 16}rem`, // 140px
				36: `${144 / 16}rem`, // 144px
				38: `${154 / 16}rem`, // 154px
				42: `${168 / 16}rem`, // 168px
				50: `${200 / 16}rem`, // 204px
				51: `${204 / 16}rem`, // 204px
				64: `${256 / 16}rem`, // 256px
				65: `${260 / 16}rem`, // 260px
				66: `${264 / 16}rem`, // 264px
				67: `${268 / 16}rem`, // 268px
			};

			const zIndex = {
				1: '1',
				2: '2',
				3: '3',
				4: '4',
				5: '5',
			};

			const borderRadius = {};

			module.exports = {
				content: ['./views/**/*.twig', './src/**/*.{html,js}', './includes/**/*.{php,json}'],
				corePlugins: {
					container: false,
				},
				theme: {
					extend: {
						animation: {
							float: 'float 7000ms ease-in-out infinite',
						},
						borderRadius,
						colors,
						fontSize,
						keyframes: {
							float: {
								'0%': { transform: 'translatey(0px)' },
								'50%': { transform: 'translatey(-1.25rem)' },
								'100%': { transform: 'translatey(0px)' },
							},
						},
						maxWidth,
						spacing,
						transitionDuration,
						zIndex,
					},
					fontFamily: {
						sans: ['"Hurme Geometric Sans 3"', ...defaultTheme.fontFamily.sans],
					},
				},
				plugins: [
					plugin( ({ addVariant }) => addVariant( 'nav-is-active', '.nav-is-active &' ) ),
					plugin( ({ addVariant }) => addVariant( 'is-active', '.is-active&' ) ),
					plugin( ({ addVariant }) => addVariant( 'is-ontop', '.is-ontop &' ) ),
					plugin( ({ addVariant }) => addVariant( 'parent-is-selected', '.is-selected &' ) ),
					plugin( ({ addVariant }) => addVariant( 'parent-has-error', '.has-error &' ) ),
					plugin( ({ addVariant }) => addVariant( 'is-disabled', '&[disabled],&:disabled' ) ),
					plugin( ({ addVariant }) => addVariant( 'swiper-slide-active', '.swiper-slide-active &' ) ),
					plugin( ({ addVariant }) => addVariant( 'first-child', '& > *:first-child' ) ),
					plugin( ({ addVariant }) => addVariant( 'last-child', '& > *:last-child' ) ),
				],
			};
