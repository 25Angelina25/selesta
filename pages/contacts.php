<?php
require_once __DIR__ . '/../templates/header.php';
?>

<body>
    <!-- Основной контент -->
    <main class="contacts-main">
        <section class="contacts-hero">
            <div class="contacts-container">
                <h1>Наши контакты</h1>
                <p>Свяжитесь с нами удобным для вас способом</p>
            </div>
        </section>

        <section class="contacts-info">
            <div class="contacts-container">
                <div class="contact-methods">
                    <div class="contact-card">
                        <h3>Телефон</h3>
                        <p>+7 (XXX) XXX-XX-XX</p>
                        <p>Ежедневно с 9:00 до 21:00</p>
                    </div>

                    <div class="contact-card">
                        <h3>Email</h3>
                        <p>hello@celesta.flowers</p>
                        <p>Отвечаем в течение 24 часов</p>
                    </div>

                    <div class="contact-card">
                        <h3>Адрес</h3>
                        <p>г. Москва, ул. Цветочная, д. 10</p>
                        <p>Работаем без выходных</p>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Написать нам</h3>
                    <form id="contact-form">
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="subject">Тема сообщения</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>

                        <div class="form-group">
                            <label for="message">Сообщение</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Отправить сообщение</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="map-section">
            <div class="contacts-container">
                <h3>Наш магазин на карте</h3>
                <div class="map-placeholder">
                    <p>Здесь будет карта с расположением магазина</p>
                </div>
            </div>
        </section>
    </main>
    <?php
    require_once __DIR__ . '/../templates/footer.php';
    ?>

    <script>
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Временная реализация без бекенда
            alert('Сообщение отправлено! Мы ответим вам в ближайшее время.');

            // Очистка формы
            this.reset();
        });
    </script>
</body>

</html>