(function() {

  var canvas = new fabric.Canvas('canvas');
  
  canvas.backgroundColor = 'white';

  //var image = $('input[name="image_temp"]').val();  
  //if ($('input[name="image_temp"]').value()) {
    //alert('asdf');
  //}
/*
  fabric.Image.fromURL('http://localhost/dentsu.digital/uploads/gallery/4a95b5f9dcc17addd5c8c17b1227f6ff.jpg', function(oImg) {
    oImg.set('selectable',false);
    canvas.add(oImg);
    canvas.centerObject(oImg);
  });
*/

$('#canva-row').hide();
$('.item-handler').hide();

if (document.getElementById('fileupload') != null) {
  document.getElementById('fileupload').onchange = function handleImage(e) {
    var reader = new FileReader();

    $('#canva-row').show();
    $('.item-handler').show();

    reader.onload = function (event) { 
      
        console.log('fdsf');

        // resizeCanvas();

        $('.button-submit').show({duration:'260',easing:'easeInOutBack'});

        var imgObj = new Image();
        imgObj.src = event.target.result;
        imgObj.onload = function () {
            // start fabricJS stuff
            
            var image = new fabric.Image(imgObj);

            //console.log(image.width);
            //console.log(image.height);

            resizeCanvas(image.width,image.height);

            /*
            image.set({
                left: 250,
                top: 250,
                angle: 20,
                padding: 10,
                cornersize: 10
            });
            */

            image.set('selectable',false);
            //image.scale(getRandomNum(0.1, 0.25)).setCoords();
            canvas.add(image);
            canvas.centerObject(image);
            // end fabricJS stuff
        }
        
    }
    reader.readAsDataURL(e.target.files[0]);
  }
}
  // resize the canvas to fill browser window dynamically
  window.addEventListener('resize', resizeCanvas, false);

  function resizeCanvas(itemHandlerWidth='',itemHandlerHeight='') {
    if (itemHandlerWidth == '' && document.getElementById('canva-row') != null) {
      canvas.setWidth(document.getElementById('canva-row').offsetWidth );
    } else {
      canvas.setWidth(itemHandlerWidth);
      canvas.setHeight(itemHandlerHeight);      
    }
  }

  resizeCanvas();
  
  initAligningGuidelines(canvas);
  
  canvas.observe('object:modified', function (e) {
    var activeObject = e.target;
    activeObject.straighten(45);    
  });

  // load image from menu to canva
  $('.menu img, .menu > img').on('click', function (){
    drawObject(this.src);
  })

  function drawObject(imageSrc) {
    fabric.Image.fromURL(imageSrc, function (oImg) {
      // scale image down before adding it onto canvas
      canvas.add(oImg.set({ left : 110, top: 110}).scale(0.5));
    });
  }

  // save image to png
  $('#saveToPng').on('click', function () {
    //var group = new fabric.Group(canvas.getObjects());
    canvas.setActiveGroup(new fabric.Group(canvas.getObjects())).renderAll();

    var cropZone = canvas.getActiveGroup();
    
    // dont save select helper
    canvas.discardActiveObject().renderAll();
    canvas.discardActiveGroup().renderAll();

    var cropDestination = document.createElement('canvas');
    var context = cropDestination.getContext('2d');
    cropDestination.width = cropZone.width + 60;
    cropDestination.height = cropZone.height + 60;
    
    var cropSourceLeft = cropZone.left - (cropZone.width / 2) - 30;
    var cropSourceTop = cropZone.top - (cropZone.height / 2) - 30;

    if(cropSourceLeft < 0){
      cropSourceLeft = 0;
    }
    if(cropSourceTop < 0){
      cropSourceTop = 0;
    }

    context.drawImage(
      canvas.getElement(),
      cropSourceLeft,
      cropSourceTop,
      cropZone.width + 60,
      cropZone.height + 60,
      0,
      0,
      cropZone.width + 60,
      cropZone.height + 60
    );

    Canvas2Image.saveAsJPEG(cropDestination);
  });

  // delete selected object
  $('#delete').on('click', function () {
    canvas.remove(canvas.getActiveObject());
  });

  // add text to canva
  $('#addText').on('click', function () {
    var text = new fabric.Text($('#canvaText').val(), {left : 210, top: 110});
    canvas.add(text);
  });

  $('#send_image').click(function(e) {
    // Prevent own default clicking
    e.preventDefault();

    // default form var
    var userform = $(this).next('.msg');

    canvas.discardActiveGroup();
    canvas.discardActiveObject();
    canvas.renderAll();
    
      $.ajax({
         url: 'upload/upload_result?type=fabric',
         type: 'POST',
         dataType : 'json', // what type of data do we expect back from the server
         data: {
            data: canvas.toDataURL('image/png'),
            csrf_token: $.cookie('csrf_cookie')
         },
         complete: function(data, status) {
          var msg = data.responseJSON;

            console.log(msg);
            
            //userform.find('.msg').empty();
            //userform.find('.msg')

            userform.empty();
            userform
            .html('<div class=\"alert alert-danger msg\">'
            +'<button class=\"close\" data-close=\"alert\"></button>'
            +msg.result.text+'</div>');       

            if (msg.result.code === 1) {          
              setTimeout(function() {
                // Do something after 5 seconds
                window.location.href = base_URL + 'fabric';
              }, 2000);
            }

            if(status=='success') {
                alert('saved!');
            }
            // alert('Error has been occurred');
         }
      });
   });

})();
