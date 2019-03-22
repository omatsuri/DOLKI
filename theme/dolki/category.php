<?php get_header(); ?>
<!-- start contents -->
        <div class="contents">
            <div class="contents-inner">
                <main class="main">
                    <section>
                        <div class="feed-inner-wrapper">
                            <h1 class="heading-A">Feed</h1>
                            <div class="cotegorylist">
                                <ul>
                                    <?php $cats = get_the_category(); ?>
                                    <li><a href="https://dolki.jp/allfeed">All</a></li>
                                    <li><a href="https://dolki.jp/news" class="<?php if($cats[0]->slug == 'news') echo 'current'; ?>">News</a></li>
                                    <li><a href="https://dolki.jp/column" class="<?php if($cats[0]->slug == 'column') echo 'current'; ?>">Column</a></li>
                                    <li><a href="https://dolki.jp/report" class="<?php if($cats[0]->slug == 'report') echo 'current'; ?>">Report</a></li>
                                    <li><a href="https://dolki.jp/tips" class="<?php if($cats[0]->slug == 'tips') echo 'current'; ?>">Tips</a></li>
                                </ul>
                            </div>

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
                        </div>
                        <div class='wp-pagenavi'>
                            <?php pagination( $wp_query->max_num_pages, get_query_var( 'paged' ), 2, true); ?>
                        </div>
                    </section>
                </main>
            </div>
        </div>
        </div>
            <!-- end contents -->
<?php get_footer(); ?>
