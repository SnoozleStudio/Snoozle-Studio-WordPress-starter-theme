import gsap from 'gsap';

const bg = {
	init() {
		const bgWrapper = document.querySelector('.bg-wrapper');
		const bgSphere = bgWrapper.querySelectorAll('.sphere');
		const bgSphereNum = bgSphere.length;
		const bg = document.querySelector('.bg');
		let hVW = bg.offsetWidth / 2;
		let hVH = bg.offsetHeight / 2;
		let maxDist = Math.sqrt(hVW ** 2 + hVH ** 2);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

		function setRandomStyle(el) {
			el.style.backgroundColor = el.dataset.color;
			el.style.top = `${getRandomInt(40, 60)}%`;
			el.style.left = `${getRandomInt(40, 60)}%`;
			el.style.width = `${getRandomInt(55, 144)}vw`;
			el.style.height = `${getRandomInt(55, 144)}vh`;
			el.style.borderRadius = `${getRandomInt(0, 100)}%`;
		}

		function animate() {
			bgSphere.forEach(setRandomStyle);
			const tlHero = gsap.timeline({ paused: true });
			bgSphere.forEach((sphere, i) => {
				const xSign = i % (bgSphereNum / 2) === 0 ? '+=' : '-=';
				const ySign = i <= bgSphereNum / 2 ? '-' : '+';
				tlHero.to(
					sphere,
					{
						x: `${xSign}${getRandomInt(0, hVW)}`,
						y: `${ySign}${getRandomInt(0, hVH)}`,
						rotation: getRandomInt(-120, 120), // Added random rotation
						scale: getRandomInt(89, 144) / 100, // Added random scale
						opacity: getRandomInt(21, 89) / 100, // Added random opacity
						duration: getRandomInt(5, 8), // Added random duration
					},
					'<'
				);
			});

			document.body.addEventListener('mousemove', (e) => {
				const x = hVW - e.pageX;
				const y = hVH - e.pageY;
				const distance = Math.sqrt(x ** 2 + y ** 2) / 2;
				tlHero.progress((distance / maxDist) * 2);
			});

			window.addEventListener('resize', () => {
				hVW = bg.offsetWidth / 2;
				hVH = bg.offsetHeight / 2;
				maxDist = Math.sqrt(hVW ** 2 + hVH ** 2);
			});
		}

		animate();
	},
};

export default bg;
