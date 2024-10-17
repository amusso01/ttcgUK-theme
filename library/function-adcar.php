<?php

function tcw_cars_import()
{
    $fakeFeed = [
        [
            'Make' => 'Volkswagen',
            'Range' => 'Golf',
            'Model' => 'Golf Bluemotion Tdi',
            'Description' => '1.6 TDI 110 BlueMotion 5dr',
            'RegistrationNumberWithSpaces' => 'DG16 CJF',
            'RegistrationNumber' => 'DG16CJF',
            'RegistrationDate' => '2016-03-21 00:00:00',
            'RRP' => '6999',
            'Discount' => '0',
            'DiscountedPrice' => '6999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/volkswagen/golf.png'
        ],
        [
            'Make' => 'Seat',
            'Range' => 'Ibiza',
            'Model' => 'Ibiza S',
            'Description' => '1.0 S A/C 5dr',
            'RegistrationNumberWithSpaces' => 'YA66 ELH',
            'RegistrationNumber' => 'YA66ELH',
            'RegistrationDate' => '2017-01-11 00:00:00',
            'RRP' => '5999',
            'Discount' => '0',
            'DiscountedPrice' => '5999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Neath',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/seat/ibiza.png'
        ],
        [
            'Make' => 'Nissan',
            'Range' => 'Juke',
            'Model' => 'Juke N-Connecta Dig-T',
            'Description' => '1.2 DiG-T N-Connecta 5dr',
            'RegistrationNumberWithSpaces' => 'EF16 XYM',
            'RegistrationNumber' => 'EF16XYM',
            'RegistrationDate' => '2016-07-31 00:00:00',
            'RRP' => '6999',
            'Discount' => '0',
            'DiscountedPrice' => '6999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/nissan/juke.png'
        ],
        [
            'Make' => 'Mini',
            'Range' => 'Hatchback',
            'Model' => 'One',
            'Description' => '1.6 One 3dr',
            'RegistrationNumberWithSpaces' => 'KN62 KKR',
            'RegistrationNumber' => 'KN62KKR',
            'RegistrationDate' => '2012-10-10 00:00:00',
            'RRP' => '2999',
            'Discount' => '0',
            'DiscountedPrice' => '2999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Merthyr',
            'ModelImageUri' => ''
        ],
        [
            'Make' => 'Mini',
            'Range' => 'Hatchback',
            'Model' => 'Cooper D',
            'Description' => '1.5 Cooper D 5dr',
            'RegistrationNumberWithSpaces' => 'YF16 ZRU',
            'RegistrationNumber' => 'YF16ZRU',
            'RegistrationDate' => '2016-06-22 00:00:00',
            'RRP' => '6999',
            'Discount' => '0',
            'DiscountedPrice' => '6999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/mini/cooper.png'
        ],
        [
            'Make' => 'Ford',
            'Range' => 'Focus',
            'Model' => 'Focus Style Tdci',
            'Description' => '1.5 TDCi 120 Style 5dr',
            'RegistrationNumberWithSpaces' => 'AY66 YXO',
            'RegistrationNumber' => 'AY66YXO',
            'RegistrationDate' => '2016-09-14 00:00:00',
            'RRP' => '5999',
            'Discount' => '0',
            'DiscountedPrice' => '5999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/ford/focus.png'
        ],
        [
            'Make' => 'Fiat',
            'Range' => '500',
            'Model' => '500 Lounge',
            'Description' => '1.2 Lounge 3dr',
            'RegistrationNumberWithSpaces' => 'CP65HHM',
            'RegistrationNumber' => 'CP65HHM',
            'RegistrationDate' => '2016-02-15 00:00:00',
            'RRP' => '4999',
            'Discount' => '0',
            'fdry_paint_id' => 'gren',
            'DiscountedPrice' => '4999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/fiat/500.png'
        ],
        [
            'Make' => 'Citroen',
            'Range' => 'C1',
            'Model' => 'C1 Vtr',
            'Description' => '1.0i VTR 5dr',
            'RegistrationNumberWithSpaces' => 'CP12 AZW',
            'RegistrationNumber' => 'CP12AZW',
            'RegistrationDate' => '2012-04-24 00:00:00',
            'RRP' => '1999',
            'Discount' => '0',
            'DiscountedPrice' => '1999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Merthyr',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/citroen/c1.png'
        ],
        [
            'Make' => 'Bmw',
            'Range' => '3 Series',
            'Model' => '320D Sport',
            'Description' => '320d Sport 4dr',
            'RegistrationNumberWithSpaces' => 'BL16 NTJ',
            'RegistrationNumber' => 'BL16NTJ',
            'RegistrationDate' => '2016-06-09 00:00:00',
            'RRP' => '8999',
            'Discount' => '0',
            'DiscountedPrice' => '8999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Neath',
            'ModelImageUri' => ''
        ],
        [
            'Make' => 'Bmw',
            'Range' => '3 Series',
            'Model' => '316D Sport',
            'Description' => '316d Sport 4dr [Business Media]',
            'RegistrationNumberWithSpaces' => 'OE16 XYS',
            'RegistrationNumber' => 'OE16XYS',
            'RegistrationDate' => '2016-06-21 00:00:00',
            'RRP' => '8999',
            'Discount' => '0',
            'DiscountedPrice' => '8999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => ''
        ],
        [
            'Make' => 'Audi',
            'Range' => 'A3',
            'Model' => 'A3 Sport Nav Tdi',
            'Description' => '1.6 TDI 110 Sport 3dr [Nav]',
            'RegistrationNumberWithSpaces' => 'MF16 KJZ',
            'RegistrationNumber' => 'MF16KJZ',
            'RegistrationDate' => '2016-04-11 00:00:00',
            'RRP' => '8999',
            'Discount' => '0',
            'DiscountedPrice' => '8999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/audi/a3.png'
        ],
        [
            'Make' => 'Audi',
            'Range' => 'A3',
            'Model' => 'A3 Sport Nav Tdi',
            'Description' => '1.6 TDI 110 Sport 3dr [Nav]',
            'RegistrationNumberWithSpaces' => 'HF16 LUH',
            'RegistrationNumber' => 'HF16LUH',
            'RegistrationDate' => '2016-03-31 00:00:00',
            'RRP' => '7999',
            'Discount' => '0',
            'DiscountedPrice' => '7999',
            'LocationChangedDate' => '23/03/2020',
            'Location' => 'Cardiff North',
            'ModelImageUri' => 'https://cdn.tradecentregroup.io/image/upload/web/Group/cars/audi/a3.png'
        ],
    ];

    $csvUploadCars = [];

    $apiKey = TC_API_KEY;
    $urlPrefix = TC_API_URL_PREFIX;
    $endPoint = '/api/Vehicles';
    $log = '';

    $curl = curl_init();

    curl_setopt_array(
        $curl,
        [
            CURLOPT_TIMEOUT => 3.0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $urlPrefix . $endPoint,
            // CURLOPT_HEADER => 1,
            // CURLINFO_HEADER_OUT => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $apiKey
            ]
        ]
    );

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($curl);
    if ($response) {
        $arr = json_decode((string)$response);
    }

    /*if (empty($arr)) {
        $arr = json_decode((string)json_encode($fakeFeed));
    }*/
    curl_close($curl);

    $numCars = 0;

    foreach ($arr as $row) {
        $numCars++;
        if (stripos($row->Make, 'Mercedes') !== false) {
            $row->Make = 'Mercedes';
        }

        $make = get_page_by_title($row->Make, OBJECT, 'carmake');

        if ($make) {
            $log .= 'Found ' . $row->Make . "\r\n";
            $makeId = $make->ID;
        } else {
            $log .= 'API import added new make: ' . $row->Make . "\r\n";

            $makeId = wp_insert_post(
                [
                    'post_type' => 'carmake',
                    'post_title' => wp_strip_all_tags($row->Make),
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_category' => '',
                    'post_author' => 1
                ]
            );
        }

        $model = get_page_by_title($row->Range, OBJECT, 'carmodel');

        if ($model) {
            $log .= 'Found ' . $row->Range . "\r\n";
            $modelId = $model->ID;
        } else {
            $log .= 'API import added new range: ' . $row->Make . ' ' . $row->Range . "\r\n";
            $modelId = wp_insert_post(
                [
                    'post_type' => 'carmodel',
                    'post_title' => wp_strip_all_tags($row->Range),
                    'post_content' => '',
                    'post_status' => 'publish',
                    'post_category' => '',
                    'post_parent' => $makeId,
                    'post_author' => 1
                ]
            );
            update_field('make', $makeId, $modelId);
        }

        /*$carApiData = [
            'title' => sprintf('%s %s %s', $row->Make, $row->Model, $row->RegistrationNumberWithSpaces),
            'make_slug' => str_slug($row->Make),
            'range_slug' => str_slug($row->Range),
            'slug' => str_slug(sprintf('%s %s %s', $row->Make, $row->Model, $row->RegistrationNumberWithSpaces))
        ];*/

        $existingBranch = get_posts(
            [
                'numberposts' => -1,
                'post_type' => 'branch',
                'meta_key' => 'api_name',
                'meta_value' => $row->Location
            ]
        );

        $existingBranchdestination = get_posts(
            [
                'numberposts' => -1,
                'post_type' => 'branch',
                'meta_key' => 'api_name',
                'meta_value' => $row->Destination
            ]
        );

        $existingCar = get_posts(
            [
                'numberposts' => -1,
                'post_type' => 'car',
                'meta_key' => 'reg_number',
                'meta_value' => $row->RegistrationNumber
            ]
        );

        if (empty($existingCar)) {
            $log .= "Creating " . $row->RegistrationNumber . "\r\n";
            $carId = wp_insert_post(
                [
                    'post_type' => 'car',
                    'post_title' => wp_strip_all_tags($row->Model),
                    'post_content' => $row->Description,
                    'post_status' => 'publish',
                    'post_author' => 1
                ]
            );

            update_field('reg_number', $row->RegistrationNumber, $carId);
            update_field('reg_number_with_space', $row->RegistrationNumberWithSpaces, $carId);
            update_field('reg_date', $row->RegistrationDate, $carId);
            update_field('make', $makeId, $carId);
            update_field('model', $modelId, $carId);
            update_field('destination', $existingBranchdestination[0]->ID ? $existingBranchdestination[0]->ID : '', $carId);
            update_field('location', $existingBranch[0]->ID ? $existingBranch[0]->ID : '', $carId);
            update_field('location_changed_date', $row->LocationChangedDate, $carId);
            update_field('image_url', $row->ModelImageUri, $carId);
            update_field('rrp', $row->RRP, $carId);
            update_field('discount', $row->Discount, $carId);
            update_field('discounted_price', $row->DiscountedPrice, $carId);
            update_field('derivative', $row->Derivative, $carId);
            update_field('fueltype', $row->FuelType, $carId);
            update_field('fdry_paint_id', $row->PaintDescription, $carId);
            update_field('stock_number', $row->StockNumber, $carId);
            update_field('transmission', $row->Transmission, $carId);
            update_field('enginecapacity', $row->EngineCapacity, $carId);
            update_field('bodytype', $row->BodyType, $carId);
            update_field('seats', $row->Seats, $carId);
            update_field('doors', $row->Doors, $carId);
            update_field('mileage', $row->Mileage, $carId);
            update_field('capid', $row->CapId, $carId);
            update_field('destination_label', $row->Destination, $carId);
            update_field('discount_banner_text_v1', $row->AltCarSaving, $carId);
            update_field('alt_car_year', $row->AltCarYear, $carId);
            update_field('alt_car_miles', $row->AltCarMileage, $carId);
            update_field('alt_car_model', $row->AltCarModel, $carId);
            update_field('alt_car_fuel_type', $row->AltCarFuelType, $carId);
            update_field('alt_car_doors', $row->AltCarDoors, $carId);
            update_field('alt_car_spec', $row->AltCarSpec, $carId);
            update_field('total_in_stock', $row->TotalInStock, $carId);
            update_field('total_make_in_stock', $row->TotalMakeInStock, $carId);
            if ($row->Featured === true) {
                update_field('featured', 1, $carId);
            } else {
                update_field('featured', 0, $carId);
            }
            update_field(
                'title',
                sprintf('%s %s %s', $row->Make, $row->Model, $row->RegistrationNumberWithSpaces),
                $carId
            );
        } else {
            $log .= "Updating " . $row->RegistrationNumber . "\r\n";
            $carId = $existingCar[0]->ID;
            update_field('make', $makeId, $carId);
            update_field('model', $modelId, $carId);
            update_field('rrp', $row->RRP, $carId);
            update_field('discount', $row->Discount, $carId);
            update_field('discounted_price', $row->DiscountedPrice, $carId);
            update_field('destination', $existingBranchdestination[0]->ID ? $existingBranchdestination[0]->ID : '', $carId);
            update_field('location', $existingBranch[0]->ID ? $existingBranch[0]->ID : '', $carId);
            update_field('derivative', $row->Derivative, $carId);
            update_field('fueltype', $row->FuelType, $carId);
            update_field('transmission', $row->Transmission, $carId);
            update_field('fdry_paint_id', $row->PaintDescription, $carId);
            update_field('stock_number', $row->StockNumber, $carId);
            update_field('enginecapacity', $row->EngineCapacity, $carId);
            update_field('bodytype', $row->BodyType, $carId);
            update_field('seats', $row->Seats, $carId);
            update_field('doors', $row->Doors, $carId);
            update_field('mileage', $row->Mileage, $carId);
            update_field('capid', $row->CapId, $carId);
            update_field('destination_label', $row->Destination, $carId);
            update_field('discount_banner_text_v1', $row->AltCarSaving, $carId);
            update_field('alt_car_year', $row->AltCarYear, $carId);
            update_field('alt_car_miles', $row->AltCarMileage, $carId);
            update_field('alt_car_model', $row->AltCarModel, $carId);
            update_field('alt_car_fuel_type', $row->AltCarFuelType, $carId);
            update_field('alt_car_doors', $row->AltCarDoors, $carId);
            update_field('alt_car_spec', $row->AltCarSpec, $carId);
            update_field('total_in_stock', $row->TotalInStock, $carId);
            update_field('total_make_in_stock', $row->TotalMakeInStock, $carId);
            if ($row->Featured === true) {
                update_field('featured', 1, $carId);
            } else {
                update_field('featured', 0, $carId);
            }
            wp_update_post(['ID' => $carId]);
        }

        $make = get_post(get_field('make', $carId));
        $model = get_post(get_field('model', $carId));

        $csvUploadCars[] = [get_field('reg_number', $carId), $make->post_title, $model->post_title, 'used', '', ''];
    }
    /*
    $ftp = ftp_connect('swipetospin.exavault.com', '21');
    if (ftp_login($ftp, 'stssftp_cnsmedia', 'exFaxxgI')) {
        $fh = tmpfile();
        foreach ($csvUploadCars as $csvUploadCar) {
            fputcsv($fh, $csvUploadCar);
        }
        $metaData = stream_get_meta_data($fh);
        $fileName = $metaData['uri'];
        ftp_put($ftp, 'tradecentrewales.csv', $fileName);
        fclose($fh);
        echo 'Upload File Success';
    }
    */
    // Delete old records.
    $args = [
        'fields' => 'ids',
        'post_type' => ['car'],
        'posts_per_page' => '-1',
        'date_query' => [
            'column' => 'post_modified',
            'before' => '-5 minutes'
        ]
    ];

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $itemId = $query->next_post();
            $item = get_post($itemId);
            $log .= 'Deleting ' . $item->post_title . ' : ' . $itemId . "\r\n";
            wp_trash_post($item->ID);
        }
    }

    if ($_GET['import']  == 'c1b5b1a6ad') {
        echo "<pre>";
        echo $log;
        echo 'Total Cars: ' . $numCars;
        echo "</pre>";
    }
    mail(get_bloginfo('admin_email'), 'Cron Log', $log);
}

if ($_GET['import']  == 'c1b5b1a6ad') {
    tcw_cars_import();
    die;
}
