<?php
// ---------------------------
// Connexió a la BBDD (db.php)
// ---------------------------
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexió fallida: " . $conn->connect_error);
}

// ---------------------------
// Lògica per afegir un usuari (add.php)
// ---------------------------
if (isset($_GET['action']) && $_GET['action'] === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    $stmt->execute();
    header("Location: ?"); // Redirigeix a la llista
    exit;
}

// ---------------------------
// Lògica per eliminar usuari (delete.php)
// ---------------------------
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: ?"); // Redirigeix a la llista
    exit;
}

// ---------------------------
// Lògica per editar usuari (edit.php)
// ---------------------------
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    $user = null;
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $result = $conn->query("SELECT * FROM users WHERE id=$id");
        $user = $result->fetch_assoc();
        if (!$user) {
            echo "Usuari no trobat.";
            exit;
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $id    = (int)$_POST['id'];
        $name  = $_POST['name'];
        $email = $_POST['email'];
        $stmt = $conn->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        header("Location: ?");
        exit;
    }
    // Formulari d'edició
    ?>
    <!DOCTYPE html>
    <html lang="ca">
    <head>
        <meta charset="UTF-8">
        <title>Editar usuari</title>
    </head>
    <body>
        <h1>Editar usuari</h1>
        <?php if ($user): ?>
        <form method="post" action="?action=edit">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
            Nom: <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
            Email: <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
            <button type="submit">Desar</button>
        </form>
        <?php endif; ?>
    </body>
    </html>
    <?php
    exit;
}

// ---------------------------
// Llistat d'usuaris + formulari (index.php)
// ---------------------------
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>CRUD mínim</title>
</head>
<body>
    <h1>Llista d’usuaris</h1>
    <table border="1">
        <tr><th>ID</th><th>Nom</th><th>Email</th><th>Accions</th></tr>
        <?php
        $result = $conn->query("SELECT * FROM users");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='?action=edit&id={$row['id']}'>Editar</a> | 
                        <a href='?action=delete&id={$row['id']}' onclick=\"return confirm('Segur que vols eliminar aquest usuari?');\">Eliminar</a>
                    </td>
                 </tr>";
        }
        ?>
    </table>
    <h2>Afegir usuari</h2>
    <form action="?action=add" method="post">
        Nom: <input type="text" name="name" required>
        Email: <input type="email" name="email" required>
        <button type="submit">Afegir</button>
    </form>
</body>
</html>
