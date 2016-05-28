<?php
$up_id = $_GET['up_id'];
?>
<html>
<head>
	<style type="text/css">
	#progress_container {
		width: 300px; 
		height: 30px; 
		border: 1px solid #CCCCCC; 
		background-color:#EBEBEB;
		display: block; 
		margin:5px 0px 0px 0px;
	}

	#progress_bar {
		position: relative; 
		height: 30px; 
		background-color: #F3631C; 
		width: 0%; 
		z-index:10; 
	}

	#progress_completed {
		font-size:16px; 
		z-index:40; 
		line-height:30px; 
		padding-left:4px; 
		color:#FFFFFF;
	}
	#progress_parent{
		border:1px solid #ddd;
		padding:10px;
	}
	</style>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script> 

	<script>
	$(document).ready(function() {  
		setInterval(function()  
		{
		$.ajax({
			  type: "POST",
			  url: "/submissions/progress",
			  data: {up_id:'<?php echo $up_id; ?>'}
			}).done(function( data ) {
              	                $('#progress_container').fadeIn(100);		
				$('#progress_bar').width(data +"%");	
				$('#progress_completed').html(parseInt(data) +"%");
			});

		},500);
	}); 

	</script>
</head>	
<body style="margin:0px"> 
	<div id="progress_parent">
		<div id="progress_container">
			<div id="progress_bar">
		  		 <div id="progress_completed"></div>
			</div>
		</div>
	</div>
</body>
</html>