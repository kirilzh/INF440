$(document).ready(function() {
  $.ajax({
    type: "POST",
    url: "products/results.php",
    success: function(data) {
      $("#products").append(data);
    }
  })
})

$("#home_nav").click(function() {
  $.ajax({
    type: "GET",
    url: "home.php",
    success: function(data) {
      $("#res").html(data);
    }
  })
})

$("#products_nav").click(function() {
  $.ajax({
    type: "GET",
    url: "products.php",
    success: function(data) {
      console.log(data);
      $("#res").html(data);
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
      $("#products").html(data);
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
      $("#products").html(data);
    }
  })
})

// $("#search_query").click(function() {
//   $.ajax({
//     type: "POST",
//     url: "products/search_results.php",
//     data: {
//       query: $("#search_box").val()
//     },
//     success: function(data) {
//       console.log(data);
//       $("#res").html(data);
//     }
//   })
// })
