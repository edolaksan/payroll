import './bootstrap';

// public/js/app.js

// public/js/app.js

document.addEventListener('DOMContentLoaded', () => {
    // Tambahkan animasi saat input focus
    const inputs = document.querySelectorAll('input');
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('focused');
        });
        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('focused');
        });
    });
});

