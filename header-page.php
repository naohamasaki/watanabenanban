<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <!--<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.6,user-scalable=yes,">-->
        <!-- PC用 -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png">
        <link rel="stylesheet" href="//www.e-tofuya.co.jp/we/wp-content/themes/e-tofuya/css/swiper.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script src="https://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                // #で始まるアンカーをクリックした場合に処理
                $('a[href^=#]').click(function () {
                    // スクロールの速度
                    var speed = 1200; // ミリ秒
                    // アンカーの値取得
                    var href = $(this).attr("href");
                    // 移動先を取得
                    var target = $(href == "#" || href == "" ? 'html' : href);
                    // 移動先を数値で取得
                    var position = target.offset().top;
                    // スムーススクロール
                    $('body,html').animate({
                        scrollTop: position
                    }, speed, 'swing');
                    return false;
                });
            });
        </script>
        <title>名古屋市の溶接・配管工事は、愛知県にございます株式会社ワイエスケーへお任せください。</title>
        <!--[if lt IE 8] -->
        <?php wp_head(); ?>
        <!-- ヘッダーphpを表示するのに必要なタグ -->
    </head>
    <!-- body -->
    <body>
        <!-- header -->
        <header class="clearfix">
            <div class="content-width">
                <div class="clearfix">
                    <h1 class="logo_area">
                        <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="名古屋市の溶接・配管工事業「株式会社ワイエスケー」" /></a>
                    </h1>
                    <!-- navi -->
                    <nav class="clearfix">
                        <?php wp_nav_menu(array('theme_location' => 'navi')); ?>
                    </nav> 
                </div>
            </div>
        </header>
        <!-- headerここまで -->
    <!-- teaser -->
        <div class="outer_teaser">
            <?php $get_url = get_page_link() ; ?>
            <?php if ( strstr($get_url,'company')||in_category('t_news')): ?>
            <div id="teaser">
                <img src="<?php bloginfo('template_url'); ?>/images/teaser_01.jpg" alt="企業案内">
            </div>
            <?php elseif ( strstr($get_url,'business')||in_category('introduce')) : ?>
            <div id="teaser">
                <img src="<?php bloginfo('template_url'); ?>/images/teaser_02.jpg" alt="事業紹介">
            </div>
            <?php elseif ( strstr($get_url,'employment')||in_category('introduce')) : ?>
            <div id="teaser">
                <img src="<?php bloginfo('template_url'); ?>/images/teaser_03.jpg" alt="採用情報">
            </div>
            <?php elseif ( strstr($get_url,'news')||in_category('topics')) : ?>
            <div id="teaser">
                <img src="<?php bloginfo('template_url'); ?>/images/teaser_04.jpg" alt="最新情報">
            </div>
            <?php elseif ( strstr($get_url,'contact')) : ?>
            <div id="teaser">
                <img src="<?php bloginfo('template_url'); ?>/images/teaser_05.jpg" alt="お問い合わせ">
            </div>
            <?php else: ?>
            <div id="teaser">
                <img src="<?php bloginfo('template_url'); ?>/images/teaser_01.jpg" alt="企業案内">
            </div>
            <?php endif; ?>
            <!-- teaserここまで -->
        </div>