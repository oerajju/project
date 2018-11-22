<div class="control-sidebar-bg"></div>
<div id="loader-animation" style="position: fixed;width: 100%;height: 100%;left: 0;top: 0;z-index: 99999;  opacity: 1;display: none">
    <div  style="display: table; margin: 0 auto;width: 120px;position: fixed;top: 45%;left: 45%;padding:0px 40px;background-color: #444;border-radius: 0.5em;">
        <ion-spinner icon="ios" class="spinner spinner-ios" style="width: 35px; float:left; stroke: #fff;fill: #fff;">
            <svg viewBox="0 0 64 64" style="width: 100% !important;height: 50px !important;" ><g stroke-width="4" stroke-linecap="round"><line y1="17" y2="29" transform="translate(32,32) rotate(180)"><animate attributeName="stroke-opacity" dur="750ms" values="1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0;1" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(210)"><animate attributeName="stroke-opacity" dur="750ms" values="0;1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(240)"><animate attributeName="stroke-opacity" dur="750ms" values=".1;0;1;.85;.7;.65;.55;.45;.35;.25;.15;.1" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(270)"><animate attributeName="stroke-opacity" dur="750ms" values=".15;.1;0;1;.85;.7;.65;.55;.45;.35;.25;.15" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(300)"><animate attributeName="stroke-opacity" dur="750ms" values=".25;.15;.1;0;1;.85;.7;.65;.55;.45;.35;.25" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(330)"><animate attributeName="stroke-opacity" dur="750ms" values=".35;.25;.15;.1;0;1;.85;.7;.65;.55;.45;.35" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(0)"><animate attributeName="stroke-opacity" dur="750ms" values=".45;.35;.25;.15;.1;0;1;.85;.7;.65;.55;.45" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(30)"><animate attributeName="stroke-opacity" dur="750ms" values=".55;.45;.35;.25;.15;.1;0;1;.85;.7;.65;.55" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(60)"><animate attributeName="stroke-opacity" dur="750ms" values=".65;.55;.45;.35;.25;.15;.1;0;1;.85;.7;.65" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(90)"><animate attributeName="stroke-opacity" dur="750ms" values=".7;.65;.55;.45;.35;.25;.15;.1;0;1;.85;.7" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(120)"><animate attributeName="stroke-opacity" dur="750ms" values=".85;.7;.65;.55;.45;.35;.25;.15;.1;0;1;.85" repeatCount="indefinite"></animate></line><line y1="17" y2="29" transform="translate(32,32) rotate(150)"><animate attributeName="stroke-opacity" dur="750ms" values="1;.85;.7;.65;.55;.45;.35;.25;.15;.1;0;1" repeatCount="indefinite"></animate></line></g></svg></ion-spinner>
        <span style="display: table-cell;vertical-align: middle;font-size: 16px;position: relative;top: -2px;left: 7px;color: white;">Loading...</span>
    </div>
</div>
<!-- iCheck -->
<script src="<?php echo url('plugins/iCheck/icheck.min.js');?>"></script>
<script src="<?php echo url('js/function.js'); ?>" type="text/javascript"></script>
<script src="<?php echo url('js/jquery.toast.min.js'); ?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript">
    function login(e) {
        e.preventDefault();
        if ($('#username').val() == '' || $('#password').val() == '') {
            toast({status: "0", title: "error", text: 'Username & password are both required'});
            console.log('error');
            return false;
        } else {
            var url = '<?php echo url("auth/login");?>';
            var data = $('#loginForm').serialize();
            var xhr = submitFormAjax(url, data);
            xhr.done(function (resp) {
                toast(resp);
                window.location.href = '<?php echo url('/'); ?>';
            }).fail(function (reason) {
                var resp = reason.responseJSON;
                toast(resp);
            });
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
function setTitle(){
   var title = $('#main-body > .row').data('title');
   if(title){
       $('.body-header').html('<div>'+title+'</div>');
       $('title').text(title);
   }else{
       $('.body-header').html('');
       $('title').text('Login to MIS [NMVF]');
   }
}
setTitle();
</script>
</body>
</html>
