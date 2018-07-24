<?php
if (isset($_POST['human'])) {
    require_once __DIR__.'/Human.php';
    
    try {
        echo '<pre>';
        var_dump(Human::fromArray($_POST['human']));
        echo '</pre>';
    } catch (RuntimeException $exception) {
        ?>
        <p>An error occured, please, contact the administrator.</p>
        <?php
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Insert title here</title>
    </head>
    <body>
    
    	<form method="POST">
    		<fieldset>
        		<input type="text" name="human[name]" placeholder="name">
        		<input type="number" name="human[age]" placeholder="age">
        		<select name="human[gender]">
        			<option value="male">Male</option>
        			<option value="female">Female</option>
        			<option value="other">Other</option>
        		</select>
    		</fieldset>
    		
    		<fieldset>
        		<input type="text" name="human[eye][color]" placeholder="eye color">
        		<input type="text" name="human[eye][quality]" placeholder="eye quality">
    		</fieldset>
    		
    		<fieldset>
        		<input type="text" name="human[hair][color]" placeholder="hair color">
        		<input type="number" name="human[hair][length]" placeholder="hair length">
    		</fieldset>
    		
    		<button type="submit">Submit</button>
    	</form>
    
    </body>
</html>
