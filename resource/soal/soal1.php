<?php include('../layouts/header.php') ?>

    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-8">    
            <div class="card">
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>

                        <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>

                        <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('../layouts/footer.php') ?>

<script>
    $(document).ready(function() {    
        $('#kocak').append('<h2>yahahhha</h2>')
    })
</script>