<?php

/**
 * Template Name: Finance Application
 *
 * @package CNS
 * @subpackage TheLoughborough
 * @since 1.0
 * @version 1.0
 */

global $title;
$title = 'Finance Application';

get_header();
?>

<script>
  ! function(t, e) {
    var o, n, p, r;
    e.__SV || (window.posthog = e, e._i = [], e.init = function(i, s, a) {
      function g(t, e) {
        var o = e.split(".");
        2 == o.length && (t = t[o[0]], e = o[1]), t[e] = function() {
          t.push([e].concat(Array.prototype.slice.call(arguments, 0)))
        }
      }(p = t.createElement("script")).type = "text/javascript", p.async = !0, p.src = s.api_host + "/static/array.js", (r = t.getElementsByTagName("script")[0]).parentNode.insertBefore(p, r);
      var u = e;
      for (void 0 !== a ? u = e[a] = [] : a = "posthog", u.people = u.people || [], u.toString = function(t) {
          var e = "posthog";
          return "posthog" !== a && (e += "." + a), t || (e += " (stub)"), e
        }, u.people.toString = function() {
          return u.toString(1) + ".people (stub)"
        }, o = "capture identify alias people.set people.set_once set_config register register_once unregister opt_out_capturing has_opted_out_capturing opt_in_capturing reset isFeatureEnabled onFeatureFlags".split(" "), n = 0; n < o.length; n++) g(u, o[n]);
      e._i.push([i, s, a])
    }, e.__SV = 1)
  }(document, window.posthog || []);
  posthog.init('phc_WzjJ0GppOr9PtsahfYoXrVYNPd2dBWft5cYHcaRdd07', {
    api_host: 'https://eu.posthog.com'
  })
</script>

