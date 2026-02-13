<!-- Elenco Categorie Guida Autonoma -->
<?php
$categories = get_terms( array(
    'taxonomy'   => 'taxonomy_guida_autonoma',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
) );

// Mappa immagini di copertina per slug categoria
$immagini_categoria = array(
    'acceleratori'                          => '/wp-content/uploads/2022/07/D906GV_1-scaled.jpg',
    'acceleratori-combinati-ai-freni-monoleve' => '/wp-content/uploads/2023/01/FS2005_1.jpg',
    'centraline'                            => '/wp-content/uploads/2022/10/1096_1-scaled.jpg',
    'freni'                                 => '/wp-content/uploads/2022/10/D907P_1-scaled.jpg',
    'frizioni'                              => '/wp-content/uploads/2023/01/d932.jpg',
    'impugnature'                           => '/wp-content/uploads/2022/12/Imp.-Volante-2-Punte-2-scaled.jpg',
    'joystick'                              => '/wp-content/uploads/2023/02/joystick_3-scaled.jpg',
    'pedali'                                => '/wp-content/uploads/2022/12/Acceleratore-D908-1-scaled.jpg',
);

// URL della pagina attuale
$current_url = rtrim( get_permalink(), '/' );
?>
<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ): ?>

    <?php foreach ( $categories as $category ): ?>

        <?php
        // Prendo immagine dalla mappa, altrimenti default
        $slug = $category->slug;
        $thumbnail_url = isset( $immagini_categoria[ $slug ] ) ? $immagini_categoria[ $slug ] : '';
        ?>

        <a href="<?php echo esc_url( $current_url . '/' . $slug ); ?>" class="item_custom">
            <div class="img" style="background-image:url(<?php
            if ( $thumbnail_url ) {
                echo esc_url( home_url( $thumbnail_url ) );
            } else {
                echo 'http://autointernazionale.local/wp-content/uploads/2022/10/copertina_feeds_default.jpg';
            }
            ?>)"></div>
            <h3 class="titolo"><?php echo esc_html( $category->name ); ?></h3>
            <div class="flex_custom">
                <div>
                    <h5 class="prodotto_cat"><?php echo esc_html( $category->count ); ?> prodotti</h5>
                </div>
            </div>
        </a>

    <?php endforeach; ?>

<?php else: ?>
    <p>Coming soon - torna presto per vedere le novità!</p>
<?php endif; ?>
