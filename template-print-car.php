<?php

/**
 * The layout for Printable CAr list
 *
 * Template Name: Printable Cars
 * 
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

get_header();

?>

<style>
  .fdry-printable-cars__content-item {
    padding: 15px;
    background-color: #ffffff;
  }

  .fdry-printable-cars__content-item--alt {
    background-color: #e8e8e8;
  }

  .fdry-printable-cars__content-item-grid {
    display: grid;
    grid-template-columns: 1.3fr 1.3fr 0.7fr 0.7fr 0.7fr 0.7fr 0.5fr;
    gap: 15px;
  }

  .fdry-printable-cars__content-item-cell {
    font-size: 14px;
    line-height: 1.4;
  }

  .fdry-printable-cars__content-item-cell h4 {
    margin: 0;
    font-size: 16px;
    font-weight: 600;
  }

  .fdry-printable-cars__content-item-cell p {
    margin: 0;
  }

  .fdry-printable-cars__content-item-image {
    width: 100%;
    height: auto;
    max-width: 100px;
    object-fit: contain;
    display: block;
  }

  .fdry-printable-cars__header {
    display: flex;
    column-gap: 15px;
    align-items: center;
    margin-bottom: 30px;
  }

  .fdry-printable-cars__main {
    margin: 30px 0;
  }

  .fdry-printable-cars__header-date {
    margin-left: auto;
    display: none;
  }

  .pricepromisebutton {
    margin-left: auto;
    position: static;
    padding: 15px 50px;
  }

  .fdry-printable-cars__header-button {
    margin-left: auto;
    display: flex;
    align-items: center;
    column-gap: 15px;
  }

  @media print {

    header.fdry-site-header,
    .fdry-top-hour-banner,
    footer.fdry-footer {
      display: none;
    }

    .fdry-printable-cars__content-item {
      padding: 8px 10px;
    }

    .fdry-printable-cars__header-button {
      display: none;
    }

    .fdry-printable-cars__header-date {
      display: block;
    }

    .fdry-printable-cars__main {
      margin: 0;
    }

    .cky-consent-container.cky-banner-bottom {
      display: none !important;
    }
  }
</style>

<?php
$carsArray = [];
$originalCarsArray = [];
get_template_part('components/getters/car-getter', 'front-page');

$customLogo = get_stylesheet_directory_uri() . "/dist/images/TCUK_WEB.png";
?>

<main class="fdry-printable-cars__main fdry-main">
  <div class="content-block">
    <div class="fdry-printable-cars__header">
      <img src="<?= $customLogo ?>" alt="Trade Centre LOGO" width="140">
      <h4>Trade Centre Available Cars</h4>
      <p class="fdry-printable-cars__header-date">Printed on <?= date('d/m/Y') ?></p>
      <div class="fdry-printable-cars__header-button">
        <div class="sort-group">
          <label for="branch-select">Select Branch:</label>
          <select name="branch-select" id="branch-select">
            <option value="all">All Branches</option>
            <?php
            $branches = array_unique(array_column($carsArray, 'destination'));
            foreach ($branches as $branch_name) {
              echo "<option value='" . esc_attr($branch_name) . "'>" . esc_html($branch_name) . "</option>";
            }
            ?>
          </select>
        </div>
        <a href="#" class="pricepromisebutton" id="printBtn">Print</a>
      </div>
    </div>

    <div class="fdry-printable-cars__content">
      <?php
      $row_count = 0;
      foreach ($carsArray as $car) :
        $row_count++;
      ?>
        <?php $techinfo = cns_car_technical_data($car['car_id']); ?>
        <?php $insurence = "";
        foreach ($techinfo as $categoryName => $data) :
          foreach ($data as $featureTitle => $featureValue) :
            if ($featureValue != "Not Available") {
              if (strpos($featureTitle, "Insurance") !== false) {
                $insurence = $featureValue;
              }
            }
          endforeach;
        endforeach;
        $paintId = get_field('fdry_paint_id', $car['car_id']);

        ?>
        <?php $car['image'] = 'https://cdn-08.imagin.studio/getImage?&customer=gbtradecentregroupplc&tailoring=tradecentre&make=' . $car['make_name'] . '&modelFamily=' . $car['model_name'] . '&modelYear=' . $car['reg_year'] . '&modelRange=' . $car['model_name'] . '&modelVariant=' . $car['body_type'] . '&powerTrain=' . $car['power_train'] . '&bodySize=' . $car['body_size'] . '&trim=' . $car['trim'] . '&paintDescription=' . $paintId . '&rimId=' . $car['rim_id'] . '&rimDescription=' . $car['rim_description'] . '&interiorId=' . $car['interior_id'] . '&interiorDescription=' . $car['interior_description'] . '&fileType=webp&zoomType=fullscreen&zoomLevel=1&width=400&angle=1&safeMode=false&groundPlaneAdjustment=-0.80&countryCode=GB';
        ?>
        <div class="fdry-printable-cars__content-item <?php echo ($row_count % 2 == 0) ? 'fdry-printable-cars__content-item--alt' : ''; ?>">
          <div class="fdry-printable-cars__content-item-grid">
            <div class="fdry-printable-cars__content-item-cell">
              <h5 style="margin-bottom:4px;"><?= $car['title'] ?></h5>
              <p><?= $car['derivative']  ?></p>
            </div>
            <div class="fdry-printable-cars__content-item-cell">

              <p><strong>Cap Retail Price: £<?= $car['cap_price'] ?> </strong></p>
              <p><strong>Trade Centre Price: £<?= $car['discounted_price'] ?> </strong></p>
              <p><strong>Save: <span style="color: #ff0000;">£<?= $car['cap_price'] - $car['discounted_price'] ?></span> </strong></p>
            </div>
            <div class="fdry-printable-cars__content-item-cell">
              <p><strong>&pound;<?= TcFinance::getMonthlyPrice($car['discounted_price']); ?></strong></p>
              <p><strong>Monthly</strong></p>
            </div>
            <div class="fdry-printable-cars__content-item-cell">
              <p><?= $car['mileage'] ?> miles</p>
              <p><?= $insurence ?> Ins. Group</p>

            </div>
            <div class="fdry-printable-cars__content-item-cell">
              <p><?= $car['transmission'] ?></p>
              <p><?= $car['fueltype'] ?></p>
            </div>
            <div class="fdry-printable-cars__content-item-cell">
              <p><?= $car['reg_number'] ?></p>
              <p data-branch-id="<?= esc_attr($car['location']) ?>"><?= get_the_title($car['location']) ?></p>
            </div>
            <div class="fdry-printable-cars__content-item-cell">
              <?php if (!empty($car['image'])) : ?>
                <img src="<?= $car['image'] ?>" alt="<?= $car['title'] ?>" class="fdry-printable-cars__content-item-image">
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php //debug($car) 
        ?>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<script>
  document.getElementById('printBtn').addEventListener('click', function(e) {
    e.preventDefault();
    window.print();
  });

  document.getElementById('branch-select').addEventListener('change', function(e) {
    const selectedBranch = e.target.value;
    const contentContainer = document.querySelector('.fdry-printable-cars__content');
    const items = Array.from(contentContainer.children);
    let visibleCount = 0;

    items.forEach((item) => {
      const branchId = item.querySelector('.fdry-printable-cars__content-item-cell:nth-child(6) p:nth-child(2)').getAttribute('data-branch-id');

      if (selectedBranch === 'all' || branchId === selectedBranch) {
        item.style.display = '';
        // Remove existing alt class
        item.classList.remove('fdry-printable-cars__content-item--alt');
        // Add alt class to even visible rows
        if (visibleCount % 2 === 1) {
          item.classList.add('fdry-printable-cars__content-item--alt');
        }
        visibleCount++;
      } else {
        item.style.display = 'none';
      }
    });
  });
</script>

<?php
get_footer();
