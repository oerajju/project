<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">Menu Setup</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="menuid" id="menuid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="disabled">Menu Parent</label>
					  <select class="form-control" id="menu_parent_id" name="menu_parent_id">
					  <option value="0">.......</option>  
					  <?php
					  	foreach($menus as $m){?>
					  		<option value="<?php echo $m->menuid; ?>"><?php echo $m->menu_nameen; ?></option>
					  <?php } ?>                                  
                        </select>
					</div>
					<div class="form-group">
					  <label for="menu_namenp">नाम [नेपाली]</label>
					  <input type="text" name='menu_namenp' id='menu_namenp' class="form-control"  >
					</div>
				  	<div class="form-group">
					  <label for="menu_nameen">Name[English]</label>
					  <input type="text" name='menu_nameen' id='menu_nameen' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="menu_url">Menu URL</label>
					  <input type="text" name='menu_url' id='menu_url' class="form-control"  >
					</div>
					<div class="form-group">
					  <label for="menu_icon">Menu Icon</label>
					  <input type="text" name='menu_icon' id='menu_icon' class="form-control"  >
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
    var url = "menusetup";
    if( $('#menuid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#menuid').val();
	var formData = $("#form").serialize()+'&_method=PUT';
    }
    var xhr = submitFormAjax(url,formData);
    xhr.done(function(resp){
        resetForm($('#form'));
        table();
        toast(resp);
    }).fail(function(reason){
    	var rsp = reason.responseJSON;
    	console.log(rsp);
        toast(rsp);
    });
}
</script>