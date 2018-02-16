 
    if ($.browser.msie && $.browser.version.substr(0,1)<7)
    {            
      $('.tooltip').mouseover(function(e){  

            $(this).children('span').show();                
          }).mouseout(function(){
            $(this).children('span').hide();
          })
    }
