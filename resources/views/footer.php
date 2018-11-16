</section>
</div>
</div>
<div class="control-sidebar-bg"></div>
<div id="loader-animation" style="position: fixed;width: 100%;height: 100%;left: 0;top: 0;z-index: 99999;  opacity: 1;display: none">
    <div  style="display: table; margin: 0 auto;width: 120px;position: fixed;top: 45%;left: 45%;padding:0px 40px;background-color: #444;border-radius: 0.5em;">
        <ion-spinner icon="ios" class="spinner spinner-ios" style="width: 35px; float:left; stroke: #fff;fill: #fff;">
            <svg viewBox="0 0 64 64" style="width: 100% !important;height: 50px !important;" ><g stroke-width="4" stroke-linecap="round"><line y1="17" y2="29" transform="translate(32,32) rotate(180)"><animate attributeName="stroke-opacity" dur="750ms" values="1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0;1" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(210)"><animate attributeName="stroke-opacity" dur="750ms" values="0;1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(240)"><animate attributeName="stroke-opacity" dur="750ms" values=".1;0;1;.85;.7;.65;.55;.45;.35;.25;.15;.1" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(270)"><animate attributeName="stroke-opacity" dur="750ms" values=".15;.1;0;1;.85;.7;.65;.55;.45;.35;.25;.15" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(300)"><animate attributeName="stroke-opacity" dur="750ms" values=".25;.15;.1;0;1;.85;.7;.65;.55;.45;.35;.25" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(330)"><animate attributeName="stroke-opacity" dur="750ms" values=".35;.25;.15;.1;0;1;.85;.7;.65;.55;.45;.35" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(0)"><animate attributeName="stroke-opacity" dur="750ms" values=".45;.35;.25;.15;.1;0;1;.85;.7;.65;.55;.45" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(30)"><animate attributeName="stroke-opacity" dur="750ms" values=".55;.45;.35;.25;.15;.1;0;1;.85;.7;.65;.55" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(60)"><animate attributeName="stroke-opacity" dur="750ms" values=".65;.55;.45;.35;.25;.15;.1;0;1;.85;.7;.65" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(90)"><animate attributeName="stroke-opacity" dur="750ms" values=".7;.65;.55;.45;.35;.25;.15;.1;0;1;.85;.7" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(120)"><animate attributeName="stroke-opacity" dur="750ms" values=".85;.7;.65;.55;.45;.35;.25;.15;.1;0;1;.85" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(150)"><animate attributeName="stroke-opacity" dur="750ms" values="1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0;1" repeatCount="indefinite"></animate></line></g></svg></ion-spinner>
        <span style="display: table-cell;vertical-align: middle;font-size: 16px;position: relative;top: -2px;left: 7px;color: white;">Loading...</span>
    </div>
</div>
<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy;2018 <a href="https://adminlte.io">Tm center</a>.</strong> All rights
    reserved.
  </footer>
