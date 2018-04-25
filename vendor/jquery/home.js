$("#search_query").click(function() {
  $.ajax({
    type: "POST",
    url: "products/search_results.php",
    data: {
      query: $("#search_box").val()
    },
    success: function(data) {
      $("#innerSearch").html(data);
    }
  })
})

$("#non-fiction").click(function() {
  $.ajax({
    type: "POST",
    url: "products/results.php",
    data: {
      category: "non-fiction"
    },
    success: function(data) {
      console.log("non-f");
      $("#b").html(data);
    }
  })
})

$("#fiction").click(function() {
  $.ajax({
    type: "POST",
    url: "products/results.php",
    data: {
      category: "fiction"
    },
    success: function(data) {
      console.log("fiction");
      $("#b").html(data);
    }
  })
})
