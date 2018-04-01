$("#search_query").click(function() {
  $.ajax({
    type: "POST",
    url: "products/search_results.php",
    data: {
      query: $("#search_box").val()
    },
    success: function(data) {
      console.log(data);
      $("#innerSearch").html(data);
    }
  })
})
