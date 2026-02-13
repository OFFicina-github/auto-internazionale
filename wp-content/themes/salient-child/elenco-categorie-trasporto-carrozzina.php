<!-- Elenco Categorie Prodotti Speciali -->
<?php
$categories = get_terms( array(
    'taxonomy'   => 'taxonomy_prodotti_speciali',
    'hide_empty' => false,
    'orderby'    => 'name',
    'order'      => 'ASC',
) );

// Mappa immagini di copertina per slug categoria
$immagini_categoria = array(
    'gradini'                    => '/wp-content/uploads/2023/05/ETB-3.jpg',
    'altri-prodotti'             => '/wp-content/uploads/2023/11/20221017_121427-scaled.jpg',
    'aperture-elettriche-porte'  => '/wp-content/uploads/2023/03/AAD.jpg',
    'rampe'                      => '/wp-content/uploads/2022/10/20230201_110456-scaled.jpg',
    'doppi-comandi-scuola-guida' => '/wp-content/uploads/2022/11/Braun_Pedale_2-scaled.jpg',
    'caricamento-carrozzina'     => '/wp-content/uploads/2022/10/R11_1.png',
    'ausili-salita-su-sedile'    => '/wp-content/uploads/2023/09/Base-girevole2.jpg',
    'sollevatori'                => '/wp-content/uploads/2023/05/AMF-Bruns_Ford-Custom_K70-1-scaled.jpg',
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
