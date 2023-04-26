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
});
