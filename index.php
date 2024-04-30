<?php
    $title="Главнаня страница";
    require_once "blocks/header.php"
?>
<div id="content">
    <!-- Разметка слайдера -->
    <div class="slider-container">
        <div class="slider">
            <div class="slide"><img src="picture/image1.jpg" alt="Slide 1"></div>
            <div class="slide"><img src="picture/image2.jpg" alt="Slide 2"></div>
            <div class="slide"><img src="picture/image3.jpg" alt="Slide 3"></div>
            <div class="slide"><img src="picture/image4.jpg" alt="Slide 4"></div>
            <div class="slide"><img src="picture/image5.jpg" alt="Slide 5"></div>
        </div>
        <div class="pagination"></div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </div>
    <!--Разметка основнй части страницы-->
    <main id="main-content">
        <div class="about">
            <div class="about_txt">
                <h4>PHOTOGRAPHER</h4>
                <h2 class="name">Natalia</h2>
                <h2 class="surname">Kruglova</h2>
                <p>&nbsp;&nbsp;&nbsp;    Поймаю тебя в лучшем ракурсе</p><br>
                <div><button onclick="document.location='info.php'" class="sign_up">Записаться  ———></button></div>
            </div>
            <div class="about_img"><img src="picture/photographer.jpg" alt="photographer"></div>
        </div>
        <div class="about_more">
            <h4>ОБО МНЕ</h4>
            <div class="about_more_1">
                <div class="photographer1"><img src="picture/photographer1.jpg" alt="photographer1"></div>
                <div class="about_more_txt">
                    <p>Здравствуйте!</p><br>
                    <p><b>Меня зовут Наталья Круглова — я фотогаф из Санкт-Петербурга.</b>
                        Профессионально занимаюсь фотографией более 4-х лет.</p><br>
                    <p><b>Фоторафия — моя страсть, вдохновение
                            и любовь.</b> Именно поэтому в каждый кадр
                        я вкладываю весь творрческий потенциал
                        и професиионализм.<br>
                        Приходите, буду рада встретиться с вами на фотосессии!
                    </p><br><br>
                    <div><button onclick="document.location='about.php'" class="more_details">Подробнее  ———></button></div>
                    <a name="works"></a><!--Сслка на мои работы-->
                </div>
            </div>
        </div>
        <div class="my_works">
            <h4>МОИ РАБОТЫ</h4>
            <div class="my_works1">
                <div class="wedding" onclick="document.location='#'">
                    <p>Свадьбы</p>
                    <img src="picture/my_works1.jpg" alt="wedding">
                </div>
                <div class="photo_studio" onclick="document.location='#'">
                    <p>Студия</p>
                    <img src="picture/my_works2.jpg" alt="studio">
                </div>
                <div class="street" onclick="document.location='#'">
                    <p>Улица</p>
                    <img src="picture/my_works3.jpg" alt="street">
                </div>
            </div>
        </div>
        <div id="background"></div>
    </main>
</div>
<script src="js/slider.js"></script>
<?php
require_once "blocks/footer.php"
?>

