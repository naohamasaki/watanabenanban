<footer>
    <div id="btm_info" class="cf">
        <figure>
            <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.svg" alt="福岡 平尾山荘通りのチキン南蛮サンド店「ワタナベナンバン」" /></a>
        </figure>
        <ul>
            <li>
                <dl>
                    <dt>住所</dt>
                    <dd>〒810-0014<br>
                        福岡市中央区平尾5-18-10</dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>営業時間</dt>
                    <dd>11:00～20:00（L.O. 19:30）<br>
                        ※売り切れ次第終了となります。</dd>
                </dl>
            </li>
            <li>
                <dl>
                    <dt>定休日</dt>
                    <dd>・毎週火曜日<br>
                        ・第3月曜日</dd>
                </dl>
            </li>
        </ul>
    </div><!--#btm_info -->
    <div id="sitemap">
        <ul class="cf">
            <li>
                <ul id="branch" class="cf">
                    <li>
                        <ul>
                            <li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
                            <li><a href="<?php echo home_url('/'); ?>menu">メニュー</a></li>
                            <li><a href="<?php echo home_url('/'); ?>notice/diary">ブログ</a></li>
                            <li><a href="<?php echo home_url('/'); ?>notice/event">イベント</a></li>
                            <li><a href="<?php echo home_url('/'); ?>notice/feature">特集</a></li>
                            <li><a href="<?php echo home_url('/'); ?>good/original">こだわり</a></li>
                            <li><a href="<?php echo home_url('/'); ?>good/birth">誕生秘話</a></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><a href="<?php echo home_url('/'); ?>access">アクセス</a></li>
                            <li><a href="<?php echo home_url('/'); ?>partner">パートナー募集</a></li>
                            <li><a href="<?php echo home_url('/'); ?>contact">お問い合わせ</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <ul>
                    <li><a href="https://www.facebook.com/watanabe.nanban/" target="_blank">Facebook</a></li>
                    <li><a href="https://twitter.com/watanabeNanban" target="_blank">Twitter</a></li>
                    <li><a href="https://www.instagram.com/watanabe_nanban/" target="_blank">Instagram</a></li>
                </ul>
            </li>
            <li>
                <ul>
                    <li><a href="https://tabelog.com/fukuoka/A4001/A400104/40045772/" target="_blank">食べログ</a></li>
                    <li><a href="https://r.gnavi.co.jp/6fj3tucw0000/" target="_blank">ぐるなび</a></li>
                    <li><a href="https://retty.me/area/PRE40/ARE124/SUB12404/100001339383/" target="_blank">Retty</a></li>
                    <li><a href="https://www.ekiten.jp/shop_66568916/" target="_blank">エキテン</a></li>
                    <li><a href="https://www.hotpepper.jp/strJ001093715/" target="_blank">ホットペッパーグルメ</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- #sitemap -->
    <div class="wow fadeIn"  data-wow-duration="2.5s" id="pagetop">
        <a href="#"><img src="//watanabenanban.com/wp-content/themes/watanabenanban/images/pagetop.png" alt="pagetop"></a>
    </div>
    <div id="copyright">Copyright &copy; wanatabenanban All Rights Reserved.</div>
</footer>
<script type="text/javascript" src="//watanabenanban.com/wp-content/themes/watanabenanban/js/swiper_custom.js"></script>
   <script>
    $(function(){
        // #で始まるリンクをクリックしたら実行されます
        $('a[href^="#"]').click(function() {
            // スクロールの速度
            var speed = 1000; // ミリ秒で記述
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top;
            $('body,html').animate({scrollTop:position}, speed, 'swing');
            return false;
        });
    });
</script>
<?php wp_footer(); ?>
</body>

</html>