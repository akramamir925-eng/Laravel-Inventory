$(document).ready(function () {
    // All Form
    $('#myForm').validate({
        rules: {
            name: {
                required: true,
            },
            mobile_no: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            customer_image: {
                required: true,
            },
        },
        messages: {
            name: {
                required: 'Please Enter Your Name',
            },
            mobile_no: {
                required: 'Please Enter Your Mobile Number',
            },
            email: {
                required: 'Please Enter Your Email',
            },
            address: {
                required: 'Please Enter Your Address',
            },
            customer_image: {
                required: 'Please Select one Image',
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });

    // Unit Form
    $('#unitForm').validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: 'Please Enter The Unit Name',
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });

    // Category Form

    $('#categoryForm').validate({
        rules: {
            name: {
                required: true,
            },
        },
        messages: {
            name: {
                required: 'Please Enter The Category Name.',
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });

    // Product Form

    $('#ProductForm').validate({
        rules: {
            name: {
                required: true,
            },
            supplier_id: {
                required: true,
            },
            category_id: {
                required: true,
            },
            unit_id: {
                required: true,
            },
            quantity: {
                required: true,
            },
        },
        messages: {

            name: {
                required: 'Please Enter The Product Name.',
            },

            supplier_id: {
                required: 'Please Select One Supplier.',
            },

            category_id: {
                required: 'Please Select One Category.',
            },

            unit_id: {
                required: 'Please Select One Unit.',
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });

    // Daily Invoice Report Form

    $('#dailyReport').validate({
        rules: {
            start_date: {
                required: true,
            },
            end_date: {
                required: true,
            },
        },
        messages: {

            start_date: {
                required: 'Please Select Start Date.',
            },

            end_date: {
                required: 'Please Select End Date.',
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });

    // Stock Report Form

    $('#stockForm').validate({
        rules: {
            supplier_id: {
                required: true,
            },
        },
        messages: {
            supplier_id: {
                required: 'Please Select Supplier.',
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
    });
});

$(document).ready(function () {

    $('#image').on('change', function (e) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('#show_image').attr('src', e.target.result);
        }

        reader.readAsDataURL(e.target.files[0]);

    });

});

$(function () {
    $(document).on('click', '#delete', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");


        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })


    });

});

$(function () {
    $(document).on('click', '#ApprovedBtn', function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Approve This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Approve it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                    'Approve!',
                    'Your file has been Approve.',
                    'success'
                )
            }
        })


    });

});

function downloadPDF() {
    html2pdf().set({
        margin: 3,
        filename: 'invoice.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: { scale: 2, useCORS: true, scrollY: 0 },
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
    }).from(document.getElementById('invoiceTable')).save();
}

$(document).on('change', '.search_value', function () {
    var search_value = $(this).val();
    if (search_value == 'supplier_wise') {
        $('.show_supplier').show();
    } else {
        $('.show_supplier').hide();
    }
});
$(document).on('change', '.search_value', function () {
    var search_value = $(this).val();
    if (search_value == 'product_wise') {
        $('.show_product').show();
    } else {
        $('.show_product').hide();
    }
});
$(document).on('change', '#paid_status', function () {
    var paid_status = $(this).val();
    if (paid_status == 'partial_paid') {
        $('.paid_amount').show();
    } else {
        $('.paid_amount').hide();
    }
});