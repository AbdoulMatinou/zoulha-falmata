<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Liste des salle</h1>
<a href="../../controllers/salleCtrl.php?action=formsl" >Go to classroom form</a> <br >
<?php 
        if(isset($_GET['message'])){
            ?>
              <span style="color: green; font-size: large"><?php echo $_GET['message']; ?></span>
        <?php }
    ?>

<?php
require_once('../../models/salleService.php');
$etService=new salleService();
$salle=$etService->getAll();
?>    


<table border="1" align="center">
    <tr>
    <th>NUMERO</th>
    <th>NIVEAU</th>
    <th>LIBELLE</th>
    <th>NOMBRE D'ETUDIANT</th>
    <th>ACTIONS</th>
    </tr>
    <?php
foreach($salle as $et){
 ?>   
    <tr>
    <td><?php echo $et['numero']; ?></td>
    <td><?php echo $et['niveau']; ?></td>
    <td><?php echo $et['libelle']; ?></td>
    <td><?php echo $et['nombre d etudiant']; ?></td>
    <td><a href="../../controllers/salleCtrl.php?action=editslFormsl&numero=<?php echo $et['numero']; ?>" >MODIFIER</a>--<a href="../../controllers/salleCtrl.php?action=delete&nimero=<?php echo $et['numero']; ?>"   onClick="return window.confirm('Etes-vous sûre de vouloir supprimer cet salle')">SUPPRIMER</a></td>
    </tr>
<?php } ?>
   
</table>

<!--
<input type="hidden" name="action" value="editForm" form="f1" />
<input form="f1"  type="submit" value="MODIFIER" />
<input type="hidden" name="matricule" value="UIN" form="f1" />
-->

<form action="../../controllers/salleCtrl.php" method="GET" id="f1"></form>
</body>
</html>