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
                                <a href="#tab2" data-toggle="tab" class="btn btn-flat btn-primary"  onclick="setPermission();">Menu List</a>
                            </li>
                        </ul>
                    </span>
                    <h4 class="modal-title"> Users Permission</h4>

                </div>
                <div class="modal-body">
                    <div class="tab-content clearfix">
                        <div class="col-md-12 tab-pane active" id="tab1">
                           
                        </div>
                        <div class="row darbandi-roles tab-pane" id="tab2">
                            <div class="col-md-5 ">
                                <ul id="perm-menu" class="sidebar-menu" data-widget="tree">
                                
                                  </ul>
                                </li>
                            </ul>
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
	//console.log(id);	
    $('#user-perm #usertypeid').val(id);
}
function setPermission(){
    var url = "/getmenulist";
    var xhr = ajaxGetObj(url);
    xhr.done(function(response){
        console.log(response);
        createMenuWithPermission('perm-menu',response);
    }).fail(function(){
        console.log("failed");
    });
}
function createMenuWithPermission(domId, response){
if($('#'+domId).length){
   // console.log($('#'+domId).length);
        var t = document.getElementById(domId);
        // var dom = $('#'+domId);
        // $(dom).find("tr:gt(0)").remove();
        // var rowCount = 1;
         var data = response.menu;
         if(data.length){
            console.log(data);
            var html;
            var ul ="";
            for(var i in data){
                // html = "<li id='"+data[i]['parent']['menu_nameen']+'_'+data[i]['parent']['menuid']+"' class='treeview'><a href='#'><i class='fa fa-dashboard'></i> <span>"+data[i]['parent']['menu_nameen']+"</span></a><li>";
                // $('#'+domId).append(html);
                for(var j in data[i]['parent']['children']){
                    console.log(data[i]['parent']['children'][0]['menu_nameen']);
                // ul = "<ul class=''><li><i class='fa fa-circle-o'></i>"+data[i]['parent']['children']['menu_nameen']+"</li></ul>";
                // $('#'+data[i]['parent']['menu_nameen']+'_'+data[i]['pardent']['menuid']).append(ul);
                }
                }
        //           var row = t.insertRow(rowCount);
                 
                   
        //         //row.insertCell().innerHTML[0] = rowCount;
        //         for(var f in fields){
        //             row.insertCell(f).innerHTML = getText(data[i],fields[f]); //data[i][fields[f]];
        //         }
        //         if(actions!=1 ){
        //          row.insertCell(fields.length).innerHTML = "<a href='javascript:void(0)' onclick=\"edit('"+data[i][pk]+"')\" class='btn btn-xs btn-primary' title='Edit'><i class='glyphicon glyphicon-edit'></i></a>&nbsp;&nbsp;<a href='javascript:void(0)' onclick=\"delt('"+data[i][pk]+"')\" class='btn btn-xs btn-danger' title='Delete'><i class='glyphicon glyphicon-trash'></i></a>";
        //         }
        //         if(sn==1){
        //             row.insertCell(0).innerHTML= rowCount; 
        //         }
        //                         rowCount++;

           // }
        //     createPagination(response);
         }else{
            console.log('No data provided to list menu.');
        }
    }else{
        console.log('Dom with id '+ domId+' not found.');
    }
}
</script>