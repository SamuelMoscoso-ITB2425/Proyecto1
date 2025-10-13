<?php
$DBUSER = "crud_user";
$DBPASS = "Pirineus2024!";
$DBNAME = "crud_db";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Test conexión a la base de datos | CRUD Example</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Montserrat', Arial, sans-serif; background: #f6f9fc; margin: 0; padding: 0;}
        .header, .footer { background: #1e90ff; color: #fff; text-align: center; padding: 24px 0;}
        .container { max-width: 500px; margin: 60px auto; background: #fff; box-shadow: 0 2px 16px #d0e3ff; border-radius: 14px; padding: 40px;}
        h1 { color: #1e90ff; margin-bottom: 24px;}
        .success, .error { padding: 16px; border-radius: 8px; display: flex; align-items: center; font-size: 1.1em; margin-bottom: 18px;}
        .success { background: #eafaf1; color: #27ae60;}
        .error { background: #fff2f2; color: #e74c3c;}
        .success svg, .error svg { margin-right: 10px;}
        .links { margin-top:22px;}
        .links a { color: #1e90ff; background: #eaf6ff; text-decoration: none; padding: 8px 18px; border-radius: 7px; margin-right: 10px; font-weight: 500;}
        .links a:hover { background: #d0e3ff;}
        .footer { font-size: 0.9em; }
    </style>
</head>
<body>
    <div class="header">
        <h2>CRUD Demo - Test de conexión</h2>
    </div>
    <div class="container">
        <h1>Test de conexión a la base de datos</h1>
        <?php
        $mysqli = new mysqli("localhost", $DBUSER, $DBPASS, $DBNAME);
        if ($mysqli->connect_error) {
            echo '<div class="error"><svg width="22" height="22" viewBox="0 0 24 24"><path fill="#e74c3c" d="M12 2a10 10 0 1 1 0 20a10 10 0 0 1 0-20zm0 5a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0V8a1 1 0 0 1 1-1zm0 10a1.25 1.25 0 1 1 0 2.5a1.25 1.25 0 0 1 0-2.5z"/></svg> Error de conexión: ' . htmlspecialchars($mysqli->connect_error) . '</div>';
        } else {
            echo '<div class="success"><svg width="22" height="22" viewBox="0 0 24 24"><path fill="#27ae60" d="M9 17L4.5 12.5L6 11l3 3l7-7l1.5 1.5z"/></svg> ¡Conexión exitosa a la base de datos!</div>';
        }
        ?>
        <div class="links">
            <a href="add_user.php">Añadir usuario</a>
            <a href="show_users.php">Ver usuarios</a>
        </div>
    </div>
    <div class="footer">
        CRUD Demo | Servidor Ubuntu · <?php echo date('Y'); ?>
    </div>
</body>
</html>
