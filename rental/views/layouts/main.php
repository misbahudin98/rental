<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     
    <?= Html::csrfMetaTags() ?>
    <style>
        
          <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>

    </style>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 <?php
    NavBar::begin([
        'brandLabel' => "nidu",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        
    $menuItems = [
        ['label' => 'Pembayaran ( client )', 'url' => ['/client/default/pembayaran']],
    ['label'=> 'Sewa ( client )','url' =>['/client/default/itu']],    
            ['label'=> 'Registrasi ( client )','url' =>['/client/default/new-register']],    
        ['label' => 'Login', 'url' => ['/site/login']]
    ];
    
    } else {
        $menuItems[] =     ['label' => 'Mobil ( admin )', 'url' => ['/mobil']];
         $menuItems[] =   ['label'=> 'Notif ( admin )','url' =>['/site/notifikasi']];
        $menuItems[] =    ['label'=> 'Registrasi ( admin )','url' =>['/site/register']] ;

   
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

  

<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
            <?= Alert::widget() ?>
            <?= $content ?>  </div>
    <div class="col-sm-2 sidenav">
    </div>
  </div>
</div>

   
<?php $this->endBody() ?>


<?php $this->endPage() ?>

</body>
</html>

<?php

/* @var $this \yii\web\View */
/* @var $content string */

