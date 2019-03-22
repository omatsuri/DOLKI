<?php get_header(); ?>
<!-- start contents -->
<?php
// 記事のビュー数を更新(ログイン中・ロボットによる閲覧時は除く)
    if (!is_user_logged_in() && !is_robots()) {
        setPostViews(get_the_ID());
    }
?>
            <div class="contents">
                <div class="contents-inner">
                    <main class="main">
                        <div class="main-left">
                            <section>
                                <div class="article-inner-wrapper">
                                    <article class="article">
                                        <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                        <div class="article-header">
                                            <div class="article-header-wrapper">
                                                <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y-m-d'); ?></time>
                                                <div class="article-category">
                                                    <?php the_category(); ?>
                                                </div>
                                                <h1 class="article-heading"><?php the_title(); ?></h1>
                                                <div class="article-writer">
                                                    <?php
                                                        $author = get_the_author_meta('id');
                                                        $author_img = get_avatar($author);
                                                        $imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
                                                        if(preg_match($imgtag, $author_img, $imgurl)){
                                                        $authorimg = $imgurl[2];
                                                        }
                                                    ?>
                                                    <div class="media-writer-image" style="background-image: url('<?php echo $authorimg ?>');">
                                                    </div>
                                                    <div class="media-writer-name"><?php the_author(); ?></div>
                                                </div>
                                                <div class="article-preview"><?php echo getPostViews(); ?></div>
                                            </div>
                                            <div class="article-headertext">
                                                <p>ななせまるが卒業してしまった。この先どうすれば元気でいられるか。見当もつかない。参った。そんなあなたに・・・</p>
                                            </div>
                                            <div class="article-share">
                                                <section class="social-share">
                                                    <i class="icon-share"></i>
                                                    <h2 class="icon-share-heading">Share</h2>
                                                    <ul>
                                                        <li class="social-share-twitter">
                                                            <a href="http://twitter.com/share?url=" onclick="ga('send', 'event', 'article', 'sns_share', 'twitter');" target="_blank" rel="nofollow"><i class="icon-twitter"></i></a>
                                                        </li>
                                                        <li class="social-share-facebook">
                                                            <a class="fb btn" href="https://www.facebook.com/share.php?u=" onclick="ga('send', 'event', 'article', 'sns_share', 'facebook');window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" rel="nofollow"><i class="icon-facebook"></i></a>
                                                        </li>
                                                        <li class="social-share-hatena">
                                                            <a href="http://b.hatena.ne.jp/entry/https%3A%2F%2Fwired.jp%2F2019%2F03%2F15%2Fthenorthface-futurelight-ws%2F" class="hatena-bookmark-button" data-hatena-bookmark-title="" data-hatena-bookmark-layout="simple" title="このエントリーをはてなブックマークに追加" rel="nofollow"
                                                                data-hatena-bookmark-initialized="1"><i class="icon-hatena"></i></a>
                                                        </li>
                                                        <li class="social-share-pocket">
                                                            <a href="http://getpocket.com/edit?url=" target="_blank" rel="nofollow"><i class="icon-pocket" onclick="ga('send', 'event', 'article', 'sns_share', 'pocket');"></i></a>
                                                        </li>
                                                    </ul>
                                                </section>
                                            </div>
                                            <div class="article-image-wrapper">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <div class="article-image" style='background-image:url("<?php the_post_thumbnail_url( 'large' ); ?>");'></div>
                                                    <div class="wp-caption-text">
                                                        <?php echo get_post(get_post_thumbnail_id())->post_excerpt ?>
                                                    </div>

                                                <?php else : ?>
                                                    <div class="article-image" style='background-image:url("https://dolki.jp/wp/wp-content/themes/dolki/images/noimage.jpg");'></div>
                                                <?php endif ; ?>
                                            </div>
                                        </div>
                                        <div class="article-body">
                                            <?php the_content(); ?>
                                        </div>
                                        <div class="article-share">
                                            <section class="social-share">
                                                <i class="icon-share"></i>
                                                <h2 class="icon-share-heading">Share</h2>
                                                <ul>
                                                    <li class="social-share-twitter">
                                                        <a href="http://twitter.com/share?url=" onclick="ga('send', 'event', 'article', 'sns_share', 'twitter');" target="_blank" rel="nofollow"><i class="icon-twitter"></i></a>
                                                    </li>
                                                    <li class="social-share-facebook">
                                                        <a class="fb btn" href="https://www.facebook.com/share.php?u=" onclick="ga('send', 'event', 'article', 'sns_share', 'facebook');window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" rel="nofollow"><i class="icon-facebook"></i></a>
                                                    </li>
                                                    <li class="social-share-hatena">
                                                        <a href="http://b.hatena.ne.jp/entry/https%3A%2F%2Fwired.jp%2F2019%2F03%2F15%2Fthenorthface-futurelight-ws%2F" class="hatena-bookmark-button" data-hatena-bookmark-title="" data-hatena-bookmark-layout="simple" title="このエントリーをはてなブックマークに追加" rel="nofollow"
                                                            data-hatena-bookmark-initialized="1"><i class="icon-hatena"></i></a>
                                                    </li>
                                                    <li class="social-share-pocket">
                                                        <a href="http://getpocket.com/edit?url=" target="_blank" rel="nofollow"><i class="icon-pocket" onclick="ga('send', 'event', 'article', 'sns_share', 'pocket');"></i></a>
                                                    </li>
                                                </ul>
                                            </section>
                                        </div>
                                        <div class="article-tag card-A">
                                            <div class="card-A-box">
                                                <i class="card-A-icon"></i>
                                                <h2 class="card-A-heading">Tags</h2>
                                                <?php the_tags('<ul><li>#','</li><li>#','</li></ul>'); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                    <?php else : ?>
                                        <p>記事がありません</p>
                                    <?php endif; ?>
                                    </article>
                                </div>

                            </section>
                            <section class="feed">
                                <h1 class="heading-A">Feed</h1>
                                <?php query_posts('posts_per_page=-1'); ?>
                                <?php if(have_posts()): while(have_posts()):the_post(); ?>
                                <article class="media">
                                    <div class="media-body">
                                        <div class="media-image-wrapper">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <a href="<?php the_permalink(); ?>"><div class="media-image" style='background-image:url("<?php the_post_thumbnail_url( 'large' ); ?>");'></div></a>
                                            <?php else : ?>
                                                <div class="media-image" style='background-image:url("https://dolki.jp/wp/wp-content/themes/dolki/images/noimage.jpg");'></div>
                                            <?php endif ; ?>
                                        </div>
                                        <div class="media-text">
                                            <time datatime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y-m-d'); ?></time>
                                            <div class="media-category">
                                                <?php the_category(); ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>">
                                                <h1 class="media-heading">
                                                    <?php
                                                        if(mb_strlen($post->post_title, 'UTF-8')>40){
                                                            $title= mb_substr($post->post_title, 0, 40, 'UTF-8');
                                                            echo $title.'...';
                                                        }else{
                                                            echo $post->post_title;
                                                        }
                                                    ?>
                                                </h1>
                                            </a>
                                            <div class="media-writer">
                                                <?php
                                                    $author = get_the_author_meta('id');
                                                    $author_img = get_avatar($author);
                                                    $imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
                                                    if(preg_match($imgtag, $author_img, $imgurl)){
                                                    $authorimg = $imgurl[2];
                                                    }
                                                ?>
                                                <div class="media-writer-image" style="background-image: url('<?php echo $authorimg ?>');">
                                                </div>
                                                <div class="media-writer-name"><?php the_author(); ?></div>
                                            </div>
                                            <div class="media-preview"><?php echo getPostViews(); ?></div>
                                        </div>
                                    </div>
                                </article>
                                <?php endwhile; endif; ?>
                                <?php wp_reset_query(); ?>
                            </section>
                        </div>
                        <div class="main-right">
                            <section class="ranking-wrapper">
                                <h1 class="heading-A">Ranking</h1>
                                <?php
                                    if (function_exists('wpp_get_mostpopular')) {
                                        $arg = array (
                                        'range' => 'daily',//集計する期間（weekly,monthly,all）
                                        'order_by' => 'views',//閲覧数で集計（comments（コメント数で集計）,avg（1日の平均で集計））
                                        'post_type' => 'post,page',//ポストタイプを指定（post,page,カスタムポスト名）
                                        'title_length' => '25',//表示させるタイトル文字数
                                        'excerpt_length' => '55',//抜粋文字数
                                        'stats_comments' => '1',//コメント数表示（1 or 0）
                                        'limit' => 10, //表示数
                                        'stats_views' => '0',//閲覧数表示（1 or 0）
                                        'thumbnail_width' => '15',//サムネイルの幅
                                        'thumbnail_height' => '15',//サムネイルの高さ
                                        'post_html' => ''
                                     );
                                     wpp_get_mostpopular($arg);
                                }?>
                            </section>
                        </div>

                    </main>
                </div>
            </div>
            <!-- end contents -->
<?php get_footer(); ?>
