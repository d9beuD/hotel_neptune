<?php

require_once __DIR__ . '/../database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérification qu'on a toutes les infos nécessaires
    if (
        (!isset($_POST['email']) || !isset($_POST['password']))
        || (empty($_POST['email']) || empty($_POST['password']))
    ) {
        die("Le formulaire n'est pas complet.");
    }

    // On vérifie que l'utilisateur existe
    $request = $pdo->prepare('SELECT * FROM users u WHERE u.email = :email');
    $request->execute(['email' => $_POST['email']]);

    if (!$result = $request->fetch()) {
        die("L'utilisateur n'existe pas.");
    }

    // On vérifie si le mot de passe est bon
    if (!password_verify($_POST['password'], $result['password'])) {
        die("La paire email/mot de passe est incorrecte.");
    }

    // On démarre la session
    session_start();
    $_SESSION['user'] = $result;

    header('Location: /');
    exit;
}

?>
<?php include __DIR__ . '/../_includes/document_start.php'; ?>

<div class="container my-5">
    <div class="mx-auto" style="max-width: 30rem;">
        <div class="card bg-body-tertiary">
            <div class="card-body">
                <h1>Se connecter</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            Se connecter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../_includes/document_end.php'; ?>