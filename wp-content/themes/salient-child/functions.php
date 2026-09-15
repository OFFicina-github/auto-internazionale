<?php

add_action('wp_enqueue_scripts', 'salient_child_enqueue_styles', 100);

function salient_child_enqueue_styles()
{

    $nectar_theme_version = nectar_get_theme_version();
    wp_enqueue_style('off-child-style', get_stylesheet_directory_uri() . '/off_style.css', '', $nectar_theme_version);
    wp_enqueue_style('salient-child-style', get_stylesheet_directory_uri() . '/style.css', '', $nectar_theme_version);

    wp_enqueue_style('slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', '', $nectar_theme_version);
    wp_enqueue_style('slick-style-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css', '', $nectar_theme_version);
    wp_enqueue_style('fancybox-style', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', '', $nectar_theme_version);

    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', false, false, true);
    wp_enqueue_script('fancybox-js', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', false, false, true);
    wp_enqueue_script('off-js', get_stylesheet_directory_uri() . '/custom.js', false, false, true);

    wp_enqueue_style('header-off', get_stylesheet_directory_uri() . '/header_off.css', '', $nectar_theme_version);
    if (is_rtl()) {
        wp_enqueue_style('salient-rtl',  get_template_directory_uri() . '/rtl.css', array(), '1', 'screen');
    }
}

//extras

add_filter('upload_mimes', function ($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});
define('ALLOW_UNFILTERED_UPLOADS', true);

function mytheme_custom_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'mytheme_custom_excerpt_length', 999);



//__________ CPT + CTax __________//

//Register Custom Post Type -> Trasporto carrozzina
if (! function_exists('cpt_trasporto_carrozzina')) {
    function cpt_trasporto_carrozzina()
    {
        $labels = array(
            'name'                  => _x('Veicoli Accessibili', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Veicoli Accessibili', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Veicoli Accessibili', 'text_domain'),
            'name_admin_bar'        => __('Veicoli Accessibili', 'text_domain'),
            'archives'              => __('Archivio trasporto', 'text_domain'),
            'attributes'            => __('Attributi trasporto', 'text_domain'),
            'parent_item_colon'     => __('Trasporto genitore', 'text_domain'),
            'all_items'             => __('Tutti i trasporti', 'text_domain'),
            'add_new_item'          => __('Aggiungi nuovo trasporto', 'text_domain'),
            'add_new'               => __('Aggiungi nuovo', 'text_domain'),
            'new_item'              => __('Nuovo trasporto', 'text_domain'),
            'edit_item'             => __('Modifica trasporto', 'text_domain'),
            'update_item'           => __('Aggiorna trasporto', 'text_domain'),
            'view_item'             => __('Vedi Trasporto', 'text_domain'),
            'view_items'            => __('Vedi trasporti', 'text_domain'),
            'search_items'          => __('Cerca trasporto', 'text_domain'),
            'not_found'             => __('Non trovato', 'text_domain'),
            'not_found_in_trash'    => __('Non trovato nel cestino', 'text_domain'),
            'featured_image'        => __('Immagine in evidenza', 'text_domain'),
            'set_featured_image'    => __('Imposta immagine in evidenza', 'text_domain'),
            'remove_featured_image' => __('Rimuovi immagine in evidenza', 'text_domain'),
            'use_featured_image'    => __('Usa come immagine in evidenza', 'text_domain'),
            'insert_into_item'      => __('Inserisci in trasporto', 'text_domain'),
            'uploaded_to_this_item' => __('Caricato nel trasporto', 'text_domain'),
            'items_list'            => __('Lista trasporti', 'text_domain'),
            'items_list_navigation' => __('Lista di navigazione trasporti', 'text_domain'),
            'filter_items_list'     => __('Filtra lista trasporto', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Trasporto', 'text_domain'),
            'description'           => __('Mezzi di trasporto allestibili', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
            'taxonomies'            => array('taxonomy_trasporto_carrozzina'),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-car',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite' => array(
                'slug' => 'veicoli-accessibili',
                'with_front' => false
            ),
        );
        register_post_type('trasporto_carrozzina', $args);
    }
    add_action('init', 'cpt_trasporto_carrozzina', 0);
}

//Register Custom Taxonomy -> Categorie trasporto Carrozzina MARCHE
if (! function_exists('tax_trasporto_carrozzina')) {
    function tax_trasporto_carrozzina()
    {
        $labels = array(
            'name'                       => _x('Veicoli Accessibili', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('Veicoli Accessibili', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('Categorie trasporto carrozzina', 'text_domain'),
            'all_items'                  => __('Tutti i trasporti', 'text_domain'),
            'parent_item'                => __('Trasporto genitore', 'text_domain'),
            'parent_item_colon'          => __('Trasporto genitore:', 'text_domain'),
            'new_item_name'              => __('Nuovo nome trasporto', 'text_domain'),
            'add_new_item'               => __('Aggiungi nuovo trasporto', 'text_domain'),
            'edit_item'                  => __('Modifica trasporto', 'text_domain'),
            'update_item'                => __('Aggiorna trasporto', 'text_domain'),
            'view_item'                  => __('Vedi trasporto', 'text_domain'),
            'separate_items_with_commas' => __('Separa i trasporti con la virgola', 'text_domain'),
            'add_or_remove_items'        => __('Aggiungi o rimuovi trasporti', 'text_domain'),
            'choose_from_most_used'      => __('Scegli tra i più usati', 'text_domain'),
            'popular_items'              => __('Trasporti popolari', 'text_domain'),
            'search_items'               => __('Cerca trasporti', 'text_domain'),
            'not_found'                  => __('Non trovato', 'text_domain'),
            'no_terms'                   => __('Nessun trasporto', 'text_domain'),
            'items_list'                 => __('Lista trasporti', 'text_domain'),
            'items_list_navigation'      => __('Lista di navigazione trasporti', 'text_domain'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'publicly_queryable'         => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
        );
        register_taxonomy('taxonomy_trasporto_carrozzina', array('trasporto_carrozzina'), $args);
    }
    add_action('init', 'tax_trasporto_carrozzina', 0);
}

//Register Custom Taxonomy -> Categorie trasporto Carrozzina CONDIZIONE
if (! function_exists('tax_trasporto_carrozzina_condizione')) {

    // Register Custom Taxonomy
    function tax_trasporto_carrozzina_condizione()
    {

        $labels = array(
            'name'                       => _x('Condizioni', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('Condizione', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('Condizione', 'text_domain'),
            'all_items'                  => __('Tutte le condizioni', 'text_domain'),
            'parent_item'                => __('Condizione genitore', 'text_domain'),
            'parent_item_colon'          => __('Condizione genitore:', 'text_domain'),
            'new_item_name'              => __('Nome nuova condizione', 'text_domain'),
            'add_new_item'               => __('Aggiungi nuova condizione', 'text_domain'),
            'edit_item'                  => __('Modifica contenuti', 'text_domain'),
            'update_item'                => __('Aggiorna contenuti', 'text_domain'),
            'view_item'                  => __('Vedi contenuto', 'text_domain'),
            'separate_items_with_commas' => __('Separa le condizioni con la virgola', 'text_domain'),
            'add_or_remove_items'        => __('Aggiungi o rimuovi condizioni', 'text_domain'),
            'choose_from_most_used'      => __('Scegli tra le più usate', 'text_domain'),
            'popular_items'              => __('Condizioni popolari', 'text_domain'),
            'search_items'               => __('Cerca condizione', 'text_domain'),
            'not_found'                  => __('Non trovata', 'text_domain'),
            'no_terms'                   => __('Nessuna condizione', 'text_domain'),
            'items_list'                 => __('Lista condizioni', 'text_domain'),
            'items_list_navigation'      => __('Lista di navigazione condizioni', 'text_domain'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'publicly_queryable'         => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
        );
        register_taxonomy('tax_condizione', array('trasporto_carrozzina'), $args);
    }
    add_action('init', 'tax_trasporto_carrozzina_condizione', 0);
}

//Register Custom Taxonomy -> Categorie trasporto Carrozzina MODELLI
if (! function_exists('tax_trasporto_carrozzina_modelli')) {

    // Register Custom Taxonomy
    function tax_trasporto_carrozzina_modelli()
    {

        $labels = array(
            'name'                       => _x('Modelli', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('Modello', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('Modelli', 'text_domain'),
            'all_items'                  => __('Tutte i modelli', 'text_domain'),
            'parent_item'                => __('Modello genitore', 'text_domain'),
            'parent_item_colon'          => __('Modello genitore:', 'text_domain'),
            'new_item_name'              => __('Nome nuovo modello', 'text_domain'),
            'add_new_item'               => __('Aggiungi nuovo modello', 'text_domain'),
            'edit_item'                  => __('Modifica modelli', 'text_domain'),
            'update_item'                => __('Aggiorna modelli', 'text_domain'),
            'view_item'                  => __('Vedi modello', 'text_domain'),
            'separate_items_with_commas' => __('Separa i modelli con la virgola', 'text_domain'),
            'add_or_remove_items'        => __('Aggiungi o rimuovi modelli', 'text_domain'),
            'choose_from_most_used'      => __('Scegli tra le più usate', 'text_domain'),
            'popular_items'              => __('Modelli popolari', 'text_domain'),
            'search_items'               => __('Cerca modelli', 'text_domain'),
            'not_found'                  => __('Non trovato', 'text_domain'),
            'no_terms'                   => __('Nessun modello', 'text_domain'),
            'items_list'                 => __('Lista modelli', 'text_domain'),
            'items_list_navigation'      => __('Lista di navigazione modelli', 'text_domain'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'publicly_queryable'         => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
        );
        register_taxonomy('tax_modelli', array('trasporto_carrozzina'), $args);
    }
    add_action('init', 'tax_trasporto_carrozzina_modelli', 0);
}

//Register Custom Post Type -> Prodotti speciali
if (! function_exists('cpt_prodotti_speciali')) {
    function cpt_prodotti_speciali()
    {
        $labels = array(
            'name'                  => _x('Prodotti speciali', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Prodotto speciale', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Prodotti speciali', 'text_domain'),
            'name_admin_bar'        => __('Prodotti speciali', 'text_domain'),
            'archives'              => __('Archivio prodotti speciali', 'text_domain'),
            'attributes'            => __('Attributi prodotti speciali', 'text_domain'),
            'parent_item_colon'     => __('Guida prodotti speciali', 'text_domain'),
            'all_items'             => __('Tutti i prodotti speciali', 'text_domain'),
            'add_new_item'          => __('Aggiungi nuovo prodotto speciale', 'text_domain'),
            'add_new'               => __('Aggiungi nuovo', 'text_domain'),
            'new_item'              => __('Nuovo prodotto speciale', 'text_domain'),
            'edit_item'             => __('Modifica prodotto speciale', 'text_domain'),
            'update_item'           => __('Aggiorna prodotto speciale', 'text_domain'),
            'view_item'             => __('Vedi prodotto speciale', 'text_domain'),
            'view_items'            => __('Vedi prodotti speciali', 'text_domain'),
            'search_items'          => __('Cerca prodotto speciale', 'text_domain'),
            'not_found'             => __('Non trovato', 'text_domain'),
            'not_found_in_trash'    => __('Non trovato nel cestino', 'text_domain'),
            'featured_image'        => __('Immagine in evidenza', 'text_domain'),
            'set_featured_image'    => __('Imposta immagine in evidenza', 'text_domain'),
            'remove_featured_image' => __('Rimuovi immagine in evidenza', 'text_domain'),
            'use_featured_image'    => __('Usa come immagine in evidenza', 'text_domain'),
            'insert_into_item'      => __('Inserisci in prodotto speciale', 'text_domain'),
            'uploaded_to_this_item' => __('Caricato nel prodotto speciale', 'text_domain'),
            'items_list'            => __('Lista prodotti speciali', 'text_domain'),
            'items_list_navigation' => __('Lista di navigazione prodotti speciali', 'text_domain'),
            'filter_items_list'     => __('Filtra lista prodotti speciali', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Prodotto speciale', 'text_domain'),
            'description'           => __('Vendita prodotti speciali per disabili', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
            'taxonomies'            => array('taxonomy_prodotti_speciali'),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-admin-plugins',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite' => array(
                'slug' => 'adattamenti-auto/trasporto-carrozzina/%taxonomy_prodotti_speciali%',
                'with_front' => false
            ),
        );
        register_post_type('prodotti_speciali', $args);
    }
    add_action('init', 'cpt_prodotti_speciali', 0);
}

//Register Custom Taxonomy -> Categorie prodotti speciali
if (! function_exists('tax_prodotti_speciali')) {
    function tax_prodotti_speciali()
    {
        $labels = array(
            'name'                       => _x('Prodotti speciali', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('Prodotto speciale', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('Categorie prodotti speciali', 'text_domain'),
            'all_items'                  => __('Tutti i prodotti speciali', 'text_domain'),
            'parent_item'                => __('Prodotto speciale genitore', 'text_domain'),
            'parent_item_colon'          => __('Prodotto speciale genitore:', 'text_domain'),
            'new_item_name'              => __('Nuovo nome prodotto speciale', 'text_domain'),
            'add_new_item'               => __('Aggiungi nuovo prodotto speciale', 'text_domain'),
            'edit_item'                  => __('Modifica prodotto speciale', 'text_domain'),
            'update_item'                => __('Aggiorna prodotto speciale', 'text_domain'),
            'view_item'                  => __('Vedi prodotto speciale', 'text_domain'),
            'separate_items_with_commas' => __('Separa i prodotti speciali con la virgola', 'text_domain'),
            'add_or_remove_items'        => __('Aggiungi o rimuovi prodotti speciali', 'text_domain'),
            'choose_from_most_used'      => __('Scegli tra i più usati', 'text_domain'),
            'popular_items'              => __('Prodotti speciali popolari', 'text_domain'),
            'search_items'               => __('Cerca prodotti speciali', 'text_domain'),
            'not_found'                  => __('Non trovato', 'text_domain'),
            'no_terms'                   => __('Nessun prodotto speciale', 'text_domain'),
            'items_list'                 => __('Lista prodotti speciali', 'text_domain'),
            'items_list_navigation'      => __('Lista di navigazione prodotti speciali', 'text_domain'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'publicly_queryable'         => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
            'rewrite'                    => false,
        );
        register_taxonomy('taxonomy_prodotti_speciali', array('prodotti_speciali'), $args);
    }
    add_action('init', 'tax_prodotti_speciali', 0);
}

//Register Custom Post Type -> Guida autonoma
if (! function_exists('cpt_guida_autonoma')) {
    function cpt_guida_autonoma()
    {
        $labels = array(
            'name'                  => _x('Guida autonoma', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Guida autonoma', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Guida autonoma', 'text_domain'),
            'name_admin_bar'        => __('Guida autonoma', 'text_domain'),
            'archives'              => __('Archivio guida autonoma', 'text_domain'),
            'attributes'            => __('Attributi guida autonoma', 'text_domain'),
            'parent_item_colon'     => __('Guida autonoma genitore', 'text_domain'),
            'all_items'             => __('Tutta la guida autonoma', 'text_domain'),
            'add_new_item'          => __('Aggiungi nuova guida autonoma', 'text_domain'),
            'add_new'               => __('Aggiungi nuovo', 'text_domain'),
            'new_item'              => __('Nuova guida autonoma', 'text_domain'),
            'edit_item'             => __('Modifica guida autonoma', 'text_domain'),
            'update_item'           => __('Aggiorna guida autonoma', 'text_domain'),
            'view_item'             => __('Vedi guida autonoma', 'text_domain'),
            'view_items'            => __('Vedi guida autonoma', 'text_domain'),
            'search_items'          => __('Cerca guida autonoma', 'text_domain'),
            'not_found'             => __('Non trovato', 'text_domain'),
            'not_found_in_trash'    => __('Non trovato nel cestino', 'text_domain'),
            'featured_image'        => __('Immagine in evidenza', 'text_domain'),
            'set_featured_image'    => __('Imposta immagine in evidenza', 'text_domain'),
            'remove_featured_image' => __('Rimuovi immagine in evidenza', 'text_domain'),
            'use_featured_image'    => __('Usa come immagine in evidenza', 'text_domain'),
            'insert_into_item'      => __('Inserisci in trasporto', 'text_domain'),
            'uploaded_to_this_item' => __('Caricato nella guida autonoma', 'text_domain'),
            'items_list'            => __('Lista guida autonoma', 'text_domain'),
            'items_list_navigation' => __('Lista di navigazione guida autonoma', 'text_domain'),
            'filter_items_list'     => __('Filtra lista guida autonoma', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Guida autonoma', 'text_domain'),
            'description'           => __('Allestimenti per guida autonoma', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats'),
            'taxonomies'            => array('taxonomy_guida_autonoma'),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-performance',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'rewrite' => array(
                'slug' => 'adattamenti-auto/guida-autonoma/%taxonomy_guida_autonoma%',
                'with_front' => false
            ),
        );
        register_post_type('guida_autonoma', $args);
    }
    add_action('init', 'cpt_guida_autonoma', 0);
}

//Register Custom Taxonomy -> Categorie guida autonoma
if (! function_exists('tax_guida_autonoma')) {
    function tax_guida_autonoma()
    {
        $labels = array(
            'name'                       => _x('Guida autonoma', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('Guida autonoma', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('Categorie guida autonoma', 'text_domain'),
            'all_items'                  => __('Tutti la guida autonoma', 'text_domain'),
            'parent_item'                => __('Guida autonoma genitore', 'text_domain'),
            'parent_item_colon'          => __('Guida autonoma genitore:', 'text_domain'),
            'new_item_name'              => __('Nuovo nome guida autonoma', 'text_domain'),
            'add_new_item'               => __('Aggiungi nuova guida autonoma', 'text_domain'),
            'edit_item'                  => __('Modifica guida autonoma', 'text_domain'),
            'update_item'                => __('Aggiorna guida autonoma', 'text_domain'),
            'view_item'                  => __('Vedi guida autonoma', 'text_domain'),
            'separate_items_with_commas' => __('Separa la guida autonoma con la virgola', 'text_domain'),
            'add_or_remove_items'        => __('Aggiungi o rimuovi guida autonoma', 'text_domain'),
            'choose_from_most_used'      => __('Scegli tra i più usati', 'text_domain'),
            'popular_items'              => __('Guida autonoma popolare', 'text_domain'),
            'search_items'               => __('Cerca guida autonoma', 'text_domain'),
            'not_found'                  => __('Non trovato', 'text_domain'),
            'no_terms'                   => __('Nessuna guida autonoma', 'text_domain'),
            'items_list'                 => __('Lista guida autonoma', 'text_domain'),
            'items_list_navigation'      => __('Lista di navigazione guida autonoma', 'text_domain'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'publicly_queryable'         => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
            'rewrite'                    => false,
        );
        register_taxonomy('taxonomy_guida_autonoma', array('guida_autonoma'), $args);
    }
    add_action('init', 'tax_guida_autonoma', 0);
}

//Register Custom Taxonomy -> Marche guida autonoma
if (! function_exists('marca_guida_autonoma')) {
    function marca_guida_autonoma()
    {
        $labels = array(
            'name'                       => _x('Marche Guida autonoma', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('Marche Guida autonoma', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('Marche guida autonoma', 'text_domain'),
            'all_items'                  => __('Tuttre le marche', 'text_domain'),
            'parent_item'                => __('Marche Guida autonoma genitore', 'text_domain'),
            'parent_item_colon'          => __('Marche Guida autonoma genitore:', 'text_domain'),
            'new_item_name'              => __('Nuovo nome Marca guida autonoma', 'text_domain'),
            'add_new_item'               => __('Aggiungi nuova Marca guida autonoma', 'text_domain'),
            'edit_item'                  => __('Modifica Marca guida autonoma', 'text_domain'),
            'update_item'                => __('Aggiorna Marca guida autonoma', 'text_domain'),
            'view_item'                  => __('Vedi Marca guida autonoma', 'text_domain'),
            'separate_items_with_commas' => __('Separa la Marca guida autonoma con la virgola', 'text_domain'),
            'add_or_remove_items'        => __('Aggiungi o rimuovi Marca guida autonoma', 'text_domain'),
            'choose_from_most_used'      => __('Scegli tra i più usati', 'text_domain'),
            'popular_items'              => __('Marca Guida autonoma popolare', 'text_domain'),
            'search_items'               => __('Cerca Marca guida autonoma', 'text_domain'),
            'not_found'                  => __('Non trovato', 'text_domain'),
            'no_terms'                   => __('Nessuna Marca guida autonoma', 'text_domain'),
            'items_list'                 => __('Lista Marca guida autonoma', 'text_domain'),
            'items_list_navigation'      => __('Lista di navigazione Marca guida autonoma', 'text_domain'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => false,
            'publicly_queryable'         => false,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => false,
        );
        register_taxonomy('taxonomy_marca_guida_autonoma', array('guida_autonoma'), $args);
    }
    add_action('init', 'marca_guida_autonoma', 0);
}

// Filtro per sostituire %taxonomy_guida_autonoma% nell'URL con lo slug della categoria
function guida_autonoma_post_link($post_link, $post)
{
    if (is_object($post) && $post->post_type == 'guida_autonoma') {
        $terms = wp_get_object_terms($post->ID, 'taxonomy_guida_autonoma');
        if ($terms && ! is_wp_error($terms)) {
            $post_link = str_replace('%taxonomy_guida_autonoma%', $terms[0]->slug, $post_link);
        } else {
            $post_link = str_replace('%taxonomy_guida_autonoma%', 'non-categorizzato', $post_link);
        }
    }
    return $post_link;
}
add_filter('post_type_link', 'guida_autonoma_post_link', 10, 2);

// Filtro per sostituire %taxonomy_prodotti_speciali% nell'URL con lo slug della categoria
function prodotti_speciali_post_link($post_link, $post)
{
    if (is_object($post) && $post->post_type == 'prodotti_speciali') {
        $terms = wp_get_object_terms($post->ID, 'taxonomy_prodotti_speciali');
        if ($terms && ! is_wp_error($terms)) {
            $post_link = str_replace('%taxonomy_prodotti_speciali%', $terms[0]->slug, $post_link);
        } else {
            $post_link = str_replace('%taxonomy_prodotti_speciali%', 'non-categorizzato', $post_link);
        }
    }
    return $post_link;
}
add_filter('post_type_link', 'prodotti_speciali_post_link', 10, 2);

// Rewrite rules custom per CPT con tassonomia nello slug (senza archivi tassonomia)
function off_custom_rewrite_rules()
{
    // Guida autonoma: adattamenti-auto/guida-autonoma/{termine-tassonomia}/{post-slug}/
    add_rewrite_rule(
        'adattamenti-auto/guida-autonoma/([^/]+)/([^/]+)/?$',
        'index.php?guida_autonoma=$matches[2]',
        'top'
    );
    // Prodotti speciali: adattamenti-auto/trasporto-carrozzina/{termine-tassonomia}/{post-slug}/
    add_rewrite_rule(
        'adattamenti-auto/trasporto-carrozzina/([^/]+)/([^/]+)/?$',
        'index.php?prodotti_speciali=$matches[2]',
        'top'
    );
}
add_action('init', 'off_custom_rewrite_rules');

//sort by
add_filter("manage_edit-plugin_filter_sortable_columns", 'marca_guida_autonoma');
function plugin_filter_sort($columns)
{
    $custom = array(
        'taxonomy-taxonomy_marca_guida_autonoma' => 'taxonomy-taxonomy_marca_guida_autonoma'
    );
    return wp_parse_args($custom, $columns);
}

//Bedge New in Menu Principale
function off_aggiungi_bedge_new_classe_al_menu($classes, $item, $args, $depth)
{
    // Definisci i custom post type di interesse
    $allowed_post_types = array('guid_autonoma', 'prodotti_speciali', 'trasporto_carrozzina');

    // Controlla se la voce di menu è collegata a uno di questi tipi di post
    if (in_array($item->object, $allowed_post_types)) {
        $post_id = $item->object_id;

        // Recupera il valore del campo ACF "bedge_new"
        $bedge_new = get_field('bedge_new', $post_id);

        // Se il campo è true, aggiungi una classe personalizzata
        if ($bedge_new) {
            $classes[] = 'aggiungi_bedge_new';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'off_aggiungi_bedge_new_classe_al_menu', 10, 4);



add_action('wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}, 1);

add_filter('wp_resource_hints', function ($hints, $relation_type) {
    if ($relation_type === 'dns-prefetch') {
        $hints[] = '//fonts.googleapis.com';
        $hints[] = '//fonts.gstatic.com';
    }
    return $hints;
}, 10, 2);
