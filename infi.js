 $(".dank div").slice(5).hide();

 var mincount = 10;
 var maxcount = 20;


 $(window).scroll(function () {
     if ($(window).scrollTop() + $(window).height() >= $(document).height() - 250) {
         $(".dank div").slice(mincount, maxcount).fadeIn(600);

         mincount = mincount + 10;
         maxcount = maxcount + 10

     }
 });