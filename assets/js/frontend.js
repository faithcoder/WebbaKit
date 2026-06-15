(function () {
	'use strict';

	function toggleFaqItem(button) {
		var item = button.closest('.webbakit-faq__item');
		var answer = item ? item.querySelector('.webbakit-faq__answer') : null;

		if (!item || !answer) {
			return;
		}

		var root = button.closest('[data-webbakit-accordion]');

		if (root) {
			root.querySelectorAll('.webbakit-faq__item').forEach(function (currentItem) {
				if (currentItem !== item) {
					currentItem.classList.remove('is-open');
					var currentAnswer = currentItem.querySelector('.webbakit-faq__answer');
					if (currentAnswer) {
						currentAnswer.hidden = true;
					}
				}
			});
		}

		var isOpen = item.classList.toggle('is-open');
		answer.hidden = !isOpen;
	}

	document.addEventListener('click', function (event) {
		var button = event.target.closest('.webbakit-faq--style-1 .webbakit-faq__question');

		if (!button) {
			return;
		}

		event.preventDefault();
		toggleFaqItem(button);
	});
})();
