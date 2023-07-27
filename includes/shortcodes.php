<?php


function tcw_search_form()
{
    return'
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                <h2>Search the site</h2>
                <form role="search" method="get" class="search-form form" action="' . esc_url(home_url('/')) . '">
                    <label for="form-search-input" class="sr-only">' . _x('Search for', 'label', 'tcw') . '</label>
                    <div class="input-group">
                        <input type="search" id="form-search-input" class="form-control" placeholder="' . esc_attr_x(
            'Type Something',
            'placeholder',
            'tcw'
        ) . '" value="' . esc_attr(get_search_query()) . '" name="s" title="' . esc_attr_x(
            'Search for:',
            'label',
            'tcw'
        ) . '">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-search"><i
                                        class="fal fa-search searchicon"></i></button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>';
}
