<html>

<head>
    <title>Formulaire ajout salle</title>
</head>

<body>
    <h1>Formulaire ajout salle</h1>
    <a href="../../controllers/salleCtrl.php?action=liste" >Go to classroom list</a> <br >
  
    <form action="../../controllers/salleCtrl.php" method="post">
    <table  align="center">
        <tr>
            <td>NUMERO</td>
            <td><input type="number" name="numero" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>NIVEAU</td>
            <td><input type="text" name="niveau" autocomplete="off" required></td>
        </tr>
        <tr>
            <td>LIBELLE</td>
            <td><input type="text" name="prenom" required></td>
            </tr>
            <tr>
            <td>NOMBRE D'ETUDIANT</td>
            <td><input type="text" name="nombre d'etudiant" required></td>
        </tr>
        <tr>
            <input type="hidden" name="action" value="ajout">
            <td colspan="2" style="text-align: center">  
<input type='reset' style="background-color: red; color: white" value="VIDER"> 
&nbsp; &nbsp; &nbsp;&nbsp;
<input type='submit' style="background-color: green; color: white" value="AJOUTER"></td>
        </tr>
    </table>
    </form>
</body>

</html>