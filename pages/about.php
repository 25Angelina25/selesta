<?php
require_once __DIR__ . '/../templates/header.php';
?>

<body>
    <!-- Основной контент -->
    <main class="about-main">
        <section class="about-hero">
            <div class="about-container">
                <h1>О нашей компании</h1>
                <p>Селеста — это не просто цветочный магазин, это место, где цветы оживают и передают самые тонкие чувства и эмоции.</p>
            </div>
        </section>

        <section class="about-story">
            <div class="about-container">
                <h2>Наша история</h2>
                <div class="story-content">
                    <div class="story-text">
                        <p>С 2015 года мы создаем уникальные цветочные композиции, которые дарят радость и вдохновляют. Наша команда флористов с любовью и вниманием к деталям создает каждый букет, словно произведение искусства.</p>
                        <p>Мы отбираем только самые свежие и красивые цветы со всего мира, чтобы вы могли подчеркнуть важность любого момента — от торжественных событий до повседневной заботы о близких.</p>
                    </div>
                    <div class="story-image">
                        <img src="/assets/img/букет1.jpg" alt="Цветочные композиции Селеста">
                    </div>
                </div>
            </div>
        </section>

        <section class="about-mission">
            <div class="about-container">
                <h2>Наша миссия</h2>
                <div class="mission-content">
                    <div class="mission-card">
                        <h3>Качество</h3>
                        <p>Мы гарантируем свежесть и высокое качество всех наших цветов. Каждый букет проходит тщательный отбор и подготовку перед доставкой.</p>
                    </div>
                    <div class="mission-card">
                        <h3>Креативность</h3>
                        <p>Наши флористы создают уникальные композиции, которые отражают индивидуальность каждого клиента и подходят к любому поводу.</p>
                    </div>
                    <div class="mission-card">
                        <h3>Доставка</h3>
                        <p>Быстрая и бережная доставка по всему городу. Мы доставляем букеты в день заказа, сохраняя их первоначальный вид и аромат.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-team">
            <div class="about-container">
                <h2>Наша команда</h2>
                <div class="team-content">
                    <div class="team-member">
                        <img src="/assets/img/logo/геля.jpg" alt="Ангелина">
                        <h3>Ангелина</h3>
                        <p>Главный флорист</p>
                    </div>
                    <div class="team-member">
                        <img src="/assets/img/букет2.jpg" alt="Мария">
                        <h3>Мария</h3>
                        <p>Дизайнер</p>
                    </div>
                    <div class="team-member">
                        <img src="/assets/img/букет3.jpg" alt="Иван">
                        <h3>Иван</h3>
                        <p>Менеджер по доставке</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php
    require_once __DIR__ . '/../templates/footer.php';
    ?>
</body>

</html>