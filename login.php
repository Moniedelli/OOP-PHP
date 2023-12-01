<!DOCTYPE html>
<html>
<title>form login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<form class="w3-container w3-card-4" action="loginact.php" method="POST">
    <h2 class="w3-text-blue">Form Login</h2>
    <p>      
    <label class="w3-text-blue"><b>masukkan usernam</b></label>
    <input class="w3-input w3-border" type="text" class="form-control border-primary mb-3" id="username" name="username"></p>
    <p>      
        <label class="w3-text-blue"><b>masukkan password</b></label>
        <input class="w3-input w3-border" type="password" class="form-control border-primary mb-3" id="password" name="password"></p>
    <p>
    <button class="w3-btn w3-blue" type="submit" name="Login" value="Login" class="btn btn-primary">Login</button></p>
</form>
</body>
</html> 