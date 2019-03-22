<?php get_header(); ?>
<!-- start contents -->
            <main class="contents">
                <div class="contents-inner">
                    <div class="pageHeading">
                        <h1>News</h1>
                    </div>
                    <div class="breadcrumbs">Home - News</div>
                    <section class="newsContents">
                        <h2>お知らせ一覧</h2>
                        <?php if(have_posts()): while(have_posts()):the_post(); ?>
                        <ul>
                            <li>
                                <a href="<?php the_permalink(); ?>">
                                    <time datatime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y-m-d'); ?></time>
                                    <h3>
                                        <?php
                                            if(mb_strlen($post->post_title, 'UTF-8')>10){
                                                $title= mb_substr($post->post_title, 0, 10, 'UTF-8');
                                                echo $title.'...';
                                            }else{
                                                echo $post->post_title;
                                            }
                                        ?>
                                        <span class="arw"></span>
                                    </h3>
                                </a>
                            </li>
                            <?php endwhile; endif; ?>
                        </ul>
                    </section>
                    <section>
                        <div class='wp-pagenavi'>
                            <?php pagination( $wp_query->max_num_pages, get_query_var( 'paged' ), 2, true); ?>
                        </div>
                    </section>
                </div>
            </main>
            <!-- end contents -->
<?php get_footer(); ?>
