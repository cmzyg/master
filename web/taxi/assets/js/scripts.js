// start datepicker
$(function(){
  $( "#datepicker" ).datepicker({ minDate: 0, dateFormat: "dd-mm-yy"});
});

$(function(){
  $( "#datepicker2" ).datepicker({ minDate: 0, dateFormat: "dd-mm-yy"});
});

function changePickup()
{
  var pickup_geo = document.getElementById('geocomplete').value;
  var pickup     = document.getElementById('pickup');
  pickup.value = pickup_geo;
}


function changeDestination()
{
  var destination_geo = document.getElementById('geocomplete2').value;
  var destination     = document.getElementById('destination');
  destination.value   = destination_geo;
}


// validate form on the booking page
function validateBookingDetailsForm()
{
var errors_count   = 0;
var fullname       = document.forms["booking_details_form"]["fullname"].value;
var email          = document.forms["booking_details_form"]["email"].value;
var telephone      = document.forms["booking_details_form"]["telephone"].value;
var pickup_address = document.forms["booking_details_form"]["pickup_address"].value;
var saloon         = document.forms["booking_details_form"]["saloon"].selectedIndex;
var estate         = document.forms["booking_details_form"]["estate"].selectedIndex;
var executive      = document.forms["booking_details_form"]["executive"].selectedIndex;
var mpv            = document.forms["booking_details_form"]["mpv"].selectedIndex;
var minibus        = document.forms["booking_details_form"]["minibus"].selectedIndex;
var minicoach      = document.forms["booking_details_form"]["minicoachh"].selectedIndex;
var terms          = document.forms["booking_details_form"]["terms"];
var actual_pickup  = document.forms["booking_details_form"]["actual_pickup_address"].value;
var destination    = document.forms["booking_details_form"]["actual_destination"].value;


if (fullname == null || fullname == "") {
    document.forms["booking_details_form"]["fullname"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["fullname"].style.borderColor="red";
    document.forms["booking_details_form"]["fullname"].focus();
    errors_count++;
}

if (email == null || email == "") {
    document.forms["booking_details_form"]["email"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["email"].style.borderColor="red";
    document.forms["booking_details_form"]["email"].focus();
    errors_count++;
}

if (telephone == null || telephone == "") {
    document.forms["booking_details_form"]["telephone"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["telephone"].style.borderColor="red";
    document.forms["booking_details_form"]["telephone"].focus();
    errors_count++;
}

if (pickup_address == null || pickup_address == "") {
    document.forms["booking_details_form"]["pickup_address"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["pickup_address"].style.borderColor="red";
    document.forms["booking_details_form"]["pickup_address"].focus();
    errors_count++;
}

if (actual_pickup == null || actual_pickup == "") {
    document.forms["booking_details_form"]["actual_pickup_address"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["actual_pickup_address"].style.borderColor="red";
    document.forms["booking_details_form"]["actual_pickup_address"].focus();
    errors_count++;
}

if (destination == null || destination == "") {
    document.forms["booking_details_form"]["actual_destination"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["actual_destination"].style.borderColor="red";
    document.forms["booking_details_form"]["actual_destination"].focus();
    errors_count++;
}

if (saloon == 0 && estate == 0 && executive == 0 && mpv == 0 && minibus == 0 && minicoach == 0) {
    document.forms["booking_details_form"]["saloon"].focus();
    document.forms["booking_details_form"]["saloon"].style.borderColor="red";
    document.forms["booking_details_form"]["estate"].style.borderColor="red";
    document.forms["booking_details_form"]["executive"].style.borderColor="red";
    document.forms["booking_details_form"]["mpv"].style.borderColor="red";
    document.forms["booking_details_form"]["minibus"].style.borderColor="red";
    document.forms["booking_details_form"]["minicoachh"].style.borderColor="red";
    errors_count++;
}

if (!terms.checked) {
    document.forms["booking_details_form"]["terms"].focus();
    errors_count++;
}

return errors_count == 0;

}



function validateFixedBookingDetailsForm()
{
var notice_hours = document.getElementById('notice_hours').value;
var error_div    = document.getElementById('error_div').value;
var errors_count = 0;
var fullname     = document.forms["booking_details_form"]["fullname"].value;
var email        = document.forms["booking_details_form"]["email"].value;
var telephone    = document.forms["booking_details_form"]["telephone"].value;
var pickup       = document.forms["booking_details_form"]["pickup"].value;
var booking_date = document.forms["booking_details_form"]["booking_date"].value;
var saloon       = document.forms["booking_details_form"]["saloon"].selectedIndex;
var estate       = document.forms["booking_details_form"]["estate"].selectedIndex;
var executive    = document.forms["booking_details_form"]["executive"].selectedIndex;
var mpv          = document.forms["booking_details_form"]["mpv"].selectedIndex;
var minibus      = document.forms["booking_details_form"]["minibus"].selectedIndex;
var minicoach    = document.forms["booking_details_form"]["minicoachh"].selectedIndex;
var terms        = document.forms["booking_details_form"]["terms"];


if (fullname == null || fullname == "") {
    document.forms["booking_details_form"]["fullname"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["fullname"].style.borderColor="red";
    document.forms["booking_details_form"]["fullname"].focus();
    errors_count++;
}

if (email == null || email == "") {
    document.forms["booking_details_form"]["email"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["email"].style.borderColor="red";
    document.forms["booking_details_form"]["email"].focus();
    errors_count++;
}

if (telephone == null || telephone == "") {
    document.forms["booking_details_form"]["telephone"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["telephone"].style.borderColor="red";
    document.forms["booking_details_form"]["telephone"].focus();
    errors_count++;
}

if (pickup == null || pickup == "") {
    document.forms["booking_details_form"]["pickup"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["pickup"].style.borderColor="red";
    document.forms["booking_details_form"]["pickup"].focus();
    errors_count++;
}

if (booking_date== null || booking_date == "") {
    document.forms["booking_details_form"]["booking_date"].style.backgroundColor="#F8E0EC";
    document.forms["booking_details_form"]["booking_date"].style.borderColor="red";
    document.forms["booking_details_form"]["booking_date"].focus();
    errors_count++;
}

if (saloon == 0 && estate == 0 && executive == 0 && mpv == 0 && minibus == 0 && minicoach == 0) {
    document.forms["booking_details_form"]["saloon"].focus();
    document.forms["booking_details_form"]["saloon"].style.borderColor="red";
    document.forms["booking_details_form"]["estate"].style.borderColor="red";
    document.forms["booking_details_form"]["executive"].style.borderColor="red";
    document.forms["booking_details_form"]["mpv"].style.borderColor="red";
    document.forms["booking_details_form"]["minibus"].style.borderColor="red";
    document.forms["booking_details_form"]["minicoachh"].style.borderColor="red";
    errors_count++;
}

if (!terms.checked) {
    document.forms["booking_details_form"]["terms"].focus();
    errors_count++;
}

if (error_div == 1) {
    alert('Please select a future time');
    errors_count++;
}

if (error_div == 2) {
    alert('Minimum notice is ' + notice_hours + ' hours');
    errors_count++;
}

return errors_count == 0;

}



function validateBookingForm()
{
  var telephone    = document.getElementById('website_telephone').value;
  var notice_hours = document.getElementById('notice_hours').value;
  var error_div    = document.getElementById('error_div').value;
  var errors_count = 0;
  var booking_date = document.forms["form1"]["booking_date"].value;
  var pickup       = document.forms["form1"]["geocomplete"].value;
  var destination  = document.forms["form1"]["geocomplete2"].value;



if (booking_date == null || booking_date == "") {
    document.forms["form1"]["booking_date"].style.backgroundColor="#F8E0EC";
    document.forms["form1"]["booking_date"].style.borderColor="red";
    errors_count++;
}

if (pickup == null || pickup == "") {
    document.forms["form1"]["geocomplete"].style.backgroundColor="#F8E0EC";
    document.forms["form1"]["geocomplete"].style.borderColor="red";
    errors_count++;
}

if (destination == null || destination == "") {
    document.forms["form1"]["geocomplete2"].style.backgroundColor="#F8E0EC";
    document.forms["form1"]["geocomplete2"].style.borderColor="red";
    errors_count++;
}

if (error_div == 1) {
    alert('Please select a future time');
    errors_count++;
}

if (error_div == 2) {
    alert('We require ' + notice_hours + ' hours notice for online bookings. Please call ' + telephone + ' if you require a taxi sooner');
    errors_count++;
}


return errors_count == 0;

}


/* remove errors */
function removeErrorVehicle()
{
    var saloon       = document.getElementById('saloon');
    var estate       = document.getElementById('estate');
    var executive    = document.getElementById('executive');;
    var mpv          = document.getElementById('mpv');
    var minibus      = document.getElementById('minibus');
    
    if (saloon.selectedIndex !== 0 || estate.selectedIndex !== 0 || executive.selectedIndex !== 0 || mpv.selectedIndex !== 0 || minibus.selectedIndex !== 0) 
    {
        saloon.style.borderColor='#d8d8d8';
        estate.style.borderColor='#d8d8d8';
        executive.style.borderColor='#d8d8d8';
        mpv.style.borderColor='#d8d8d8';
        minibus.style.borderColor='#d8d8d8';
    }
}





