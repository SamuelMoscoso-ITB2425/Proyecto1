<?php
$DBUSER = "crud_user";
$DBPASS = "Pirineus2024!";
$DBNAME = "crud_db";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir usuario | CRUD Example</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: #f6f9fc; margin: 0; padding: 0;}
        .header, .footer { background: #1e90ff; color: #fff; text-align: center; padding: 24px 0; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; box-shadow: 0 2px 16px #d0e3ff; border-radius: 14px; padding: 40px 50px; }
        h1 { color: #1e90ff; }
        label { display:block; margin-top:20px; font-weight: 600;}
        input[type="text"], input[type="email"] { width: 96%; padding: 12px; border: 1px solid #c7e0fb; border-radius: 7px; margin-top: 8px; font-size: 1em;}
        input[type="submit"] { margin-top: 22px; padding: 12px 36px; background: #1e90ff; color: #fff; border: none; border-radius: 7px; font-size: 1.1em; cursor: pointer; box-shadow: 0 2px 8px #b3d8ff;}
        input[type="submit"]:hover { background: #36a1ff;}
        .msg { padding: 12px; border-radius: 7px; margin-bottom: 22px; display: flex; align-items: center; font-size: 1.1em;}
        .success { background: #eafaf1; color: #27ae60;}
        .error { background: #fff2f2; color: #e74c3c;}
        .msg svg { margin-right: 10px;}
        table { width: 100%; border-collapse: collapse; margin-top: 36px;}
        th, td { padding: 12px; border: 1px solid #e4f0ff;}
        th { background: #eaf6ff;}
        tr:nth-child(even) { background: #f7fbff;}
        .links { margin-top:25px; margin-bottom: 12px;}
        .links a { color:#1e90ff; background: #eaf6ff; text-decoration:none; padding:8px 18px; border-radius:7px; margin-right:10px; font-weight: 500;}
        .links a:hover { background: #d0e3ff;}
        @media (max-width: 600px) {
            .container { padding: 16px 6px; }
            input[type="text"], input[type="email"] { width: 96%; }
        }
        .footer { font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="header">
        <h2>CRUD Demo - Añadir usuario</h2>
    </div>
    <div class="container">
        <div class="links">
            <a href="dbtest.php">🏠 Inicio</a>
            <a href="show_users.php">👥 Ver usuarios</a>
        </div>
        <?php
        $mysqli = new mysqli("localhost", $DBUSER, $DBPASS, $DBNAME);
        if ($mysqli->connect_error) {
            echo '<div class="msg error"><svg width="22" height="22" viewBox="0 0 24 24"><path fill="#e74c3c" d="M12 2a10 10 0 1 1 0 20a10 10 0 0 1 0-20zm0 5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0V8a1 1 0 0 1 1-1zm0 10a1.25 1.25 0 1 1 0 2.5a1.25 1.25 0 0 1 0-2.5z"/></svg> Error de conexión: ' . htmlspecialchars($mysqli->connect_error) . '</div>';
            exit;
        }

        $mensaje = '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = trim($_POST["name"]);
            $email = trim($_POST["email"]);
            if ($name && $email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $stmt = $mysqli->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
                $stmt->bind_param("ss", $name, $email);
                if ($stmt->execute()) {
                    $mensaje = '<div class="msg success"><svg width="22" height="22" viewBox="0 0 24 24"><path fill="#27ae60" d="M9 17L4.5 12.5L6 11l3 3l7-7l1.5 1.5z"/></svg> Usuario añadido con éxito</div>';
                } else {
                    $mensaje = '<div class="msg error"><svg width="22" height="22" viewBox="0 0 24 24"><path fill="#e74c3c" d="M12 2a10 10 0 1 1 0 20a10 10 0 0 1 0-20zm0 5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0V8a1 1 0 0 1 1-1zm0 10a1.25 1.25 0 1 1 0 2.5a1.25 1.25 0 0 1 0-2.5z"/></svg> Error al añadir usuario</div>';
                }
                $stmt->close();
            } else {
                $mensaje = '<div class="msg error"><svg width="22" height="22" viewBox="0 0 24 24"><path fill="#e74c3c" d="M12 2a10 10 0 1 1 0 20a10 10 0 0 1 0-20zm0 5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0V8a1 1 0 0 1 1-1zm0 10a1.25 1.25 0 1 1 0 2.5a1.25 1.25 0 0 1 0-2.5z"/></svg> Rellena todos los campos y pon un email válido</div>';
            }
        }
        echo $mensaje;
        ?>
        <form method="post" action="add_user.php" autocomplete="off">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" maxlength="100" required placeholder="Ej. Juan Pérez">

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" maxlength="100" required placeholder="Ej. juan@email.com">

            <input type="submit" value="Añadir usuario">
        </form>

        <h2 style="margin-top:40px;color:#1e90ff;">Lista de usuarios añadidos</h2>
        <div style="max-height:280px; overflow-y:auto;">
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
            <?php
            $result = $mysqli->query("SELECT id, name, email FROM users ORDER BY id DESC");
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".htmlspecialchars($row['id'])."</td>
                            <td>".htmlspecialchars($row['name'])."</td>
                            <td>".htmlspecialchars($row['email'])."</td>
                          </tr>";
                }
                $result->free();
            }
            ?>
        </table>
        </div>
    </div>
    <div class="footer">
        CRUD Demo | Servidor Ubuntu · <?php echo date('Y'); ?>
    </div>
</body>
</html>
