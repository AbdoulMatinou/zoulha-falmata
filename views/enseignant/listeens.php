<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liste des enseignant</h1>
<a href="../../controllers/enseignantCtrl.php?action=formens" >Go to teacher form</a> <br >
<?php 
        if(isset($_GET['message'])){
            ?>
              <span style="color: green; font-size: large"><?php echo $_GET['message']; ?></span>
        <?php }
    ?>

<?php
require_once('../../models/enseignantService.php');
$etService=new enseignantService();
$enseignant=$etService->getAll();
?>    


<table border="1" align="center">
    <tr>
    <th>MATRICULE</th>
    <th>NOM</th>
    <th>PRENOM</th>
    <th>SEXE</th>
    <th>TELEPHONE</th>
    <th>EGMAIL</th>
    <th>ADDRESSE</th>
    <th>ACTIONS</th>
    </tr>
    <?php
foreach($enseignant as $et){
 ?>   
    <tr>
    <td><?php echo $et['matricule']; ?></td>
    <td><?php echo $et['nom']; ?></td>
    <td><?php echo $et['prenom']; ?></td>
    <td><?php echo $et['sexe']; ?></td>
    <td><?php echo $et['tel']; ?></td>
    <td><?php echo $et['egmail']; ?></td>
    <td><?php echo $et['addresse']; ?></td>
    <td><a href="../../controllers/enseignantCtrl.php?action=editForm&matricule=<?php echo $et['matricule']; ?>" >MODIFIER</a>--<a href="../../controllers/enseignantCtrl.php?action=delete&matricule=<?php echo $et['matricule']; ?>"   onClick="return window.confirm('Etes-vous sûre de vouloir supprimer cet enseignant')">SUPPRIMER</a></td>
    </tr>
<?php } ?>
   
</table>

<!--
<input type="hidden" name="action" value="editForm" form="f1" />
<input form="f1"  type="submit" value="MODIFIER" />
<input type="hidden" name="matricule" value="UIN" form="f1" />
-->

<form action="../../controllers/enseignantCtrl.php" method="GET" id="f1"></form>
</body>
</html>