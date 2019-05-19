<html>
<div style="height: 50px; width: 1000px; border: none; font-family: 'Times New Roman' ">
    <div style=" border-collapse: collapse;">
        <div style="height: 20px; width: 1000px; border:solid; text-align: center">
            El Bosque Supermarket
        </div>
        <div style="border: none; width: 100px;">
            version: 001
        </div>
        <div style="border: none; width: 1000px;  text-align: right">
            Fecha: <?php $now = new DateTime();
            echo $now->format('Y-m-d')
            ?>
        </div>
    </div>


</div>
</html>