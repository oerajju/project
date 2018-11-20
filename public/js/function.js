/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

///onclick 
(function () {
    $(".treeview").hover(function () {

        $(".plus").css({display: "inline"});
    }, function () {

        $(".plus").css({display: "none"});
    });

    //on hover edit
    $(".mail-list").hover(function () {

        $("#edit").css({display: "inline"});
    }, function () {

        $("#edit").css({display: "none"});
    });
    //for menu active-top 
    $('#top-static-menu ul li a').click(function () {
        $('li a').removeClass("active-header");
        $(this).addClass("active-header");
    });
    //for menu active-sidebar 
    $('.treeview-menu li a').click(function () {
        $('.treeview-menu li a').removeClass("active-sidebar");
        $(this).addClass("active-sidebar");
    });
    //on click menu bell
    $("#bell").on('click', function () {
        $(".right-contaner").addClass("disnone");
        $(".right-contaner-bell").toggleClass("disnone");
        $(".right-contaner-help").addClass("disnone");
        //$(".right-contaner-bell").toggleClass( "disnone " ,200, "easeOutSine" );
        // $("#class").toggleClass( "col-lg-9" );
        if ($(".right-contaner-bell").hasClass("disnone")) {
            $("#main-body").removeClass("col-lg-9").addClass("col-lg-12");
            $("#bell").removeClass("active-header");
        } else {
            $("#main-body").removeClass("col-lg-12").addClass("col-lg-9");
        }


    });
    //on click th
    $("#test").on('click', function () {

        $(".right-contaner-bell").addClass("disnone");
        $(".right-contaner-help").addClass("disnone");
        $(".right-contaner").toggleClass("disnone");
        //$(".right-contaner").toggleClass( "disnone " ,200, "easeOutSine" );
        // $("#class").toggleClass( "col-lg-9" );
        if ($(".right-contaner").hasClass("disnone")) {
            $("#main-body").removeClass("col-lg-9").addClass("col-lg-12");
            $("#test").removeClass("active-header");
        } else {
            $("#main-body").removeClass("col-lg-12").addClass("col-lg-9");
        }

    });
    ///on click help
    $("#help").on('click', function () {
        $(".right-contaner-bell").addClass("disnone");
        $(".right-contaner").addClass("disnone");
        $(".right-contaner-help").toggleClass("disnone");
        //$(".right-contaner").toggleClass( "disnone " ,200, "easeOutSine" );
        // $("#class").toggleClass( "col-lg-9" );
        if ($(".right-contaner-help").hasClass("disnone")) {
            $("#main-body").removeClass("col-lg-9").addClass("col-lg-12");
            $("#help").removeClass("active-header");
        } else {
            $("#main-body").removeClass("col-lg-12").addClass("col-lg-9");
        }

    });
    ///on click New
    $("#new-mail").on('click', function () {
// $("#second-body-mail").addClass("disnone");
//$(".right-contaner").addClass("disnone");
        $("#second-body-mail").toggleClass("disnone");
        //$(".right-contaner").toggleClass( "disnone " ,200, "easeOutSine" );
        // $("#class").toggleClass( "col-lg-9" );
        //if($(".right-contaner-help").hasClass("disnone")){
        //   $("#main-body").removeClass("col-lg-9").addClass("col-lg-12");
        // }else{
        //      $("#main-body").removeClass("col-lg-12").addClass("col-lg-9");
        // }

    });
    $('.close-mail').on('click', function () {
        $("#second-body-mail").addClass("disnone");
    });
    ///on check inbox
    $("#check").on('click', function () {
        $("#check-hide-show").toggleClass("disnone");
    });
    ///on click draft
    $(".mail-list").on('click', function () {
        $("#check-hide-show").toggleClass("disnone");
    });
    //togggle mail body
    $(".toggeler").on('click', function (e) {
        var tog = e.target;
        $(tog).parent().find(".on-click-inbox").toggleClass("disnone");
        //$(".on-click-inbox").toggleClass("disnone");
    });

    // document ready here

})();

//add text editor
// $(function () {
//     //Add text editor
//     $("#compose-textarea").wysihtml5();
// });
//add calender



