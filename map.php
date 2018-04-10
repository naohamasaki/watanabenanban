<?php
/*
Template Name: アクセステンプレート
*/
?>
<?php get_header(); ?>
		<section id="map">
			<h1 class="page-title shadow">アクセス・店舗情報</h1>
			<ul id="scroller">
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple01.jpg" alt="ワタナベナンバン 西新店1"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple02.jpg" alt="ワタナベナンバン 西新店2"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple03.jpg" alt="ワタナベナンバン 西新店3"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple04.jpg" alt="ワタナベナンバン 西新店4"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple05.jpg" alt="ワタナベナンバン 西新店5"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple06.jpg" alt="ワタナベナンバン 西新店6"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple10.jpg" alt="ワタナベナンバン 西新店7"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple08.jpg" alt="ワタナベナンバン 西新店8"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple11.jpg" alt="ワタナベナンバン 西新店9"></li>
				<li><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/img/simple09.jpg" alt="ワタナベナンバン 西新店10"></li>
			</ul>
		</section>
		<!-- #map -->


		<div id="access-info">
			<article class="annai cf">
				<section class="pad">
					<h1>店舗案内</h1>
					<dl class="cf">
						<dt>住所</dt>
						<dd>福岡市中央区平尾5-18-10</dd>
						<dt>TEL</dt>
						<dd>092-524-6363</dd>
						<dt>営業時間</dt>
						<dd>11:00~20:00（ラストオーダー 19:00）</dd>
						<dd><small class="annotation">※売り切れ次第終了となります。</small>
						</dd>
						<dt>定休日</dt>
						<dd>毎週火曜日、第3月曜日</dd>
					</dl>
				</section>
				<!-- .pad -->
			</article>
			<!-- .annai -->
		</div>
		<!-- #access-info -->
		<div id="google-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d830.9661647510839!2d130.3587133!3d33.58286309999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x354193a4dfb968c9%3A0x73660780a7960db!2z44Ov44K_44OK44OZ44OK44Oz44OQ44Oz!5e0!3m2!1sja!2sjp!4v1444024169027" width="100%" height="230" title="google-map"></iframe>
		</div>
		<!-- #google-map -->
<script type="text/javascript" src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/jquery-simplyscroll-2.0.5/jquery.simplyscroll.min.js"></script>
<script type="text/javascript">
(function ($) {
	$(function () { //on DOM ready 
		$("#scroller").simplyScroll();
	});
})(jQuery);
</script>
<?php get_footer(); ?>