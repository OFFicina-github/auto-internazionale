<!-- Query - Guida autonoma - Accelleratori -->
<?php
// The Query
$args = array(
    'post_type' => 'guida_autonoma',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'taxonomy_guida_autonoma',
            'field'    => 'acceleratori',
            'terms'    => array( 54 ),
        ),
    ),
);
$the_query = new WP_Query( $args );
?>
<?php
// The Loop
if ( $the_query->have_posts() ): ?>

    <?php while ( $the_query->have_posts() ): ?>
        <?php $the_query->the_post(); ?>

        <?php
        //prendo categorie
        $post_id = get_the_ID();
        $guida_autonoma_cat = get_the_terms($post_id, 'taxonomy_guida_autonoma');
        ?>

        <a href="<?php the_permalink(); ?>" class="item_custom">
            <div class="img" style="background-image:url(<?php
            //prendo Url Immagine
            if(has_post_thumbnail()){
                the_post_thumbnail_url('full');
            }
            else{
                echo 'http://autointernazionale.local/wp-content/uploads/2022/10/copertina_feeds_default.jpg';
            }
            ?>)"></div>
            <h3 class="titolo"><?php the_title(); ?></h3>
            <div class="flex_custom">
                <div>
                    <?php foreach ($guida_autonoma_cat as $prodotto): ?>
                        <h5 class="prodotto_cat"><?php echo $prodotto->name; ?></h5>
                    <?php endforeach; ?>
                </div>
                <div>
                    <?php
                    $codice = get_field('codice');
                    if($codice): ?>
                        <h5 class="cod_custom">COD: <?php echo $codice; ?></h5>
                    <?php else: ?>
                        <h5 class="cod_custom">COD: n.d.</h5>
                    <?php endif; ?>
                </div>
            </div>
        </a>

    <?php endwhile; ?>

<?php else: ?>
    <p>Coming soon - torna presto per vedere le novità!</p>
<?php endif; ?>
<!-- Restore original Post Data -->
<?php wp_reset_postdata();?>