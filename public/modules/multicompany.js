"use strict";
$( document ).ready( function() {
    $(document).on('click', "#create_company", function (e) {

        e.preventDefault();
        var bar1 = new ldBar("#ldBar");

        if ($("#notify").length == 0) {
            $("#c_body").html('<div id="notify" class="alert m-1" style="display:none;"><a href="#" class="close" data-dismiss="alert">&times;</a><div class="message"></div></div>');
        }

        //  $('#create_company').hide();
        $('#create-location').hide();
        $("html, body").scrollTop($("body").offset().top);
        $('#ldBar').show();

        setInterval(function () {
            bar1.set(Math.floor((Math.random() * 70) + 30));
        }, 2000);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $('#create-location-url').val(),
            dataType: 'json',
            method: 'POST',
            data:  $('#create-location').serialize(),
            success: function (data) {

                if(data.status=='Success'){
                    $('#create-location').hide();
                } else {
                    $('#create_company').show();
                    $('#create-location').show();
                }
                $("#notify .message").html("<strong>" + data.status + "</strong>: " + data.message);
                $("#notify").removeClass("alert-danger").addClass("alert-success").fadeIn();
                $("html, body").scrollTop($("body").offset().top);
                $('#step1').html(data);$('#ldBar').hide();
            },
            error: function (data) {
                $('#create_company').show();
                $('#create-location').show();
                $('#ldBar').hide();
                bar1.set(100);
                var message = '';
                $.each(data.responseJSON.errors, function (key, value) {
                    message += value + ' ';
                });
                $("#notify .message").html("<strong>" + data.status + "</strong>: " + message);
                $("#notify").removeClass("alert-success").addClass("alert-warning").fadeIn();
                $("html, body").scrollTop($("body").offset().top);
            }
        });
    });

//Below written line is short form of writing $(document).ready(function() { })

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var dataTable = $('#multicompany-table').dataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url: $('#create-location-url').val(),
            type: 'post'
        },
        columns: [
            {data: 'cname', name: 'name'},
            {data: 'city', name: 'city'},
            {data: 'phone', name: 'phone'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at'},
            {data: 'actions', name: 'actions', searchable: false, sortable: false}
        ],
        order: [[1, "asc"]],
        searchDelay: 500,
        dom: 'Blfrtip',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [0, 1,2,3,4 ]}},
                { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [0, 1,2,3,4 ]}},
                { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [0, 1,2,3,4]}},
                { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [0, 1,2,3,4 ]}},
                { extend: 'print', className: 'printButton',  exportOptions: {columns: [0, 1,2,3,4]}}
            ]
        }
    });
    $('#multicompany-table_wrapper').removeClass('form-inline');


});
