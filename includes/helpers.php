<?php

if (!function_exists('getJsFinanceExamples')) {
    function getJsFinanceExamples()
    {
        $javaScript = 'const financeExamples = [';

        $args = [
            //'fields' => 'ids',
            'post_type' => ['financeexample'],
            'posts_per_page' => '-1',
        ];

        $finances = new WP_Query($args);
        while ($finances->have_posts()) {
            $javaScript .= '{';
            $finance = $finances->next_post();
            $custom = get_post_custom($finance->ID);
            $javaScript .= str_replace('_', '', 'weekly_price') . ': "' . $finance->post_title . '",';
            $include = [
                'cash_price',
                'deposit',
                'credit_amount',
                'final_payment',
                'monthly_amount',
                'apr',
                'total_amount',
                'term',
                'representative_example'
            ];

            foreach ($include as $field) {
                $javaScript .= str_replace('_', '', $field) . ': "' . $custom[$field][0] . '",';
            }

            $javaScript = rtrim($javaScript, ',') . '},';
        }

        //Cache::put(self::CACHE_KEY, $javaScript, now()->addHours(6));
        //}

        return rtrim($javaScript, ',') . '];';
    }
}

if (!function_exists('replaceShortCodes')) {
    function str_contains($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && mb_strpos($haystack, $needle) !== false) {
                return true;
            }
        }
        return false;
    }
}

if (!function_exists('replaceShortCodes')) {
    function replaceShortCodes($text, $area)
    {
        if (isset($area) && $area != "") {
            $text = str_replace('[area]', $area, $text);
            $text = str_replace('[in area]', "in $area", $text);
            $text = str_replace('[near area]', "near $area", $text);
        } else {
            $text = str_replace(' [area]', "", $text);
            $text = str_replace(' [in area]', "", $text);
            $text = str_replace(' [near area]', "", $text);
        }
        return $text;
    }
}

if (!function_exists('area_link')) {
    function area_link($link, $return = false)
    {
        global $areaSuffix;
        $link = str_replace('//', '/', $link . $areaSuffix);
        if ($return) {
            return $link;
        }
        echo $link;
    }
}

if (!function_exists('limit_words')) {
    function limit_words($text, $limit)
    {
        $word_arr = explode(" ", $text);
        if (count($word_arr) > $limit) {
            $words = implode(" ", array_slice($word_arr, 0, $limit)) . ' ...';
            return $words;
        }
        return $text;
    }
}

if (!function_exists('tcw_get_active_taxonomy_types')) {
    function tcw_get_active_taxonomy_types($taxonomy, $termId = null)
    {
        if ($termId != null) {
            $termChildren = get_term_children($termId, $taxonomy);
            $terms = [];
            foreach ($termChildren as $child) {
                $terms[] = get_term_by('id', $child, $taxonomy);
            }
        } else {
            $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);
        }
        /*$termSort = [];
        $termArray = [];
        if (!empty($terms)) {
            foreach ($terms as $k => $term) {
                $terms[$k]->custom = get_fields($term->taxonomy . '_' . $term->term_id);
                if ($terms[$k]->custom['visible']) {
                    $termSort[$k] = (int)$terms[$k]->custom['order'] ?? 0;
                }
            }
            asort($termSort);
            foreach ($termSort as $k => $v) {
                $termArray[$k] = $terms[$k];
            }
        }
        unset($terms, $termSort);*/

        return $terms;
    }// tcw_get_active_taxonomy_types
}

if (!function_exists('tcw_full_page_search_form')) {
    /**
     * Display full page search form
     *
     * @return string the search form element
     */
    function tcw_full_page_search_form()
    {
        $output = '<form class="form-horizontal" method="get" action="' . esc_url(home_url('/')) . '" role="form">';
        $output .= '<div class="form-group">';
        $output .= '<div class="col-xs-10">';
        $output .= '<input type="text" name="s" value="' . esc_attr(
                get_search_query()
            ) . '" placeholder="' . esc_attr_x(
                'Search &hellip;',
                'placeholder',
                'tcw'
            ) . '" title="' . esc_attr_x('Search &hellip;', 'label', 'tcw') . '" class="form-control" />';
        $output .= '</div>';
        $output .= '<div class="col-xs-2">';
        $output .= '<button type="submit" class="btn btn-default">' . __('Search', 'tcw') . '</button>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</form>';

        return $output;
    }// tcw_full_page_search_form
}

