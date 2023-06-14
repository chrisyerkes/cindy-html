// https://confetti.js.org/more.html
// https://animista.net/play/attention/jello/jello-vertical
// For confetti pop effect on badges

document.addEventListener('DOMContentLoaded', function () {
	const navbarToggler = document.querySelector('.navbar-toggler');
	const mainNav = document.querySelector('#navbarSupportedContent');
	const mobileClose = document.querySelector('.close-mobile-nav');
	const mainHeader = document.querySelector('#MainHeader');
	if (mainNav && mobileClose) {
		const bsCollapse = new bootstrap.Collapse(mainNav, { toggle: false });

		if (navbarToggler && mainHeader) {
			navbarToggler.addEventListener('click', (e) => {
				mainHeader.classList.toggle('open');
			});
			mobileClose.addEventListener('click', (e) => {
				e.preventDefault();
				mainHeader.classList.toggle('open');
				bsCollapse.toggle();
			});
		}
	}
	// Intersection observer trigger function
	function addClassOnScroll(element) {
		const observer = new IntersectionObserver((entries) => {
			// Loop through the entries
			entries.forEach((entry) => {
				// If the element is in view, add the "loaded" class
				if (entry.isIntersecting) {
					element.classList.add('loaded');
					// Stop observing the element
					observer.unobserve(element);
				}
			});
		});

		// Start observing the element
		observer.observe(element);
	}

	// Animated Separator
	const footerSep = document.querySelector('.seperator-and-logo');
	if (footerSep) {
		addClassOnScroll(footerSep);
	}

	// Hero height, position sticky check
	const hero = document.querySelector('.big-hero');
	if (hero) {
		const viewportHeight = window.innerHeight;
		const heroHeight = hero.offsetHeight;

		if (heroHeight > viewportHeight) {
			hero.classList.add('unstuck');
		}
	}

	// Rainbow Text Effect
	const textRainbowElements = document.querySelectorAll(
		'.is-style-cindylau-rainbow-text'
	);
	const colorArray = ['color1', 'color2', 'color3', 'color4', 'color5'];

	if (textRainbowElements) {
		textRainbowElements.forEach((textRainbowElement) => {
			const text = textRainbowElement.textContent;
			const wrappedText = text
				.split('')
				.map((char, index) => {
					if (
						char === ' ' ||
						char === '\u00A0' ||
						char === '\t' ||
						char === '\n' ||
						(char === '<' &&
							text.slice(index, index + 4) === '<br>')
					) {
						return char;
					}
					return `<span class="default ${
						colorArray[
							Math.floor(Math.random() * colorArray.length)
						]
					}">${char}</span>`;
				})
				.join('');
			textRainbowElement.innerHTML = wrappedText;
			const letterSpans = textRainbowElement.querySelectorAll('span');
			if (letterSpans) {
				letterSpans.forEach((span) => {
					span.addEventListener('mouseenter', (e) => {
						span.classList.remove('default');
					});
					span.addEventListener('mouseleave', (e) => {
						span.classList.add('default');
					});
				});
			}
		});
	}

	// Badge Confetti Pop
	const badges = document.querySelectorAll('.badge-container .svg');
	if (badges) {
		badges.forEach((badge) => {
			// Shuffle the sounds array in place using the Fisher-Yates algorithm
			function shuffle(array) {
				for (let i = array.length - 1; i > 0; i--) {
					const j = Math.floor(Math.random() * (i + 1));
					[array[i], array[j]] = [array[j], array[i]];
				}
			}
			const sounds = [
				'/wp-content/themes/cindy-lau/js/sounds/Pop-sfx.mp3',
				'/wp-content/themes/cindy-lau/js/sounds/Pop2-sfx.mp3',
				'/wp-content/themes/cindy-lau/js/sounds/Pop3-sfx.mp3',
			];

			shuffle(sounds);

			// Initialize index to keep track of the current sound
			let currentSoundIndex = 0;

			badge.addEventListener('click', (e) => {
				const sound = new Audio(sounds[currentSoundIndex]);
				const coords = badge.getBoundingClientRect();
				const viewportWidth =
					window.innerWidth || document.documentElement.clientWidth;
				const viewportHeight =
					window.innerHeight || document.documentElement.clientHeight;

				const position = {
					top:
						((coords.top + coords.height / 2) / viewportHeight) *
						100,
					left:
						((coords.left + coords.width / 2) / viewportWidth) *
						100,
				};

				const count = 200,
					defaults = {
						position: {
							x: position.left,
							y: position.top,
						},
						zIndex: 5000,
					};

				function fire(particleRatio, opts) {
					confetti(
						Object.assign({}, defaults, opts, {
							particleCount: Math.floor(count * particleRatio),
						})
					);
				}
				badge.classList.add('jello-vertical');
				setTimeout((e) => {
					if (sound) {
						sound.play();

						// Increment the current sound index
						currentSoundIndex++;

						// Reset the current sound index if it exceeds the length of the array
						if (currentSoundIndex >= sounds.length) {
							// Shuffle the sounds array again
							shuffle(sounds);
							currentSoundIndex = 0;
						}
					}
					fire(0.25, {
						spread: 26,
						startVelocity: 55,
					});
					fire(0.2, {
						spread: 60,
					});
					fire(0.35, {
						spread: 100,
						decay: 0.91,
						scalar: 0.8,
					});
					fire(0.1, {
						spread: 120,
						startVelocity: 25,
						decay: 0.92,
						scalar: 1.2,
					});
					fire(0.1, {
						spread: 120,
						startVelocity: 45,
					});
				}, 300);
				setTimeout((e) => {
					badge.classList.remove('jello-vertical');
				}, 900);
			});
		});
	}

	// Block Sliders
	const blockSliders = document.querySelectorAll('.block-carousel');
	if (blockSliders) {
		blockSliders.forEach((slider) => {
			const newSlider = new Flickity(slider, {
				pageDots: false,
				prevNextButtons: false,
				setGallerySize: false,
				cellAlign: 'left',
				contain: true,
			});
		});
	}

	function followMouse() {
		const backToWorkDiv = document.querySelector('.back-to-work');
		const mousePointerDiv = document.querySelector('.mouse-pointer');

		if (navigator.maxTouchPoints > 0) {
			mousePointerDiv.classList.add('no-mouse');
			return;
		}

		let hovering = false;
		let initTimer;

		backToWorkDiv.addEventListener('mouseenter', (e) => {
			hovering = true;
			clearTimeout(initTimer);
			setTimeout(() => {
				mousePointerDiv.classList.remove('init');
				mousePointerDiv.classList.add('hovering');
			}, 150);
		});

		backToWorkDiv.addEventListener('mouseleave', (e) => {
			hovering = false;
			mousePointerDiv.classList.remove('hovering');
			clearTimeout(initTimer);
			initTimer = setTimeout(() => {
				mousePointerDiv.classList.add('init');
				mousePointerDiv.removeAttribute('style');
			}, 1000);
		});

		backToWorkDiv.addEventListener('mousemove', function (event) {
			const rect = backToWorkDiv.getBoundingClientRect();
			const mouseX = event.clientX - rect.left;
			const mouseY = event.clientY - rect.top;

			// Check if the mouse is within the confines of the back-to-work div
			if (
				mouseX >= 0 &&
				mouseY >= 0 &&
				mouseX <= rect.width &&
				mouseY <= rect.height &&
				hovering == true
			) {
				clearTimeout(initTimer);
				setTimeout(() => {
					mousePointerDiv.style.left = mouseX + 'px';
					mousePointerDiv.style.top = mouseY + 'px';
				}, 100);
			}
		});
	}
	const isProject = document.querySelector('.single-project');
	if (isProject) {
		followMouse();
	}
});
