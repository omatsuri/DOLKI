<?php get_header(); ?>
<!-- start contents -->
            <main class="contents">
                <div class="contents-inner">
                    <div class="pageHeading">
                        <h1>News</h1>
                    </div>
                    <div class="breadcrumbs">Home - News</div>
                    <div class="articleWrapper">
                        <article>
                            <?php if (have_posts()) : ?>
                                <?php while (have_posts()) : the_post(); ?>
                            <section class="articleContents">
                                <time><?php the_time('Y-m-d'); ?></time>
                                <h2><?php the_title(); ?></h2>
                                <div class="articleContents-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="article-headingimage"><?php the_post_thumbnail( 'medium' ); ?></div>
                                    <?php else : ?>

                                    <?php endif ; ?>
                                </div>
                                <?php the_content(); ?>
                            </section>
                            <?php endwhile; ?>
                            <?php else : ?>
                                <p>記事がありません</p>
                            <?php endif; ?>
                        </article>
                        <div class="archive">
                            <h2>過去の記事</h2>
                            <ul>
                                <?php query_posts('posts_per_page=-1'); ?>
                                <?php if(have_posts()): while(have_posts()):the_post(); ?>
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
                            <?php wp_reset_query(); ?>
                            </ul>
                        </div>
                    </div>
            </main>
            </div>
            <!-- end contents -->
<?php get_footer(); ?>
