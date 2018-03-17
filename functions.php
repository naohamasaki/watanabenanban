<?php
/* 公式版のjquery.jsを読み込む */
if (!is_admin()) {
	function register_script(){
	wp_register_script('jquery', get_bloginfo('template_directory').'/js/jquery-1.9.1.min.js');
	}
	function add_script() {
	register_script();
	/* 全ページ共通 */
	wp_enqueue_script('jquery');
	}
	add_action('wp_print_scripts', 'add_script');
}
    // アイキャッチ画像を有効にする。
    add_theme_support('post-thumbnails');/* サイトナビゲーション用 */
register_nav_menus(array('navi' => 'ナビゲーション'));
add_filter( 'the_title', 'img_nav_menu_title' );
function img_nav_menu_title($title) {
	if( preg_match( "/\[\[(.*)\]\]/", $title, $match ) ) {
	$get_title = $match[1];
	$get_img_url = clean_url($get_title);
	if($get_title == 'none') {
	$title = '';
	} else {
	$get_img_dir = str_replace( get_option('home') . '/', ABSPATH, $get_img_url );
	$get_size = getimagesize( $get_img_dir );
	$get_alt = preg_replace( "/\[\[(.*)\]\]/", '', $title );
	$title = '<img src="' . $get_img_url . '" alt="' . $get_alt . '" />';
}
	return $title;
} else {
	return $title;
}
}

/*対応ページのパンくずリストを出力する. */
function the_topicpath() {
	global $post;
	// メインページのリンク文字列生成
	$news = '<a href="' . home_url('/archives/') . '">ホーム</a> &gt; ';
	// タイトル文字列生成
	$title = wp_title('', false);
	$links = "";
	$category = get_the_category();
	$cat_id   = $category[0]->cat_ID;
	$cat_name = $category[0]->cat_name;
	if($category[0]->parent){
		$parent = get_category($category[0]->parent);
		$cat_slug = $parent->category_nicename;
		$cat_name = $parent->cat_name;
	}else{
		$cat_slug = $category[0]->category_nicename;
		$cat_name = $category[0]->cat_name;
	}
	// リンク生成
	if(is_page()) {
		// ページの場合先祖のページを先祖順にパンくずに追加
		$ancestors = array_reverse(get_post_ancestors($post));
		foreach($ancestors as $ancestor) {
			$links  = '<a href="' . get_permalink($ancestor) . '">';
			$links .= get_the_title($ancestor) . '</a>  &gt; ';
		}
	} elseif(is_single()) {
		// 投稿シングルの場合メインページのリンクをパンくずに追加
		$links  = '<a href="' . home_url('/') . $cat_slug . '">';
		$links .= $cat_name . '</a> &gt; ';
	} elseif(is_month()) {
		// 月別アーカイブの場合場合メインページのリンクをパンくずに追加
		$links  = $news;
		// タイトル文字列は日本語表記とする
		//$title = single_month_title_jp();
	} elseif(is_home()) {
		// 投稿トップの場合メインページのリンクをパンくずに追加
		$links = 'News';
		// タイトル文字列は必要ない
		$title = "";
	}
	// パンくずの一番最初にフロントページを追加し HTML 出力
	echo '<p class="topicpath">';
	echo '<a href="' . home_url('/') . '">ホーム</a> &gt; ';
	echo $links . $title . '</p>';
}

