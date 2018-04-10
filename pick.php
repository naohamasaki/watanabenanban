<?php
/*
Template Name: 特集テンプレート
*/
?>
<?php get_header(); ?>
		<div id="intro">
			<h1 class="page-title shadow">イベント・特集</h1>
			<section id="event">
				<div class="cf bg-death">
					<div id="bg_img">
						<div id="layerTransparent">
							<h1>13日金曜日限定イベント</h1>
							<p>自家栽培ハバネロ果実が入っている激辛タルタルソース「デスタル」
								<br> 一口食べると毛穴が広がっていくのがわかります。
								<br>
							</p>
							<small>※ご注文は自己責任でお願いします。<br>
							（数量に限りがございます。）</small>
						</div>
						<!-- #layerTransparent -->
					</div>
				</div>
				<!-- #bg-death -->
			</section>
			<!-- #event -->


			<article id="tv">
				<div id="masonry" class="cf">
					
					<?php query_posts('post_type=coverage'); ?>
					<!-- post_type=○○←ここはプラグインのslugと合わせる。 -->

					<?php 
					if (have_posts()) :
					while	(have_posts()) :
					the_post();
					?>

					<section class="intro">
						<h1><?php the_title(); ?></h1>
						<figure id="thumbnail">
							<?php if (has_post_thumbnail()): ?>
							<?php the_post_thumbnail(array(200,200 )); ?><!-- array(200,200 )はcssで制御のため数字は無効 ※ここがないと画像表示されないためコード記載 -->
							<?php else: ?>
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/no-image.jpg" width="200" height="50" alt="no-image">
							<?php endif; ?>

						</figure>
						<p>
							<?php the_content(); ?>
						</p>
					</section>
					<?php 
					endwhile;
					else: 
					?>

					<!--<p>記事はありません。</p> -->

					<?php
					endif;
					?>

						<section class="intro">
							<h1>食べログさん西新×ディナー</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv09.jpg" alt="食べログ西新ランチ特集">
						</figure>
						<p>食べログさんにて、福岡・早良区<strong>西新</strong>「夜の部、パン部門」で<em>チキン南蛮</em>サンド１位を頂きました。</p>
					</section>
					<!-- .intro -->
					<section class="intro">
						<h1>チャギハ！さんの西新ランチの口コミ</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv06.jpg" alt="チャギハ西新ランチ特集">
						</figure>
						<p>RKBチャギハ！さん西新のランチ特集にて、早良区西新にある西南学院大学の女子大生の方が口コミしてくださいましたです。
							<br> 写真は美しいリポーターさん達♪
						</p>
					</section>
					<!-- .intro -->
					<section class="intro">
						<h1>ももち浜ストアさん西新取材</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv02.jpg" alt="ももち浜ストア西新ランチ特集">
						</figure>
						<p>「ももち浜ストア」高田課長さんの西新周辺の突撃取材にてワタナベナンバンをご紹介いただきました。 </p>
					</section>
					<!-- .intro -->
					<section class="intro">
						<h1>よくばりミルキィさん西新特集</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv05.jpg" alt="よくばりミルキィ西新ランチ特集">
						</figure>
						<p>よくばりミルキィさんの<strong>西新 ランチ</strong>特集でワタナベナンバンをご紹介いただきました。
							<br>リポーターは井上陽水さんの愛娘サラサさん♪ 西南学院大学の女子大生の方が口コミしてくださったとのこと。
						</p>
					</section>
					<!-- .intro -->

					<section class="intro">
						<h1>福岡Walkerさんサンド特集</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv12.jpg" alt="福岡Walker西新ランチ特集">
						</figure>
						<p>「福岡Walker」さん11月号さんにて、サンドイッチ特集でワタナベナンバンのチキン南蛮サンドをご紹介いただきました。</p>
					</section>
					<!-- .intro -->


					<section class="intro">
						<h1>近代食堂さんランチ特集</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv10.jpg" alt="近代食堂西新ランチ特集">
						</figure>
						<p>「近代食堂」さん10月号にて、ワタナベナンバンの西新ランチ特集でワタナベナンバンをカラー1ページ使ってご紹介をいただきました。
						</p>
					</section>
					<!-- .intro -->

					<section class="intro">
						<h1>RKBラジオさん</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/no-image.jpg" alt="RKBラジオ西新ランチ特集">
						</figure>
						<p>「voicebook」の町田さんのランチ特集コーナーにてワタナベナンバンをご紹介いただきました。</p>
					</section>
					<!-- .intro -->
					<section class="intro">
						<h1>JAMさん西新のランチ特集</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv03.jpg" alt="JAM西新ランチ特集">
						</figure>
						<p>TVQ九州放送 「JAM」さんにて西新のランチ特集としてワタナベナンバンをご紹介いただきました。</p>
					</section>
					<!-- .intro -->


					<section class="intro">
						<h1>ドォーモさん番組</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv07.jpg" alt="西新ランチ特集">
						</figure>
						<p>KBC九州朝日放送、ドォーモさんの西新のランチ紹介コーナーでワタナベナンバンをご紹介いただきました。
						</p>
					</section>
					<!-- .intro -->
					<section class="intro">
						<h1>今日感テレビさん西新のランチ特集</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv11.jpg" alt="今日感テレビ西新ランチ特集">
						</figure>
						<p>
							RKB毎日放送、今日感テレビさんにて<strong>西新のランチ</strong>特集でワタナベナンバンをご紹介いただきました。
						</p>
					</section>
					<!-- .intro -->
					<section class="intro">
						<h1>ひと駅歩こう！さん西新でランチ特集</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv04.jpg" alt="ひと駅歩こう西新ランチ特集">
						</figure>
						<p>「J-COM福岡 山田としあきのひと駅歩こう！」さんにて
							<br>西新・ランチの特集でワタナベナンバンをご紹介いただきました。</p>
					</section>
					<!-- .intro -->

					<section class="intro">
						<h1>シティ福岡さん西新商店街のランチ特集</h1>
						<figure id="thumbnail">
							<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/tv08.jpg" alt="シティ福岡西新ランチ特集">
						</figure>
						<p>
							シティ福岡さんの西新商店街のランチ特集でワタナベナンバンをご紹介いただきました。
					</section>
					<!-- .intro -->


				</div>
				<!-- #masonry -->

				<!-- .cf -->

			</article>
			<!-- #tv -->
		</div>
		<!-- #intro -->
<script type="text/javascript" src="http://watanabenanban.com/wp-content/themes/watanabenanban/jQuery/masonry/masonry-docs.min.js"></script>
<script>
	//グリッド用スクリプト（masonry）
	//デフォルトのスクリプトはレイアウトが崩れるため必ず下記を記入
	$(function(){
		var $container = $('#masonry');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector: '.intro',
				isFitWidth: true,
				isAnimated: true
			});
		});
	});		</script>


<?php get_footer(); ?>