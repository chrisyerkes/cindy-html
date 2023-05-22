// https://confetti.js.org/more.html
// https://animista.net/play/attention/jello/jello-vertical
// For confetti pop effect on badges

document.addEventListener('DOMContentLoaded', function () {
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
	addClassOnScroll(footerSep);

	// Rainbow Text Effect
	const textRainbowElements = document.querySelectorAll('.text-rainbow');
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
			badge.addEventListener('click', (e) => {
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
});
