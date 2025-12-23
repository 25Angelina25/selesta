document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone');
    const registerForm = document.getElementById('register-form');
    const loginForm = document.getElementById('login-form');

    // Маска телефона
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let v = e.target.value.replace(/\D/g, '');
            if (v.length > 11) v = v.slice(0, 11);
            let f = '+7 (';
            if (v.length > 1) f += v.substring(1, 4);
            if (v.length >= 4) f += ') ';
            if (v.length > 4) f += v.substring(4, 7);
            if (v.length >= 7) f += '-';
            if (v.length > 7) f += v.substring(7, 9);
            if (v.length >= 9) f += '-';
            if (v.length > 9) f += v.substring(9, 11);
            e.target.value = f;
        });

        phoneInput.addEventListener('keypress', function(e) {
            if (!/\d/.test(e.key) && !['Backspace', 'Delete', 'Tab'].includes(e.key)) e.preventDefault();
        });
    }

    // Регистрация
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const d = Object.fromEntries(new FormData(registerForm).entries());
            if (!/^\+7 \(\d{3}\) \d{3}-\d{2}-\d{2}$/.test(d.phone)) {
                alert('Неверный формат телефона');
                return;
            }
            localStorage.setItem('isLoggedIn', 'true');
            // Генерируем и сохраняем ID пользователя
            const userId = 'user_' + Date.now(); // простая генерация ID на основе времени
            localStorage.setItem('userId', userId);
            window.location.href = 'profile.php';
        });
    }

    // Вход
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const d = Object.fromEntries(new FormData(loginForm).entries());
            console.log('Вход:', d);
            localStorage.setItem('isLoggedIn', 'true');
            // Генерируем и сохраняем ID пользователя (в реальном приложении ID придет с сервера)
            const userId = 'user_' + Date.now(); // простая генерация ID на основе времени
            localStorage.setItem('userId', userId);
            window.location.href = 'profile.php';
        });
    }
});