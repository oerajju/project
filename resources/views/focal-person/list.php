
<div class="box col-md-6">
                    <div class="box-header with-border">
                        <h3 class="box-title">List of Focal Person</h3>

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
                                  <th>सँस्था</th>
                                  <th>Name[English]</th>
                                  <th>post</th>
                                  <th>कार्यहरु</th>
                                </tr>
							  
                                </table>
                        </div>
                      <div id="pagg">
                        <ul class="pagination pagination-sm">
                        </ul>
                          </div>
                    </div>
<script>
    
function table(){
    var url = "focal-person";
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
    createDataTable('country-table',resp,['corgid','nameen','post'],'fpersonid');
}

function edit(id){
    var url = "focal-person";
    url += "/"+id+'/edit';
    var xhr = ajaxGetObj(url);
    xhr.done(function(resp){
        assignValues(resp);
        //$('#staffid').val(resp.levelid);
    }).fail(function(reason){
        toast({status: "0", title: "error", text: "Error on Fetching Data"});
    });

}
function delt(id){
    var url = "focal-person";
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