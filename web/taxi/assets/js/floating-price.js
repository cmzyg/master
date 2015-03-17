    $(function(){
      $("#datepicker2").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});

        $(function(){
      $("#return_hour").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});

      $(function(){
      $("#return_minute").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


            $(function(){
      $("#saloon").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#estate").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#executive").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#mpv").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#minibus").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});



    $(function(){
      $("#minicoach").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});



    $(function(){
      $("#hour").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});


    $(function(){
      $("#datepicker").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});

          $(function(){
      $("#return_minute").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});

 $(function(){
      $("#meet_and_greet").change(function(){
        dataString = $("#fixed-journey-form").serialize();
        $.ajax({
          type: "POST",
          url: "json-price.php",
          data: dataString,
          dataType: "json",
          timeout: 5000,

      error: function (xhr, err) {
        $("#msg").html(xhr.responseText + xhr.readyState + xhr.status);
      },

      success: function(data) {
        $("#js_hidden_total").val("Total: £" + parseFloat(data.price).toFixed(2));
      }
    });

    return false;
  });
});
