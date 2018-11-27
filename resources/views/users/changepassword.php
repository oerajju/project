<?php if(!request()->ajax()):
    include(resource_path().'/views/header.php');
    include(resource_path().'/views/left-menu.php');
 endif; ?>
<style type="text/css">
	/*#spec-fieldset .form-group label{
		width:30%;
	}
	#spec-fieldset .form-group input,#spec-fieldset .form-group select{
		width:70% !important;
	}
	#spec-fieldset .but{
		float:right;
	}
	#spec-div{
		min-height: 200px;
		border: 1px solid black;
		padding: 2px;
		border-top: 0px;
		background:#FFF;
	}*/
	#spec-create{
		width:45%;
		margin-top:8%;
	}
	.spec-fieldset-div{
		width: 200% !important;
		margin-top: 15%;
		background: #ecf0f5;
	}*/
</style>
<div class="clearfix col-md-3 pull-left"></div>
<div id="spec-create" class="box col-md-6">
				<div class="box-header with-border">
                    <h3 class="box-title">Change Password</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="<?php echo $users->userid; ?>" name="userid" id="userid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="username">UserName</label>
					  <input type="text" name='username' id='username' class="form-control" value="<?php echo $users->username; ?>"  disabled >
					</div>
					<div class="form-group">
					  <label for="cur_password">Current Password</label>
					  <input type="password" name='cur_password' id='cur_password' class="form-control"  >
					</div>
				  	<div class="form-group">
					  <label for="new_password">New Password</label>
					  <input type="password" name='new_password' id='new_password' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="confirm_password">Confirm New Password</label>
					  <input type="password" name='confirm_password' id='confirm_password' class="form-control" >
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				 	<button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
				</div>
				</form>
			  </div>
<script>
function formSubmit(e){
    e.preventDefault();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();
    if(new_password != confirm_password){
    	toast({status: 0, title: "error", text:'New Password & Confirm password mismatch'});
    }
    else{
    var url = "users/update-change-password";
    if( $('#userid').val()==""){
        var formData = $("#form").serialize();
        console.log(formData);
    }else{
       url += "/"+ $('#userid').val();
	var formData = $("#form").serialize()+'&_method=PUT';
    }
    var xhr = submitFormAjax(url,formData);
    xhr.done(function(resp){
        resetForm($('#form'));
        toast(resp);
    }).fail(function(reason){
    	var rsp = reason.responseJSON;
    	console.log(rsp);
        toast(rsp);
    });
    }
}
</script>
<?php if(!request()->ajax()):
 include(resource_path().'/views/footer.php');
endif;?>