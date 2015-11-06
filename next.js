$(document).keydown(
    function(e)
    {    
        if (e.keyCode == 39) {      
            $(".trash").next().scrollTo();
   
        }
        if (e.keyCode == 37) {      
            $(".trash").prev().scrollTo();
   
        }
    }
);