$(".animasi-card").hover(
    function(){
      $(this).filter(':not(:animated)').animate({
         bottom:'15px'
      },'slow');
    // This only fires if the row is not undergoing an animation when you mouseover it
    },
    function() {
      $(this).animate({
         bottom:'0px'
      },'slow');
    });