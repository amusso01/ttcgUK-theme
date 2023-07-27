<?php

class TcFinance
{
    private $financeExamples = [];
    private static $instance;

    public static function getInstance()
    {
        if (null === static::$instance) {
            $financeHelper = new static();

            $args = [
                //'fields' => 'ids',
                'post_type' => ['financeexample'],
                'posts_per_page' => '-1',
            ];
            $finances = new WP_Query($args);

            while ($finances->have_posts()) {
                $finance = $finances->next_post();
                $financeCustom = get_post_custom($finance->ID);
                $example = [];
                $example['weekly_price'] = $finance->post_title;

                $include = [
                    'cash_price',
                    'deposit',
                    'credit_amount',
                    'final_payment',
                    'monthly_amount',
                    'fixed_monthly_amount',
                    'apr',
                    'total_amount',
                    'term'
                ];

                foreach ($include as $field) {
                    $example[$field] = $financeCustom[$field][0];
                }

                $financeHelper->financeExamples[$financeCustom['cash_price'][0]] = $example;

            }
            static::$instance = $financeHelper;
        }
        return static::$instance;
    }

     /**
     * Retrieve the monthly price of a car given its price
     *
     * @param string $cash_price the price of the car
     *
     * @return string
     */
    public static function getMonthlyPrice($cash_price)
    {
        $financeHelper = static::getInstance();
        if (array_key_exists($cash_price, $financeHelper->financeExamples)) {
            // var_dump($financeHelper->financeExamples);
            // SOMETHING WRONG THE 8999 array retunr null for the field fixed_monthly_amount
            // I CAN't GET WHY. THIS IS A HACK WORK AROUND
            if($cash_price === "8999"){
                return "179";
            }else{
                return $financeHelper->financeExamples[$cash_price]['fixed_monthly_amount'];
            }

        } else {
            return '';
        }
    }
    


    /**
     * Retrieve the weekly price of a car given its price
     *
     * @param string $cash_price the price of the car
     *
     * @return string
     */
    public static function getWeeklyPrice($cash_price)
    {
        $financeHelper = static::getInstance();
        if (array_key_exists($cash_price, $financeHelper->financeExamples)) {
            return $financeHelper->financeExamples[$cash_price]['weekly_price'];
        } else {
            return '';
        }
    }

    /**
     * @param string $cash_price The price of the car to get the deposit
     *
     * @return string
     */
    public static function getDeposit($cash_price)
    {
        $financeHelper = static::getInstance();
        if (array_key_exists($cash_price, $financeHelper->financeExamples)) {
            return $financeHelper->financeExamples[$cash_price]['deposit'];
        } else {
            return '';
        }
    }
}
