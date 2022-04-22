<?php
require_once 'connect.php';

if (filter_input(INPUT_POST, "kolcsonoz", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
    $id = filter_input(INPUT_POST, "id");
    $query = "SELECT `id`, `rendszam`, `marka`, `model`, `ar` FROM `auto` WHERE `id` = $id;";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $rendszam = $row['rendszam'];
        $marka = $row['marka'];
        $model = $row['model'];
        $ar = $row['ar'];
        $kep = strtolower($row['marka'])."_".strtolower($row['model']);
    }
}
?>

<img style="float: right;" src="images/<?php echo $kep?>.png" alt=""/>
<form class="col-6" action="uj_kolcsonzes.php" method="POST">
    <fieldset>
        <legend>Kölcsönzési adatok</legend>
        
        <div class="mb-3">
            <input type="hidden" id= "id" name = "id" value ="<?php echo $id ?>">
            <input type="text" disabled id="disabledTextInput" class="form-control" placeholder="<?php echo $rendszam ?>">
        </div>
        <div class="mb-3">
            <input type="text" disabled id="disabledTextInput" class="form-control" placeholder="<?php echo $marka ?>">
        </div>
        <div class="mb-3">
            <input type="text" disabled id="disabledTextInput" class="form-control" placeholder="<?php echo $model ?>">
        </div>
        <div class="mb-3">
            <input type="number" disabled id="disabledTextInput" class="form-control" placeholder="<?php echo $ar ?>">
        </div>
        <div class="mb-3">
            <input type="date"  id="datum1" name ="datum1" value = "<?php echo date('Y-m-d'); ?>" min = "<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>
        <div class="mb-3">
            <input type="date" id="datum2" name ="datum2" value = "<?php echo date('Y-m-d'); ?>" min = "<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>
        <div class="mb-3">
            <input type="number" disabled id="disabledTextInput" class="form-control" placeholder="Összesen">
        </div>

    </fieldset>
    <button type="submit" name= "befizetes" value="true" class="btn btn-success">Kölcsönzés</button>
    <div>
        <?php
        if (isset($_SESSION["success"])) {
            echo '<div class="success" style="color:green;">'.$_SESSION["success"].'</div>';
            unset($_SESSION["success"]);
        } 
        elseif (isset($_SESSION["error"])){
            echo '<div class="error" style="color:red;">'.$_SESSION["error"].'</div>';
            unset($_SESSION["error"]);
}
        ?>
    </div>
</form>

