<?php
session_start();

$users = [

    [
        "name" => "Ahmed",
        "password" => "admin123",
        "role" => "administrateur",
        "active" => true
    ],
    [
        "name" => "Sara",
        "password" => "pass456",
        "role" => "formateur",
        "active" => true
    ],
    [
        "name" => "Leila",
        "password" => "test789",
        "role" => "apprenant",
        "active" => false
    ],
    [
        "name" => "Alae",
        "password" => "test309",
        "role" => "apprenant",
        "active" => true
    ]
];

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $userFound = false;

    foreach ($users as $user) {

        if ($user["name"] === $username && $user["password"] === $password) {

            $userFound = true;

            if ($user["active"] === true) {

                $_SESSION["name"] = $user["name"];
                $_SESSION["role"] = $user["role"];

                 header("Location: dashboard.php");
                exit();
            } else {
                $message = "Compte désactivé";
            }
        }
    }

    if (!$userFound) {
        $message = "Identifiants incorrects";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Page d'authentification</h2>

<form method="POST">
    <label>Nom utilisateur :</label>
    <input type="text" name="username" required><br><br>

    <label>Mot de passe :</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Se connecter</button>
</form>

<p style="color:red;">
    <?php echo $message; ?>
</p>

</body>
</html>