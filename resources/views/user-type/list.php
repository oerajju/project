
<div class="box col-md-6">
                    <div class="box-header with-border">
                        <h3 class="box-title">List of User Type</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div id="table" class="box-body">
                        <form id="tableform" >
                        <b>SHOW</b><select id="selectentry" onchange="table(event)">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                            <b>Entries</b>
                          </form>
                            <div style="float:right">
                      <form id="srch" name="srch" onsubmit="searchClicked(event)" >
                    <input  id="searchfill" placeholder="Search" type="text" name="search">
                    <button type="submit"  id="searchbtn" name="submit"><i class="fa fa-search"></i></button>
                  </form>
                </div>

                        <div id="showtable" class="box-body">
                            <table id="country-table" class="table table-striped table-bordered">
                                <tr>
                                  <th>S.N.</th>
                                  <th>Level</th>
                                  <th>Name [English]</th>
                                  <th>नाम [नेपाली]</th> 
                                  <th>कार्यहरु</th>
                                </tr>
							  
                                </table>
                        </div>
                      <div id="pagg">
                        <ul class="pagination pagination-sm">
                        </ul>
                          </div>
                    </div>
                </div>

<script>
    
function table(){
    var url = "user-type";
    url += "/list-data";
    var entry = $("#selectentry").val() || '';
    var search = $("#searchfill").val() || '';
    var index = $("body #pagg ul li.active").text() || 1;
    url += "?entry="+entry+"&page="+index+"&search="+search;
    var xhr = ajaxGetObj(url);
    xhr.done(function(response){
        createTable(response);
    }).fail(function(){
        console.log("failed");
    });
}

function searchClicked(e){
    e.preventDefault();
    table();
}

function createTable(resp){
    createDataTable('country-table',resp,['level','nameen','namenp'],'utid',0,1);
}

function createDataTable(domId,response,fields,pk,actions,sn){
    if($('#'+domId).length){
        var t = document.getElementById(domId);
        var dom = $('#'+domId);
        $(dom).find("tr:gt(0)").remove();
        var rowCount = 1;
        var data = response.data;
        if(data.length){
            
            for(var i in data){
                  var row = t.insertRow(rowCount);
                 
                   
                //row.insertCell().innerHTML[0] = rowCount;
                for(var f in fields){
                    row.insertCell(f).innerHTML = getText(data[i],fields[f]); //data[i][fields[f]];
                }
                if(actions!=1 ){
                 row.insertCell(fields.length).innerHTML = "<a href='javascript:void(0)' onclick=\"edit('"+data[i][pk]+"')\" class='btn btn-xs btn-primary' title='Edit'><i class='glyphicon glyphicon-edit'></i></a>&nbsp;&nbsp;<a href='javascript:void(0)' onclick=\"delt('"+data[i][pk]+"')\" class='btn btn-xs btn-danger' title='Delete'><i class='glyphicon glyphicon-trash'></i></a>&nbsp;&nbsp;<a href='javascript:void(0)' data-toggle='modal' data-target='#user-perm' onclick=\"perm('"+data[i][pk]+"')\" class='btn btn-xs btn-danger' title='Configuration Setting'><i class='fa fa-cog'></i></a>";
                }
                if(sn==1){
                    row.insertCell(0).innerHTML= rowCount; 
                }
                                rowCount++;

            }
            createPagination(response);
        }else{
            console.log('No data provided to crate table.');
        }
    }else{
        console.log('Dom with id '+ domId+' not found.');
    }
}



function edit(id){
    var url = "user-type";
    url += "/"+id+'/edit';
    var xhr = ajaxGetObj(url);
    xhr.done(function(resp){
        assignValues(resp);
        //$('#id').val(resp.levelid);
    }).fail(function(reason){
        toast({status: "0", title: "error", text: "Error on Fetching Data"});
    });

}
function delt(id){
    var url = "user-type";
    url += "/"+id;
    var xhr = deleteData(url);
    xhr.done(function(resp){
        toast(resp);
        table();
    }).fail(function(reason){
        console.log("Fail");
    });
}
table();
</script>