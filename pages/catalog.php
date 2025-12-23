<?php
session_start();
require_once "templates/header.php"
?>

<body>
    <!-- Основной контент -->
    <main class="catalog-main">
        <section class="catalog-hero">
            <div class="catalog-container">
                <h1>Каталог цветов</h1>
                <p>Выберите идеальный букет для любого случая</p>
            </div>
        </section>

        <section class="catalog-filters">
            <div class="catalog-container">
                <div class="filters">
                    <div class="filter-group">
                        <h3>Категории</h3>
                        <ul>
                            <li><a href="#" class="filter active">Все букеты</a></li>
                            <li><a href="#" class="filter">Для неё</a></li>
                            <li><a href="#" class="filter">Для него</a></li>
                            <li><a href="#" class="filter">На праздник</a></li>
                            <li><a href="#" class="filter">Свадебные</a></li>
                        </ul>
                    </div>

                    <div class="filter-group">
                        <h3>Цена</h3>
                        <div class="price-range">
                            <input type="range" min="500" max="5000" value="5000" class="slider" id="price-slider">
                            <div class="price-values">
                                <span>500 ₽</span>
                                <span>5000 ₽</span>
                            </div>
                        </div>
                    </div>

                    <div class="filter-group">
                        <h3>Состав</h3>
                        <ul>
                            <li><a href="#" class="filter">Розы</a></li>
                            <li><a href="#" class="filter">Пионы</a></li>
                            <li><a href="#" class="filter">Тюльпаны</a></li>
                            <li><a href="#" class="filter">Гортензии</a></li>
                        </ul>
                    </div>
                </div>

                <div class="products-section">
                    <div class="products-grid">
                        <div class="product-card">
                            <img src="assets/img/Нежные розы и эвкалипт.jpg" alt="Утренняя роса">
                            <h3>Утренняя роса</h3>
                            <p>Нежные розы и эвкалипт</p>
                            <p class="price">2 500 ₽</p>
                            <p class="stock">В наличии: 5 шт.</p>
                            <button class="add-to-cart">В корзину</button>
                        </div>
                        <div class="product-card">
                            <img src="assets/img/Лилии и гортензия.jpg" alt="Белая грация">
                            <h3>Белая грация</h3>
                            <p>Лилии и гортензия</p>
                            <p class="price">3 200 ₽</p>
                            <p class="stock">В наличии: 3 шт.</p>
                            <button class="add-to-cart">В корзину</button>
                        </div>
                        <div class="product-card">
                            <img src="assets/img/Пионы и фрезии.jpg" alt="Вечерняя нежность">
                            <h3>Вечерняя нежность</h3>
                            <p>Пионы и фрезии</p>
                            <p class="price">2 800 ₽</p>
                            <p class="stock">В наличии: 7 шт.</p>
                            <button class="add-to-cart">В корзину</button>
                        </div>
                        <div class="product-card">
                            <img src="assets/img/романтика.jpg" alt="Романтика">
                            <h3>Романтика</h3>
                            <p>9 роз, упаковка, лента</p>
                            <p class="price">1 200 ₽</p>
                            <p class="stock">В наличии: 10 шт.</p>
                            <button class="add-to-cart">В корзину</button>
                        </div>
                        <div class="product-card">
                            <img src="assets/img/весна.jpg" alt="Весна">
                            <h3>Весна</h3>
                            <p>Микс цветов в керамической вазе</p>
                            <p class="price">2 500 ₽</p>
                            <p class="stock">В наличии: 4 шт.</p>
                            <button class="add-to-cart">В корзину</button>
                        </div>
                        <div class="product-card">
                            <img src="assets/img/праздничный.jpg" alt="Праздничный">
                            <h3>Праздничный</h3>
                            <p>Разноцветные тюльпаны</p>
                            <p class="price">2 400 ₽</p>
                            <p class="stock">В наличии: 6 шт.</p>
                            <button class="add-to-cart">В корзину</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    require_once "templates/footer.php"
    ?>

    <script>
        document.querySelectorAll('.add-to-cart').forEach(btn =>
            btn.addEventListener('click', () => alert('Товар добавлен в корзину'))
        );

        document.querySelectorAll('.filter').forEach(filter =>
            filter.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.filter').forEach(f => f.classList.remove('active'));
                this.classList.add('active');
            })
        );
    </script>
</body>

</html>