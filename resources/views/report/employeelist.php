<?php if(!request()->ajax()):
    include(resource_path().'/views/header.php');
    include(resource_path().'/views/left-menu.php');
 endif; ?>
 <style>
 #second-content-section{
 	padding-top:8%;
 	padding-left:10%;
 	margin-left:20%;

 }
 #form label{
 	width:25%;
 	float:left;
 }
 #form select,#form input{
 	float:right;
 }
 #form #download{
 	float:left;
 	width:5px !important;
 }
 .download{
 	padding-left:20px;
 	padding-top:10px;
 }
 /*.header{
 	background:white;
 	color:black;
 	padding:5px;
 }*/
</style>
<!-- <div class="header with-border">
<h3 class="title">Generate Employee Report</h3>
</div> -->
	<div id="second-content-section" class="col-md-7">
		<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">कर्मचारी सूचि</h3>
				</div>
				<form role="form" action="<?php echo url('report/get-employee');?>" method="post" id="form" class="oas-form-inline" target="_blank">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="orgid">कार्यालय</label>
					  <select class="form-control" id="orgid" name="orgid">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($organization as $orgn){?>
					  		<option value="<?php echo $orgn->orgid;?>"><?php echo $orgn->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="post">पद</label>
					  <select class="form-control" id="post" name="post">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($post as $p){?>
					  		<option value="<?php echo $p->pid; ?>"><?php echo $p->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="gender">लिङ्ग</label>
					  <select class="form-control" id="gender" name="gender">
					  	<option value="0">.......</option>
					  	<option value="1">पुरुष</option>
					  	<option value="2">महिला</option>
					  	<option value="3">अन्य</option>
					  </select>
					</div>
				  	<div class="form-group">
					  <label for="name">नाम</label>
					  <input type="text" name='name' id='name' class="form-control" >
					</div>
					<div class="download form-group">
						<label class="text-center" for="download" style="width:50% !important;">Download in excel</label>
						<input type="checkbox" name="download" id ="download" class="pull-left"/>
					</div>
				<div class="box-footer"> 
					<button type="submit" class="btn btn-primary" >Submit</button>
				 	<button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
				</div>
				</form>
			  </div>
	</div>
<script>
// function formSubmit(e){
//     e.preventDefault();
//     var url = "report/employeesearch";
//     // if( $('#pid').val()==""){
//     //     var formData = $("#form").serialize();
//     // }else{
//        //url += "/"+ $('#pid').val();
// 	var formData = $("#form").serialize();
//     //}
//     var xhr = submitFormAjax(url,formData);
//     xhr.done(function(resp){
//         resetForm($('#form'));
//         table();
//         toast(resp);
//     }).fail(function(reason){
//     	var rsp = reason.responseJSON;
//     	console.log(rsp);
//         toast(rsp);
//     });
// }
</script>
<?php if(!request()->ajax()):
 include(resource_path().'/views/footer.php');
endif;?>