//wp_titleの$sepが「｜」または半角スペースの場合は余分な空白削除
function my_title_fix($title, $sep, $seplocation){
    if(!$sep || $sep == "｜"){
        $title = str_replace(' '.$sep.' ', $sep, $title);
    }
    return $title;
}
add_filter('wp_title', 'my_title_fix', 10, 3);

	/* 投稿 一覧ページのページャー設定 */
	function my_paginate(){
	global $wp_query, $paged, $query_string;

	$p_base = get_pagenum_link(1);
	$p_format = 'page/%#%';

	//?の有無確認、有る場合は場所を特定
	if($word = strpos($p_base, '?')){
	//?がある場合（検索結果）
		$p_base = get_option(home).(substr(get_option(home), -1 ,1) === '/' ? '' : '/')
			.'%_%'.substr($p_base, $word);
	} else{
	//?が無い場合（カテゴリ、タグ等）
		$p_base .= (substr($p_base, -1 ,1) === '/' ? '' : '/') .'%_%';
	}

 	echo paginate_links(array(
		'base' => $p_base,
		'format' => $p_format,
		'total' => $wp_query->max_num_pages,
		'current' => ($paged ? $paged : 1),
	)); 
	}
	
	/* 自動抜粋用の関数を定義 */
	function my_excerpt( $post, $length = 100 ) {
 
    $content  = mb_substr( strip_tags( $post->post_content ), 0, $length );
    $content .= "　　<a href='".get_permalink( $post->ID )."' class='my-excerpt'>続きを読む</a>\n";
 
    return $content;
 
}
// サイドバーのウィジェット
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ));
	
/* カスタム投稿タイプを追加 */
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'orijinal_themes', //カスタム投稿タイプ名を指定
        array(
            'labels' => array(
            'name' => __( 'オリジナルテーマ作成' ),
            'singular_name' => __( 'オリジナルテーマ作成' )
        ),
        'public' => true,
        'has_archive' => true, /* アーカイブページを持つ */
        'menu_position' =>5, //管理画面のメニュー順位
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields' ,'comments' ),
        )
    );
/* カテゴリタクソノミー(カテゴリー分け)を使えるように設定する */
  register_taxonomy(
    'orijinal_themes_cat', /* タクソノミーの名前 */
    'orijinal_themes', /* 使用するカスタム投稿タイプ名 */
    array(
      'hierarchical' => true, /* trueだと親子関係が使用可能。falseで使用不可 */
      'update_count_callback' => '_update_post_term_count',
      'label' => 'オリジナルテーマ作成カテゴリー',
      'singular_label' => 'オリジナルテーマ作成カテゴリー',
      'public' => true,
      'show_ui' => true
    )
  );
  

/* カスタムタクソノミー、タグを使えるようにする */
  register_taxonomy(
    'orijinal_themes_tag', /* タクソノミーの名前 */
    'orijinal_themes', /* 使用するカスタム投稿タイプ名 */
    array(
      'hierarchical' => false,
      'update_count_callback' => '_update_post_term_count',
      'label' => 'オリジナルテーマ作成タグ',
      'singular_label' => 'オリジナルテーマ作成タグ',
      'public' => true,
      'show_ui' => true
    )
  );
}
// ショートコードを有効にする
function Include_my_php($params = array()) {
    extract(shortcode_atts(array(
        'file' => 'default'
    ), $params));
    ob_start();
    include(get_theme_root() . '/' . get_template() . "/$file.php");
    return ob_get_clean();
}
 
add_shortcode('myphp', 'Include_my_php');
/*郵便番号入力した際に住所が自動で反映される*/
function add_head_link() {
    echo '<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>';
    echo "
    <script type=\"text/javascript\">
    jQuery(function($){
    $(\"#zip\").attr('onKeyUp', 'AjaxZip3.zip2addr(this,\'\',\'address\',\'address\');');
    $(\"#zip2\").attr('onKeyUp', 'AjaxZip3.zip2addr(\'zip1\',\'zip2\',\'prefecture\',\'city\',\'street\');');
});";
    echo '</script>';
}
add_action('wp_head', 'add_head_link');
add_filter( 'wpcf7_validate_configuration', '__return_false' );

//bodyにページ名のクラスをつける
function pagename_class($classes = '') {
    if (is_page()) {
        $page = get_page(get_the_ID());
        $classes[] = $page->post_name;
    }
    return $classes;
}
/*--------------sidebar-------------------------*/
//サイドバーのコンテンツを管理画面から操作するコード

register_sidebar(
    array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',

    )
);

/*-------------------------------------------*/

add_filter('body_class','pagename_class');
?>