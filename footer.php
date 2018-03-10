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
                            <li><a rel="">ホーム</a></li>
                            <li><a rel="">メニュー</a></li>
                            <li><a rel="">ブログ</a></li>
                            <li><a rel="">特集</a></li>
                            <li><a rel="">こだわり</a></li>
                            <li><a rel="">誕生秘話</a></li>
                        </ul>
                    </li>
                    <li>
                        <ul>
                            <li><a rel="">アクセス</a></li>
                            <li><a rel="">パートナー募集</a></li>
                            <li><a rel="">お問い合わせ</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <ul>
                    <li><a rel="">Facebook</a></li>
                    <li><a rel="">Twitter</a></li>
                    <li><a rel="">Instagram</a></li>
                </ul>
            </li>
            <li>
                <ul>
                    <li><a rel="">食べログ</a></li>
                    <li><a rel="">ぐるなび</a></li>
                    <li><a rel="">Retty</a></li>
                    <li><a rel="">エキテン</a></li>
                    <li><a rel="">ホットペッパーグルメ</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- #sitemap -->
    <div class="wow fadeIn"  data-wow-duration="2.5s" id="pagetop">
        <a href="#"><img src="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/images/pagetop.png" alt="pagetop"></a>
    </div>
    <div id="copyright">Copyright &copy; wanatabenanban All Rights Reserved.</div>
</footer>
<script type="text/javascript" src="//test20150101.wp.xdomain.jp/wp-content/themes/watanabenanban/js/swiper_custom.js"></script>
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