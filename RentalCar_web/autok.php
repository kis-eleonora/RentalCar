<div class="row">

    <?php
    require_once 'connect.php';

    $query = "SELECT `id`, `rendszam`, `marka`, `model`, `ar` FROM `auto` WHERE 1";

    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $kep = join(DIRECTORY_SEPARATOR, array('images', strtolower($row['marka']) . '_' . strtolower($row['model']) . '.png'));
        echo '
    <div class="card text-center" style="width: 18rem;">
        <img src="' . $kep . '" class="img-thumbnail" alt="' . $kep . '">
        <div class="card-body">
            <h5 class="card-title">' . $row['rendszam'] . '</h5>
            <p class="card-text">' . $row['marka'] . '</p>
            <p class="card-text">' . $row['model'] . '</p>
            <form action="index.php?menu=kolcsonzes" method="POST">    
            <input type="hidden" value = "' . $row['id'] . '" name = "id" id = "id">
            <button type="submit" name="kolcsonoz" value="true" class="btn btn-success">Kölcsönzöm</button>
            </form>
        </div>
    </div>
    ';
    }
    ?>

</div>
