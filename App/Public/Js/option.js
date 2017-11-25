jQuery(document).ready(function($){
  //popup
  $('.tooltip').popup();
  //Dropdown menu
    $('.vietmcn-option-models-setting').click(function () {
        // .parent() selects the A tag, .next() selects the P tag
        $(this).parent().addClass('block').next().slideToggle('fast');
    });
    $('.vietmcn-option-dropdown-item').slideUp('fast');
  //Menu Tab
    var item_num = $('nav li').length + 1;
    var btn_state = true;
    
    $('nav li').hover(function(){
      $(this).addClass('hover');
    },function(){
      $(this).removeClass('hover');
    });

    $('nav li a').on('click',function(){
      if(btn_state){
        btn_state = !btn_state;
        $('nav li a').removeClass('currentPage');
        $(this).addClass('currentPage');
   
        var i = $('nav li a').index(this);
        $('article').removeClass('show');
        $('article').addClass('hide');
        $('article').eq(i).addClass('show');
        
        setTimeout(function(){
          btn_state = !btn_state;
        },500);
      }
    });
    $('nav li a#tab1').on('click', function() {
        $('form#table').attr("action", "options.php#tab1");
    });
    $('nav li a#tab2').on('click', function() {
        $('form#table').attr("action", "options.php#tab2");
    });
    $('nav li a#tab3').on('click', function() {
      $('form#table').attr("action", "options.php#tab3");
  });
    if( window.location.hash == '#tab1' ) {
      $('article').removeClass('show');
      $('article#page1').addClass('show');
      $('form#table').attr("action", "options.php#tab1");
    } else if ( window.location.hash == '#tab2' ) {
      $('article').removeClass('show');
      $('article#page2').addClass('show');
      $('form#table').attr("action", "options.php#tab2");
    } else if ( window.location.hash == '#tab3' ) {
      $('article').removeClass('show');
      $('article#page3').addClass('show');
      $('form#table').attr("action", "options.php#tab3");
    }
});