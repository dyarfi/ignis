$(window).on("resize", function() { if($('#navbar').hasClass('in')) { $('#navbar').removeClass('in');} });
$(document).ready(function() {
    $("[rel='tooltip']").tooltip();
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').fadeIn(250); //.slideDown(250)
        },
        function(){
            $(this).find('.caption').fadeOut(205); //.slideUp(250)
        }
    );
    $('.popup_account').click(function() {
        $.fancybox.open({
             autoSize : false,
             width : "68%",
             height : "auto",
             content : $( "#result" ).load( base_URL + "account .boxed-grey" )
        });
        //$( "#result" ).load( base_URL + "account #account" );
        return false;
    });
    $('.popup_account').attr({'style':'text-shadow:1px 1px 0 rgba(255,255,255,0.75);color:#233247'});
    $('#form_account').submit(function() {
        var urls = $(this).attr('action');
        var phone = $('#inputPhone').val();
        $.ajax({
            method: "POST",
            url: urls,
            dataType: "JSON",
            data:$(this).serialize(),
            success : function(ms) {
                var msg = ms.result;
                if (ms.result.code === 0) {
                    $.fancybox.open('<div class="col-md-12">' + msg.message + '</div>');
                    $('.reload_captcha').click();
                } else if(ms.result === 'OK') {
                     $.fancybox.open('Terima kasih untuk partisipasi anda');
                     setTimeout(function() {
                        // Do something after 5 seconds
                        window.location.href = base_URL + 'participated';
                    }, 1000);
                } else {
                    $('.reload_captcha').click();
                }
                //setTimeout(function() {
                    //form.find('button.bt-submit').prop( "disabled", false );
                //}, 6000);
            }
        })
        return false;
    });
    $('.reload_captcha').on('click',function() {
        var url = $(this).attr('rel');
        var token_id = $(this).attr('data-id');
        var token_value = $(this).attr('data-value');
        var pdata = ""+token_id+"="+token_value+"";
        $.ajax({
            type: "POST",
            url: url,
            data : pdata,
            success: function(msg){
                $('.reload_captcha').empty().html(msg);
                // Need random for browser recache
                img = $('.reload_captcha').find('img');
                src = img.attr('src');
                ran = img.fadeOut(50).fadeIn(50).attr('src', src + '?=' + Math.random());
            },
            complete: function(msg) {},
            error: function(msg) {}
        });
        return false;
    });
});

function geocodeLatLng(geocoder, lat, lng) {
    if (lat && lng) {
        // -0.3055503,100.3679645 // Bukit Tinggi
        // -6.264578,107.020502 // Jalan Kecapi III No.336, Jatimulya, Bekasi, West Java
        //var latlng = {lat: parseFloat('-0.3055503'), lng: parseFloat('100.3679645')};
        //var latlng = {lat: parseFloat('-6.264578'), lng: parseFloat('107.020502')};
        var latlng = {lat: parseFloat(lat), lng: parseFloat(lng)};
        geocoder.geocode({
            'language': 'id',
            'region':'ID',
            'location': latlng
            }, function(results, status) {
                if (status === 'OK') {
                    if (results[1]) {
                        var frm = document.getElementById("form_account");
                        var din = document.createElement("div");
                        din.style = 'display:none';
                        din.innerHTML = '<input type="hidden" value="'+results[1].formatted_address+'" name="location"/>';
                        frm.appendChild(din);
                    } else {
                      window.alert('No results found');
                    }
                } else {
                window.alert('Geocoder failed due to: ' + status);
            }
        });
    }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                  'Error: The Geolocation service failed.' :
                  'Error: Your browser doesn\'t support geolocation.');
}
function initialize() {
    // Set google map geocoder
    var geocoder = new google.maps.Geocoder;
    // Try HTML5 geolocation.
    // https://maps.googleapis.com/maps/api/js?key=AIzaSyDbboZY7KeTOi5V6-zJNUsQG_-THlw6tyQ&language=id&region=ID
    navigator.language = 'id';
    if (typeof navigator !=='undefined') {
        navigator.geolocation.getCurrentPosition(function(setPosition) {
            var pos = {
                lat: setPosition.coords.latitude,
                lng: setPosition.coords.longitude
            };
            geocodeLatLng(geocoder, pos.lat, pos.lng);
        }, function(status) {
            geocodeLatLng(geocoder,'','');
            if(status.PositionError !== 'undefined') {
                // Set new map
                geocodeLatLng(geocoder, '','','');
            } else {
                handleLocationError(true, '');
            }
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, '');
    }
}
