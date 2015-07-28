<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="//fonts.googleapis.com/css?family=Kreon:400%7cOswald:400">
    <link rel="stylesheet" type="text/css" href="/../css/sheet1.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'Gmail Analytic Toolkit',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-nav navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    Yii::$app->user->isGuest ?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row center">
                    <a href="/">Home</a>
                    |
                    <a href="faq">FAQ</a>
                    |
                    <a href="">Updates <span class="badge badge-important">07-26-2015</span></a>
                </div>
                <div class="row center">
                    <div id="footerlogo">
                        <img src="/../assets/e8e4107e/logoFooterNew.png" alt="Logofooternew">
                    </div>
                    <p>
                        <a href="//acadtech.gwu.edu/">Academic Technologies</a>
                        of
                        <a href="//www.gwu.edu">The George Washington University</a>
                        
                    </p>
                    <p>
                        Phone: 202-994-7900 | Fax: 202-994-4747 | Email: <a href="#">acadtech@gwu.edu</a>
                    </p>
                </div>
            <p class="pull-right"><?= Yii::powered() ?></p> 
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
