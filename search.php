<?php
/*
 * Fichier: search.php
 * Author: Baloran
 * Url: http://baloran.fr
 */
?>
<!DOCTYPE>
<html>
	<head>
	<meta charset="UTF-8"/>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<?php require_once 'load.php';?>
	<script type="text/javascript">
	$(document).ready(function(){
        $('.loader').hide();
        
        
        $('#search').keyup(function(){
          $field = $(this);
          $('#result').html('');
          
          if($field.val().length>1)
          {
            $.ajax({
              type: 'POST',
              url: 'core/req_search.php',
              data: 'search='+$('#search').val(),
              
              beforeSend:function(){
                $('.loader').stop().fadeIn();
              },
              
              success: function(data){
                $('.loader').fadeOut();
                $('#result').html(data);
              }
            });
          }
        });
      });
	</script>
	</head>
	<body>
	<div id="content">
	<form action="core/req_search.php" method="post">
		<label for="search">Rechercher: </label>
		<input type="text" name="search" id="search"/>
	</form>
	<div id="result"></div>
	</div>
	</body>
</html>