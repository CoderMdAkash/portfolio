/**
 * Personal Portfolio External JavaScript
 * Handles Live Date & Time Ticker in Footer and Client-side Contact Form Validation.
 */

document.addEventListener('DOMContentLoaded', function () {
    // 1. Live Date & Time Clock in Footer
    initLiveDateTime();

    // 2. Contact Form Validation
    initContactFormValidation();
});

/**
 * Updates the footer element with ID 'live-datetime' every second.
 */
function initLiveDateTime() {
    const dateTimeElement = document.getElementById('live-datetime');
    if (!dateTimeElement) return;

    function updateClock() {
        const now = new Date();
        const options = {
            weekday: 'short',
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        };
        dateTimeElement.textContent = now.toLocaleString('en-US', options);
    }

    updateClock();
    setInterval(updateClock, 1000);
}

/**
 * Validates Contact Form inputs before submission.
 */
function initContactFormValidation() {
    const form = document.getElementById('contact-form');
    if (!form) return;

    form.addEventListener('submit', function (e) {
        let isValid = true;
        const errorContainer = document.getElementById('js-form-errors');
        if (errorContainer) {
            errorContainer.innerHTML = '';
            errorContainer.classList.add('hidden');
        }

        const errors = [];

        // Name Validation
        const nameInput = form.querySelector('[name="name"]');
        if (nameInput && nameInput.value.trim().length < 2) {
            isValid = false;
            errors.push('Please enter a valid full name (at least 2 characters).');
        }

        // Email Validation
        const emailInput = form.querySelector('[name="email"]');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailInput && !emailRegex.test(emailInput.value.trim())) {
            isValid = false;
            errors.push('Please enter a valid email address.');
        }

        // Phone Validation
        const phoneInput = form.querySelector('[name="phone"]');
        if (phoneInput && phoneInput.value.trim() !== '') {
            const phoneDigits = phoneInput.value.replace(/\D/g, '');
            if (phoneDigits.length < 7) {
                isValid = false;
                errors.push('Please enter a valid phone number.');
            }
        }

        // Message Validation
        const messageInput = form.querySelector('[name="message"]');
        if (messageInput && messageInput.value.trim().length < 5) {
            isValid = false;
            errors.push('Please enter your message (at least 5 characters).');
        }

        if (!isValid) {
            e.preventDefault();
            if (errorContainer) {
                errorContainer.classList.remove('hidden');
                let html = '<ul class="list-disc list-inside space-y-1">';
                errors.forEach(function (msg) {
                    html += '<li>' + msg + '</li>';
                });
                html += '</ul>';
                errorContainer.innerHTML = html;
            } else {
                alert(errors.join('\n'));
            }
        }
    });
}
