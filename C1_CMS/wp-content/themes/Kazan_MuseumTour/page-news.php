<?= get_header() ?>
<section id="news">
    <div class="container">
        <div class="section-header">
            <h1>All News</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <?php 
                $query = new WP_Query([
                    'post_per_page' => -1,
                    'post_type' => 'post'
                ]);
                if($query->have_posts()):
                while($query->have_posts()):
                    $query->the_post();
    
                    echo $query->the_title;
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