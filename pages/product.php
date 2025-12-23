<?php
session_start();
require_once "templates/header.php"
?>

<body>
    <!-- Основной контент -->
    <main class="product-main">
        <div class="product-container">
            <div class="product-gallery">
                <div class="main-image">
                    <img src="assets/img/Нежные розы и эвкалипт.jpg" alt="Утренняя роса">
                </div>
                <div class="thumbnail-images">
                    <img src="assets/img/Нежные розы и эвкалипт.jpg" alt="Утренняя роса" class="thumb active">
                    <img src="assets/img/Лилии и гортензия.jpg" alt="Вид сбоку" class="thumb">
                    <img src="assets/img/Пионы и фрезии.jpg" alt="Вид сзади" class="thumb">
                </div>
            </div>

            <div class="product-info">
                <h1>Утренняя роса</h1>
                <p class="product-description">Элегантный букет из нежных роз и веточек эвкалипта. Идеальный выбор для выражения искренних чувств и создания романтической атмосферы.</p>

                <div class="product-details">
                    <div class="detail-item">
                        <span class="detail-label">Состав:</span>
                        <span class="detail-value">Нежные розы и эвкалипт</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Высота:</span>
                        <span class="detail-value">40-45 см</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Ширина:</span>
                        <span class="detail-value">30-35 см</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Упаковка:</span>
                        <span class="detail-value">Эко-бумага, лента</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Срок годности:</span>
                        <span class="detail-value">7-10 дней</span>
                    </div>
                </div>

                <div class="product-price">
                    <span class="price">2 500 ₽</span>
                    <p class="stock">В наличии: 5 шт.</p>
                </div>

                <div class="product-actions">
                    <div class="quantity-selector">
                        <button class="quantity-btn minus">-</button>
                        <span class="quantity">1</span>
                        <button class="quantity-btn plus">+</button>
                    </div>
                    <button class="add-to-cart">В корзину</button>
                    <button class="buy-now">Купить в 1 клик</button>
                </div>

                <div class="delivery-info">
                    <h3>Доставка</h3>
                    <p>Бесплатно при заказе от 3000 ₽</p>
                    <p>Стоимость доставки: 300 ₽</p>
                    <p>Возможна доставка в день заказа</p>
                </div>
            </div>
        </div>

        <section class="similar-products">
            <div class="catalog-container">
                <h2>Похожие товары</h2>
                <div class="products-grid">
                    <div class="product-card">
                        <img src="assets/img/Лилии и гортензия.jpg" alt="Белая грация">
                        <h3>Белая грация</h3>
                        <p>Лилии и гортензия</p>
                        <p class="price">3 200 ₽</p>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                    <div class="product-card">
                        <img src="assets/img/Пионы и фрезии.jpg" alt="Вечерняя нежность">
                        <h3>Вечерняя нежность</h3>
                        <p>Пионы и фрезии</p>
                        <p class="price">2 800 ₽</p>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                    <div class="product-card">
                        <img src="assets/img/романтика.jpg" alt="Романтика">
                        <h3>Романтика</h3>
                        <p>9 роз, упаковка, лента</p>
                        <p class="price">1 200 ₽</p>
                        <button class="add-to-cart">В корзину</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    require_once "templates/footer.php"
    ?>

    <script>
        document.querySelector('.add-to-cart').addEventListener('click', () => alert('Товар добавлен в корзину'));
        document.querySelector('.buy-now').addEventListener('click', () => alert('Заказ оформлен!'));

        // Обработка изменения количества
        document.querySelector('.quantity-btn.plus').addEventListener('click', function() {
            const quantityElement = document.querySelector('.quantity');
            let quantity = parseInt(quantityElement.textContent);
            quantityElement.textContent = quantity + 1;
        });

        document.querySelector('.quantity-btn.minus').addEventListener('click', function() {
            const quantityElement = document.querySelector('.quantity');
            let quantity = parseInt(quantityElement.textContent);
            if (quantity > 1) {
                quantityElement.textContent = quantity - 1;
            }
        });

        // Переключение изображений
        document.querySelectorAll('.thumb').forEach(thumb => {
            thumb.addEventListener('click', function() {
                document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                document.querySelector('.main-image img').src = this.src;
            });
        });
    </script>
</body>

</html>