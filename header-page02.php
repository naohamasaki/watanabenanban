<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <!--<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.6,user-scalable=yes,">-->
        <!-- PC用 -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png">
        <link rel="stylesheet" href="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/css/reset.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen, print" />
        <link rel="stylesheet" href="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/css/swiper.css">
        <link rel="stylesheet" href="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/css/animate.css">
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
            new WOW().init();
        </script>
        <title>福岡 チキン南蛮 | 【ワタナベナンバン】福岡市平尾山荘通のチキン南蛮専門店</title>
        <!--[if lt IE 8] -->
        <?php wp_head(); ?>
        <!-- ヘッダーphpを表示するのに必要なタグ -->
    </head>
    <!-- body -->
    <body class="page02">
        <!-- header -->
        <header class="clearfix">
            <h1 id="logo">
                <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="福岡 平尾山荘通りのチキン南蛮サンド店「ワタナベナンバン」" /></a>
            </h1>
            <ul id="header_address">
                <li><span>営業時間：</span>11:00~20:00</li>
                <li><span>定休日：</span>毎週火曜日、第3月曜日</li>
            </ul>
        </header>
        <!-- headerここまで -->
        <?php $get_url = get_page_link() ; ?>
        <?php if ( strstr($get_url,'partner')): ?>
        <figure id="partner_mv">
            <img src="<?php bloginfo('template_url'); ?>/images/teaser_05.jpg" alt="パートナー募集">
        </figure>
        <figcaption><span>パートナー募集</span></figcaption>
        <?php elseif ( strstr($get_url,'contact')) : ?>
        <h2 class="contact_ttl"><span>お問い合わせ</span></h2>
        <?php else: ?>
        <figure id="teaser">
            <img src="<?php bloginfo('template_url'); ?>/images/teaser_02.jpg" alt="ワタナベナンバン">
        </figure>
        <figcaption><span>ワタナベナンバン</span></figcaption>
        <?php endif; ?>
