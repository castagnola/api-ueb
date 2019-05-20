<html>
<?php
if (isset($_GET["id"])) {
    ?>
    <div style="text-align:center;border: solid;width:500px; margin-left: 100px; font-family: Times New Roman">
        Reporte de tipo
        <?php echo $this->informe[0]->tipo->nombre ?> El Bosque Supermarket
    </div>
    <?php
} else {
    ?>
    <div style="text-align:center;border: solid;width:500px; margin-left: 100px; font-family: Times New Roman">Reporte
        General El Bosque Supermarket
    </div>
    <?php
}
?>
<!--<img style="height:100px;margin-top: -50px" src="../../../../../../views/images/logo.png"/>-->
</html>
