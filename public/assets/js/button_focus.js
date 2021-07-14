
$(document).ready(function() {
    $("a").click(function() {
      // Instantiate local storage and send the ID 
      localStorage.setItem("clicked", $(this).attr("id"))
      // Remove active from previous link
      $('a').removeClass("active")
      // Add active to current clicked class
      $(this).addClass("active")
    });
  
    $(".no-change").click(function(){
      localStorage.setItem("clicked", ("undefined"))
    })

    // Create a variable to store the ID String 
    var active = localStorage.getItem("clicked")
    // Check the variable
    console.log(active);
    // If user is still new to the website, will be directed to home page; make home link active
    if(active == "null" || active == "undefined" || active == "logout") $("#home").addClass("active")
    // Make previously clicked link active
    active ? $("#" + active).addClass("active") : $("#home").addClass("active")
  })