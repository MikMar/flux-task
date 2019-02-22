$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.delete-course-link').on('click', function(e) {

        e.preventDefault();

        var $this = $(this);

        $.ajax({
            url : $this.attr('href'),
            type : 'POST',
            success: function (result) {

                $this.parents('.list-group-item').remove();

            }
        });

    });

});