<html>
<head>
<link rel="stylesheet" href="<?php echo url('assets/bootstrap/dist/css/bootstrap.min.css');?>">
<style>
	thead{
	 	background: #69C;
		text-transform: lowercase;
		text-align: center;
		font-size: 12px;
		color: #fff;
		border-right: 1px solid #95b3d7;
		border-left: 1px solid #95b3d7;
		border-top: 1px solid #95b3d7;
	}
	tbody tr:nth-of-type(2n){
		background : #dbe5f0 !important;
	}
	#employee-list tbody tr{
		font-size: 12px;
		border-bottom: 1px solid #95b3d7;
	}
	#employee-list tbody td{
		padding-bottom:15px;
	}
</style>
</head>
<body style="text-align:center; padding:10px;">

<span>नेमवैफा</span><br/> 
<span>नेपाल महर्षि वैदिक फाउंडेशन</span> <br/>
<span>{{$reportname}}</span> <br/>
<span class="pull-left">कार्यालय: {{$orgname}}</span><br/><br/>
@if(!empty($staff)) 
<table id="employee-list" class="table table-striped table-bordered" align="center">
<thead>
    <tr>
    	<th>S.N.</th>
	    @foreach ($staff as $k =>$v)
	    @foreach ($v as $m =>$w)
	    @if($k==0)
	    <th>{{$m}}</th>
	    @endif 
	    @endforeach
	    @endforeach
    </tr>
</thead>
<tbody>
	@foreach ($staff as $k =>$v)
    <tr>
    	<td>{{$k+1}}</td>
    	@foreach ($v as $m =>$w)
		<td>{{$w}}</td>
		@endforeach
	</tr>
	@endforeach
</table> 
     @endif 
     <script type="text/javascript">
     	<script src="<?php echo url('assets/bootstrap/dist/js/bootstrap.min.js');?>"></script>
     </script>
</body> 
</html>