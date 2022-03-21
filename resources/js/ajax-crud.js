$(document).ready(function($){
    $('.edit-btn').on('click', function() {
        // Skriv ut vårat formulärs 'parent'
        console.log($(this).parent());

        // Ta id från bokraden som triggar klicket
        var id = $(this).parent().attr('id');

        // Spara formulärelementet i en var
        var form = $('#addEditBook');

        console.log(id);

        // Vid klick, skriv ut formulär på den rad du klickar på
        $("#" + id).append(form);

        // Spara title och author i variabler
        var title = $(".title-" + id).text();
        var author = $(".author-" + id).text();

        // Uppdatera input med dina sparade värden
        $("input#title").val(title);
        $("input#author").val(author);
        $("input#bookId").val(id);
    });

    $('#addEditBook').on('submit', function(event) {
        event.preventDefault();

        var form_data = $(this).serialize();

        console.log(form_data);

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:"POST",
            url: "edit-book",
            dataType: "json",
            data: form_data,
            success: function(data) {
                console.log(data);
            }
        });


    });
});