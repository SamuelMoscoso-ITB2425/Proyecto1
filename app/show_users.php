<?php
$DBUSER = "crud_user";
$DBPASS = "Pirineus2024!";
$DBNAME = "crud_db";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de usuarios | CRUD Example</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: #f6f9fc; margin: 0; padding: 0;}
        .header, .footer { background: #1e90ff; color: #fff; text-align: center; padding: 24px 0; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; box-shadow: 0 2px 16px #d0e3ff; border-radius: 14px; padding: 40px 50px; }
        h1 { color: #1e90ff; }
        table { width: 100%; border-collapse: collapse; margin-top: 36px;}
        th, td { padding: 12px; border: 1px solid #e4f0ff;}
        th { background: #eaf6ff;}
        tr:nth-child(even) { background: #f7fbff;}
        .links { margin-top:25px; margin-bottom: 12px;}
        .links a { color:#1e90ff; background: #eaf6ff; text-decoration:none; padding:8px 18px; border-radius:7px; margin-right:10px; font-weight: 500;}
        .links a:hover { background: #d0e3ff;}
        .msg { padding: 12px; border-radius: 7px; margin-bottom: 22px; display: flex; align-items: center; font-size: 1.1em;}
        .error { background: #fff2f2; color: #e74c3c;}
        .msg svg { margin-right: 10px;}
        @media (max-width: 600px) {
            .container { padding: 16px 6px; }
        }
        .footer { font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="header">
        <h2>CRUD Demo - Lista de usuarios</h2>
    </div>
    <div class="container">
        <div class="links">
            <a href="dbtest.php">🏠 Inicio</a>
            <a href="add_user.php">➕ Añadir usuario</a>
        </div>
        <h1>Usuarios en la base de datos</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
            <?php
            $mysqli = new mysqli("localhost", $DBUSER, $DBPASS, $DBNAME);
            if ($mysqli->connect_error) {
                echo '<tr><td colspan="3" class="msg error"><svg width="22" height="22" viewBox="0 0 24 24"><path fill="#e74c3c" d="M12 2a10 10 0 1 1 0 20a10 10 0 0 1 0-20zm0 5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0V8a1 1 0 0 1 1-1zm0 10a1.25 1.25 0 1 1 0 2.5a1.25 1.25 0 0 1 0-2.5z"/></svg> Error de conexión: ' . htmlspecialchars($mysqli->connect_error) . '</td></tr>';
            } else {
                $result = $mysqli->query("SELECT id, name, email FROM users ORDER BY id DESC");
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>".htmlspecialchars($row['id'])."</td>
                                    <td>".htmlspecialchars($row['name'])."</td>
                                    <td>".htmlspecialchars($row['email'])."</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' style='text-align:center;'>No hay usuarios aún.</td></tr>";
                    }
                    $result->free();
                } else {
                    echo "<tr><td colspan='3' class='msg error'>Error en la consulta</td></tr>";
                }
                $mysqli->close();
            }
            ?>
        </table>
    </div>
    <div class="footer">
        CRUD Demo | Servidor Ubuntu · <?php echo date('Y'); ?>
    </div>
</body>
</html>
