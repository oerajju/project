<style type="text/css">
	.row-color tr{
        background: #fbfbfb;
    }
    .row-color tr:nth-child(1){
        background: #d4d4d4;
    }
    .staff{
        border: none !important;
    }
    .staff a{
        padding-left: 3px;
    }
    .tree li span.name{
        padding-left: 0px;
    }
    .section div>.fa:after{
        content: '';
        font-size: 20px;
        font-weight: bolder;
        color: #3c8dbc;
        border-bottom: 2px dotted #3c8dbc;
        width: 15px;
        height: 10px;
        position: relative;
        display: inline-block;
        top: -3px;    
    }
    .section div>.fa, .section .name>.fa {
        font-size: 18px;
    }
    .users .list-group li:hover{
        background-color: #f4f4f4;

        cursor: pointer;
    }
    .row.users{
        max-height: 500px;
        overflow: auto;
    }
	.modal-header ul {

        padding-right: 100px;
    }
    .modal-header .nav > li > a:focus{
        background: #286090;
    }
    .modal-header .nav > li > a:hover{
        background: #286090;
        color:#fff;
    }
    .modal-header .nav > li.active a{

        color:#fff;
    }
    .modal-header ul li{
        display: inline-block;
        padding-right: 5px;
    }
</style>
<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">प्रयोगकर्ताको प्रकार</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="utid" id="utid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="parent">parent</label>
					  <select class="form-control" id="parent" name="parent">
					  	<option value="0">None</option>
					  	 <?php
					  	foreach($parent as $p){?>
					  		<option value="<?php echo $p->utid; ?>"><?php echo $p->nameen; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="level">तह</label>
					  <input type="text" name='level' id='level' class="form-control"  >
					</div>
					<div class="form-group">
					  <label for="namenp">नाम [नेपाली]</label>
					  <input type="text" name='namenp' id='namenp' class="form-control"  >
					</div>
				  	<div class="form-group">
					  <label for="nameen">Name[English]</label>
					  <input type="text" name='nameen' id='nameen' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="descriptionnp">व्याख्या(नेपाली)</label>
					  <input type="text" name='descriptionnp' id='descriptionnp' class="form-control" >
					</div>
					<button type="button" data-toggle="modal" data-target="#user-perm">Open Modal</button>
					<div class="form-group">
					  <label for="descriptionen">व्याख्या(अङ्ग्रेजी) </label>
					  <input type="text" name='descriptionen' id='descriptionen' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="approved">स्विकृत</label>
					  <select class="form-control" id="approved" name="approved">
                                            <option value="1" selected="selected">हो</option>
                                            <option value="0" >होईन</option>
                                          </select>
					</div>
					<div class="form-group">
					  <label for="disabled">निलम्वित्</label>
					  <select class="form-control" id="disabled" name="disabled">                                    
                                  
                                  <option value="1" >हो</option>
                                  <option value="0" selected="selected" >होईन</option>
                                                 
                        </select>
					</div>
					<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				 	<button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
				</div>
				</form>
			  </div>

<div id="user-perm" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active">
                                <a  href="#tab1" data-toggle="tab" class="btn btn-flat btn-primary">Subordinate</a>
                            </li>
                            <li>
                                <a href="#tab2" data-toggle="tab" class="btn btn-flat btn-primary">Menu List</a>
                            </li>
                        </ul>
                    </span>
                    <h4 class="modal-title"> Users Permission</h4>

                </div>
                <div class="modal-body">
                    <div class="tab-content clearfix">
                        <div class="col-md-12 tab-pane active" id="tab1">
                            <div class="row darbandi-create">
                                <div class="col-lg-12 ">
                                    <div class="form-inline ">
                                        <form action="" method="post" id="drb-staff-form">
                                            <div class="form-group">
                                                <input type="hidden" name="staffidp" id="staffidp" value="">
                                                <input type="hidden" name="namep" id="namep" value="">

                                                <input type="hidden" name="staffid" id="staffid" value="">
                                                <input type="hidden" name="darbandiid"  id="darbandiid" value="">
                                                <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                                                <label for="emptype">Employee</label>
                                                <input type="text" class="form-control" name="employee-name"  id='employee-name'>
                                            </div>
                                            <div class="form-group small-button">
                                                <label for="officeid"></label>
                                                <button type="button"   class="form-control btn btn-success" onclick="addEmployee()">ADD</button>
                                                <button type="button" class="form-control btn btn-danger" onclick="resetEmployee()">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <div id="imaginary_container"> 
                                        <div class="input-group stylish-input-group">
                                            <input type="text" class="form-control"  placeholder="Search by Name or PIS ID" id="search-key" name="search-key" >
                                            <span class="input-group-addon" style="padding:5px 14px;">
                                                <button type="submit" onclick="searchEmps()">
                                                    <span class="glyphicon glyphicon-search"></span>
                                                </button>  
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr/>

                            <div class="row users">
                                <div class="col-md-4">
                                    <div class="box box-primary box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">New Users</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <ul class="list-group" id="new-users">

                                            </ul> 
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>  
                                <div class="col-md-4">
                                    <div class="box box-success box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Active Users</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <ul class="list-group" id="active-users">

                                            </ul> 
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>  
                                <div class="col-md-4">
                                    <div class="box box-default box-solid">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">Previous Users</h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body">
                                            <ul class="list-group" id="old-users">

                                            </ul> 
                                            </ul> 
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div class="row darbandi-roles tab-pane" id="tab2">
                            <div class="col-md-12 ">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
</div>
<script>
function formSubmit(e){
    e.preventDefault();
    var url = "user-type";
    if( $('#utid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#utid').val();
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
function perm(id){
	console.log(id);	
      $('#user-perm #usertypeid').val(id);
}
</script>