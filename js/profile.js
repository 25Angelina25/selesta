document.addEventListener('DOMContentLoaded', function() {
    // Элементы DOM
    const editButtons = document.querySelectorAll('.edit-btn');
    const modal = document.getElementById('editModal');
    const editValueInput = document.getElementById('editValue');
    const saveBtn = document.getElementById('saveBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const menuItems = document.querySelectorAll('.menu-item');
    const contentSections = document.querySelectorAll('.content-section');

    let currentField = null;

    // Обработчики для кнопок редактирования
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            currentField = this.getAttribute('data-field');
            const currentValue = document.getElementById(currentField).textContent;

            if (currentField === 'password') {
                editValueInput.type = 'password';
                editValueInput.value = '';
                editValueInput.placeholder = 'Введите новый пароль';
            } else {
                editValueInput.type = 'text';
                editValueInput.value = currentValue;
                editValueInput.placeholder = 'Введите новое значение';
            }

            modal.style.display = 'flex';
        });
    });

    // Сохранение изменений
    saveBtn.addEventListener('click', function() {
        if (currentField) {
            const newValue = editValueInput.value.trim();
            if (newValue) {
                if (currentField === 'password') {
                    document.getElementById(currentField).textContent = '••••••••';
                } else {
                    document.getElementById(currentField).textContent = newValue;
                }
                modal.style.display = 'none';
                currentField = null;
            } else {
                alert('Пожалуйста, введите значение');
            }
        }
    });

    // Отмена изменений
    cancelBtn.addEventListener('click', function() {
        modal.style.display = 'none';
        currentField = null;
    });

    // Закрытие модального окна при клике вне его
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none';
            currentField = null;
        }
    });

    // Обработка кнопки "Вернуться на главную"
    const mainPageBtn = document.querySelector('.main-page-btn');
    if (mainPageBtn) {
        mainPageBtn.addEventListener('click', function() {
            window.location.href = 'index.php';
        });
    }

    // Обработка пунктов меню
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            // Убираем активный класс у всех пунктов
            menuItems.forEach(i => i.classList.remove('active'));
            this.classList.add('active');

            // Получаем текст пункта меню
            const menuItemText = this.querySelector('.menu-text').textContent;

            // Скрываем все секции контента
            contentSections.forEach(section => {
                section.classList.remove('active');
            });

            // Показываем соответствующую секцию
            switch(menuItemText) {
                case 'Мой аккаунт':
                    document.getElementById('account-section').classList.add('active');
                    break;
                case 'Личный счет':
                    document.getElementById('balance-section').classList.add('active');
                    break;
                case 'История заказов':
                    document.getElementById('orders-section').classList.add('active');
                    break;
                case 'Корзина':
                    document.getElementById('cart-section').classList.add('active');
                    break;
                case 'Выход':
                    // Реальный выход из аккаунта
                    if (confirm('Вы уверены, что хотите выйти?')) {
                        window.location.href = 'app/logout.php';
                    }
                    break;
            }
        });
    });

    // Инициализация: показываем вкладку "Мой аккаунт" по умолчанию
    document.getElementById('account-section').classList.add('active');
});