<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Insert title here</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body class="container">
        <form action="script.php" method="post">
    		<label for="firstname">firstname</label>
    		<input class="form-control" name="firstname" type="text" />
    		<br/>
    		<label for="lastname">lastname</label>
    		<input class="form-control" name="lastname" type="text" />
    		<br/>
    		<label for="email">email</label>
    		<input class="form-control" name="email" type="email" />
    		<br/>
    		<label for="address">address</label>
    		<input class="form-control" name="address" type="text" />
    		<br/>
    		<label for="zipcode">zip code</label>
    		<input class="form-control" name="zipcode" type="text" />
    		<br/>
    		<label for="country">country</label>
    		<select class="form-control" name="country">
    			<option value="DE">Deutchland</option>
    			<option value="LU">Luxembourg</option>
    			<option value="FR">France</option>
    			<option value="BE">Belgique</option>
    		</select>
    		<br/>
    		<label for="prefereddob">prefered dob</label>
    		<select class="form-control" name="prefereddob">
    			<option value="corona">corona</option>
    			<option value="heineken">heineken</option>
    			<option value="skol">skol</option>
    			<option value="lager">lager</option>
    		</select>
    		<br/>
    		<label for="gender">gender</label>
    		<select name="gender" class="form-control">
                    <option value="m" <?php if ($gender == 'm') {
                                            echo 'selected';
                                        } ?>>Men</option>
                    <option value="f" <?php if ($gender == 'f') {
                                            echo 'selected';
                                        } ?>>Women</option>
                    <option value="o" <?php if ($gender == 'o') {
                                            echo 'selected';
                                        } ?>>Other</option>
                </select>
    		<br/>
    		<button class="btn btn-success btn btn-block" type="button">submit</button>
    	</form>
    	
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>