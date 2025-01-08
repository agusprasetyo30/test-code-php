<?php include('../layouts/header.php') ?>

    <div class="row justify-content-center" style="margin-top: 100px;">
        <div class="col-4">
            <h1 class="fs-4">Soal 1</h1>    
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="number_of_disk" class="form-label">Input Number of Disk</label>
                        <input type="text" class="form-control" name="number_of_disk" id="number_of_disk">
                    </div>
                    <div class="mb-3">
                        <label for="size_per_disk" class="form-label">Input Size per Disk</label>

                        <select class="form-select" style="cursor: pointer;" name="size_per_disk" id="size_per_disk">
                            <option selected disabled>Select Size per Disk</option>
                            <option value="300">300 GB</option>
                            <option value="500">500 GB</option>
                            <option value="1000">1 TB</option>
                            <option value="2000">2 TB</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="raid_type" class="form-label">Input RAID Type</label>

                        <select class="form-select" style="cursor: pointer;" name="raid_type" id="raid_type">
                            <option selected disabled>Select Size per Disk</option>
                            <option value="RAID-0">RAID-0</option>
                            <option value="RAID-1" disabled>RAID-1</option>
                            <option value="RAID-5" disabled>RAID-5</option>
                            <option value="RAID-10" disabled>RAID-10</option>
                        </select>
                    </div>
                    
                    <h2 class="fs-5">Output</h2>

                    <div class="row">
                        <div class="col-6">
                            <h3 class="fs-6 fw-normal">Output Capacity</h3>
                            <div>Tipe : <span class="raid_type_output">-</span></div> 
                            <h4 id="output_capacity">-</h4>
                        </div>
                        <div class="col-6">
                            <h3 class="fs-6 fw-normal">Output Fault Tolerance</h3>
                            <div>Tipe : <span class="raid_type_output">-</span></div>
                            <h4 id="output_fault_tolerance">-</h4>
                        </div>
                    </div>

                    <button onclick="resetInput()" class="btn btn-warning w-100">Reset Input</button>
                </div>
            </div>
        </div>
    </div>

<?php include('../layouts/footer.php') ?>

<script src="../../dist/js/soal1.js"></script>