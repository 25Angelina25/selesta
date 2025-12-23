// Управление корзиной для всего сайта
class CartManager {
    constructor() {
        this.cartKey = 'celesta_cart';
        this.cart = this.loadCart();
        this.updateCartDisplay();
    }

    // Загрузка корзины из localStorage
    loadCart() {
        const cartData = localStorage.getItem(this.cartKey);
        return cartData ? JSON.parse(cartData) : [];
    }

    // Сохранение корзины в localStorage
    saveCart() {
        localStorage.setItem(this.cartKey, JSON.stringify(this.cart));
        this.updateCartDisplay();
        // Вызываем событие обновления корзины
        window.dispatchEvent(new CustomEvent('cartUpdated', { detail: { cart: this.cart } }));
    }

    // Добавление товара в корзину
    addToCart(product) {
        // Проверяем, есть ли уже такой товар в корзине
        const existingItem = this.cart.find(item => item.id === product.id);
        
        if (existingItem) {
            existingItem.quantity += product.quantity || 1;
        } else {
            // Создаем новый объект товара с уникальным ID
            const cartItem = {
                id: product.id || this.generateId(),
                name: product.name,
                price: product.price,
                image: product.image,
                quantity: product.quantity || 1,
                timestamp: new Date().toISOString()
            };
            this.cart.push(cartItem);
        }
        
        this.saveCart();
        this.showNotification(`Товар добавлен в корзину`, 'success');
    }

    // Удаление товара из корзины
    removeFromCart(productId) {
        this.cart = this.cart.filter(item => item.id !== productId);
        this.saveCart();
        this.showNotification(`Товар удален из корзины`, 'info');
    }

    // Обновление количества товара
    updateQuantity(productId, newQuantity) {
        if (newQuantity <= 0) {
            this.removeFromCart(productId);
            return;
        }
        
        const item = this.cart.find(item => item.id === productId);
        if (item) {
            item.quantity = newQuantity;
            this.saveCart();
        }
    }

    // Очистка корзины
    clearCart() {
        this.cart = [];
        this.saveCart();
    }

    // Получение общего количества товаров
    getTotalItems() {
        return this.cart.reduce((total, item) => total + item.quantity, 0);
    }

    // Получение общей стоимости
    getTotalPrice() {
        return this.cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    // Генерация уникального ID
    generateId() {
        return Date.now().toString(36) + Math.random().toString(36).substr(2);
    }

    // Обновление отображения корзины на странице
    updateCartDisplay() {
        const cartCountElement = document.querySelector('.cart-count');
        const cartTotalElement = document.querySelector('.cart-total');
        
        if (cartCountElement) {
            cartCountElement.textContent = this.getTotalItems();
            cartCountElement.style.display = this.getTotalItems() > 0 ? 'inline-block' : 'none';
        }
        
        if (cartTotalElement) {
            cartTotalElement.textContent = this.formatCurrency(this.getTotalPrice());
        }
    }

    // Форматирование валюты
    formatCurrency(amount) {
        return new Intl.NumberFormat('ru-RU', {
            style: 'currency',
            currency: 'RUB',
            minimumFractionDigits: 0
        }).format(amount);
    }

    // Показ уведомления
    showNotification(message, type = 'info') {
        // Создаем элемент уведомления
        const notification = document.createElement('div');
        notification.className = `cart-notification ${type}`;
        notification.textContent = message;
        
        // Стили для уведомления
        Object.assign(notification.style, {
            position: 'fixed',
            top: '20px',
            right: '20px',
            padding: '12px 20px',
            borderRadius: '4px',
            color: 'white',
            zIndex: '10000',
            fontWeight: '500',
            boxShadow: '0 4px 12px rgba(0,0,0,0.15)',
            transform: 'translateX(100%)',
            transition: 'transform 0.3s ease'
        });
        
        // Цвет фона в зависимости от типа
        if (type === 'success') {
            notification.style.background = '#4CAF50';
        } else if (type === 'error') {
            notification.style.background = '#f44336';
        } else {
            notification.style.background = '#2196F3';
        }
        
        document.body.appendChild(notification);
        
        // Анимация появления
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);
        
        // Удаляем уведомление через 3 секунды
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }
}

// Инициализация корзины при загрузке DOM
document.addEventListener('DOMContentLoaded', function() {
    window.cartManager = new CartManager();
    
    // Добавляем обработчики для кнопок "В корзину" на всех страницах
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productCard = this.closest('.product-card') || this.closest('.cart-item');
            if (productCard) {
                const product = {
                    id: productCard.getAttribute('data-product-id') || this.getAttribute('data-product-id') || 'product_' + Date.now(),
                    name: productCard.querySelector('h3')?.textContent || productCard.querySelector('.item-name')?.textContent || 'Товар',
                    price: parseFloat(productCard.querySelector('.price')?.textContent.replace(/[^\d.]/g, '')) || 0,
                    image: productCard.querySelector('img')?.src || '',
                    quantity: 1
                };
                
                window.cartManager.addToCart(product);
            }
        });
    });
});

// Экспортируем функции для использования в других файлах
if (typeof module !== 'undefined' && module.exports) {
    module.exports = CartManager;
}