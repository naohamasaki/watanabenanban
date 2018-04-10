<footer>
  <p id="goto-top" class="cf"><a href="#topImg"><i class="fa fa-angle-up " ></i>Topへ戻る</a></p>
  <section id="bottom-navi">
    <ul id="b-navi" class="cf">   
      <li><a href="<?php echo home_url('/'); ?>">トップ</a></li>
    	<li><a href="<?php echo esc_url(get_permalink( get_page_by_path('menu')->ID )) ?>">メニュー</a></li>
      <li><a href="<?php echo esc_url(get_permalink( get_page_by_path('goodfor')->ID )) ?>">こだわり</a></li>
      <li><a href="<?php echo esc_url(get_permalink( get_page_by_path('pick')->ID )) ?>">特　集</a></li>
      <li><a href="<?php echo esc_url(get_permalink( get_page_by_path('map')->ID )) ?>">アクセス</a></li>
    </ul>
	</section><!-- #bottom-navi -->
  <p id="copy">Copyright &copy;<?php if (date("Y")!=2015) echo date("Y"); ?> wanatabenanban All Rights Reserved.</p>
</footer>
<p id="sp-top"><a href="#img-slider"><i class="fa fa-chevron-up"></i></a></p>
<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
									})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-71599417-1', 'auto');
	ga('send', 'pageview');

</script>
<?php wp_footer(); ?>
</body>
</html>