<!-- jQuery 3 -->

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo url('assets/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo url('assets/raphael/raphael.min.js'); ?>"></script>
<script src="<?php echo url('assets/morris.js/morris.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo url('assets/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
<!-- jvectormap -->
<script src="<?php echo url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
<script src="<?php echo url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo url('assets/jquery-knob/dist/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo url('assets/moment/min/moment.min.js'); ?>"></script>
<script src="<?php echo url('assets/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>
<!-- datepicker -->
<script src="<?php echo url('assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
<script src="<?php echo asset('assets/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo asset('assets/jquery-slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- FastClick -->
<script src="<?php echo url('assets/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo url('js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo url('js/pages/dashboard.js'); ?>"></script>

<!-- AdminLTE for demo purposes -->

<script src="<?php echo url('js/scripts.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('js/app.js'); ?>"></script>
<script src="<?php echo url('js/demo.js'); ?>"></script>
<script src="<?php echo url('js/function.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('js/jquery.toast.min.js'); ?>"></script>
<script type="text/javascript">
    
    if (typeof common === "function") {
        common();
    }
    if (typeof table === "function") {
        table();
    }
    var gToastLoader = "";
    var gToastObj = {
        heading: '<h2><i class="fa fa-circle-o-notch fa-spin"></i>&nbsp;Please Wait..</h2>',
        text: '',
        showHideTransition: 'slide',
        allowToastClose: false,
        hideAfter: 7000,
        textAlign: 'center',
        position: 'mid-center',
    };
    

function createLeftMenuWithPermission(domId, response){
    if($('.'+domId).length){
        var data = response.menu;
        if(data.length){
            var ht="";
            var ul ="";
            for(var i in data){
                ht = "<li class='treeview' id='"+data[i]['parent']['menu_nameen']+'_'+data[i]['parent']['menuid']+"' ><a href='#'><i class='fa fa-dashboard'></i><span>"+data[i]['parent']['menu_nameen']+"</span></a></li>";
                $('.sidebar .'+domId).append(ht);
                if(data[i]['parent']['childern']){
                    $('#'+data[i]['parent']['menu_nameen']+'_'+data[i]['parent']['menuid']+' a').append(' <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>');
                $('#' +data[i]['parent']['menu_nameen']+'_'+data[i]['parent']['menuid']).append("<ul class='treeview-menu' id="+data[i]['parent']['menuid']+"></ul>");
                }
                for(var j in data[i]['parent']['childern']){
                    if(data[i]['parent']['childern'][j]['children']){
                        ul = "<li class='treeview' id='"+data[i]['parent']['childern'][j]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['menuid']+"'><a href='#'><i class='fa fa-plus'></i><span>"+data[i]['parent']['childern'][j]['menu_nameen']+"</span><span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></a></li>";
                        $('#'+data[i]['parent']['menu_nameen']+'_'+data[i]['parent']['menuid']+' #'+data[i]['parent']['menuid']).append(ul);
                         $('#' +data[i]['parent']['childern'][j]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['menuid']).append("<ul class='treeview-menu' id="+data[i]['parent']['childern'][j]['menuid']+"></ul>");
                    }
                    else{
                        $('#'+data[i]['parent']['childern'][j]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['menuid']+ 'a').removeAttr('href');
                        ul = "<li id='"+data[i]['parent']['childern'][j]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['menuid']+"'><a data-async='fullpage' href="+baseUrl+'/'+data[i]['parent']['childern'][j]['menu_url']+"><i class='fa fa-circle-o'></i>"+data[i]['parent']['childern'][j]['menu_nameen']+"</a></li>";
                        $('#'+data[i]['parent']['menu_nameen']+'_'+data[i]['parent']['menuid']+' #'+data[i]['parent']['menuid']).append(ul);
                    }
                    for(var k in data[i]['parent']['childern'][j]['children']){
                        subul = "<li id='"+data[i]['parent']['childern'][j]['children'][k]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['children'][k]['menuid']+"'><a data-async='fullpage' href="+baseUrl+'/'+data[i]['parent']['childern'][j]['children'][k]['menu_url']+"><i class='fa fa-circle-o'></i>"+data[i]['parent']['childern'][j]['children'][k]['menu_nameen']+"</a></li>";
                        $('#'+data[i]['parent']['childern'][j]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['menuid']+' #'+data[i]['parent']['childern'][j]['menuid']).append(subul);
                    }
                }
            }
        }else{
            console.log('No data provided to list menu.');
        }
    }else{
        console.log('Dom with id '+ domId+' not found.');
    }
}
function toast(a) {
    var statusToIcon = [
        'error','success','warning','info'
    ];
    var statusToHeading = [
        'Error','Success','Warning','Info'
    ];
    var tostObj = {
    heading: a.title || statusToHeading[a.status],
    text: prepareMessage(a.message),
    showHideTransition: 'slide',
    position: 'top-right',
    hideAfter: 7000,
    loader: false,
    icon: parseInt(a.status)== 'NaN'?a.status:statusToIcon[a.status]
    };
    $.toast(tostObj);
    return true;
}
function parseMessage(msg){
    var m = "";
    if (typeof msg == 'object') {
        for (let i in msg) {
            m += parseMessage(msg[i]);
        }
    } else if (typeof msg == 'string') {
        m += msg + '<br/>';
    }
    return m;
}
    
function prepareMessage(msg){
    var newMessage = parseMessage(msg).trim();
    return newMessage.slice(0, -5);
}
    
function page(e, last) {
    e.preventDefault();
    var entry = $("#selectentry").val();
    var page = e.target.text;
    var index = $("body #pagg ul li.active").text();
    if (page === "Prev") {
        if(index >= 1){
            index--;
            page = index;
        }else{
            return;
        }
    }
    if (page === "Next") {
        if (index != last) {
            index++;
            page = index;
        } else {
            return;
        }
    }
    var path = window.location.href.split('/');

    var path = path[path.length - 1];
     if(path=="search"){
        var data =  $("#form").serialize();
    var url = baseurl + "/search/getlist";
     var entry = $("#selectentry").val() || '';
         var search = $("#searchfill").val() || '';
         // var index = $("body #pagg ul li.active").text() || 1;
         url += "?entry="+entry+"&page="+page;
    var xhr = submitFormAjax(url,data);
    xhr.done(function(resp){
        createTable(resp);
        // table();
        // toast(resp);
    });
    xhr.fail(function(reason){
        var rsp = reason.responseJSON;
        toast(rsp);
    });
     } else{
    var url = baseUrl + "/" + path + "/list-data?entry=" + entry + "&page=" + page + "&search=" + $("#searchfill").val();
    if($('#page-param').length && $('#page-param').val()!=''){
        url += $('#page-param').val();
    }
    var xhr = ajaxGetObj(url);
    xhr.done(function(resp){
        createTable(resp);
    }).fail(function(error){
        console.log(error);
    });
}
}
function logout(e){
   e.preventDefault();
   var xhr = ajaxGetObj('<?php echo url('/').'/auth/logout';?>');
   xhr.done(function(resp){
       toast({status:"1",title:"success",text:resp.text});
       window.location.href = '<?php echo url('/');?>';
   }).fail(function(reason){
       toast({status:"0",title:"error",text:'Cannot Logout Right Now..'});
   });
}

// sets title to all the pages if available
function setTitle(){
   var title = $('#main-body > .row').data('title');
   if(title){
       $('.body-header').html('<div>'+title+'</div>');
       $('title').text(title);
   }else{
       $('.body-header').html('');
       $('title').text('MIS [NMVF]');
   }
}
setTitle();
function setDefaultDate(id='dob'){
    if(typeof nepDate !='undefined' && nepDate!=''){
    if($('#'+id).length){
        $('#'+id).val(nepDate);
    }
    }
}

</script>
</body>
</html>
