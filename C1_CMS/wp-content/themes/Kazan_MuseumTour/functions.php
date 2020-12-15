<?php


function login_background() { ?>
    <style type="text/css">
        body {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/museums/museum-of-islamic-culture-4.jpg) !important;
            background-size:cover;
            background-repeat:no-repeat;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'login_background' );

register_post_type("museum", [
    'public' => true,
    'supports' => ['title','text'],
    'label' => 'Museum'
])


?>