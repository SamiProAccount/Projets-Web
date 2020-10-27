
$(document).ready(function(){

    //Module 1 Animation Navbar:

  navbar =$('.navbar');
  var boole=0;
  
  $(window).scroll(function(){

  if(boole==0){
    if($(window).scrollTop() >=5){
      navbar.animate({
      height : '50px',
      },function(){
        navbar.css({boxShadow: '0 2px 15px',color:'rgb(224, 224, 224)'});
      });
      boole=1;
    }
  }
  else {
    if($(window).scrollTop() <10){
    navbar.animate({
      height : '70px',
     
    },function(){
      navbar.css({boxShadow: '0 0px 0px'});

    });
    boole=0;
  }
  }

  });

    //Module 2 Animation Hover:

    mbbarre =$('.mbbarre');
    navitem =$('.nav-item');

    
    navitem.mouseover(function anim(){
        $(this).find('.mbbarre').animate({
          width:'20px',
          height:'4px',
          border:'rgb(140, 240, 140)',
          display:'block',
        });
    });

    navitem.mouseleave(function(){
      $(this).find('.mbbarre').animate({
        width:'0px',
        height:'0px',
        border:'0px',
      });
    });

    //Module 3:
    
    $(window).on('load', function(){
      $('.blockitem').animate({
        left:'50',
        opacity: '1',
      }, "slow", function(){
        texte();
      });
    });
    
    function texte(){
      $('.anim2').animate({
      left: '60',
      opacity: '1',
    }, "slow");
    }

    $(window).on('load',function laptop(){
      $('.laptop').animate({
        right: '50',
        opacity: '1',
      }, "slow");
    });

    //Module 4:

    $(window).scroll(function(){
      if($(window).scrollTop() >=5){
        $('.blockleft').animate({
          opacity:'1',
          right:'10px',
        });
        $('.blockright').animate({
          opacity:'1',
          right: '50px', //modifier a aligner avec l'image du dessus
        });
      }

    }); 

    

  
   

    
    
  
});

