<?= get_header() ?>
<?php 

$query = new WP_Query([
    'post_type' => 'museum',
    'p' => 12,
    'posts_per_page'   => 1,
]);

while($query->have_posts()):

    $query->the_post();

?>
<div id="hero-special" style="background-image: url(<?= get_the_post_thumbnail_url() ?>)">
    <div class="container h-100">
        <div class="h-100 d-flex justify-center align-items-center">
            <h1><?= the_title() ?></h1>
        </div>
    </div>
</div>
<?php endwhile; ?>
<section id="news">
    <div class="container">
        <div class="section-header">
            <h1>News</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <?php 
                if(have_posts()):
                while(have_posts()):
                    the_post();
                 ?>
                 <div class="col-md-4">
                     <div class="card">
                         <img src="<?= the_post_thumbnail_url() ?>" alt="" class="">
                         <div class="card-body">
                             <h3 class="card-title"><a href="<?= the_permalink() ?>"><?= the_title() ?></a></h3>
                         </div>
                     </div>
                 </div>
                 <?php endwhile; endif;  ?>
            </div>
        </div>
    </div>
</section>
<?= get_footer() ?>