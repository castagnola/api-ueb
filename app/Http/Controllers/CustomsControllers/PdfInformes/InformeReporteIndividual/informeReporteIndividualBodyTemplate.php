<html>
<head>
</head>
<body>
<div style="position:absolute; left:10%;top:10%;width:80%;height:40%;">
    <div>
        <table style="border-collapse: collapse;   ">
            <caption  style="text-align: center; border: solid; background-color: #2d995b;">Datos Generales</caption>

            <tr>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><b>Identificacion</b></td>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><?php echo $this->informe[0]->usuario->identificacion ?></td>
                <td style="width: 150px; border: solid; border-width: 2px; text-align: center;"><b>Nombre</b>
                </td>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><?php echo $this->informe[0]->usuario->nombre ?></td>
            </tr>

            <tr>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><b>Correo</b></td>
                <td style="width: 250px; border: solid; border-width: 2px; text-align: center;"><?php echo $this->informe[0]->usuario->email ?></td>
                <td style="width: 150px; border: solid; border-width: 2px; text-align: center;"><b>Telefono</b></td>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><?php echo $this->informe[0]->usuario->telefono ?></td>
            </tr>
            <tr>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><b>PQRS</b></td>
                <td style="width: 250px; border: solid; border-width: 2px; text-align: center;"><?php echo $this->informe[0]->tipo->nombre?></td>
                <td style="width: 150px; border: solid; border-width: 2px; text-align: center;"><b>Estado</b></td>
                <td style="width: 200px; border: solid; border-width: 2px; text-align: center;"><?php echo $this->informe[0]->estadoRadicado->estado  ?></td>
            </tr>
            <tr>
            </tr>
        </table>
        <div style="height: 50px"></div>
        <div style="border: none">Comentarios del cliente: <?php echo $this->informe[0]->comentarios ?></div>

    </div>
</div>


</div>
</body>
</html>
