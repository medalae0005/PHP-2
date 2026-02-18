<?php
session_start();

if (!isset($_SESSION["name"])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION["name"];
$role = $_SESSION["role"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>
<?php
if ($role == "administrateur") {
    echo "Bienvenue Administrateur $name";
} elseif ($role == "formateur") {
    echo "Bienvenue Formateur $name";
} else {
    echo "Bienvenue Apprenant $name";
}
?>
</h2>

<a href="logout.php">
    <button>Se déconnecter</button>
</a>

</body>
</html>