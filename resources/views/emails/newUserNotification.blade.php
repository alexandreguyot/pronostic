<!DOCTYPE html>
<html>
<head>
    <title>Nouvel Utilisateur Créé</title>
</head>
<body>
    <h1>Nouvel Utilisateur Créé</h1>
    <p>Un nouvel utilisateur a été créé :</p>
    <ul>
        <li>Nom : {{ $user->name }}</li>
        <li>Email : {{ $user->email }}</li>
    </ul>
</body>
</html>
