<?php

?>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
            <div class="listing-thumbnail">
                <?php the_post_thumbnail(); ?>
                <a href="<?php the_permalink();?>" class="cat-btn"><i class="flaticon-chef"></i></a>
                <span class="featured-btn">Featured</span>
                <ul class="ratings ratings-four">
                    <li class="star"><i class="flaticon-star-1"></i></li>
                    <li class="star"><i class="flaticon-star-1"></i></li>
                    <li class="star"><i class="flaticon-star-1"></i></li>
                    <li class="star"><i class="flaticon-star-1"></i></li>
                    <li class="star"><i class="flaticon-star-1"></i></li>
                    <li><span><a href="#">(02 Reviews)</a></span></li>
                </ul>
            </div>
            <div class="listing-content">
                <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
                <p>Popular restaurant in california</p>
                <span class="phone-meta"><i class="ti-tablet"></i><a href="tel:+982653652-05">+98 (265) 3652 - 05</a><span class="status st-open">Open</span></span>
                <div class="listing-meta">
                    <ul>
                        <li><span><i class="ti-location-pin"></i>California, USA</span></li>
                        <li><span><i class="ti-heart"></i><a href="#">Save</a></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
