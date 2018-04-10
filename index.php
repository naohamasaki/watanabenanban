<?php get_header(); ?>
	<div id="img-slider">
		<ul class="bxslider">
			<li id="a"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/nanban01.jpg" alt="チキン南蛮サンド"></li>
			<li id="b"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/nanban02.jpg" alt="チキン南蛮サンド"></li>
			<li id="c"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/nanban03.jpg" alt="チキン南蛮サンド"></li>
			<li id="d"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/sasami01.jpg" alt="チキンカツサンド"></li>
			<li id="e"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/sasami02.jpg" alt="チキンカツサンド"></li>
			<li id="f"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/chicken-kathu.jpg" alt="チキンカツサンド"></li>
			<li id="g"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/chicken-kathu02.jpg" alt="チキンカツサンド"></li>
			<li id="h"><img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/chicken-kathu03.jpg" alt="チキンカツサンド"></li>
		</ul>
	</div>
	<!-- #img-slider -->
	<section id="posts">
		<h1>新着情報</h1>
		<div class="posts">
			<ul>
				<?php
				query_posts("&posts_per_page=6&paged=$paged");
				if (have_posts()) :
				while ( have_posts() ) :
				the_post();
				?>

					<li>
						<time>
							<?php echo get_the_date(); ?>
						</time>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</li>
					<?php
                    endwhile;
                    else:
                    ?>
						<P>記事はありません。</P>

						<?php
                endif;
                ?>
							<li><a href="<?php echo esc_url(get_permalink( get_page_by_path('topics')->ID )) ?>">新着情報一覧</a></li>
							<?php wp_reset_query(); ?>
								<!-- 投稿表示数指定の解除 ※上記の投稿表示数指定の関数と必ずセット -->

			</ul>

		</div>
		<!-- .posts -->

		<div id="sns" class="cf">
			<h2>SNSはコチラ</h2>
			<div id="facebook">
				<a href="#fb"><i class="fa-facebook fa-size"></i></a>
			</div>
			<div id="twitter">
				<a href="#tw"><i class="fa-twitter fa-size"></i></a>
			</div>
		</div>
	</section>
	<!-- #posts -->


	<section id="greeting">
		<h1>ワタナベナンバン</h1>
		<p>チキン南蛮サンド専門店として2006年宮崎青空市場にオープン。</p>
		<p>2013年より福岡市早良区西新商店街へ移転。17年より中央区平尾山荘通りへ。</p>
		<p>宮崎発祥のチキン南蛮を毎朝焼き上げるオリジナルのピタパンに挟んだ南国宮崎のファストフード。</p>
		<p>9種類のタルタルソースからお好みをチョイス！</p>
	</section>
	<!-- #greeting -->
	<section class="main-section">
		<h1 id="one" class="bg-fix">Chicken Nanban</h1>
		<h2 class="mini-title">チキン南蛮</h2>
		<div class="para">
			<p >南国九州宮崎発祥のご当地料理。</p>
			<p>宮崎生まれ宮崎育ちの店主が作る「てげうめぇ南蛮酢」と「てげやべぇタルタルソース」の
			本場チキン南蛮をご賞味ください。</p>
		</div>
	</section>
	<!-- .main-section -->
	<aside class="main-aside">
		<article class="big-grid cf">

			<section class="grid">
				<figure>
					<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/m-nanban-01.jpg" alt="チキン南蛮サンド">
				</figure>
				<h1 class="sub-t sub_or">チキン南蛮サンド</h1>
				<div class="sub-cap">
					<p>ワタナベナンバンの人看板メニュー。</p>
					<p>宮崎人のソウルフードであるチキン南蛮をオリジナルピタパンでサンドしました。</p>
					<p>チキン南蛮のＮＥＷスタイル！</p>
					<p>幅広い世代に人気ナンバー１！</p>
				</div>
			</section>
			<!-- .grid -->

			<section class="grid">
				<figure>
					<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/m-nanban-03.jpg" alt="ササミチーズカツサンド">
				</figure>
				<h1 class="sub-t sub_or">ササミチーズカツサンド</h1>
				<p class="sub-cap">
					あっさり淡白なササミにダイス状にカットしたチーズを混ぜ込みました。
					<br>カツ系サンドにはシンプルに、
					<br>トンカツソース&amp;マヨネーズ(トンマヨ)やマヨネーズ&amp;ケチャップ(マヨケチャ)もオススメです。
				</p>
			</section>
			<!-- .grid -->

			<section class="grid">
				<figure>
					<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/m-nanban-02.jpg" alt="チキンカツサンド">
				</figure>
				<h1 class="sub-t sub_or">デカメンチカツサンド</h1>
				<p class="sub-cap">
					衣サクッと中身ジューシー。
					<br>ボリュームたっぷりなメンチカツは
					<br>ピタパンに収まりきれません。
					<br>王道のトンマヨ以外にマスタードタルやゴマタル、おろしポン酢タルが
					<br>相性の良いソースです。
				</p>
			</section>
			<!-- .grid -->
		</article>
		<!-- .big-grid -->
	</aside>
	<!-- .main-aside -->


	<div class="link-page">
		<div>
			<a href="<?php echo esc_url(get_permalink( get_page_by_path('menu')->ID )) ?>">メニュー一覧</a>
		</div>
	</div>
	<!-- .link-page -->


	<section class="main-section">
		<h1 id="two" class="bg-fix">Pita bread</h1>
		<h2 class="mini-title">こだわり</h2>
		<p class="para">
			ワタナベナンバンではチキン南蛮に最高に合う手作りのピタパンをはじめ、
			<br>材料から南蛮酢まで全てにこだわって作っています。
			<br>長年かけてたどりついた最高の組み合わせを
			<br>是非御賞味ください。
		</p>
	</section>


	<aside class="main-aside cf">
		<div class="big-grid cf">

			<section class="grid">
				<figure>
					<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/k-03.jpg" alt="ピタパン">
				</figure>
				<h1 class="sub-t sub_gr">ピタパン</h1>
				<p class="sub-cap">材料からこだわったチキン南蛮に
					<br>最高に合うパンを求め、
					<br>たどり着いた"ピタパン"は
					<br>配合を１から見直し、
					<br>発酵時間や温度・油分など試行錯誤の上
					<br>１０年かけて編み出しました。
				</p>
			</section>
			<!-- .grid -->

			<section class="grid">
				<figure>
					<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/k-01.jpg" alt="南蛮酢">
				</figure>
				<h1 class="sub-t sub_gr">南蛮酢</h1>
				<p class="sub-cap">ワタナベナンバンの南蛮酢は
					<br>水を一滴も使いません。
					<br>材料を半日かけて煮込み、更に1週間ほど寝かせ、
					<br>味に丸みを出します。
				</p>
			</section>
			<!-- .grid -->

			<section class="grid">
				<figure>
					<img src="http://watanabenanban.com/wp-content/themes/watanabenanban/img/k-02.jpg" alt="仕込み">
				</figure>
				<h1 class="sub-t sub_gr">仕込み</h1>
				<p class="sub-cap">通常、チキン南蛮と言えば
					<br>鳥の胸肉を使用しますが、
					<br>ワタナベナンバンでは、お持ち帰りの際でも
					<br>冷めても柔らかさを損ねない
					<br>もも肉を使用しています。
				</p>
			</section>
			<!-- .grid -->

		</div>
		<!-- .big-grid -->
	</aside>
	<!-- .main-aside -->


	<div class="link-page">
		<div>
			<a href="<?php echo esc_url(get_permalink( get_page_by_path('goodfor')->ID )) ?>">こだわりを見る</a>
		</div>
	</div>
	<!-- .link-page -->


	<section class="main-section">
		<h1 id="three" class="bg-fix">Tartar sauce</h1>
		<h2 class="mini-title">タルタルソース</h2>
		<p class="para">
			チキン南蛮を語る上で欠かせない、最高のパートナー。
			<br> タルタルソースも、もちろんワタナベナンバンのオリジナル。
			<br> 定番のプレーンタルタルに加え、ピリ辛のチリタルタルや野菜たっぷりベジタルなど、
			<br> その数は9種類以上。
			<br> あなた好みのタルタルソースに必ず出会えます。
		</p>
	</section>


	<aside class="main-aside cf">
		<article class="big-grid cf">

			<section class="mini-grid">
				<h1 class="sub-t sub_gr"><span class="plain">プレーンタル</span><span class="red">王道！</span></h1>
				<p class="sub-cap">チキン南蛮と自家製ピタパンが引き立つように、あえてシンプルに仕上げてみました。
					<br>ほとんどのタルタルのベースになっています。
				</p>
			</section>
			<!-- .mini-grid -->

			<section class="mini-grid">
				<h1 class="sub-t sub_gr">宮崎濃いタル<span class="red">No.1</span></h1>
				<p class="sub-cap">ゆで玉子、玉ねぎ、ピクルスなど具だくさん。
					<br>これぞワタナベナンバン流、
					<br>本場宮崎濃厚タルタルソース。
				</p>
			</section>
			<!-- .mini-grid -->

			<section class="mini-grid">
				<h1 class="sub-t sub_gr">チリタル</h1>
				<p class="sub-cap">辛さ初心者におすすめ。
					<br>アジアンエスニックソース「スイートチリ」タルタル。
					<br>絶妙な甘さと辛さのハーモニーが美味しさを倍増させます。
				</p>
			</section>
			<!-- .mini-grid -->

			<section class="mini-grid">
				<h1 class="sub-t sub_gr">ごまタル</h1>
				<p class="sub-cap">香ばしい焙煎ごまをタルタルソースに混ぜ込んで上品な和風ソースに変身させました。
					<br>根強いファンに支持されています。
				</p>
			</section>
			<!-- .mini-grid -->

			<section class="mini-grid">
				<h1 class="sub-t sub_gr">ベジタル</h1>
				<p class="sub-cap">玉ねぎ、ピーマン、人参、トマトなど野菜たっぷりのタルタル。
					<br>シャキシャキ感とあと味の爽やかさが
					<br>クセになりそう。
				</p>
			</section>
			<!-- .mini-grid -->

			<section class="mini-grid">
				<h1 class="sub-t sub_gr">マスタードタル</h1>
				<p class="sub-cap">ほどよいマスタードの香りが濃厚なタルタルをシャープ&amp;ソリッドに。
					<br>「刺激的」に食欲をそそります。
					<br>リピーター多し。
				</p>
			</section>
			<!-- .mini-grid -->
		</article>
		<!-- .big-grid -->
	</aside>
	<!-- .main-aside -->


	<div class="link-page">
		<div>
			<a href="http://watanabenanban.com/wp-content/themes/watanabenanban/menu#tarutaru">タルタルソース一覧</a>
		</div>
	</div>
	<!-- .link-page -->


	<div id="bottom">
		<div class="px-960 cf">
			<div id="fb">
				<div class="fb-page" data-href="https://www.facebook.com/watanabe.nanban" data-width="450" data-height="350" data-small-header="false" data-adapt-container-width="true" data-hide- cover="false" data-show-facepile="true" data-show-posts="true">
					<div class="fb-xfbml-parse-ignore">
						<blockquote cite="https://www.facebook.com/watanabe.nanban">
							<a href="https://www.facebook.com/watanabe.nanban">ワタナベナンバン fr 南国商店</a>
						</blockquote>
					</div>
				</div>
			</div>
			<!-- #fb -->
			<div id="tw">
				<a class="twitter-timeline" href="https://twitter.com/watanabeNanban" data-widget-id="677401979920867328">@watanabeNanbanさんのツイート</a>
				<script>
					! function (d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0],
							p = /^http:/.test(d.location) ? 'http' : 'https';
						if (!d.getElementById(id)) {
							js = d.createElement(s);
							js.id = id;
							js.src = p + "://platform.twitter.com/widgets.js";
							fjs.parentNode.insertBefore(js, fjs);
						}
					}(document, "script", "twitter-wjs");
				</script>
			</div>
			<!-- #tw -->
		</div>
	</div>
	<!-- #bottom -->
	<!-- フィードのため固定 -->
	<?php get_footer(); ?>