<style>
  .content-tabs,
  .sticky-mobile-footer,
  section.banner {
    display: none !important;
  }

  body,
  main {
    background: #F8F8F8;
  }

  .apr-finance {
    margin: 40px 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .apr-finance svg {
    width: 230px;
    height: auto;
  }

  .apr-rep-content {
    margin-bottom: 70px;
    background-color: white;
    border: 1px solid #ececec;
    border-radius: 8px;
    padding: 32px;
  }
</style>


<section class="container-fluid | tertiarypage contactus">

  <div class="apr-finance" style>
 <svg height="79.076401" viewBox="0 0 612 79.076401" width="612" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><clipPath id="a"><path d="m0 0h459v59.307h-459z"/></clipPath><clipPath id="b"><path d="m0 59.307h459v-59.307h-459z"/></clipPath><g transform="matrix(1.3333333 0 0 -1.3333333 0 79.0764)"><g clip-path="url(#a)"><path d="m0 0c-15.464 0-28-12.536-28-28v-3.307c0-15.464 12.536-28 28-28h403c15.464 0 28 12.536 28 28v3.307c0 15.464-12.536 28-28 28z" fill="#f2f2f2" transform="translate(28 59.307)"/></g><g clip-path="url(#b)" fill="#3d3d3b"><path d="m0 0c3.01 0 4.54 1.283 4.54 4.737v2.468c0 3.356-1.185 4.737-4.047 4.737h-3.602v-11.942zm-6.958 15.446h7.55c5.478 0 7.797-2.467 7.797-7.846v-2.122c0-3.8-1.234-6.07-3.997-6.958v-.05c2.911-.74 4.046-3.158 4.046-7.204v-6.169c0-1.579.05-2.96.494-4.194h-3.899c-.296.987-.444 1.875-.444 4.194v6.366c0 3.75-1.332 5.034-4.589 5.034h-3.109v-15.594h-3.849z" transform="translate(33.7388 30.566)"/><path d="m0 0h14.163v-3.504h-10.314v-11.251h8.389v-3.503h-8.389v-12.782h10.314v-3.503h-14.163z" transform="translate(46.5664 46.0118)"/><path d="m0 0c2.714 0 3.948 1.234 3.948 4.639v3.404c0 3.406-1.234 4.639-3.948 4.639h-3.701v-12.682zm-7.55 16.186h7.55c5.329 0 7.796-2.813 7.796-8.389v-2.961c0-5.576-2.467-8.339-7.796-8.339h-3.701v-14.854h-3.849z" transform="translate(71.6821 29.8258)"/><path d="m0 0c3.01 0 4.54 1.283 4.54 4.737v2.468c0 3.356-1.185 4.737-4.047 4.737h-3.602v-11.942zm-6.958 15.446h7.55c5.478 0 7.797-2.467 7.797-7.846v-2.122c0-3.8-1.234-6.07-3.997-6.958v-.05c2.911-.74 4.046-3.158 4.046-7.204v-6.169c0-1.579.05-2.96.494-4.194h-3.899c-.296.987-.444 1.875-.444 4.194v6.366c0 3.75-1.332 5.034-4.589 5.034h-3.109v-15.594h-3.849z" transform="translate(89.9878 30.566)"/><path d="m0 0h14.163v-3.504h-10.314v-11.251h8.389v-3.503h-8.389v-12.782h10.314v-3.503h-14.163z" transform="translate(102.8159 46.0118)"/><path d="m0 0v1.924h3.651v-2.22c0-3.109 1.53-4.589 3.997-4.589 2.518 0 4.047 1.48 4.047 4.638 0 3.208-1.332 5.231-5.329 8.537-4.787 3.948-6.366 6.711-6.366 10.61 0 5.181 2.763 8.241 7.748 8.241 4.983 0 7.599-3.06 7.599-8.34v-1.382h-3.652v1.629c0 3.109-1.431 4.589-3.947 4.589-2.468 0-3.948-1.48-3.948-4.491 0-2.861 1.381-4.835 5.477-8.191 4.737-3.948 6.267-6.711 6.267-10.906 0-5.379-2.813-8.438-7.846-8.438s-7.698 3.059-7.698 8.389" transform="translate(119.4927 19.3644)"/><path d="m0 0h14.163v-3.504h-10.314v-11.251h8.389v-3.503h-8.389v-12.782h10.314v-3.503h-14.163z" transform="translate(138.6865 46.0118)"/><path d="m0 0h4.935l7.796-24.674v24.674h3.504v-34.543h-3.997l-8.735 28.079v-28.079h-3.503z" transform="translate(156.2519 46.0118)"/><path d="m0 0h-6.119v3.504h16.087v-3.504h-6.119v-31.039h-3.849z" transform="translate(181.8115 42.5079)"/><path d="m0 0-3.455 19.442-3.355-19.442zm.592-3.356h-7.994l-1.283-7.352h-3.603l6.415 34.542h5.182l6.464-34.542h-3.898z" transform="translate(203.0298 22.1774)"/><path d="m0 0h-6.119v3.504h16.087v-3.504h-6.119v-31.039h-3.849z" transform="translate(213.9345 42.5079)"/><path d="m227.059 46.012h3.849v-34.543h-3.849z"/><path d="m0 0h3.898l4.984-29.312 4.984 29.312h3.553l-6.119-34.543h-5.132z" transform="translate(234.1142 46.0118)"/><path d="m0 0h14.163v-3.504h-10.313v-11.251h8.388v-3.503h-8.388v-12.782h10.313v-3.503h-14.163z" transform="translate(254.7383 46.0118)"/><path d="m0 0-3.454 19.442-3.356-19.442zm.593-3.356h-7.994l-1.284-7.352h-3.602l6.415 34.542h5.182l6.463-34.542h-3.897z" transform="translate(291.1045 22.1774)"/><path d="m0 0c2.714 0 3.947 1.234 3.947 4.639v3.404c0 3.406-1.233 4.639-3.947 4.639h-3.701v-12.682zm-7.55 16.186h7.55c5.329 0 7.797-2.813 7.797-8.389v-2.961c0-5.576-2.468-8.339-7.797-8.339h-3.701v-14.854h-3.849z" transform="translate(307.6338 29.8258)"/><path d="m0 0c3.011 0 4.54 1.283 4.54 4.737v2.468c0 3.356-1.184 4.737-4.046 4.737h-3.602v-11.942zm-6.957 15.446h7.55c5.477 0 7.797-2.467 7.797-7.846v-2.122c0-3.8-1.235-6.07-3.997-6.958v-.05c2.911-.74 4.045-3.158 4.045-7.204v-6.169c0-1.579.05-2.96.495-4.194h-3.899c-.297.987-.444 1.875-.444 4.194v6.366c0 3.75-1.333 5.034-4.59 5.034h-3.108v-15.594h-3.849z" transform="translate(325.9394 30.566)"/><path d="m0 0h-5.675v3.849c4.589 0 6.217.987 7.451 4.343h3.652v-34.543h-5.428z" transform="translate(351.0049 37.8199)"/><path d="m0 0v2.813h5.132v-3.06c0-2.467 1.086-3.404 2.812-3.404 1.728 0 2.813.838 2.813 3.898v2.813c0 3.207-1.085 4.392-3.553 4.392h-1.825v4.934h1.974c2.023 0 3.256.888 3.256 3.652v2.517c0 2.467-1.134 3.454-2.713 3.454-1.58 0-2.617-.938-2.617-3.208v-2.27h-5.132v1.826c0 5.527 2.764 8.586 7.946 8.586 5.181 0 7.944-3.009 7.944-8.536v-1.234c0-3.701-1.183-5.971-3.849-6.958v-.099c2.912-1.085 3.998-3.602 3.998-7.106v-3.059c0-5.527-2.764-8.537-8.093-8.537-5.33 0-8.093 3.059-8.093 8.586" transform="translate(359.7861 19.5616)"/><path d="m379.474 16.897h5.428v-5.428h-5.428z"/><path d="m0 0v6.119c0 2.27-.937 3.356-2.813 3.356-1.875 0-2.813-1.086-2.813-3.356v-6.119c0-2.319.938-3.405 2.813-3.405 1.876 0 2.813 1.086 2.813 3.405m-10.955-12.436v.642h5.132v-.987c0-2.467 1.086-3.405 2.812-3.405 1.925 0 3.011.938 3.011 4.244v6.612c-1.086-2.023-2.764-3.009-5.033-3.009-3.997 0-6.021 2.812-6.021 7.895v6.168c0 5.527 2.911 8.685 8.241 8.685s8.241-3.158 8.241-8.685v-17.863c0-5.823-2.664-8.982-8.29-8.982-5.329 0-8.093 3.159-8.093 8.685" transform="translate(399.458 32.0958)"/><path d="m0 0v9.129c0 1.53-.691 2.171-1.776 2.171-1.136 0-1.778-.641-1.778-2.171v-9.129c0-1.53.642-2.171 1.778-2.171 1.085 0 1.776.641 1.776 2.171m-7.008.247v8.635c0 3.554 1.826 5.527 5.232 5.527 3.404 0 5.23-1.973 5.23-5.527v-8.635c0-3.553-1.826-5.527-5.23-5.527-3.406 0-5.232 1.974-5.232 5.527m2.615 29.509h3.456l-13.374-34.543h-3.455zm-10.756-13.916v9.13c0 1.53-.692 2.171-1.778 2.171-1.135 0-1.776-.641-1.776-2.171v-9.13c0-1.529.641-2.171 1.776-2.171 1.086 0 1.778.642 1.778 2.171m-7.008.247v8.636c0 3.553 1.826 5.527 5.23 5.527 3.406 0 5.232-1.974 5.232-5.527v-8.636c0-3.553-1.826-5.527-5.232-5.527-3.404 0-5.23 1.974-5.23 5.527" transform="translate(429.706 16.2555)"/></g></g></svg>
  </div>

  <form id="form" novalidate="novalidate">
    <div class="settings-cont">
      <a href="#" class="outer-link theme-switch">A</a>
      <a href="#" class="outer-link header-switch">C</a>
    </div>
    <div class="container st-cont">
      <h1 class="fnt-medium title">Free Finance Check</h1>
      <span class="fnt-medium">Takes just 30 seconds! Save time and buy with confidence by checking your eligibility to select a car.</span>
      <br id="header-spacing" />

      <div class="progress">
        <div class="progress-bar bg-success" role="progressbar" style="width: 12.5%" aria-valuenow="12.5" aria-valuemin="0" aria-valuemax="100"></div>
      </div>

      <div class="st-step active">
        <div class="st-card">
          <h1>About You</h1>
          <div class="form-group">
            <label class="st-label" for="title">Title</label>
            <select class="form-control form-select" id="title">
              <option value=""></option>
              <option value="Mr">Mr</option>
              <option value="Mrs">Mrs</option>
              <option value="Ms">Ms</option>
              <option value="Miss">Miss</option>
            </select>
          </div>
          <div class="form-group">
            <label class="st-label" for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" placeholder="">
          </div>
          <div class="form-group st-dob-cont">
            <label class="st-label" for="dob">Date of Birth</label>
            <div class="row">
              <div class="col-4">
                <select class="form-control form-select st-dob dob-d">
                  <option value="">Day</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
              </div>
              <div class="col-4">
                <select class="form-control form-select st-dob dob-m">
                  <option value="">Month</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="col-4">
                <select class="form-control form-select st-dob dob-y">
                  <option value="">Year</option>
                  <option value="2006">2006</option>
                  <option value="2005">2005</option>
                  <option value="2004">2004</option>
                  <option value="2003">2003</option>
                  <option value="2002">2002</option>
                  <option value="2001">2001</option>
                  <option value="2000">2000</option>
                  <option value="1999">1999</option>
                  <option value="1998">1998</option>
                  <option value="1997">1997</option>
                  <option value="1996">1996</option>
                  <option value="1995">1995</option>
                  <option value="1994">1994</option>
                  <option value="1993">1993</option>
                  <option value="1992">1992</option>
                  <option value="1991">1991</option>
                  <option value="1990">1990</option>
                  <option value="1989">1989</option>
                  <option value="1988">1988</option>
                  <option value="1987">1987</option>
                  <option value="1986">1986</option>
                  <option value="1985">1985</option>
                  <option value="1984">1984</option>
                  <option value="1983">1983</option>
                  <option value="1982">1982</option>
                  <option value="1981">1981</option>
                  <option value="1980">1980</option>
                  <option value="1979">1979</option>
                  <option value="1978">1978</option>
                  <option value="1977">1977</option>
                  <option value="1976">1976</option>
                  <option value="1975">1975</option>
                  <option value="1974">1974</option>
                  <option value="1973">1973</option>
                  <option value="1972">1972</option>
                  <option value="1971">1971</option>
                  <option value="1970">1970</option>
                  <option value="1969">1969</option>
                  <option value="1968">1968</option>
                  <option value="1967">1967</option>
                  <option value="1966">1966</option>
                  <option value="1965">1965</option>
                  <option value="1964">1964</option>
                  <option value="1963">1963</option>
                  <option value="1962">1962</option>
                  <option value="1961">1961</option>
                  <option value="1960">1960</option>
                  <option value="1959">1959</option>
                  <option value="1958">1958</option>
                  <option value="1957">1957</option>
                  <option value="1956">1956</option>
                  <option value="1955">1955</option>
                  <option value="1954">1954</option>
                  <option value="1953">1953</option>
                  <option value="1952">1952</option>
                  <option value="1951">1951</option>
                  <option value="1950">1950</option>
                  <option value="1949">1949</option>
                  <option value="1948">1948</option>
                  <option value="1947">1947</option>
                  <option value="1946">1946</option>
                  <option value="1945">1945</option>
                  <option value="1944">1944</option>
                  <option value="1943">1943</option>
                </select>
              </div>
            </div>
            <label class="st-label status-lbl error-lbl"></label>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step">
        <div class="st-card">
          <h1>Where You Live</h1>
          <div class="form-group">
            <label class="st-label">Have you been resident in the UK for the last 3 years?</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="resident_uk_y" aria-required="true" type="radio" name="resident_uk" class="checkbin" checked>
                <label date-check="1" for="resident_uk_y" tabindex="0">Yes</label>
              </div>
              <div class="nontextual">
                <input id="resident_uk_n" aria-required="true" type="radio" name="resident_uk" class="checkbin">
                <label date-check="1" for="resident_uk_n" tabindex="0">No</label>
              </div>
            </div>
          </div>
          <!-- <div class="form-group">
            <label class="st-label" for="address">Current Address</label>
            <input type="text" class="form-control" id="address" placeholder="">
          </div> -->

          <div class="form-group address-lookup" id="address">
            <label class="st-label" for="address">Current Address</label>
            <div class="btn-group" style="display:flex;">
              <input type="text" name="search" class="form-control address-lookup-inp" placeholder="Type your postcode">
              <button class="btn btn-success search">
                <img src="https://tcg-creditapp.53dnorth.com/assets/img/search-solid.png" alt="Search" />
              </button>
              <button class="btn btn-secondary clear">
                <img src="https://tcg-creditapp.53dnorth.com/assets/img/eraser-solid.png" alt="Erased" />
              </button>
            </div>
            <div class="error errorMessage"></div>
            <div class="result"></div>
            <div class="outputArea">
            </div>
          </div>

          <div class="form-group addr-field d-none">
            <label class="st-label" for="address1">Address Line 1</label>
            <input type="text" class="form-control" id="address1" placeholder="">
          </div>
          <div class="form-group addr-field d-none">
            <label class="st-label" for="city">City</label>
            <input type="text" class="form-control" id="city" placeholder="">
          </div>
          <div class="form-group addr-field d-none">
            <label class="st-label" for="postcode">Postcode</label>
            <input type="text" class="form-control" id="postcode" placeholder="">
          </div>

          <div class="form-group">
            <label class="st-label" for="addr_time">How long have you lived here? (Years / Months)</label>
            <div class="row">
              <div class="col-6 col-xs-6 col-md-4">
                <!-- <input type="text" class="form-control" id="addr_years" placeholder="Years"> -->
                <select class="form-control form-select" id="addr_years">
                  <option value="">Years</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                </select>
              </div>
              <div class="col-6 col-xs-6 col-md-4">
                <!-- <input type="text" class="form-control" id="addr_months" placeholder="Months"> -->
                <select class="form-control form-select" id="addr_months">
                  <option value="">Months</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label" for="accommodation_type">Residential Status</label>
            <select class="form-control form-select" id="accommodation_type">
              <option value=""></option>
              <option value="1" selected="selected">Home Owner</option>
              <option value="2">Co-Home Owner</option>
              <option value="3">Council Tenant</option>
              <option value="4">Housing Association</option>
              <option value="5">Living With Parents</option>
              <option value="6">Private Tenant</option>
            </select>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step">
        <div class="st-card">
          <h1>Job and Salary</h1>
          <div class="form-group">
            <label class="st-label" for="employment_type">Employment Type</label>
            <select class="form-control form-select" id="employment_type">
              <option value=""></option>
              <option value="full_time">Full Time</option>
              <option value="part_time">Part Time</option>
              <option value="sub_contractor">Sub Contractor</option>
              <option value="self_employed">Self Employed</option>
              <option value="retired">Retired</option>
              <option value="student">Student</option>
              <option value="unemployed">Unemployed</option>
            </select>
          </div>
          <div class="form-group">
            <label class="st-label" for="employment_time">How Long have you been with your current employer?</label>
            <div class="row">
              <div class="col-6 col-xs-6 col-md-4">
                <!-- <input type="text" class="form-control" id="employment_years" placeholder="Years"> -->
                <select class="form-control form-select" id="employment_years">
                  <option value="">Years</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                </select>
              </div>
              <div class="col-6 col-xs-6 col-md-4">
                <!-- <input type="text" class="form-control" id="employment_months" placeholder="Months"> -->
                <select class="form-control form-select" id="employment_months">
                  <option value="">Months</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label" for="employment_title">Job Title</label>
            <input type="text" class="form-control" id="employment_title" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="employment_monthly_income">Monthly Net Income (include any benefits
              received)</label>
            <div class="input-prefix">
              <input type="number" class="form-control" id="employment_monthly_income" placeholder="">
              <div class="prefix">£</div>
            </div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step" id="terms">
        <div class="st-card">
          <h1>Contact Details</h1>
          <div class="form-group">
            <label class="st-label" for="email">Email Address</label>
            <input type="email" class="form-control required d8val_email" id="email" placeholder="">
            <label class="st-label status-lbl error-lbl"></label>
          </div>
          <div class="form-group">
            <label class="st-label" for="mobile_number">Mobile Number (we will send you a verification code)</label>
            <input type="tel" class="form-control required d8val_phone" id="mobile_number" placeholder="">
            <label class="st-label status-lbl error-lbl"></label>
          </div>
          <h1>Terms &amp; Conditions</h1>
          <div class="form-group">
            <label class="st-label">I agree to receive other E-Mail communications from The Trade Centre Group</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="terms_agree_y" aria-required="true" type="checkbox" name="terms_agree" class="checkbin" checked="checked">
                <label date-check="1" for="terms_agree_y" tabindex="0">Yes</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label" id="lbl-pre-app-terms">I agree to allow The Trade Centre Group to store and process my personal data and have read and agree to the terms & conditions above *</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="terms_agree2_y" aria-required="true" type="checkbox" name="terms_agree2" class="checkbin">
                <label date-check="1" for="terms_agree2_y" tabindex="0">Yes</label>
              </div>
              <!-- <div class="nontextual">
                <input
                  id="terms_agree2_n" aria-required="true" type="radio" name="terms_agree2"
                  class="checkbin">
                <label date-check="1" for="terms_agree2_n" tabindex="0">No</label>
              </div> -->
            </div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <div>
            <button class="btn btn-success" id="btn-check-el" disabled="disabled">Check Eligibility Now</button>
            <label class="st-label text-center d-none" style="width:251px;">This won't affect your credit score</label>
          </div>
        </div>
      </div>

      <!-- SILVER FLOW -->
      <div class="st-step silver silver-about">
        <div class="st-card">
          <h1>Please reconfirm your name and date of birth</h1>
          <div class="form-group">
            <label class="st-label" for="title">Title</label>
            <select class="form-control form-select" id="sil_title">
              <option value=""></option>
              <option value="Mr">Mr</option>
              <option value="Mrs">Mrs</option>
              <option value="Ms">Ms</option>
              <option value="Miss">Miss</option>
            </select>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_firstname">First Name</label>
            <input type="text" class="form-control" id="sil_firstname" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_middlename">Middle Name</label>
            <input type="text" class="form-control not-req" id="sil_middlename" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_lastname">Last Name</label>
            <input type="text" class="form-control" id="sil_lastname" placeholder="">
          </div>
          <div class="form-group st-dob-cont">
            <label class="st-label" for="sil_dob">Date of Birth</label>
            <div class="row">
              <div class="col-4">
                <select class="form-control form-select st-dob dob-d">
                  <option value="">Day</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
              </div>
              <div class="col-4">
                <select class="form-control form-select st-dob dob-m">
                  <option value="">Month</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <div class="col-4">
                <select class="form-control form-select st-dob dob-y">
                  <option value="">Year</option>
                  <option value="2006">2006</option>
                  <option value="2005">2005</option>
                  <option value="2004">2004</option>
                  <option value="2003">2003</option>
                  <option value="2002">2002</option>
                  <option value="2001">2001</option>
                  <option value="2000">2000</option>
                  <option value="1999">1999</option>
                  <option value="1998">1998</option>
                  <option value="1997">1997</option>
                  <option value="1996">1996</option>
                  <option value="1995">1995</option>
                  <option value="1994">1994</option>
                  <option value="1993">1993</option>
                  <option value="1992">1992</option>
                  <option value="1991">1991</option>
                  <option value="1990">1990</option>
                  <option value="1989">1989</option>
                  <option value="1988">1988</option>
                  <option value="1987">1987</option>
                  <option value="1986">1986</option>
                  <option value="1985">1985</option>
                  <option value="1984">1984</option>
                  <option value="1983">1983</option>
                  <option value="1982">1982</option>
                  <option value="1981">1981</option>
                  <option value="1980">1980</option>
                  <option value="1979">1979</option>
                  <option value="1978">1978</option>
                  <option value="1977">1977</option>
                  <option value="1976">1976</option>
                  <option value="1975">1975</option>
                  <option value="1974">1974</option>
                  <option value="1973">1973</option>
                  <option value="1972">1972</option>
                  <option value="1971">1971</option>
                  <option value="1970">1970</option>
                  <option value="1969">1969</option>
                  <option value="1968">1968</option>
                  <option value="1967">1967</option>
                  <option value="1966">1966</option>
                  <option value="1965">1965</option>
                  <option value="1964">1964</option>
                  <option value="1963">1963</option>
                  <option value="1962">1962</option>
                  <option value="1961">1961</option>
                  <option value="1960">1960</option>
                  <option value="1959">1959</option>
                  <option value="1958">1958</option>
                  <option value="1957">1957</option>
                  <option value="1956">1956</option>
                  <option value="1955">1955</option>
                  <option value="1954">1954</option>
                  <option value="1953">1953</option>
                  <option value="1952">1952</option>
                  <option value="1951">1951</option>
                  <option value="1950">1950</option>
                  <option value="1949">1949</option>
                  <option value="1948">1948</option>
                  <option value="1947">1947</option>
                  <option value="1946">1946</option>
                  <option value="1945">1945</option>
                  <option value="1944">1944</option>
                  <option value="1943">1943</option>
                </select>
              </div>
            </div>
            <label class="st-label status-lbl error-lbl"></label>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step silver silver-licence">
        <div class="st-card">
          <h1>Driving Licence and Identity Check</h1>
          <div class="form-group">
            <label class="st-label" for="sil_license_type">Driving Licence type</label>
            <select class="form-control form-select" id="sil_license_type">
              <option value="full-uk">Full-UK</option>
              <option value="full-none">Full-None UK</option>
              <option value="provisional">Provisional</option>
              <option value="none">None</option>
            </select>
          </div>
          <div class="form-group" id="sil_license_confirm">
            <label class="st-label">Please reconfirm you can provide a utility bill in your name dated within the last 3 months; Gas, Water or Electricity, if none… of these are in your name it could be any form of official bill in your name dated within the last 3 months, mobile phone bill, bank statement</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="sil_license_confirm_y" aria-required="true" type="radio" name="sil_license_confirm" class="checkbin">
                <label date-check="1" for="sil_license_confirm_y" tabindex="0">Yes</label>
              </div>
              <div class="nontextual">
                <input id="sil_license_confirm_n" aria-required="true" type="radio" name="sil_license_confirm" class="checkbin">
                <label date-check="1" for="sil_license_confirm_n" tabindex="0">No</label>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-addr-next">Continue</button>
        </div>
      </div>

      <div class="st-step silver">
        <div class="st-card">
          <h1>Provide 3 years address information</h1>
          <div class="form-group" id="sil_resident_uk_cont">
            <label class="st-label">Have you been resident in the UK for the last 3 years?</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="sil_resident_uk_y" aria-required="true" type="radio" name="resident_uk" class="checkbin" checked="checked">
                <label date-check="1" for="sil_resident_uk_y" tabindex="0">Yes</label>
              </div>
              <div class="nontextual">
                <input id="sil_resident_uk_n" aria-required="true" type="radio" name="resident_uk" class="checkbin">
                <label date-check="1" for="sil_resident_uk_n" tabindex="0">No</label>
              </div>
            </div>
          </div>
          <div class="form-group address-lookup" id="sil_address">
            <label class="st-label" for="address">Current Address</label>
            <div class="btn-group" style="display:flex;">
              <input type="text" name="search" class="form-control address-lookup-inp" placeholder="Type your postcode">
              <button class="btn btn-success search">
                <img src="https://tcg-creditapp.53dnorth.com/assets/img/search-solid.png" alt="Search" />
              </button>
              <button class="btn btn-secondary clear">
                <img src="https://tcg-creditapp.53dnorth.com/assets/img/eraser-solid.png" alt="Erased" />
              </button>
            </div>
            <div class="error errorMessage"></div>
            <div class="result"></div>
            <div class="outputArea">
            </div>
          </div>

          <div class="form-group addr-field d-none">
            <label class="st-label" for="sil_address1">Address Line 1</label>
            <input type="text" class="form-control" id="sil_address1" placeholder="">
          </div>
          <div class="form-group addr-field d-none">
            <label class="st-label" for="sil_city">City</label>
            <input type="text" class="form-control" id="sil_city" placeholder="">
          </div>
          <div class="form-group addr-field d-none">
            <label class="st-label" for="sil_postcode">Postcode</label>
            <input type="text" class="form-control" id="sil_postcode" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_accommodation_type">Residential Status</label>
            <select class="form-control form-select" id="sil_accommodation_type">
              <option value=""></option>
              <option value="1" selected="selected">Home Owner</option>
              <option value="2">Co-Home Owner</option>
              <option value="3">Council Tenant</option>
              <option value="4">Housing Association</option>
              <option value="5">Living With Parents</option>
              <option value="6">Private Tenant</option>
            </select>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_addr_time">How long have you lived here? (Years / Months)</label>
            <div class="row">
              <div class="col-6 col-xs-6 col-md-4">
                <select class="form-control form-select" id="sil_addr_years">
                  <option value="">Years</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                </select>
              </div>
              <div class="col-6 col-xs-6 col-md-4">
                <select class="form-control form-select" id="sil_addr_months">
                  <option value="">Months</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                </select>
              </div>
            </div>
          </div>
          <div class="d-none" id="pre_addr">
            <div class="form-group address-lookup" id="sil_prev_address">
              <label class="st-label" for="address">Previous Address</label>
              <div class="btn-group" style="display:flex;">
                <input type="text" name="search" class="form-control address-lookup-inp" placeholder="Type your postcode">
                <button class="btn btn-success search">
                  <img src="https://tcg-creditapp.53dnorth.com/assets/img/search-solid.png" alt="Search" />
                </button>
                <button class="btn btn-secondary clear">
                  <img src="https://tcg-creditapp.53dnorth.com/assets/img/eraser-solid.png" alt="Erased" />
                </button>
              </div>
              <div class="error errorMessage"></div>
              <div class="result"></div>
              <div class="outputArea">
              </div>
            </div>
            <div class="form-group addr-field d-none">
              <label class="st-label" for="sil_prev_address1">Previous Address Line 1</label>
              <input type="text" class="form-control" id="sil_prev_address1" placeholder="">
            </div>
            <div class="form-group addr-field d-none">
              <label class="st-label" for="sil_prev_city">Previous City</label>
              <input type="text" class="form-control" id="sil_prev_city" placeholder="">
            </div>
            <div class="form-group addr-field d-none">
              <label class="st-label" for="sil_prev_postcode">Previous Postcode</label>
              <input type="text" class="form-control" id="sil_prev_postcode" placeholder="">
            </div>
            <div class="form-group">
              <label class="st-label" for="sil_prev_accommodation_type">Previous Residential Status</label>
              <select class="form-control form-select" id="sil_prev_accommodation_type">
                <option value=""></option>
                <option value="1" selected="selected">Home Owner</option>
                <option value="2">Co-Home Owner</option>
                <option value="3">Council Tenant</option>
                <option value="4">Housing Association</option>
                <option value="5">Living With Parents</option>
                <option value="6">Private Tenant</option>
              </select>
            </div>
            <div class="form-group">
              <label class="st-label" for="sil_prev_addr_time">How long have you lived here? (Years / Months)</label>
              <div class="row">
                <div class="col-4 col-xs-6">
                  <select class="form-control form-select" id="sil_prev_addr_years">
                    <option value="">Years</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <div class="col-4 col-xs-6">
                  <select class="form-control form-select" id="sil_prev_addr_months">
                    <option value="">Months</option>
                    <option value="0">00</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-addr-next">Continue</button>
        </div>
      </div>

      <div class="st-step silver">
        <div class="st-card">
          <h1>Provide 3 years employment information</h1>
          <div class="form-group">
            <label class="st-label" for="sil_employment_type">Current Employment Type</label>
            <select class="form-control form-select" id="sil_employment_type">
              <option value=""></option>
              <option value="full_time">Full Time</option>
              <option value="part_time">Part Time</option>
              <option value="sub_contractor">Sub Contractor</option>
              <option value="self_employed">Self Employed</option>
              <option value="retired">Retired</option>
              <option value="student">Student</option>
              <option value="unemployed">Unemployed</option>
            </select>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_employment_time">How Long have you been with your current employer?</label>
            <div class="row">
              <div class="col-6 col-xs-6 col-md-4">
                <!-- <input type="text" class="form-control" id="employment_years" placeholder="Years"> -->
                <select class="form-control form-select" id="sil_employment_years">
                  <option value="">Years</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                </select>
              </div>
              <div class="col-6 col-xs-6 col-md-4">
                <!-- <input type="text" class="form-control" id="employment_months" placeholder="Months"> -->
                <select class="form-control form-select" id="sil_employment_months">
                  <option value="">Months</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_employment_title">Current Job Title</label>
            <input type="text" class="form-control" id="sil_employment_title" placeholder="">
          </div>
          <div class="form-group sil-employer d-none">
            <label class="st-label" for="sil_employment_name">Employer Name</label>
            <input type="text" class="form-control" id="sil_employment_name" placeholder="">
          </div>
          <div class="form-group address-lookup sil-employer d-none" id="sil_employment_address">
            <label class="st-label" for="address">Employer Address</label>
            <div class="btn-group" style="display:flex;">
              <input type="text" name="search" class="form-control address-lookup-inp" placeholder="Type your postcode">
              <button class="btn btn-success search">
                <img src="https://tcg-creditapp.53dnorth.com/assets/img/search-solid.png" alt="Search" />
              </button>
              <button class="btn btn-secondary clear">
                <img src="https://tcg-creditapp.53dnorth.com/assets/img/eraser-solid.png" alt="Erased" />
              </button>
            </div>
            <div class="error errorMessage"></div>
            <div class="result"></div>
            <div class="outputArea">
            </div>
          </div>
          <div class="form-group sil-employer d-none">
            <label class="st-label" for="sil_employment_phone">Employer Phone Number (we never call them)</label>
            <input type="text" class="form-control" id="sil_employment_phone" placeholder="">
          </div>
          <div class="d-none" id="pre_emp">
            <div class="form-group">
              <label class="st-label" for="sil_prev_employment_type">Previous Employment Type</label>
              <select class="form-control form-select" id="sil_prev_employment_type">
                <option value=""></option>
                <option value="full_time">Full Time</option>
                <option value="part_time">Part Time</option>
                <option value="sub_contractor">Sub Contractor</option>
                <option value="self_employed">Self Employed</option>
                <option value="retired">Retired</option>
                <option value="student">Student</option>
                <option value="unemployed">Unemployed</option>
              </select>
            </div>
            <div class="form-group">
              <label class="st-label" for="sil_prev_employment_years">How Long have you been with your previous employer?</label>
              <div class="row">
                <div class="col-6 col-xs-6 col-md-4">
                  <select class="form-control form-select" id="sil_prev_employment_years">
                    <option value="">Years</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <div class="col-6 col-xs-6 col-md-4">
                  <select class="form-control form-select" id="sil_prev_employment_months">
                    <option value="">Months</option>
                    <option value="0">00</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="st-label" for="sil_prev_employment_title">Previous Job Title</label>
              <input type="text" class="form-control" id="sil_prev_employment_title" placeholder="">
            </div>
            <div class="form-group sil-prev-employer d-none">
              <label class="st-label" for="sil_prev_employment_name">Previous Employer Name</label>
              <input type="text" class="form-control" id="sil_prev_employment_name" placeholder="">
            </div>
            <div class="form-group address-lookup sil-prev-employer d-none" id="sil_prev_employment_address">
              <label class="st-label" for="address">Previous Employer Address</label>
              <div class="btn-group" style="display:flex;">
                <input type="text" name="search" class="form-control address-lookup-inp" placeholder="Type your postcode">
                <button class="btn btn-success search">
                  <img src="https://tcg-creditapp.53dnorth.com/assets/img/search-solid.png" alt="Search" />
                </button>
                <button class="btn btn-secondary clear">
                  <img src="https://tcg-creditapp.53dnorth.com/assets/img/eraser-solid.png" alt="Erased" />
                </button>
              </div>
              <div class="error errorMessage"></div>
              <div class="result"></div>
              <div class="outputArea">
              </div>
            </div>
            <!-- <div class="form-group sil-prev-employer d-none">
              <label class="st-label" for="sil_prev_employment_phone">Previous Employer Phone Number (we never call them)</label>
              <input type="text" class="form-control" id="sil_prev_employment_phone" placeholder="">
            </div> -->
          </div>
          <div class="d-none" id="pre_emp2">
            <div class="form-group">
              <label class="st-label" for="sil_prev2_employment_type">Previous Employment Type</label>
              <select class="form-control form-select" id="sil_prev2_employment_type">
                <option value=""></option>
                <option value="full_time">Full Time</option>
                <option value="part_time">Part Time</option>
                <option value="sub_contractor">Sub Contractor</option>
                <option value="self_employed">Self Employed</option>
                <option value="retired">Retired</option>
                <option value="student">Student</option>
                <option value="unemployed">Unemployed</option>
              </select>
            </div>
            <div class="form-group">
              <label class="st-label" for="sil_prev2_employment_years">How Long have you been with your previous employer?</label>
              <div class="row">
                <div class="col-6 col-xs-6 col-md-4">
                  <select class="form-control form-select" id="sil_prev2_employment_years">
                    <option value="">Years</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                  </select>
                </div>
                <div class="col-6 col-xs-6 col-md-4">
                  <select class="form-control form-select" id="sil_prev2_employment_months">
                    <option value="">Months</option>
                    <option value="0">00</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="st-label" for="sil_prev_employment_title">Previous Job Title</label>
              <input type="text" class="form-control" id="sil_prev2_employment_title" placeholder="">
            </div>
            <div class="form-group sil-prev-employer2 d-none">
              <label class="st-label" for="sil_prev_employment_name">Previous Employer Name</label>
              <input type="text" class="form-control" id="sil_prev2_employment_name" placeholder="">
            </div>
            <div class="form-group address-lookup sil-prev-employer2 d-none" id="sil_prev2_employment_address">
              <label class="st-label" for="address">Previous Employer Address</label>
              <div class="btn-group" style="display:flex;">
                <input type="text" name="search" class="form-control address-lookup-inp" placeholder="Type your postcode">
                <button class="btn btn-success search">
                  <img src="https://tcg-creditapp.53dnorth.com/assets/img/search-solid.png" alt="Search" />
                </button>
                <button class="btn btn-secondary clear">
                  <img src="https://tcg-creditapp.53dnorth.com/assets/img/eraser-solid.png" alt="Erased" />
                </button>
              </div>
              <div class="error errorMessage"></div>
              <div class="result"></div>
              <div class="outputArea">
              </div>
            </div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step silver">
        <div class="st-card">
          <h1>Provide details of your income and any benefits</h1>
          <div class="form-group">
            <label class="st-label" for="sil_employment_monthly_income">Monthly Net Income</label>
            <div class="input-prefix">
              <input type="number" class="form-control" id="sil_employment_monthly_income" placeholder="">
              <div class="prefix">£</div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_employment_monthly_benefits">Monthly Net Benefits</label>
            <div class="input-prefix">
              <input type="number" class="form-control" id="sil_employment_monthly_benefits" placeholder="">
              <div class="prefix">£</div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_total_income">Monthly Total Income</label>
            <div class="input-prefix">
              <input type="number" class="form-control" id="sil_total_income" placeholder="" readonly>
              <div class="prefix">£</div>
            </div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step silver">
        <div class="st-card">
          <h1>Please confirm your bank details - <b>No payment will be taken</b></h1>
          <div class="form-group">
            <label class="st-label" for="bank_sort_code">Sort Code</label>
            <div class="row">
              <div class="col-4">
                <input type="number" class="form-control bank-sort" id="bank_sort1" placeholder="00" maxlength="2">
              </div>
              <div class="col-4">
                <input type="number" class="form-control bank-sort" id="bank_sort2" placeholder="00" maxlength="2">
              </div>
              <div class="col-4">
                <input type="number" class="form-control bank-sort" id="bank_sort3" placeholder="00" maxlength="2">
              </div>
            </div>
            <input type="hidden" class="form-control" id="bank_sort_code" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="bank_account_number">Account Number</label>
            <input type="number" class="form-control" id="bank_account_number" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="bank_account_name">Account Holder Name</label>
            <input type="text" class="form-control" id="bank_account_name" placeholder="">
          </div>
          <div class="form-group">
            <label class="st-label" for="bank_time_years">Time with Bank</label>
            <div class="row">
              <div class="col-6 col-xs-6 col-md-4">
                <select class="form-control form-select" id="bank_time_years">
                  <option value="">Years</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                </select>
              </div>
              <div class="col-6 col-xs-6 col-md-4">
                <select class="form-control form-select" id="bank_time_months">
                  <option value="">Months</option>
                  <option value="0">00</option>
                  <option value="1">01</option>
                  <option value="2">02</option>
                  <option value="3">03</option>
                  <option value="4">04</option>
                  <option value="5">05</option>
                  <option value="6">06</option>
                  <option value="7">07</option>
                  <option value="8">08</option>
                  <option value="9">09</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group text-center">
            <button class="btn btn-success" style="display: inline-block;" id="btn-banking-check">Check Details</button>
          </div>
          <div class="row mt-3" id="bank-check-resp"></div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step silver" id="terms">
        <div class="st-card">
          <h1>Please reconfirm your email and mobile contact details plus provide a landline number if applicable</h1>
          <div class="form-group">
            <label class="st-label" for="sil_email">Email Address</label>
            <input type="email" class="form-control required d8val_email" id="sil_email" placeholder="">
            <label class="st-label status-lbl error-lbl"></label>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_landline_number">Landline Number</label>
            <input type="tel" class="form-control required d8val_phone" id="sil_landline_number" placeholder="">
            <label class="st-label status-lbl error-lbl"></label>
          </div>
          <div class="form-group">
            <label class="st-label" for="sil_mobile_number">Mobile Number (we will send you a verification code)</label>
            <input type="tel" class="form-control required d8val_phone" id="sil_mobile_number" placeholder="">
            <label class="st-label status-lbl error-lbl"></label>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <button class="btn btn-success btn-next">Continue</button>
        </div>
      </div>

      <div class="st-step silver">
        <div class="st-card">
          <h1>We will be processing your application with our panel of lenders</h1>
          <div class="scroll-cont">
            <p class="banner">Please read the terms and conditions below, and then click the checkbox below to show you agree with them, then click "Submit Application".</p>
            <div id="terms_s"></div>
          </div>
          <div class="form-group">
            <label class="st-label">In ticking this box, I authorise you to use my personal information to obtain credit/funding for my intended vehicle purchase. I understand that each lender to which my application is submitted will undertake a credit search with credit reference agencies, details of which will be recorded on my credit file. I confirm that the information herein is correct to the best of my belief, and I consent to this information being passed to one or more lenders as part of the application process.</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="search_agree_y" aria-required="true" type="radio" name="search_agree" class="checkbin">
                <label date-check="1" for="search_agree_y" tabindex="0">Yes</label>
              </div>
            </div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-prev">Back</button>
          <div>
            <button class="btn btn-success btn-silver-submit">Submit Application</button>
            <label class="st-label text-center d-none" style="width:251px;">This won't affect your credit score</label>
          </div>
        </div>
        <div class="st-label txt-sm text-center">
          Representative Example (Hire Purchase): Cash Price £6399.00. Total Deposit £1500.00. Total Amount of Credit £4899.00. 60 Equal Payments of £108.35. Agreement Duration 60 Months. Option to Purchase Fee£10.00. Interest Charges £1602.00. Total Amount Payable £8,011.00. Annual Rate of Interest is 12.4% (fixed). Representative APR 15.9%. Monthly payment is equivalent to £25.00 per week. We are a broker, not a lender. Written Guarantee may be required. Subject to Status - Alternative Deals Available. See website or in store for details. See price promise in store.
        </div>
      </div>

      <div class="st-step silver thank-you">
        <div class="st-card">
          <h1>We are finalising your application - we won`t be long!</h1>
          <span class="st-label">
            Thank you for submitting your application, our team will get working on this straight away and we hope to have you approved to select a car in no time.<br />
            <br />
            As soon as we have your approval, or if we need any more information then one of the team will be in touch asap.<br />
            <br />
            Speak soon!
          </span>
        </div>
      </div>
      <!-- SILVER FLOW -->

      <!-- GOLD FLOW -->
      <div class="st-step gold d-none after-eli">
        <div class="st-card pd-sm">
          <h1 class="fnt-medium title d-none">Great News!!<br />You've been APPROVED to select a car</h1>
          <span class="lbl-appt-title"></span><br />
          <div class="row branch-cont">
          </div>
          <img id="cal-banner" src="https://tcg-creditapp.53dnorth.com/assets/img/banner-gold.jpg" alt="WE WANT YOUR PART-EX AND WE PAY MORE!" style="width:100%;margin-bottom:12px;" />
          <div class="text-lg pb-sm lbl-sel-date">Select a date and time</div>
          <!-- <span class="fnt-medium">Please choose a convenient date and time below<br />In most cases drive away your new car the very same day!!<br /><br /></span> -->
          <span>
            Please choose the most convenient date and time
            <br /><br />
          </span>
          <div class="slides" id="calendar-slider"></div>
          <div id="calendar-details">
            <div class="calendar-date"></div>
            <div class="calendar-times row"></div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-appt-time">Continue</button>
        </div>
      </div>

      <div class="st-step gold d-none after-appt">
        <div class="st-card">
          <h1>To activate your appointment please confirm you can bring the following documents with you on your appointed day?</h1>
          <div class="form-group">
            <label class="st-label">Confirm you can bring a full in date driving licence registered to your current address</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="_license_in_date_curr_addr_y" aria-required="true" type="radio" name="_license_in_date_curr_addr" class="checkbin" value="1">
                <label date-check="1" for="_license_in_date_curr_addr_y" tabindex="0">Yes</label>
              </div>
              <div class="nontextual">
                <input id="_license_in_date_curr_addr_n" aria-required="true" type="radio" name="_license_in_date_curr_addr" class="checkbin" value="0">
                <label date-check="1" for="_license_in_date_curr_addr_n" tabindex="0">No</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label">Confirm you hold UK bank account in your own name</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="_bank_acct_own_name_y" aria-required="true" type="radio" name="_bank_acct_own_name" class="checkbin" value="1">
                <label date-check="1" for="_bank_acct_own_name_y" tabindex="0">Yes</label>
              </div>
              <div class="nontextual">
                <input id="_bank_acct_own_name_n" aria-required="true" type="radio" name="_bank_acct_own_name" class="checkbin" value="0">
                <label date-check="1" for="_bank_acct_own_name_n" tabindex="0">No</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label">Confirm you can bring a utility bill in your name dated within the last 3 months, gas- electric-water, if none of these in your name please bring any form of official bill in your name dated within the last 3 months, mobile phone bill, bank statement</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="_proof_addr_3yr_y" aria-required="true" type="radio" name="_proof_addr_3yr" class="checkbin" value="1">
                <label date-check="1" for="_proof_addr_3yr_y" tabindex="0">Yes</label>
              </div>
              <div class="nontextual">
                <input id="_proof_addr_3yr_n" aria-required="true" type="radio" name="_proof_addr_3yr" class="checkbin" value="0">
                <label date-check="1" for="_proof_addr_3yr_n" tabindex="0">No</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="st-label">Confirm you can bring your latest payslip or proof of income if self employed</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="_proof_last_payslip_y" aria-required="true" type="radio" name="_proof_last_payslip" class="checkbin" value="1">
                <label date-check="1" for="_proof_last_payslip_y" tabindex="0">Yes</label>
              </div>
              <div class="nontextual">
                <input id="_proof_last_payslip_n" aria-required="true" type="radio" name="_proof_last_payslip" class="checkbin" value="0">
                <label date-check="1" for="_proof_last_payslip_n" tabindex="0">No</label>
              </div>
            </div>
          </div>
          <div class="form-group d-none" id="missing-docs">
            <label class="st-label fnt-medium">MISSING DOCUMENT - This may affect your ability to drive your new car away the same day. Please discuss in store on your visit.</label>
          </div>
        </div>
        <div class="btn-cont">
          <!-- <button class="btn btn-success btn-secondary" id="btn-docs-cont">Missing Documentation</button> -->
          <button class="btn btn-success btn-confirm-appt" disabled>Confirm Appointment</button>
        </div>
      </div>

      <div class="st-step gold d-none after-appt-confirm">
        <div class="st-card">
          <h1>Your Appointment Recap</h1>

          <label class="st-label subtitle">Where</label>
          <h2 id="branch"></h2>
          <span id="branch-addr"></span><br />
          <div class="divider"></div>

          <label class="st-label subtitle">When</label>
          <h2><span id="conf_time"></span> - <span id="conf_date"></span></h2>
          <span>We'll text you with a reminder the date before your appointment</span><br />
          <div class="divider"></div>

          <label class="st-label subtitle">Who</label>
          <h2 id="conf_name"></h2>
          <span id="conf_add1"></span><br />
          <span id="conf_city"></span><br />
          <span id="conf_postcode"></span><br />
          <span id="conf_postcode"></span><br />
          <span id="conf_dob"></span><br />
          <span id="conf_email"></span><br />
          <span id="conf_mobile_number"></span><br />
          <br />
          <span>You will shortly receive a text and an email to confirm your appointment</span>
        </div>
      </div>

      <div class="st-step gold d-none after-details-upd">
        <div class="st-card">
          <h1>Your details have been updated and sent to our team for review.</h1>

          <span>We'll contact you once the review is completed</span><br />
        </div>
      </div>
      <div class="st-step d-none ns-step">
        <div class="st-card">
          <h1>Application Update</h1>
          <br />
          <p>
            Thank you for your recent enquiry. Further to you completing a free finace check, unfortunatelty, on this occasion based on the information provided by you for your application, and from the information we have received from Experian, we are currently not able to proceed with your application.
          </p>
          <p>
            The Trade Centre Group Plc is a credit broker and not a lender and therefore, can only introduce you to a limited number of finace providers (lenders). As The Trade Centre Group Plc does not offer access to the whole of the consumer credit market, you may wish to widen your search to identity whether other finace products are available to you.<br /><br />We can of course, sell you a car for cash or you may have access to alternaive forms of credit. If so, you are very welcome to visit one of our sites where we can assist you further,<br /><br />You can find out more about your credit file and what information Experian hol on you by writing to them at the following address:<br /><br />
            Customer Support Centre<br />
            Experian Ltd<br />
            PO BOX 9000<br />
            Nottingham<br />
            NG80 7WF<br />
            E-mail: customerservices@uk.experian.com
          </p>
          <p>
            If you write to the Credit Reference Agency asking for a copy of your file, they may ask you for an administration fee, for providing you with a copy of your file.<br /><br />Once again, thank you for taking the time to apply to us, and we are sorry that we have not been able to assist you at the time.
          </p>
        </div>
      </div>
      <div class="st-step d-none bc-step">
        <div class="st-card">
          <h1>Can you confirm</h1>
          <div class="form-group">
            <label class="st-label">Are you in an IVA or Bankrupt?</label>
            <div class="d-flex">
              <div class="nontextual">
                <input id="_current_iva_y" aria-required="true" type="radio" name="_current_iva" class="checkbin" value="1">
                <label date-check="1" for="_current_iva_y" tabindex="0">IVA</label>
              </div>
              <div class="nontextual">
                <input id="_current_iva_n" aria-required="true" type="radio" name="_current_iva" class="checkbin" value="0">
                <label date-check="1" for="_current_iva_n" tabindex="0">Bankrupt</label>
              </div>
            </div>
            <div class="msg st-label mt-4"><i>We may still be able to help if you have permission from your IVA insolvency practitioner or if your bankruptcy is discharged.</i></div>
          </div>
        </div>
        <div class="btn-cont">
          <button class="btn btn-success btn-confirm-bc-status" disabled>Confirm Status</button>
        </div>
      </div>
      <!-- GOLD FLOW -->
    </div> <!-- /container -->
  </form>

  <div class="loader d-none">
    <svg class="car" width="102" height="40" xmlns="http://www.w3.org/2000/svg">
      <g transform="translate(2 1)" stroke="#002742" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
        <path class="car__body" d="M47.293 2.375C52.927.792 54.017.805 54.017.805c2.613-.445 6.838-.337 9.42.237l8.381 1.863c2.59.576 6.164 2.606 7.98 4.531l6.348 6.732 6.245 1.877c3.098.508 5.609 3.431 5.609 6.507v4.206c0 .29-2.536 4.189-5.687 4.189H36.808c-2.655 0-4.34-2.1-3.688-4.67 0 0 3.71-19.944 14.173-23.902zM36.5 15.5h54.01" stroke-width="3" />
        <ellipse class="car__wheel--left" stroke-width="3.2" fill="#FFF" cx="83.493" cy="30.25" rx="6.922" ry="6.808" />
        <ellipse class="car__wheel--right" stroke-width="3.2" fill="#FFF" cx="46.511" cy="30.25" rx="6.922" ry="6.808" />
        <path class="car__line car__line--top" d="M22.5 16.5H2.475" stroke-width="3" />
        <path class="car__line car__line--middle" d="M20.5 23.5H.4755" stroke-width="3" />
        <path class="car__line car__line--bottom" d="M25.5 9.5h-19" stroke-width="3" />
      </g>
    </svg>
  </div>


  <div class="apr-rep-content container">
    <p>Illustrative Example (Hire Purchase): <br> <br>
      Representative Example (Hire Purchase):  Cash price £8,199 + Admin Fee £399. Total Deposit £1,500. Total Amount of Credit £7,098. Agreement Duration 60 Months. 59 payments of £161.81 and 1 final payment of £171.81. Option to Purchase Fee £10. Interest Charged £2,610.60. Total Amount Payable £11,218.60. Annual Rate of Interest 13.9% APR (fixed), Representative APR 13.9%.
      <br> <br>
      The Trade Centre Group PLC is a Credit Broker not a Lender. Finance is secured on the vehicle. Written Guarantees may be required.
      Subject to Status – Alternative Deals are available.
    </p>
  </div>
</section>




<?php
get_footer();
