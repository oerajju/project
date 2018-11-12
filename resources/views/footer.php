</section>
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
<!-- FastClick -->
<script src="<?php echo url('assets/fastclick/lib/fastclick.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo url('js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo url('js/pages/dashboard.js'); ?>"></script>

<!-- AdminLTE for demo purposes -->
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
    function countInbox(){
        var url = baseUrl+"/auth/count-inbox-mail/";
    var xhr = ajaxGetObj(url);
    xhr.done(function(resp){
        $('.count-mail').text(resp.mail);
        $('.count-imail').text(resp.internal);
    }).fail(function(reason){
        var rsp = reason.responseJSON;
        //toast(rsp);
    });
    }

    if( typeof darbandi !='undefined' && darbandi!=''){
        countInbox();
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
   
   function switchAccount(darbandi){
    var url = baseUrl+"/auth/switch-account/"+darbandi;
    var xhr = ajaxGetObj(url);
    xhr.done(function(resp){
        toast(resp);
        window.location.href = baseUrl;
    }).fail(function(reason){
        var rsp = reason.responseJSON;
        toast(rsp);
    });
   }
   function setDefaultSection(id='officeid'){
       if( typeof section !='undefined' && section!=''){
        if($('#'+id).length){
            $('#'+id).val(section).trigger('change');
        }
    }
    }
    function setDefaultOrg(id='orgidint'){
        if(typeof org !='undefined' && org!=''){
        if($('#'+id).length){
            $('#'+id).val(org).trigger('change');
        }
        }
    }
    
    function setDefaultDarbandi(id='darbandiid'){
        if(typeof darbandi !='undefined' && darbandi!=''){
        if($('#'+id).length){
            $('#'+id).val(darbandi).trigger('change');
        }
        }
    }
    
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