if (!function_exists('tcw_pagination')) {
    /**
     * display pagination (1 2 3 ...) instead of previous, next of wordpress style.
     *
     * @param string $pagination_align_class
     * @return string the content already echo
     */
    function tcw_pagination($pagination_align_class = 'pagination-center pagination-row')
    {
        global $wp_query;
        $big = 999999999;
        $pagination_array = paginate_links(
            [
                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                'format' => '/page/%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => '&lt; Previous',
                'next_text' => ' Next &gt;',
                'before_page_number' => '<div>',
                'after_page_number' => '</div>',
                'type' => 'array'
            ]
        );

        unset($big);

        if (is_array($pagination_array) && !empty($pagination_array)) {
            echo '<nav class="' . $pagination_align_class . '">';
            echo '<ul class="pagination"><span>Pages&nbsp;</span>';
            foreach ($pagination_array as $page) {
                $classCount = 0;
                echo '<li class="';
                if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
                    echo ' active';
                    $classCount++;
                }
                $classes = ['next', 'prev', 'dots'];
                foreach ($classes as $class) {
                    if (strpos($page, $class) !== false) {
                        echo ' ' . $class;
                        $classCount++;
                    }
                }
                if ($classCount == 0) {
                    echo ' inactive';
                }
                echo '">';
                if (strpos($page, '<a') === false && strpos($page, '&hellip;') === false) {
                    echo '<span>' . $page . '</span>';
                } else {
                    echo $page;
                }
                echo '</li>';
            }
            echo '</ul>';
            echo '</nav>';
        }

        unset($page, $pagination_array);
    }// tcw_pagination
}

if (!function_exists('tcw_post_on')) {
    /**
     * display post date/time and author
     *
     * @return string
     */
    function tcw_post_on()
    {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date('c')),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date('c')),
            esc_html(get_the_modified_date())
        );

        /* translators: %1$s: Link to post with date/time text, %2$s: Link to author with auth name. */
        printf(
            __('<span class="posted-on">Posted on %1$s</span><span class="byline"> by %2$s</span>', 'tcw'),
            sprintf(
                '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
                esc_url(get_permalink()),
                esc_attr(get_the_time()),
                $time_string
            ),
            sprintf(
                '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                /* translators: %s Author name. */
                esc_attr(sprintf(__('View all posts by %s', 'tcw'), get_the_author())),
                esc_html(get_the_author())
            )
        );
    }// tcw_post_on
}

if (!function_exists('tcw_more_link_text')) {
    /**
     * Custom more link (continue reading) text
     * @return string
     */
    function tcw_more_link_text()
    {
        return __('Continue reading <span class="meta-nav">&rarr;</span>', 'tcw');
    }// tcw_more_link_text
}

if (!function_exists('tcw_categories_list')) {
    /**
     * Display categories list with bootstrap icon
     *
     * @param string $categories_list list of categories.
     * @return string
     */
    function tcw_categories_list($categories_list = '')
    {
        return sprintf(
            '<span class="categories-icon glyphicon glyphicon-th-list" title="' . __(
                'Posted in',
                'tcw'
            ) . '"></span> %1$s',
            $categories_list
        );
    }// tcw_categories_list
}

if (!function_exists('tcw_tags_list')) {
    /**
     * display tags list
     *
     * @param string $tags_list
     * @return string
     */
    function tcw_tags_list($tags_list = '')
    {
        return sprintf(
            '<span class="tags-icon glyphicon glyphicon-tags" title="' . __('Tagged', 'tcw') . '"></span>&nbsp; %1$s',
            $tags_list
        );
    }// tcw_tags_list
}

if (!function_exists('cns_format_engine_capacity')) {
    function cns_format_engine_capacity($engineCapacity)
    {
        if ($engineCapacity < 900) {
            return (ceil($engineCapacity / 100) * 100) . 'CC';
        } else {
            return number_format(($engineCapacity / 1000), 1) . 'L';
        }
    }
}

