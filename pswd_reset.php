<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
    <link rel="stylesheet" href="pswd_reset.css">
</head>
<body>
    <form action="#">
            <h2 class="h21">Reinitialiser mon mot de passe</h2><br>
            <label for="email1">Email:</label><br>
            <input type="email" name="email1" class="entrer" autocomplete="off" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}" required><br>
            <label for="password1">Nouveau mot de passe:</label><br>
            <input type="password" name="password1" class="entrer" required><br>
            <label for="password2">Confirmation:</label><br>
            <input type="password" name="password2" class="entrer" required><br>
            <button type="submit" name="reset1">Reinitialiser</button>
    </form>
</body>
</html>