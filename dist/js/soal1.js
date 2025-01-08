$(document).ready(function() {    
    $('#number_of_disk').keypress(e => {
        var charCode = (e.which) ? e.which : e.keyCode;
        // Check if the pressed key is an alphabet (A-Z or a-z)
        if ((charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122)) {
            e.preventDefault(); // Prevent the character from being entered
            // Optionally provide feedback to the user
            alert("Input hanya boleh angka");
        }
    })

    $('#number_of_disk').on('input', function() {
        let value = $(this).val()

        // Konfigurasi min, max, default value
        if(value === "") {
            $(this).val('');
        } else if (parseInt(value) < 1) {
            alert("Minimal input 1")
            $(this).val(1);
        } else if (parseInt(value) > 8) {
            alert("Maksimal input 8")
            $(this).val(8);
        } else {
            $(this).val(parseInt(value)); // Ensure the value is integer
        }
    })

    $('#raid_type').mousedown(function() {

        if ($('#number_of_disk').val() == '') {
            alert('Number of disk harap diisi')
            return
        } else if ($('#size_per_disk').val() == null) {
            alert('Size per disk belum dipilih')
            return
        }

        let number_of_disk = checkInputNumberOfDisk($('#number_of_disk').val())
        
        for (const value of number_of_disk) {
            $(`#raid_type option[value='${value}']`).prop('disabled', false)
        }
    })

    $('#raid_type').change(function() {
        
        $('.raid_type_output').html($(this).val())

        $('#output_capacity').html(outputCapacityCount($(this).val()))
        $('#output_fault_tolerance').html(outputFaultToleranceCount($(this).val()))
    })
})

// check input rule
function checkInputNumberOfDisk(number_of_disk) {
    // Make all select option default disabled
    $("#raid_type option").prop("disabled", true);
    $("#raid_type option:eq(1)").prop("disabled", false);

    // to fill array temporary
    let temp = []

    if (number_of_disk >= 2 && number_of_disk <= 8) { //rule raid-1
        temp.push('RAID-1')
    }

    if (number_of_disk >= 3 && number_of_disk <= 8) { //rule raid-5
        temp.push('RAID-5')
    }

    if ([4,6,8].includes(parseInt(number_of_disk))) { //rule raid-10
        temp.push('RAID-10')
    }

    return temp
}

// Digunakan untuk mennghitung capacity
function outputCapacityCount(raid_type) {
    let fix_number_of_disk = $('#number_of_disk').val() == '' ? 1 : $('#number_of_disk').val()
    let size_per_disk = $('#size_per_disk').val() == '' ? 1 : $('#size_per_disk').val()

    if (raid_type == 'RAID-0') {
        return parseInt(fix_number_of_disk) * size_per_disk
    } else if (raid_type == 'RAID-1') {
        return size_per_disk
    } else if (raid_type == 'RAID-5') {
        return (parseInt(fix_number_of_disk) - 1) * parseInt(size_per_disk)
    } else if (raid_type == 'RAID-10') {
        return (parseInt(fix_number_of_disk) / 2) * size_per_disk
    }
}

// digunakan untuk menghitung fault tolerance
function outputFaultToleranceCount(raid_type) {
    if (raid_type == 'RAID-0') {
        return 0
    } else if (raid_type == 'RAID-1') {
        let fix_number_of_disk = $('#number_of_disk').val() == '' ? 1 : $('#number_of_disk').val()

        return parseInt(fix_number_of_disk) - 1
    } else if (raid_type == 'RAID-5' || raid_type == 'RAID-10') {
        return 1
    }

}

function resetInput() {
    $('#number_of_disk').val('')
    $('#raid_type option:eq(0)').prop('selected', true)
    $('#size_per_disk option:eq(0)').prop('selected', true)
    $('.raid_type_output').html('-')
    $('#output_capacity').html('-')
    $('#output_fault_tolerance').html('-')
}