if (!function_exists('xml2array')) {
    function xml2array($contents, $get_attributes = 1, $priority = 'tag')
    {
        //$contents = "";
        if (!function_exists('xml_parser_create')) {
            return array();
        }
        $parser = xml_parser_create('');
        /*if (!($fp = @ fopen($url, 'rb'))) {
            return array();
        }
        while (!feof($fp)) {
            $contents .= fread($fp, 8192);
        }
        fclose($fp);*/
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8");
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, trim($contents), $xml_values);
        xml_parser_free($parser);
        if (!$xml_values) {
            return;
        } //Hmm...
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();
        $current = &$xml_array;
        $repeated_tag_index = array();
        foreach ($xml_values as $data) {
            unset ($attributes, $value);
            extract($data);
            $result = array();
            $attributes_data = array();
            if (isset ($value)) {
                if ($priority == 'tag') {
                    $result = $value;
                } else {
                    $result['value'] = $value;
                }
            }
            if (isset ($attributes) and $get_attributes) {
                foreach ($attributes as $attr => $val) {
                    if ($priority == 'tag') {
                        $attributes_data[$attr] = $val;
                    } else {
                        $result['attr'][$attr] = $val;
                    } //Set all the attributes in a array called 'attr'
                }
            }
            if ($type == "open") {
                $parent[$level - 1] = &$current;
                if (!is_array($current) or (!in_array($tag, array_keys($current)))) {
                    $current[$tag] = $result;
                    if ($attributes_data) {
                        $current[$tag . '_attr'] = $attributes_data;
                    }
                    $repeated_tag_index[$tag . '_' . $level] = 1;
                    $current = &$current[$tag];
                } else {
                    if (isset ($current[$tag][0])) {
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
                        $repeated_tag_index[$tag . '_' . $level]++;
                    } else {
                        $current[$tag] = array(
                            $current[$tag],
                            $result
                        );
                        $repeated_tag_index[$tag . '_' . $level] = 2;
                        if (isset ($current[$tag . '_attr'])) {
                            $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                            unset ($current[$tag . '_attr']);
                        }
                    }
                    $last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
                    $current = &$current[$tag][$last_item_index];
                }
            } elseif ($type == "complete") {
                if (!isset ($current[$tag])) {
                    $current[$tag] = $result;
                    $repeated_tag_index[$tag . '_' . $level] = 1;
                    if ($priority == 'tag' and $attributes_data) {
                        $current[$tag . '_attr'] = $attributes_data;
                    }
                } else {
                    if (isset ($current[$tag][0]) and is_array($current[$tag])) {
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
                        if ($priority == 'tag' and $get_attributes and $attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                        }
                        $repeated_tag_index[$tag . '_' . $level]++;
                    } else {
                        $current[$tag] = array(
                            $current[$tag],
                            $result
                        );
                        $repeated_tag_index[$tag . '_' . $level] = 1;
                        if ($priority == 'tag' and $get_attributes) {
                            if (isset ($current[$tag . '_attr'])) {
                                $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                                unset ($current[$tag . '_attr']);
                            }
                            if ($attributes_data) {
                                $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                            }
                        }
                        $repeated_tag_index[$tag . '_' . $level]++; //0 and 1 index is already taken
                    }
                }
            } elseif ($type == 'close') {
                $current = &$parent[$level - 1];
            }
        }
        return ($xml_array);
    }
}

if (!function_exists('cns_car_standard_equiptment')) {
    function cns_car_standard_equiptment($carId)
    {
        $standardEquipment = get_field('standard_equipment', $carId);

        if (!empty($standardEquipment) && strlen($standardEquipment) > 10) {
            return json_decode(base64_decode($standardEquipment), true);
        }

        $capId = get_field('capid', $carId);

        $url = 'https://soap.cap.co.uk/nvd/capnvd.asmx/GetStandardEquipment';

        $user = '99001';
        $password = '990The';

        $data = [
            'SubscriberID' => $user,
            'Password' => $password,
            'capid' => $capId, // 32723
            'seDate' => '2019-01-01',
            'justCurrent' => 'true',
            'database' => 'Cars'
        ];

        $data_string = '';
        foreach ($data as $key => $value) {
            $data_string .= $key . '=' . $value . '&';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, "application/x-www-form-urlencoded");
        curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($data_string, '&'));
        curl_setopt($ch, CURLOPT_USERPWD, $user . ":" . $password);

        $result = curl_exec($ch);

        $xml = xml2array($result);
        $techXmlRows = $xml['CAPDataSetResult']['Returned_DataSet']['diffgr:diffgram']['StandardEquipement']['SE'];
        $equipArray = [];
        foreach ($techXmlRows as $techXmlRow) {
            if ($techXmlRow['Dc_Description']) {
                $equipArray[$techXmlRow['Dc_Description']][] = $techXmlRow['Do_Description'];
            }
        }
        update_field('standard_equipment', base64_encode(json_encode($equipArray, JSON_HEX_QUOT)), $carId);
        return $equipArray;
    }
}

if (!function_exists('cns_car_technical_data')) {
    function cns_car_technical_data($carId)
    {
        $techData = get_field('tech_data', $carId);

        if (!empty($techData) && strlen($techData) > 10) {
            return json_decode(base64_decode($techData), true);
        }

        $capId = get_field('capid', $carId);

        $url = 'https://soap.cap.co.uk/nvd/capnvd.asmx/GetTechnicalData';

        $user = '99001';
        $password = '990The';

        $data = [
            'SubscriberID' => $user,
            'Password' => $password,
            'capid' => $capId,
            'techDate' => '2019-01-01',
            'justCurrent' => 'true',
            'database' => 'Cars'
        ];

        $data_string = '';
        foreach ($data as $key => $value) {
            $data_string .= $key . '=' . $value . '&';
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HEADER, "application/x-www-form-urlencoded");
        curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($data_string, '&'));
        curl_setopt($ch, CURLOPT_USERPWD, $user . ":" . $password);

        $result = curl_exec($ch);

        $xml = xml2array($result);
        $techXmlRows = $xml['CAPDataSetResult']['Returned_DataSet']['diffgr:diffgram']['TechnicalData']['Tech'];
        $techArray = [];
        foreach ($techXmlRows as $techXmlRow) {
            if ($techXmlRow['Dc_Description']) {
                $techArray[$techXmlRow['Dc_Description']][$techXmlRow['DT_LongDescription']] = $techXmlRow['tech_value_string'];
            }
        }
        update_field('tech_data', base64_encode(json_encode($techArray, JSON_HEX_QUOT)), $carId);
        return $techArray;
    }
}