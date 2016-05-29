<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>

    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
          type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body
    <?php if ((Yii::$app->controller->id == 'site') and (Yii::$app->controller->action->id == 'index')) { ?> id="page-top" class="homepage" <?php } ?>
>
<?php $this->beginBody() ?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand page-scroll" href="/">Start your day with us :)</a>
        </div>


        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php
                if ((Yii::$app->controller->id == 'site') and (Yii::$app->controller->action->id == 'index')) {//separate links between different pages
                    ?>
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#team">Team</a>
                    </li>
                    <?php
                }
                ?>
                <li>
                    <?php if (Yii::$app->user->isGuest) {
                        echo Html::a('Login',
                                ['/site/login'],
                                ['class' => '']) .
                            "</li>" .
                            "<li>" .
                            Html::a('Signup',
                                ['/site/signup'],
                                ['class' => '']);
                    } else {
                        echo Html::a(Yii::$app->user->identity->username . ' (Logout)',
                            ['/site/logout'],
                            ['class' => ''], //optional* -if you need to add style
                            ['data' => ['method' => 'post',]]);
                    }
                    ?>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<?php
if ((Yii::$app->controller->id == 'site') and (Yii::$app->controller->action->id == 'index')) {
    ?>
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Beauty Salon!</div>
                <div class="intro-heading">It's Nice To Meet You</div>
                <?php if (!Yii::$app->user->isGuest) {
                    echo "<a href='visit/index' class='page-scroll btn btn-xl'>Make an apointment</a>";
                } else {
                    echo "<a href='site/login' class='page-scroll btn btn-xl'>Make an apointment</a>";
                }
                ?>
            </div>
        </div>
    </header>
    <?php
}
?>

<div class="bg-bc">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
</div>
<div class="inner-container">
    <?= $content ?>
</div>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Beauty Salon <?= date('Y') ?></span>
            </div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
