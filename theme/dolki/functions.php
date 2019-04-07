<?php

/*-------------------------------------------*/
/* カスタムメニューを有効化
/*-------------------------------------------*/
add_theme_support('menus');

/*-------------------------------------------*/
/* サムネイルを有効化
/*-------------------------------------------*/
add_theme_support('post-thumbnails');

// /*-------------------------------------------*/
// /* サムネイル取得関数
// /*-------------------------------------------*/
// wp_get_attachment_url( get_post_thumbnail_id() );

/*-------------------------------------------*/
/* ページネーション出力関数
/* $paged : 現在のページ
/* $pages : 全ページ数
/* $range : 左右に何ページ表示するか
/* $show_only : 1ページしかない時に表示するかどうか
/*-------------------------------------------*/
function pagination( $pages, $paged, $range = 2, $show_only = false ) {

    $pages = ( int ) $pages;    //float型で渡ってくるので明示的に int型 へ
    $paged = $paged ?: 1;       //get_query_var('paged')をそのまま投げても大丈夫なように

    //表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = "‹ 前へ";
    $text_next    = "次へ ›";
    $text_last    = "最後へ »";

    if ( $show_only && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    if ( $pages === 1 ) return;    // １ページのみで表示設定もない場合

    if ( 1 !== $pages ) {
        //２ページ以上の時
        echo '<div class="pagination"><span class="page_num">Page ', $paged ,' of ', $pages ,'</span>';
        if ( $paged > $range + 1 ) {
            // 「最初へ」 の表示
            echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        }
        if ( $paged > 1 ) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link( $paged - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {

            if ( $i <= $paged + $range && $i >= $paged - $range ) {
                // $paged +- $range 以内であればページ番号を出力
                if ( $paged === $i ) {
                    echo '<span class="current pager">', $i ,'</span>';
                } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                }
            }

        }
        if ( $paged < $pages ) {
            // 「次へ」 の表示
            echo '<a href="', get_pagenum_link( $paged + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        if ( $paged + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}

// /* カテゴリーURLから「category」を削除
// ---------------------------------------------------------- */
// add_filter('user_trailingslashit', 'remcat_function');
// function remcat_function($link) {
// 	return str_replace("/category/", "/", $link);
// }
// add_action('init', 'remcat_flush_rules');
// function remcat_flush_rules() {
// 	global $wp_rewrite;
// 	$wp_rewrite->flush_rules();
// }
// add_filter('generate_rewrite_rules', 'remcat_rewrite');
// function remcat_rewrite($wp_rewrite) {
// 	$new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
// 	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
// }



function custom_single_popular_post( $content, $p, $instance ){
     $thumb_id = get_post_thumbnail_id( $p->id );
     $img = wp_get_attachment_image_src( $thumb_id );
     $output = '<article class="media-s"><div class="media-s-rank"></div><div class="media-s-body"><div class="media-s-image-wrapper"><a href="' . get_the_permalink($p->id) . '" title="' . esc_attr($p->title) .'"><div class="media-s-image" style="background-image: url(' . $img[0] . ');"></div></a></div><div class="media-s-text"><a href="' . get_the_permalink($p->id) . '"><h1 class="media-s-heading">' . $p->title . '</h1></a><div class="media-s-preview">' . $p->pageviews . ' Views</div></div></div></article>';
     return $output;
}
add_filter( 'wpp_post', 'custom_single_popular_post', 5, 3 );



//記事のビュー数メタデータを作成・更新する関数
function setPostViews() {
    $post_id = get_the_ID();
    $custom_key = 'post_views_count';
    $view_count = get_post_meta($post_id, $custom_key, true);  //現在のビュー数を取得
    //すでにメタデータがあるかどうかで処理を分ける
    if ($view_count === '') {
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
    } else {
        $view_count++;
        update_post_meta($post_id, $custom_key, $view_count);
    }
}

//記事のビュー数を取得
function getPostViews($post_id = null) {
    $post_id = $post_id ? $post_id : get_the_ID();
    $custom_key = 'post_views_count';
    $view_count = get_post_meta($post_id, $custom_key, true);
    if ($view_count === '') {
        //まだメタデータが存在していなければ
        delete_post_meta($post_id, $custom_key);
        add_post_meta($post_id, $custom_key, '0');
        $view_count = 0;
    }
    return $view_count.' Views';  //'Views' の部分は好きな表示に変えてください。
}

//embed カスタマイズ
//埋め込み部分削除
remove_action( 'embed_head', 'print_embed_styles' );
remove_action( 'embed_footer', 'print_embed_sharing_dialog' );

//embed css読み込み
function my_embed_styles() {
  wp_enqueue_style( 'wp-oembed-embed', '/wp-content/themes/dolki/css/wp-oembed-embed.css' );
}
add_action( 'embed_head', 'my_embed_styles' );
