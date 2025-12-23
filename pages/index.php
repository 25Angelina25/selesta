<?php
require_once __DIR__ . '/../templates/header.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Селеста — цветы с достоинством</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Слайдер с рекламой -->
    <section class="slider-section">
        <div class="slider-container">
            <div class="slide active">
                <img src="../assets/img/букет1.jpg" alt="Букет">
                <div class="slide-content">
                    <h2>Свежие цветы</h2>
                    <p>Доставка в день заказа</p>
                    <button class="slide-btn">Заказать</button>
                </div>
            </div>
            <div class="slide">
                <img src="../assets/img/букет2.jpg" alt="Букет">
                <div class="slide-content">
                    <h2>Эксклюзивные букеты</h2>
                    <p>По индивидуальному заказу</p>
                    <button class="slide-btn">Создать</button>
                </div>
            </div>
            <div class="slide">
                <img src="../assets/img/букет3.jpg" alt="Букет">
                <div class="slide-content">
                    <h2>Скидка 20%</h2>
                    <p>На первый заказ</p>
                    <button class="slide-btn">Получить</button>
                </div>
            </div>
            <button class="slider-btn prev">‹</button>
            <button class="slider-btn next">›</button>
            <div class="slider-dots">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </section>

    <!-- Популярные букеты -->
    <section class="products-section">
        <div class="section-title">
            <h2>Популярные композиции</h2>
            <a href="catalog">Все товары</a>
        </div>
        <div class="products-grid">
            <div class="product-card">
                <img src="../assets/img/Нежные розы и эвкалипт.jpg" alt="Утренняя роса">
                <h3>Утренняя роса</h3>
                <p>Нежные розы и эвкалипт</p>
                <p class="price">2 500 ₽</p>
                <p class="stock">В наличии: 5 шт.</p>
                <button class="add-to-cart">В корзину</button>
            </div>
            <div class="product-card">
                <img src="../assets/img/Лилии и гортензия.jpg" alt="Белая грация">
                <h3>Белая грация</h3>
                <p>Лилии и гортензия</p>
                <p class="price">3 200 ₽</p>
                <p class="stock">В наличии: 3 шт.</p>
                <button class="add-to-cart">В корзину</button>
            </div>
            <div class="product-card">
                <img src="../assets/img/Пионы и фрезии.jpg" alt="Вечерняя нежность">
                <h3>Вечерняя нежность</h3>
                <p>Пионы и фрезии</p>
                <p class="price">2 800 ₽</p>
                <p class="stock">В наличии: 7 шт.</p>
                <button class="add-to-cart">В корзину</button>
            </div>
        </div>
    </section>

    <?php
        require_once __DIR__ . '/../templates/footer.php'
    ?>

    <script src="../js/script.js"></script>
</body>
</html>