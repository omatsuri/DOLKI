            <?php get_header(); ?>
            <div class="key-visual">
                <div class="key-visual-inner">
                    <div class="key-visual-message">
                        Who is your Yome?
                    </div>
                    <div class="key-visual-about button-A">
                        <a href="https://dolki.jp/about/">About dolki</a>
                    </div>
                </div>
            </div>
            <!-- start contents -->
            <div class="contents">
                <div class="contents-inner">
                    <main class="main">
                        <section class="feed-wrapper">
                            <div class="feed-inner-wrapper">
                                <h1 class="heading-A">New Feed</h1>
                                <?php query_posts('posts_per_page=10'); ?>
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
                            </div>

                            <div class="button-B">
                                <a href="https://dolki.jp/allfeed/">View More</a>
                            </div>
                        </section>
                        <section class="ranking-wrapper">
                            <h1 class="heading-A">Ranking</h1>
                            <?php
                                if (function_exists('wpp_get_mostpopular')) {
                                    $arg = array (
                                    'range' => 'monthly',//集計する期間（weekly,monthly,all）
                                    'order_by' => 'views',//閲覧数で集計（comments（コメント数で集計）,avg（1日の平均で集計））
                                    'post_type' => 'post',//ポストタイプを指定（post,page,カスタムポスト名）
                                    'title_length' => '25',//表示させるタイトル文字数
                                    'excerpt_length' => '55',//抜粋文字数
                                    'stats_comments' => '1',//コメント数表示（1 or 0）
                                    'limit' => 10, //表示数
                                    'stats_views' => '0',//閲覧数表示（1 or 0）
                                    'thumbnail_width' => '100',//サムネイルの幅
                                    'thumbnail_height' => '100',//サムネイルの高さ
                                    'post_html' => ''
                                 );
                                 wpp_get_mostpopular($arg);
                            }?>
                        </section>
                    </main>
                </div>
            </div>
            <?php get_footer(); ?>
