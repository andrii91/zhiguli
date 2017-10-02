$(document).ready(function () {
  function readURL(input, img) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        img.attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#imgInput").change(function () {
    readURL(this, $('#image1'));
  });
  $("#imgInput2").change(function () {
    readURL(this, $('#image2'));
  });
  $("#imgInput3").change(function () {
    readURL(this, $('#image3'));
  });
      $('.modal-btn').click(function(e) {
        e.preventDefault;
        $('#' + $(this).data('modal')).show('1000');
        $('#' + $(this).data('modal')).animate({
            opacity: 1,
        });
        $('body').addClass('overl-h');
        $('.overlay').show('1000');
    });
    $('.overlay, .popup__close').click(function() {
        $('body').removeClass('overl-h');
        $('.modal').hide('1000');
        $('.overlay').hide('1000');
        $('.modal').animate({
            opacity: 0,
        });
    });
  
  $('.answers-carousel h4').click(function(){
    $(this).parent().toggleClass('active');
    $(this).parent().find('.more').slideToggle(200);
  });
});