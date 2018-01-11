<?php

/* Quella che segue è una funzione che permette di cambiare al volo le traduzioni (non nelle email, però) */

//* Customize Read More Text (necessario perchè non funziona con il metodo seguente)
add_filter( 'excerpt_more', 'child_read_more_link' );
add_filter( 'get_the_content_more_link', 'child_read_more_link' );
add_filter( 'the_content_more_link', 'child_read_more_link' );
function child_read_more_link() { 
return '<a class="more-link" title="Continua a leggere" href="' . get_permalink() . '" rel="nofollow">Continua...</a>';
}

//* Traduce il box di ricerca (necessario perchè non funziona con il metodo seguente)
add_filter( 'genesis_search_text', 'an_search_text' );
function an_search_text( $text ) {
  return esc_attr( 'Cerca...' );
}

//* Genesis
function translate_genesis($translation, $text, $domain) {
    if ($domain == 'genesis') {
        switch ($text) {

            case 'Search Results for:':
                $translation = 'Risultati della ricerca per ';
          	break;

        }
    }

    return $translation;
}
add_filter('gettext', 'translate_genesis', 10, 3);

//* WooCommerce
function translate_woocommerce($translation, $text, $domain) {
    if ($domain == 'woocommerce') {
        switch ($text) {

            case 'Learn more':
                $translation = 'Dettagli ';
          	break;

          	case 'Read more':
                $translation = 'Dettagli ';
          	break;

        }
    }

    return $translation;
}
add_filter('gettext', 'translate_woocommerce', 10, 3);