<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/assets/css/base.css">
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/style.css">
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
    <div id="app">
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Kazan MuseumTour</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="h-100 d-flex justify-end align-items-center">
                            <?php 
                            $menu = wp_nav_menu();
                            echo $menu;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>