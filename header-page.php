<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <!--<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.6,user-scalable=yes,">-->
        <!-- PC用 -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png">
        <link rel="stylesheet" href="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/css/reset.css">
        <link rel="stylesheet" href="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/css/swiper.css">
        <link rel="stylesheet" href="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/css/animate.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
        <script type="text/javascript" src="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/js/marsonry.js"></script>
        <script type="text/javascript" src="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/js/imagesloaded.min.js"></script>
        <script>
            //グリッド用スクリプト（masonry）
            //設置場所はヘッダーのプラグインリンクの直下
            $(window).load(function () {
                var $container = $('#masonry');
                $container.imagesLoaded(function () {
                    $container.masonry({
                        itemSelector: '.grid',
                        isFitWidth: true,
                        isAnimated: true,

                    });
                });
            });
        </script>
        <script type="text/javascript" src="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/js/wow.js"></script>
        <script>
            new WOW({
                mobile: false
            }).init();
        </script>
        <title>福岡 チキン南蛮 | 【ワタナベナンバン】福岡市平尾山荘通のチキン南蛮専門店</title>
        <!--[if lt IE 8] -->
        <?php wp_head(); ?>
        <!-- ヘッダーphpを表示するのに必要なタグ -->
    </head>
    <!-- body -->
    <body>
        <!-- header -->
        <header class="clearfix">
            <h1 id="logo">
                <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="福岡 平尾山荘通りのチキン南蛮サンド店「ワタナベナンバン」" /></a>
            </h1>
            <a href="<?php echo home_url('/'); ?>contact">
                <div class="header_banner_bg">
                    <div class="header_bth_border">
                        <p class="contact">お問い合わせ</p>
                    </div>
                </div>
            </a>
            <p class="sp-tel">
                <a href="tel:0925246363">
                    <img src="http://test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/images/tel.png" alt="092-524-6363">
                </a>
            </p>
        </header>
        <!-- headerここまで -->
        <!-- navi -->
        <nav>
            <?php wp_nav_menu(array('theme_location' => 'navi')); ?>
        </nav> 
        <!-- teaser -->
        
        <div id="teaser_bg">
            <div>
                <?php $get_url = get_page_link() ; ?>
                <?php if ( strstr($get_url,'menu')||in_category('t_news')): ?>
                <figure id="teaser">
                    <img src="<?php bloginfo('template_url'); ?>/images/teaser_01.jpg" alt="メニュー">
                </figure>
                <figcaption><span>メニュー</span></figcaption>
                <?php elseif ( strstr($get_url,'notice')||in_category('diary')) : ?>
                <figure id="teaser">
                    <img src="<?php bloginfo('template_url'); ?>/images/teaser_02.jpg" alt="お知らせ">
                </figure>
                <figcaption><span>お知らせ</span></figcaption>
                <?php elseif ( strstr($get_url,'good')||in_category('aaaaaaa')) : ?>
                <figure id="teaser">
                    <img src="<?php bloginfo('template_url'); ?>/images/teaser_03.jpg" alt="こだわり">
                </figure>
                <figcaption><span>こだわり</span></figcaption>
                <?php elseif ( strstr($get_url,'access')||in_category('aaaaaaa')) : ?>
                <figure id="teaser">
                    <img src="<?php bloginfo('template_url'); ?>/images/teaser_04.jpg" alt="アクセス">
                </figure>
                <figcaption><span>アクセス</span></figcaption>
                <?php elseif ( strstr($get_url,'events')||in_category('event')) : ?>
                <figure id="teaser">
                    <img src="<?php bloginfo('template_url'); ?>/images/teaser_02.jpg" alt="イベント">
                </figure>
                <figcaption><span>イベント詳細</span></figcaption>
                <?php else: ?>
                <figure id="teaser">
                    <img src="<?php bloginfo('template_url'); ?>/images/teaser_02.jpg" alt="ワタナベナンバン">
                </figure>
                <figcaption><span>ワタナベナンバン</span></figcaption>
                <?php endif; ?>
                <p>
                    <?php the_topicpath(); ?>
                </p>
            </div>
        </div>