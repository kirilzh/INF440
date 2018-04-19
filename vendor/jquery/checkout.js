$("#checkout").click(function(){
  console.log("clicked");
  $.ajax({
    type: "GET",
    url: "product/checkAuth.php",
    success: function(data){
      console.log(data);
    }
  })
})
