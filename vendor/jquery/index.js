$(document).ready(function() {
  $.ajax({
    type: "GET",
    url: "home.php",
    success: function(data) {
      $("#res").html(data);
    }
  })
})
