<footer id="footer-page">
    <div id="copyright">
        <ul class="cf">
            <li><a href="<?php echo home_url('/'); ?>">ホーム</a></li>
            <li><a href="<?php echo home_url('/'); ?>access">アクセス</a></li>
            <li><a href="<?php echo home_url('/'); ?>notice/diary/">ブログ</a></li>
            <li>Copyright &copy; wanatabenanban All Rights Reserved.</li>
        </ul>
    </div>
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