<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="container mt-4">
    <div class="d-flex align-items-end justify-content-between px-3" style="height: 10vh;">
        <div>
            <img src=".\public\logo2.png" class="rounded float-start" alt="Logo User Hub" style="max-height: 100px;">
        </div>
        <div class="d-flex align-items-center gap-3">
            <?php
            if (isset($_SESSION['user_nome'])) {
                echo 'Olá, ' . htmlspecialchars($_SESSION['user_nome']) . '!';
            } else {
                echo 'Olá, visitante!';
            }
            ?>
            <a href="logout.php" class="link-danger float-end">Sair</a>
        </div>
    </div>
</div>
