<!-- AdminLTE for demo purposes -->
<script src="<?php echo url('js/jquery.toast.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo url('plugins/iCheck/icheck.min.js');?>"></script>
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
