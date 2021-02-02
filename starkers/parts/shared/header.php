<!--<header>-->
<!--	<h1><a href="--><?php //echo home_url(); ?><!--">--><?php //bloginfo( 'name' ); ?><!--</a></h1>-->
<!--	--><?php //bloginfo( 'description' ); ?>
<!--	--><?php //get_search_form(); ?>
<?php //wp_head(); ?>
<?php //body_class(); ?>
<!-- Page Header -->


<header class="masthead" style="background-image: url('<?php


    if(get_queried_object_id() == 28){
        echo 'http://localhost:8080/wordpress/wp-content/uploads/2021/01/about-bg.jpg';
    }else if (get_queried_object_id() == 38){
        the_post_thumbnail_url();
    }

?>')">

<!--    --><?php //var_dump(substr(the_post_thumbnail_url(),0,strrpos(the_post_thumbnail_url(),"png")));?>
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1><?php the_title();?></h1>
                </div>
            </div>
        </div>
    </div>
</header>

