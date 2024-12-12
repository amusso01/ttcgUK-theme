<?php
class FDRY_Custom_Endpoint
{

  /**
   * Custom endpoint name.
   *
   * @var string
   */
  public static $endpoint = 'fdry/v2';

  /**
   * Plugin actions.
   */
  public function __construct()
  {
    // Actions register cars endpoint.
    add_action('init', array($this, 'register_cars_rest_route'));
    // Actions register mandate endpoint.
    // add_action('init', array($this, 'register_mandates_rest_route'));
  }

  /**
   * Register new endpoint
   *
   * @see https://developer.wordpress.org/reference/functions/add_rewrite_endpoint/
   * per_page parameters to paginate
   * 
   */
  public function register_cars_rest_route()
  {
    register_rest_route(
      $this::$endpoint,
      '/cars',
      array(
        'methods' => 'GET',
        'callback' => [$this, 'get_cars'],
        'args' => array(
          'per_page' => array(
            'validate_callback' => function ($param, $request, $key) {
              return is_numeric($param);
            }
          ),
        ),
      )
    );

    // SINGLE ID
    // register_rest_route(
    //   $this::$endpoint,
    //   '/cars/(?P<id>\d+)',
    //   array(
    //     'methods' => 'GET',
    //     'callback' => [$this, 'get_single_cars'],
    //   )
    // );
  }



  //GET CARS FIELD 
  // ENDPOINT /wp-json/fdry/v2/cars
  public function get_cars($request)
  {

    $per_page = '-1';


    $today = date('Ymd');
    $cars = array();
    $args = array(
      'post_type' => 'car', //specifies you want to query the custom post type  
      'posts_per_page' => $per_page,

      'meta_key' => 'rrp',
      'orderby' => 'meta_value_num',
      'order' => 'ASC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
      while ($query->have_posts()) {
        $query->the_post();

        // Post ID
        $postId = get_the_ID();

        $carMake = get_field('make');
        $carModel = get_field('model');

        $carImageData = array(
          'carMake' => $carMake->post_title,
          'carModel' => $carModel->post_title,
          'carVariant' => get_field('bodytype'),
          'carPaint'  => get_field('fdry_paint_id'),
        );



        $car_data = array( /*an array that stores the title and content of every post*/
          'carID' => $postId,
          'carLink' => get_the_permalink(),
          'carTitle' => get_the_title(),
          'carPrice' => get_field('rrp'),
          'carImage' => $this->buildImageCDN($carImageData),
          'carQuantity' => get_field('total_in_stock'),
          'carDescription' => get_field('derivative'),
          'carMake' => $carMake->post_title,
          'carModel' => $carModel->post_title,
          'carVariant' => get_field('bodytype'),
          'carPaint'  => get_field('fdry_paint_id'),
          // Add other fields as needed
        );
        $cars[] = $car_data;
      }
      wp_reset_postdata(); /* restores $post global to the current post to avoid any conflicts in subsequent queries*/
    }
    return rest_ensure_response($cars); /*ensures response is correctly set as a response object for consistency*/
  }

  private function buildImageCDN($imageArray)
  {
    return 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $imageArray['carMake'] . '&modelFamily=' . $imageArray['carModel'] .  '&modelRange=' . $imageArray['carModel'] . '&modelVariant=' .  $imageArray['carVariant'] . '&paintDescription=' . $imageArray['carPaint'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.80&countryCode=GB';
  }

  //GET SINGLE cars FIELD 
  // ENDPOINT /wp-json/fdry/v2/cars/{id}
  // public function get_single_cars($data)
  // {
  //   $post_id = $data['id'];
  //   $today = date('Y-m-d');
  //   $deals = array();
  //   $args = array(
  //     'post_type' => 'deal', //specifies you want to query the custom post type  
  //     'post__in' => array($post_id),
  //   );

  //   $query = new WP_Query($args);

  //   if ($query->have_posts()) {
  //     while ($query->have_posts()) {
  //       $query->the_post();

  //       // Post ID
  //       $postId = get_the_ID();
  //       // Sectors term
  //       $sectors = $this::getTaxTitles('sector', $postId);
  //       // Deal size
  //       $dealSize = get_field('currency_symbols') . '' . getSecondColumnValue(get_field('deal_size'));
  //       $dealCloseDate = get_field('close_date');
  //       $dealCloseDate =  DateTime::createFromFormat('d/m/Y', $dealCloseDate);
  //       $dealCloseDate = $dealCloseDate->format('Y-m-d');
  //       $deal_data = array( /*an array that stores the title and content of every post*/
  //         'dealID' => $postId,
  //         'dealLink' => get_the_permalink(),
  //         'publishedDate' => get_the_time('F j, Y'),
  //         'sectors' => $sectors,
  //         'locationRaising' => get_field('location')->name,
  //         'dealSize' => $dealSize,
  //         'formOfRaising' => get_field('form_of_raising'),
  //         'dealTitle' =>  get_field('short_deal_description'),
  //         'dealExpiringDate' => get_field('close_date'),
  //         'dealSuccessFee' => get_field('success_fee'),
  //         'companyOverview' => get_field('company_overview'),
  //         'dealRationale' => get_field('rationale'),
  //         'exclusiveMandate' => get_field('exclusive_mandate'),
  //         'dealType' => get_field('deal_type')->name,
  //         'dealStatusDate' => $dealCloseDate < $today ? 'Close' : 'Open',
  //         // Add other fields as needed
  //       );
  //       $deals[] = $deal_data;
  //     }
  //     wp_reset_postdata(); /* restores $post global to the current post to avoid any conflicts in subsequent queries*/
  //   }
  //   return rest_ensure_response($deals); /*ensures response is correctly set as a response object for consistency*/
  // }


}

new FDRY_Custom_Endpoint();
