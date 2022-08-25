<?php
include_once 'DbConfig.php';
$query = "SELECT * FROM country";
$result = $con->query($query);
?>
<html>
<head>
    <title>Практическая 8 Задача 3 Безденежных Виктор Евгеньевич ВБ-335к</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <script language="javascript" type="text/javascript">
        function getXMLHTTP() {
            var xmlhttp = false;
            try {
                xmlhttp = new XMLHttpRequest();
            } catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    try {
                        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e1) {
                        xmlhttp = false;
                    }
                }
            }

            return xmlhttp;
        }

        function getState(countryId) {

            var strURL = "findState.php?country=" + countryId;
            var req = getXMLHTTP();

            if (req) {

                req.onreadystatechange = function () {
                    if (req.readyState == 4) {

                        if (req.status == 200) {
                            document.getElementById('statediv').innerHTML = req.responseText;
                            document.getElementById('citydiv').innerHTML = '<select name="city">' +
                                '<option>Выберите город</option>' +
                                '</select>';
                        } else {
                            alert("Problem while using XMLHTTP:n" + req.statusText);
                        }
                    }
                }
                req.open("GET", strURL, true);
                req.send(null);
            }
        }

    </script>
</head>
<body>
<form method="post" action="" name="form1">
    <center>
        <table width="0px" cellspacing="0" cellpadding="0">
            <tr>
                <td width="75">Категория</td>
                <td width="50">:</td>
                <td width="150"><select name="country" onChange="getState(this.value)">
                        <option value="">Выберите категорию</option>
                        <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                            <option value=<?php echo $row['id'] ?>><?php echo $row['country'] ?></option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr style="">
                <td>Количество</td>
                <td width="50">:</td>
                <td>
                    <div id="statediv"><select name="state">
                            <option>Выберите количество</option>
                        </select></div>
                </td>
            </tr>
        </table>
    </center>

</form>
</body>
</html>