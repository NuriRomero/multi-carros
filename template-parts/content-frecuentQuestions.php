<!DOCTYPE html>
<html lang="en">
    <body>

        <!--====== End Preloader ======-->

        <!--====== Start Blog Section ======-->
        <section class="blog-area pt-120 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details-wrapper mb-30 wow fadeInUp">
                            <div class="blog-post-item">
                            </div>
                            <div class="post-navigation">
                            </div>
                            <div class="comments-area">
                                <h4 class="comments-title mb-35">Preguntas Frecuentes</h4>
                                <ul class="comments-list">
                                    <?php                                   // Obtén las preguntas frecuentes
                                        $faq_group = get_post_meta(get_the_ID(), 'main_information_metabox_faq_group', true);

                                        if ($faq_group) {
                                            echo '<ul>';
                                            foreach ($faq_group as $group) {
                                                echo '<li class="comment">';
                                                echo '<div class="comment-wrap">';
                                                echo '<div class="comment-author-content">';
                                                echo '<h4 class="author-name">' . esc_html($group['main_information_metabox_question']) . '<h4 class="date"></h4></h4>';
                                                echo '<h6 class="reply">' . esc_html($group['main_information_metabox_answer']) . '</h6>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Blog Section ======-->
    </body>
</html>