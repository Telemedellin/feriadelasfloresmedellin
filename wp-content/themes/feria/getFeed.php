<?php
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

if(function_exists('fetch_feed')) 
{

  include_once(ABSPATH . WPINC . '/feed.php');               // hay que incluir esto

  function fetch_feed2( $url ) 
  {
    require_once( ABSPATH . WPINC . '/class-feed.php' );
    $feed = new SimplePie();

    $feed->set_sanitize_class( 'WP_SimplePie_Sanitize_KSES' );
         // We must manually overwrite $feed->sanitize because SimplePie's
        // constructor sets it before we have a chance to set the sanitization class
    $feed->sanitize = new WP_SimplePie_Sanitize_KSES();

    $feed->set_cache_class( 'WP_Feed_Cache' );
    $feed->set_file_class( 'WP_SimplePie_File' );

    $feed->set_feed_url( $url );
    $feed->force_feed(true);
    /** This filter is documented in wp-includes/class-feed.php */
    $feed->set_cache_duration( apply_filters( 'wp_feed_cache_transient_lifetime', 12 * HOUR_IN_SECONDS, $url ) );
         /**
         * Fires just before processing the SimplePie feed object.
         *
         * @since 3.0.0
         *
         * @param object &$feed SimplePie feed object, passed by reference.
          * @param mixed  $url   URL of feed to retrieve. If an array of URLs, the feeds are merged.
         */
         do_action_ref_array( 'wp_feed_options', array( &$feed, $url ) );
         $feed->init();
         $feed->handle_content_type();

         if ( $feed->error() )
           return new WP_Error( 'simplepie-error', $feed->error() );

         return $feed;
  }

   $feeds[0]  = fetch_feed('http://noticias.telemedellin.tv/tag/feriaflores/feed');
   $feeds[1] = fetch_feed('http://www.medellin.gov.co/irj/servlet/prt/portal/prtroot/pcd!3aportal_content!2fMunicipioMedellin!2fRssServerComponentMig?nodo=Feria%20de%20las%20Flores'); // el feed que queremos mostrar
  // $feed2 = fetch_feed('http://noticias.telemedellin.tv/tag/feriaflores/feed'); // el feed que queremos mostrar
   $items = feedsGenerator($feeds);


   foreach ($items as $key => $item) 
   {
    if ( !$items['errors'] ) 
    {
   ?>

      <!-- Noticia telemedellin -->
      <?php foreach ( $item['elements'] as $key2 => $value): ?>

          <div class="noticiaHome">
            <img src="<?php echo $value['src'] ?>" width="200" height="130" class="img-rounded" />
            <h2>
                <a target="_BLANK" href="<?php echo $value['get_permalink']  ?>" title="<?php echo $value['get_date'] ?>">
                    <?php echo $value['get_title']; ?>
                </a>
            </h2>
            <p><?php echo substr(strip_tags ($value['get_content']), 0, 200) ?>...</p>
            <div class="links">
                  <?php if(qtrans_getLanguage() == 'es'): ?>
                  <div class="vermas">
                        <!--<a target="_BLANK" href="<?php echo $value['get_permalink']  ?>" title="<?php echo $value['get_date'] ?>">Ver más</a>-->
                  </div>
                  <?php else: ?>
                  <div class="readmore">
                    <!--<a target="_BLANK" href="<?php echo $value['get_permalink']  ?>" title="<?php echo $value['get_date'] ?>">Read more</a>-->
                  </div>

                  <?php endif; ?>
            </div>
          </div>
      <?php endforeach; ?>    
  <?php 
    }
    else
    {
        echo  $items['errors'] ;
    }
  }

  // end if function exist 
}

?>
<?php

  /**
   * feedsGenerator
   * Mejora implementada 
   * para mostrar todos los feeds
   * de un Array
   * @param $feeds - Array
   * @return array
   * @author Pablo Martínez
   **/


  function feedsGenerator( $feeds)
  {
    $items = array();
    $i = 0;

    foreach ($feeds as $id => $feed) 
    {

      $limit = 0;
      $element = null;

      if(count($feed->errors) > 0)
      {
         $items[$i]['errors'] = 'Error en el feed';
      }
     else 
      {
          $items[$i]['limit']     = $feed->get_item_quantity(4); // especificamos el número de items a mostrar
          $element                = $feed->get_items(0, $feed->limit); // se crea un array con los items

          if($element != null)
          {

            foreach ($element as $key => $value)
            {
                 $cont = array();

                  $img    = stristr ( $value->get_content() , "<img");
                  $second = strpos($img, ">");
                  $img    = substr($img, 0, $second);
                  $src    = substr($img, strpos($img, "src=") + 5 ) ;
                  $params         = preg_split('[\"|\']', $src, 2);

                  if($params[0] == "" || $params[0] == "/" || $params[0] == " ")
                  {
                    $cont['src']  = get_template_directory_uri() . "/images/genericaFeed.jpg";
                  }
                  else
                  {
                    $cont['src'] = $params[0];
                  }

                  $cont['get_title']      = $value->get_title();
                  $cont['get_content']    = $value->get_content();
                  $cont['get_permalink']  = $value->get_permalink();
                  $cont['get_date']       = $value->get_date('j F Y @ G:i');

                  $items[$i]['elements'][] = $cont;

              }
          }
      }

      $i = $i + 1;
    }

    return $items;
  }

?>