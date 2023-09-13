<?php

?>

<div class="col-12">
    <div class="listing-item listing-grid-item-two mb-30 wow fadeInUp">
        <div class="listing-thumbnail">
            <?php the_post_thumbnail(); ?>
            <span class="featured-btn"> <?php echo get_post_meta(get_the_ID(),'Estado',true); ?></span>
        </div>
        <div class="listing-content">
            <h3 class="title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
            <div class="listing-meta">
                <ul>
                    <li><span><i class="ti-location-pin"></i>
                            <?php echo get_post_meta(get_the_ID(),'Ciudad',true); ?></span></li>
                    <li><span><i class="ti-heart"></i><a href="#">Guardar</a></span></li>
                </ul>
            </div>
            <span class="price" style="display: block;font-weight: 600;color: #0d0d0d;margin-bottom: 15px;">
                Precio: <?php echo get_post_meta(get_the_ID(),'Precio',true); ?>
            </span>
        </div>
    </div>
</div>
