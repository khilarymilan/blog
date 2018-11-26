<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            BLOG
        </title>
        <meta name="description" content="sample text,sample tex">
        <meta name="keywords" content="word1,word2,word3">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:title" content="">
        <meta property="og:description" content="sample text,sample tex">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="">
        <meta property="og:type" content="blog">
        <meta property="fb:admins" content="">
        <meta property="og:image" content="assets/images/common/ogp.png">

        <meta name="apple-mobile-web-app-title" content="">

        <link rel="shortcut icon" href="assets/images/common/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="images/common/apple-touch-icon-precomposed.png">
        <?php echo $this->Html->css(['bootstrap.min.css', 'style',]); ?>
        <?php echo $this->Html->script(['app', 'jquery-3.1.1.min', 'blog']); ?>
        <style>
            .error-message {
                color: red;
            }
        </style>
    </head>
    <body id="js-body">
        <div id="fb-root"></div>
        <noscript class="for-no-js">Javascriptを有効にしてください。</noscript>
        <div class="for-old">お使いのOS・ブラウザでは、本サイトを適切に閲覧できない可能性があります。最新のブラウザをご利用ください。</div>
        <input type="hidden" value="./" id="js-base-url">

        <div class="l-wrap js-wrap">
            <!--start header-->
            <?php 
                $user = in_array($this->params['action'], $guest_pages) ? 'guest' : 'admin';
                echo $this->element('/headers/' . $user . '_header');
            ?>
            <!--end header-->

            <?php echo $this->fetch('content'); ?>

            <!--footer ここから-->
            <?php echo $this->element('/footers/footer'); ?>
            <!--footer ここまで-->
        </div>
    </body>
</html>
