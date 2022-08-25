<?php
include_once 'DbConfig.php';

$country = intval($_GET['country']);

$query = "SELECT id,statename FROM state WHERE countryid='$country'";
$result = $con->query($query);

?>
<select name="state" onchange="getCity(<?php echo $country ?>,this.value)">
    <option>Выберите количество</option>
    <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
        <option value=<?php echo $row['id'] ?>><?php echo $row['statename'] ?></option>
    <?php } ?>
</select>
