(function($) {


	$(document).ready(function() {

    closeBox();

    startNivo();

    $(this).bind('keyup',function(e) {
      if (e.keyCode == 13) {
        $(".controller a.green").trigger('click');
      }
      if (e.keyCode == 27) {
        $(".controller a.red").trigger('click');
      }
    });




    $('#close-overlay').live('click', function(e) {
      closeBox();
      return false;
    });

    $('#accept').live('click', function(e) {
      $("#overlay-content .content").print();
      return false;
    });

    $('#take-picture').live('click', function(e) {
      $.post('ajax.php',{action:'take-picture'},
        function(result) {
          handleAjaxResult($.parseJSON(result));
        }
      );
      return false;
    });




  });

  function startNivo() {
    $('#slider').nivoSlider({
      effect: 'fade',
      directionNav: false,
      controlNav: false,
      pauseOnHover: false,
      pauseTime: 3000
    });
  }

  function handleAjaxResult(result) {
    if (result) {
      for (var key in result) {
        if (key == "addImage") {
          $('#slider').append("<img src='" + result[key] + "' />");
          startNivo();
        }
        if (key == "printPopup") {
          $("#overlay-content .content").html("<img src='" + result[key] + "' width='300px' />");
          openBox();
        }
      }
    }
    else {
      alert("You must connect a camera first!");
    }
  }

  function openBox() {
    $('*').removeClass('controller');
    $('#box').addClass('controller');
    $('#information').hide();
    $('#box').show();
  }
  function closeBox() {
    $('*').removeClass('controller');
    $('#information').addClass('controller');
    $('#information').show();
    $('#box').hide();
  }


}(jQuery));

