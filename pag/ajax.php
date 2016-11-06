<html>
<head>
<script type="text/javascript">

    function getXMLHTTP() {
        var xmlhttp=false;
        try{
            xmlhttp=new XMLHttpRequest();
        }
        catch(e)	{
            try{
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e){
                try{
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e){
                    xmlhttp=false;
                }
            }
        }
        return xmlhttp;
    }


function buscaLocalidad(provincia) {
    var strURL="localidad.php?provincia="+provincia;
    var req = getXMLHTTP();
    if (req) {
        req.onreadystatechange = function() {
            if (req.readyState == 4) {
                // only if "OK"
                if (req.status == 200) {
                    document.getElementById('localidad').innerHTML =req.responseText ;
                } else {
                    alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                }
            }
        }
			req.open("GET", strURL, true);
			req.send(null);
		}
}

</script>
    <body>
        <?php

        $conexion = mysqli_connect("127.0.0.1","root","","ejemplo");
        $sql = "SELECT * FROM provincia;";
        $resultado = mysqli_query($conexion, $sql);
        echo "<select name='provincia' onchange='buscaLocalidad(this.value)'>";
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "<option value='"  . $fila["id"] . "'>" . $fila["provincia_nombre"] . "</option>";
        }
        echo "</select><br />";
        echo "<select id='localidad'></select>";
        ?>
</body>
</html>