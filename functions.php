<?php
/*--------------thumbnail-------------------------*/

add_theme_support('post-thumbnails');//サムネイル画像を管理画面から操作するコード

/*--------------------------------------------------*/



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


