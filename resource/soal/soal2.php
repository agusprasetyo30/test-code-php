<?php 
    include(__DIR__ . '/../../app/helpers/General.php');

    $error = "";
    $dimension = "";
    $general = new General();

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['dimension'])) {
        $dimension = $_GET['dimension'];
    
        // Validate input
        if (!is_numeric($dimension)) {
            $error = "Input harus angka.";
        } elseif ($dimension < 3) {
            $error = "Input harus lebih besar dari atau sama dengan 3";
        } elseif ($dimension > 9) {
            $error = "Input harus kurang dari atau sama dengan 9.";
        } elseif ($dimension % 2 == 0) {
            $error = "Input harus angka ganjil";
        } else {
            $error = "Correct";
        }
    }
?>
<?php include('../layouts/header.php') ?>

<style>
        .error {
            color: red;
        }
        .success {
            color: green;
        }
</style>
    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-8">    
            <h1 class="fs-4">Soal 2</h1>    
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5">
                        <form method="GET" action="">
                            <div class="mb-2">
                                <label class="form-label" for="dimension">Masukan Nomer (Ganjil, 3-9)</label><br>
                                <input type="text" class="form-control" id="dimension" name="dimension" value="<?= htmlspecialchars($dimension) ?>">
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="direction">Direction</label>
                                <select class="form-select" name="direction" id="direction">
                                    <option value="up_down" <?= isset($_GET['direction']) && $_GET['direction'] == 'up_down' ? 'selected' : '' ?>>Up-Down</option>
                                    <option value="down_up" <?= isset($_GET['direction']) && $_GET['direction'] == 'down_up' ? 'selected' : '' ?>>Down-Up</option>
                                    <option value="left_right" <?= isset($_GET['direction']) && $_GET['direction'] == 'left_right' ? 'selected' : '' ?>>Left-Right</option>
                                    <option value="right_left" <?= isset($_GET['direction']) && $_GET['direction'] == 'right_left' ? 'selected' : '' ?>>Right-Left</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label class="form-label" for="value">Value</label>
                                <select class="form-select" name="value" id="value">
                                    <option value="alphabet" <?= isset($_GET['value']) && $_GET['value'] == 'alphabet' ? 'selected' : '' ?>>Alphabet</option>
                                    <option value="angka_ganjil" <?= isset($_GET['value']) && $_GET['value'] == 'angka_ganjil' ? 'selected' : '' ?>>Angka Ganjil</option>
                                    <option value="angka_genap" <?= isset($_GET['value']) && $_GET['value'] == 'angka_genap' ? 'selected' : '' ?>>Angka Genap</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-warning" type="button" id="reset_button">Reset</button>
                        </form>

                        <p class="<?= $error === "Correct" ? 'success' : 'error'; ?>">
                            <?= $error != "Correct" ? htmlspecialchars($error) : '' ?>
                        </p>

                        </div>
                        <div class="col-7">
                            <label class="form-label" for="value">Output</label>

                        <?php
                            // Cek query String
                            if (isset($_GET['dimension']) && isset($_GET['direction']) && isset($_GET['value'])) {
                                $dimension = $_GET['dimension'];
                                $direction = $_GET['direction'];
                                $value = $_GET['value'];

                                if ($error == "Correct") {
                                    $general::createTable($dimension, $direction, $value);
                                } else {
                                    echo '<br>-';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../layouts/footer.php') ?>

<script>
    $(document).ready(function() {
        // Reset button configuration
        $('#reset_button').click(() => {
            $('.error').html('')
            $('#dimension').val('')
            $('#direction option:eq(0)').prop('selected', true)
            $('#value option:eq(0)').prop('selected', true)

            var currentUrl = window.location.origin + window.location.pathname;
            window.history.pushState({}, document.title, currentUrl);

            $('#table_soal2').remove()
        })
    })
</script>