<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 { color: #333; margin-bottom: 20px; }
        label {
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
            text-align: left;
            width: 100%;
        }
        input[type="text"], input[type="motpasse"]{
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: blue;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="controllers/RegisterController.php" method="POST">
            <label for="nom">Nom d'utilisateur :</label>
            <input type="text" id="nom" name="nom" required>
            

            <label for="motpasse">Mot de passe :</label>
            <input type="motpasse" id="motpasse" name="motpasse" required>
            
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
