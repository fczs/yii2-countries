<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Countries';
?>

<div class="container">
    <div class="countries">
        <ul>
            <?php foreach ($countries as $country): ?>
                <li><?= HTML::a($country->name, "#", ["data-country" => $country->id]) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="cities">
        <div class="title"><!-- Country name --></div>
        <ul>
            <!-- List of cities goes here -->
        </ul>
    </div>
</div>