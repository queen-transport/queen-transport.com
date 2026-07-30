document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('navToggle');
    const menu = document.getElementById('navMenuMobile');

    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            const isOpen = menu.classList.toggle('flex');
            menu.classList.toggle('hidden', !isOpen);
            toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        });

        menu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                menu.classList.remove('flex');
                menu.classList.add('hidden');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    }

    const faqAccordion = document.getElementById('faqAccordion');

    if (faqAccordion) {
        faqAccordion.querySelectorAll('.faq-item').forEach(function (item) {
            const button = item.querySelector('.faq-toggle');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');

            button.addEventListener('click', function () {
                const isOpen = !answer.classList.contains('hidden');

                faqAccordion.querySelectorAll('.faq-answer').forEach(function (el) {
                    el.classList.add('hidden');
                });
                faqAccordion.querySelectorAll('.faq-icon').forEach(function (el) {
                    el.textContent = '+';
                });

                if (!isOpen) {
                    answer.classList.remove('hidden');
                    icon.textContent = '−';
                }
            });
        });
    }

    document.querySelectorAll('.video-with-sound-toggle').forEach(function (wrapper) {
        const video = wrapper.querySelector('video');
        const button = wrapper.querySelector('.sound-toggle');

        if (!video || !button) {
            return;
        }

        button.addEventListener('click', function () {
            video.muted = !video.muted;
            button.textContent = video.muted ? '🔇' : '🔊';
            button.setAttribute('aria-pressed', video.muted ? 'false' : 'true');
            button.setAttribute('aria-label', video.muted ? 'Nyalakan suara video' : 'Matikan suara video');
        });
    });
});
