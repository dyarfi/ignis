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
    $('#form_account').submit(function(){
        //alert($(this).serialize());
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
                    //var tmp = '';
                    //$.each(msg.message, function( i, m ) {
                        //tmp += m;
                    //});
                    //jAlert(tmp,'Tolong periksa kembali');
                    $.fancybox.open('<div class="col-md-12">' + msg.message + '</div>');
                    $('.reload_captcha').click();
                    //$( "#result" ).append( msg.message );
                } else if(ms.result === 'OK') {
                     $.fancybox.open('Terima kasih untuk partisipasi anda');
                     setTimeout(function() {
                        // Do something after 5 seconds
                        window.location.href = base_URL + 'participated';
                        //$.post('http://aw.dw.impact-ad.jp/c/map/?oid=dax.079a2cbe7270&cid='+phone+'&sp=jak',function() {
                            //window.location.href = base_URL + 'participated';
                        //});
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
        $.ajax({
            type: "POST",
            url: url,
            //cache: false,
            //async: true,
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
