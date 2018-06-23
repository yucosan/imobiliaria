<!DOCTYPE html>
<html>
<head>
	<title>Imobiliaria</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
	#login_form{
		width:350px;
		height:400px;
		position:relative;
		top:50px;
		margin: auto;
		padding: auto;
	}
</style>
</head>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-user"></span> Sign Up</center></h2>
		<form method="POST" action="register.php">
		Name: <input type="text" name="username" class="form-control" required> 
		<div style="height: 10px;"></div>
		Email: <input type="text" name="email" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		Inquilino ou Senhorio: <select class="form-control contact-form__input contact-form__input--select" id="tipo" name="tipo">
        <option>Inquilino</option>
        <option>Senhorio</option>
      </select>	  
	  <div style="height: 10px;"></div>
		<a href="index.php"><button type="submit" id="botao" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Sign Up</button></a><a href="index.php"> Back to main page</a>
      
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			
			</center>
		</div>
	</div>
</div> 
    <script>
	$(document).ready(function(){
		
function ConvertFormToJSON(form){
    var array = jQuery(form).serializeArray();
    var json = {};
    
    jQuery.each(array, function() {
        json[this.name] = this.value || '';
    });
    
    return json;
}
		
	$("#botao").click(function(){
	//event.preventDefault();
		var array = $("form").serializeArray();
		var json = {};
		
		jQuery.each(array,function(){
			json[this.name] = this.value || '';
		});
		//console.log(json);
		
		
		$.ajax({
            url: "register.php",
            type: 'post',
            data: json,
			dataType: 'json',
			contentType: "application/json; charset=utf-8"			
        })
	
		/*	$.ajax({
    type: 'POST',
    url: 'register.php',
    data: {json: JSON.stringify(json)},
    //dataType: 'json'
}).done(function() { 
    		header("Location: register.php");
	});
        $.ajax({
            type: "POST",
			dataType: "json",
            url: 'register.php',
            data: json,
			contentType : "application/json"
        }).done(function() { 
            console.log("F"); 
        }).fail(function() { 
            console.log("JSON Submit Failed"); 
        });
		var formData = JSON.stringify(json);
		console.log(formData);
		$.ajax({
			type: "POST",
			dataType: "json",
			url: "register.php",
			data: json,
			contentType : "application/json"
        }).done(function() { 
            console.log("F"); 
        }).fail(function() { 
            console.log("JSON Submit Failed"); 
        });
		//return json;
		*/

	});
});
</script>
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
</body>
</html>