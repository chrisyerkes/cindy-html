document.addEventListener('DOMContentLoaded', function () {
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
