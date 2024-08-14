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
    <svg enable-background="new 0 0 172.2 22.9" viewBox="0 0 172.2 22.9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <clipPath id="a">
        <path d="m0 0h172.2v22.9h-172.2z" />
      </clipPath>
      <clipPath id="b">
        <path d="m0 0h172.2v22.9h-172.2z" />
      </clipPath>
      <clipPath id="c">
        <path d="m-.4-7h176.3v30h-176.3z" />
      </clipPath>
      <g clip-path="url(#a)">
        <path clip-path="url(#b)" d="m10.9 1.1c-6 0-10.9 4.8-10.9 10.9 0 6 4.9 10.9 10.9 10.9h150.4c6 0 10.9-4.9 10.9-10.9s-4.9-10.9-10.9-10.9h-150.4z" fill="#f2f2f2" />
        <g clip-path="url(#b)" fill="#1d1d1b" opacity=".85">
          <g clip-path="url(#c)">
            <path d="m11.7 5.7h2.8c2 0 2.8.9 2.8 2.9v.8c0 1.4-.5 2.2-1.5 2.5 1.1.3 1.5 1.2 1.5 2.6v2.3c0 .6 0 1.1.2 1.5h-1.4c-.1-.4-.2-.7-.2-1.5v-2.3c0-1.4-.5-1.8-1.7-1.8h-1.1v5.7h-1.4zm2.6 5.6c1.1 0 1.7-.5 1.7-1.7v-.9c0-1.2-.4-1.7-1.5-1.7h-1.3v4.4h1.1z" />
            <path d="m19 5.7h5.2v1.3h-3.8v4.1h3.1v1.3h-3.1v4.6h3.8v1.3h-5.2z" />
            <path d="m25.4 5.7h2.8c1.9 0 2.8 1 2.8 3.1v1.1c0 2-.9 3-2.8 3h-1.4v5.4h-1.4zm2.7 5.9c1 0 1.4-.5 1.4-1.7v-1.2c0-1.2-.5-1.7-1.4-1.7h-1.4v4.6z" />
            <path d="m32.3 5.7h2.7c2 0 2.8.9 2.8 2.9v.8c0 1.4-.5 2.2-1.5 2.5 1.1.3 1.5 1.2 1.5 2.6v2.3c0 .6 0 1.1.2 1.5h-1.4c-.1-.4-.2-.7-.2-1.5v-2.3c0-1.4-.5-1.8-1.7-1.8h-1.1v5.7h-1.4v-12.7zm2.5 5.6c1.1 0 1.7-.5 1.7-1.7v-.9c0-1.2-.5-1.7-1.5-1.7h-1.3v4.4h1.1z" />
            <path d="m39.5 5.7h5.2v1.3h-3.8v4.1h3.1v1.3h-3.1v4.6h3.8v1.3h-5.2z" />
            <path d="m45.6 15.4v-.7h1.3v.8c0 1.1.6 1.7 1.5 1.7s1.5-.5 1.5-1.7-.5-1.9-1.9-3.1c-1.7-1.4-2.3-2.5-2.3-3.9 0-1.9 1-3 2.8-3s2.8 1.1 2.8 3v.5h-1.3v-.5c0-1.1-.5-1.7-1.4-1.7s-1.4.5-1.4 1.6c0 1 .5 1.8 2 3 1.7 1.4 2.3 2.5 2.3 4 0 2-1 3.1-2.9 3.1s-3-1.1-3-3.1z" />
            <path d="m52.6 5.7h5.2v1.3h-3.8v4.1h3v1.3h-3v4.6h3.8v1.3h-5.2z" />
            <path d="m59 5.7h1.8l2.8 9v-9h1.3v12.6h-1.5l-3.1-10.2v10.3h-1.3z" />
            <path d="m68.3 7h-2.2v-1.3h5.9v1.3h-2.2v11.3h-1.4v-11.3z" />
            <path d="m76.3 15.6h-2.9l-.5 2.7h-1.3l2.3-12.6h1.9l2.4 12.6h-1.4zm-.2-1.2-1.3-7.1-1.2 7.1z" />
            <path d="m80.1 7h-2.2v-1.3h5.9v1.3h-2.2v11.3h-1.4v-11.3z" />
            <path d="m84.9 5.7h1.4v12.6h-1.4z" />
            <path d="m87.4 5.7h1.4l1.8 10.7 1.8-10.7h1.3l-2.2 12.6h-1.9z" />
            <path d="m95 5.7h5.2v1.3h-3.8v4.1h3.1v1.3h-3.1v4.6h3.8v1.3h-5.2z" />
            <path d="m108.5 15.6h-2.9l-.5 2.7h-1.3l2.3-12.6h1.9l2.4 12.6h-1.4zm-.2-1.2-1.3-7.1-1.2 7.1z" />
            <path d="m111.5 5.7h2.8c1.9 0 2.8 1 2.8 3.1v1.1c0 2-.9 3-2.8 3h-1.4v5.4h-1.4zm2.8 5.9c1 0 1.4-.5 1.4-1.7v-1.2c0-1.2-.5-1.7-1.4-1.7h-1.4v4.6z" />
            <path d="m118.4 5.7h2.8c2 0 2.8.9 2.8 2.9v.8c0 1.4-.5 2.2-1.5 2.5 1.1.3 1.5 1.2 1.5 2.6v2.3c0 .6 0 1.1.2 1.5h-1.4c-.1-.4-.2-.7-.2-1.5v-2.3c0-1.4-.5-1.8-1.7-1.8h-1.1v5.7h-1.4zm2.6 5.6c1.1 0 1.7-.5 1.7-1.7v-.9c0-1.2-.4-1.7-1.5-1.7h-1.3v4.4h1.1z" />
          </g>
          <g clip-path="url(#c)">
            <path d="m130.1 8.7h-2.1v-1.4c1.7 0 2.3-.4 2.7-1.6h1.3v12.6h-2v-9.6z" />
            <path d="m133.5 15.3v-1h1.9v1.1c0 .9.4 1.2 1 1.2s1-.3 1-1.2v-2.8c0-.9-.4-1.2-1-1.2s-1 .3-1 1.2v.1h-1.9l.4-7h5.2v1.8h-3.5l-.2 3c.4-.6 1-.9 1.7-.9 1.5 0 2.2 1 2.2 2.9v2.8c0 2-1 3.2-3 3.2s-2.8-1.2-2.8-3.2z" />
            <path d="m140.7 16.3h2v2h-2z" />
            <path d="m144 15.3v-.2h1.9v.4c0 .9.4 1.2 1 1.2.7 0 1.1-.3 1.1-1.5v-2.4c-.4.7-1 1.1-1.8 1.1-1.5 0-2.2-1-2.2-2.9v-2.3c0-2 1.1-3.2 3-3.2s3 1.2 3 3.2v6.5c0 2.1-1 3.3-3 3.3s-3-1.2-3-3.2zm4-4.5v-2.3c0-.8-.3-1.2-1-1.2s-1 .4-1 1.2v2.2c0 .8.3 1.2 1 1.2s1-.3 1-1.1z" />
            <path d="m150.9 10.7v-3.2c0-1.3.7-2 1.9-2s1.9.7 1.9 2v3.2c0 1.3-.7 2-1.9 2s-1.9-.7-1.9-2zm2.6.1v-3.4c0-.6-.3-.8-.6-.8-.4 0-.6.2-.6.8v3.3c0 .6.2.8.6.8.3.1.6-.2.6-.7zm3.9-5.1h1.3l-4.9 12.6h-1.3zm-.9 10.8v-3.2c0-1.3.7-2 1.9-2s1.9.7 1.9 2v3.2c0 1.3-.7 2-1.9 2s-1.9-.7-1.9-2zm2.5.1v-3.3c0-.6-.3-.8-.6-.8-.4 0-.6.2-.6.8v3.3c0 .6.2.8.6.8s.6-.3.6-.8z" />
          </g>
        </g>
      </g>
    </svg>
  </div>

  <form id="form" novalidate="novalidate">
    <div class="settings-cont">
      <a href="#" class="outer-link theme-switch">A</a>
      <a href="#" class="outer-link header-switch">C</a>
    </div>
    <div class="container st-cont">
      <h1 class="fnt-medium title">Free Finance Check</h1>
      <span class="fnt-medium">In a few simple steps you can check your eligibility to select a car.</span>
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
      Representative Example (Hire Purchase): Cash price £5,699 (incl. Admin Fee £349). Total Deposit £1,600. Total Amount of Credit £4,099. Agreement Duration 60 Months. 59 payments of £97.19 and 1 final payment of £107.19. Option to Purchase Fee £10. Interest Charged £1,732.40. Total Amount Payable £7,441.40. Annual Rate of Interest 14.81% APR (fixed), Representative APR 15.9%.
      <br> <br>
      Please Note: The above is an ‘illustrative example’ with limited availability – subject to status. <strong> The Trade Centre Group PLC is a Credit Broker not a Lender </strong>
    </p>
  </div>
</section>




<?php
get_footer();
