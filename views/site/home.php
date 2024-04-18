<div class="content">
    <img class="image" src="/practice/public/media/marchcharact.jpg">
    <h2>ГЛАВНАЯ ИНФОРМАЦИЯ</h2>
    <button class="back"><a class="login" href="<?= app()->route->getUrl('/add_article') ?>">Добавить статью</a></button>
    <div class="content_articles">
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <h2><?= $article->title ?></h2>
                <p><?= $article->description ?></p>
                <div class="article_image"><img width="250px" src="<?= $article->image ?>" alt="<?= $article->title ?>"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<footer class="footer">
    <div class="footer_content">
        <div class="footer_adress">
            <p>Адрес: </br>Ивановская область, город Видное, проезд Будапештсткая, 89</p>
        </div>
        <div class="footer_information">
        <div class="footer_info">
            <p>pochta@mail.ru </p>
            <img class="footer_image" src="/practice/public/media/free-icon-mail-icon-5757765.png">
        </div>
        <div class="footer_info">
            <p>instagram.com</p>
            <img class="footer_image" src="/practice/public/media/free-icon-photo-13266180.png">
        </div>
        </div>
    </div>
</footer>