//menu click 
$(function () {

    $("#junk-mail").on('click', function () {
        $("#inbox-body").addClass("disnone");
        $("#sent-items-body").addClass("disnone");
        $("#drafts-body").addClass("disnone");
        $("#junk-mail-body").removeClass("disnone");
    });
    $("#inbox").on('click', function () {
        $("#sent-items").removeClass("active");
        $("#junk-mail-body").addClass("disnone");
        $("#sent-items-body").addClass("disnone");
        $("#drafts-body").addClass("disnone");
        $("#inbox-body").removeClass("disnone");
        $("#inbox").addClass("active");
    });
    $("#sent-items").on('click', function () {
        $("#sent-items").removeClass("active");
        $("#inbox-body").addClass("disnone");
        $("#junk-mail-body").addClass("disnone");
        $("#drafts-body").addClass("disnone");
        $("#sent-items-body").removeClass("disnone");
        $("#sent-items").addClass("active");
    });
    $("#drafts").on('click', function () {
        $("#inbox-body").addClass("disnone");
        $("#junk-mail-body").addClass("disnone");
        $("#sent-items-body").addClass("disnone");
        $("#drafts-body").removeClass("disnone");
    });
});
//for dragbar 
var i = 0;
var dragging = false;
$('#dragbar').mousedown(function (e) {
    e.preventDefault();
    dragging = true;
    var main = $('#main');
    var ghostbar = $('<div>',
            {id: 'ghostbar',
                css: {
                    height: main.outerHeight(),
                    top: main.offset().top,
                    left: main.offset().left
                }
            }).appendTo('body');
    $(document).mousemove(function (e) {
        ghostbar.css("left", e.pageX + 2);
    });
});
$(document).mouseup(function (e) {
    if (dragging)
    {
        var percentage = (e.pageX / window.innerWidth) * 100;
        var mainPercentage = 100 - percentage;
        $('#console').text("side:" + percentage + " main:" + mainPercentage);
        $('#sidebar').css("width", percentage + "%");
        $('#main').css("width", mainPercentage + "%");
        $('body').removeClass("sidebar-collapse");
        $("#main").css("float", "right");
        $('#ghostbar').remove();
        $(document).unbind('mousemove');
        dragging = false;
    }
});
// for remove main flot:right
$(".sidebar-toggle").on('click', function () {
    if ($("body").hasClass("sidebar-collapse")) {
        $("#main").css("float", "right");
    } else {
        $("#main").css("float", "none");
    }

});
//make the navigation active & open
(function ($) {

    //for making the adminlte leftmenu active seeing the current url
    var currentUrl = document.location.href;
    //var a = $('ul.sidebar-menu').find('a[href*="'+currentUrl+'"]:first');
    $('ul.sidebar-menu').find('a').each(function () {
        var href = $(this).attr('href');
        if (currentUrl.indexOf(href) !== -1) {
            $(this).parents('li.treeview').addClass('active');
            $(this).addClass('active-sidebar');
            return false;
        }
    });
    //end of making adminlte leftmentu active functionality
}(jQuery));
//function responsible for loadig animation on ajax requst/response events
(function ($) {
    //start ajax animations & other Operations
    var gt = gLoader;
    $(document).ajaxStart(function () {
        showLoader();
    });
    //stop ajax animations & other operations
    $(document).ajaxStop(function () {
        hideLoader();
    });
    //adding history to the history api for popping it later
    $(document).ajaxSuccess(function (e, jqxhr, options) {
        var requestUrl = options.url;
        if (requestUrl !== window.location.href) {
            $('section.sidebar ul.sidebar-menu a[data-async="fullpage"]').each(function () {
                var url = $(this).attr('href');
                if (url == requestUrl) {
                    var stateObj = {
                        url: requestUrl
                    }
                    var title = $(this).text();
                    window.history.pushState(stateObj, title, requestUrl);
                }
            });
        }
    });
}(jQuery));
//for bindig links to laod async
(function ($) {
    var mc = mainContainer;
    $("body").on("click", "a[data-async='fullpage']", function (e) {
        e.preventDefault();
        var fullUrl = $(this).attr('href');
        loadPage(fullUrl, mc);
    });
}(jQuery));
//this function must run on every page load 
(function ($) {
    var mc = mainContainer;
    renderPartialPages(mc);
    enableStackedPopups();
}(jQuery));

$(document).ready(function () {
    //menu plus minus
    //function adsearch(){
    $('.treeview a').on('click', function () {
        if ($(this).children().hasClass('fa-angle-left')) {
            $(this).children('i.fa-angle-left').removeClass('fa-angle-left').addClass('fa-angle-down');
        } else {
            $(this).children('i.fa-angle-down').removeClass('fa-angle-down').addClass('fa-angle-left');
        }
    });
    
    
    
    //advanced search
    //$//('.advanced-serch').on('click',function(){
   
    //)
});
 function adsearch() {
     //alert('fdas');
        $('.advanced-serch').toggleClass('active');
        if($('.advanced-serch').hasClass('active')){
             $('.adv-search ').addClass('active');
              $('.advanced-serch i').removeClass('fa-angle-double-down').addClass('fa-angle-double-up');
        }
        else {
            $('.advanced-serch i').removeClass('fa-angle-double-up').addClass('fa-angle-double-down');
            $('.adv-search ').removeClass('active');
        }
    }
    
    function autocomplete(id,source,value){
    var ac = $( "#"+id ).autocomplete({
      source: source,
      minLength:0,
      select:function(e,ui){
          populateDataDarta(ui.item.value,value);
          $('#mail_patra_sankhya').focus();
      }
    });
    ac.focus(function(){
        $(this).autocomplete('search',this.value);
    });
    }