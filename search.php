<!DOCTYPE script PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><?php require_once 'load.php';?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#search').keyup(function(){
		$field = $(this);
		$('#result').html('');

		if($field.val().length>1)
		{
			$.ajax({
				type:'POST',
				url: 'req_search.php',
				data: 'search='+$('#search').val(),

				sucess: function(data){
					$('#result').html(data);
				}
			});
		}
	});
});
</script>
</head>
<body>
<form action="req_search.php" method="POST">
<label for="search">Rechercher: </label>
<input type="text" name="search" id="search"/>
</form>
<div id="result"></div>
</body>
</html>