<html>
<head>
</head>
<body>
<div style="position:absolute; left:10%;top:10%;width:80%;height:40%;">
    <div>
        <table style="border-collapse: collapse;  ">
            <tr>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><b># Radicado</b></td>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><b>Cliente</b></td>
                <td style="width: 150px; border: solid; border-width: 2px; text-align: center;"><b>Tipo de radicado</b>
                </td>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><b>Estado</b></td>
            </tr>
            <?php

            foreach ($this->informe as $KinfoReporte => $infoReporte) {
            ?>
            <tr>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><?php echo $infoReporte->numero_radicado ?></td>
                <td style="width: 250px; border: solid; border-width: 2px; text-align: center;"><?php echo $infoReporte->usuario->nombre ?></td>
                <td style="width: 150px; border: solid; border-width: 2px; text-align: center;"><?php echo $infoReporte->tipo->nombre ?></td>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><?php echo $infoReporte->estadoRadicado->estado ?></td>
                <?php
                }
                ?>
            </tr>
        </table>
    </div>
</div>
</body>
</html>
