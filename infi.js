 $(".dank .trash").slice(5).hide();

 var mincount = 10;
 var maxcount = 20;

 $(window).scroll(function () {
     if ($(window).scrollTop() + $(window).height() >= $(document).height() - 250) {
         $(".dank .trash").slice(mincount, maxcount).fadeIn(0);

         mincount = mincount + 5;
         maxcount = maxcount + 5

     }
 });