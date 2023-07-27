var AcTarget = "thetradecentrewales";
var AcInjectParentScript = document.createElement('script');

document.body.appendChild(AcInjectParentScript);

var acRng = Math.floor(Math.random() * 10000000) + 1;

AcInjectParentScript.onload = function() {};
AcInjectParentScript.src = "https://appform.autoconvert.co.uk/assets/js/iframe/" + AcTarget + "/parent-comms.js?ver=" + acRng;

$(document).on('click', '#find_vehicle_submit', function(ev) {

    ev.preventDefault();

    let vrm = $("input[name='px_vrm']").val();

    if (vrm == '') {
        $("#error_box").html('Vehicle Registration cannot be left blank.');
    } else if (vrm.length < 3 || vrm.length > 9) {
        $("#error_box").html('The vehicle registration ' + vrm + ' doesnt look correct, please check it and try again.');
    } else {
        $.ajax({
            type: "POST",
            url: "/wp-json/tcw/v1/capLookup",
            dataType: 'json',
            data: "vrm=" + vrm,
            success: function(data) {
                if (data.capid == '') {
                    $("#vehicle_info").html('Vehicle cannot be found, please try again.');
                } else if (data.capid != '') {
                    $("#vehicle_info").html(data.make + ' ' + data.model + ' (' + data.plateyear + ')');
                    $("#cap_id").val(data.capid);
                    $("#registration_year").val(data.plateyear);
                    $("#car-make").val(data.make);
                    $("#car-model").val(data.range);

                    $("#px_image_container").html('<img style="width: 100%" src="' + data.image + '" />')

                    // Enable the submit button which is set to disabled by default
                    $('#request_valuation').removeAttr('disabled');


                }
            }
        });
    }
});

$(document).on('click', '#request_valuation', function(ev) {

    // ev.preventDefault();

    let capid = $("input[id='cap_id']").val();
    let mileage = $("input[id='mileage']").val();
    let registered = $("input[id='registration_year']").val();
    //let valmethod = $("input[id='ValMethod']").val();
    let valmethod = '@';
    let make = $("input[id='car-make']").val();
    let model = $("input[id='car-model']").val();


    // TODO: Make, Model, Telephone/Email

    if (mileage == '') {
        $("#error_box").html('You must provide your vehicle mileage.');
    } else {
        $.ajax({
            type: "POST",
            url: "/wp-json/tcw/v1/capValuation",
            dataType: 'json',
            data: "capid=" + capid + "&mileage=" + mileage + "&registered=" + registered + "&make=" + make + "&model=" + model + "&valmethod=" + valmethod,
            success: function(data) {
                if (data.success) {
                    $("#error_box").html('<div style="background-color: #00b579; border: 2px solid #fff; padding: 10px;">' + data.success + '</div>');
                    $("#pxvalform").hide();
                } else {
                    $("#error_box").html('<div style="background-color: #CE1719; border: 2px solid #fff; padding: 10px;">' + data.error + '</div>');

                }
            }
        });
    }

});