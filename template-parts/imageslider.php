<?php

global $carmake, $carmodel, $custom, $customerPhotos, $cartype, $carmakename;

?>
<section class="customers">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center customers-overlay">
                <?php
                if (isset($custom['customer_photos'][0]) && $custom['customer_photos'][0] != '') : ?>
                    <h2 class="d-none d-md-block">
                        Happy Customers collecting their used <?php echo $make; ?>
                        <?php
                        echo ($carmake) ? strtoupper($carmake->post_title) : ''; ?>
                        <?php
                        echo ($carmodel) ? strtoupper($carmodel->post_title) : ''; ?>
                    </h2>
                <?php
                elseif (count($customerPhotos) > 0) : ?>
                    <h2 class="d-none d-md-block">
                        Happy Customers collecting their used 
                        <?php
                        echo(isset($cartype) ? strtoupper($cartype) : ''); 
                        echo(isset($carmakename) ? $carmakename : ''); 
                        ?>
                    </h2>
                <?php
                endif;
                ?>
                <h2 class="d-md-none">Happy Customers</h2>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-theme">
        <?php
        if (isset($custom['customer_photos'][0]) && $custom['customer_photos'][0] != '') :
            foreach (unserialize($custom['customer_photos'][0]) as $photo) :
                $photo = get_post($photo);
                ?>
                <div class="item"><img src="<?php
                    echo $photo->guid; ?>" alt="Receiving their new car"/></div>
            <?php
            endforeach;
        elseif (isset($customerPhotos)) :
            foreach ($customerPhotos as $photo) :
                $photo = get_post($photo);
                ?>
                <div class="item"><img src="<?php
                    echo $photo->guid; ?>" alt="Receiving their new car"/></div>
            <?php
            endforeach;
        endif;
        ?>
        <!--@elseif (isset($make_obj))
        @foreach($make_obj as $make_photos)
        @foreach(json_decode($make_photos) as $photo)
        <div class="item"><img src="/storage/{{ $photo }}" alt="Receiving their new car" /></div>
        @endforeach
        @endforeach
        @elseif(isset($customer_photos))
        @foreach($customer_photos as $make_photos)
        @foreach(json_decode($make_photos) as $photo)
        <div class="item"><img src="/storage/{{ $photo }}" alt="Receiving their new car" /></div>
        @endforeach
        @endforeach
        @endif -->
    </div>
</section>