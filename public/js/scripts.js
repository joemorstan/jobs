$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('form#update-vacancy').submit(function(event){
    event.preventDefault();

    $form = $(this);

    $.ajax({
        type: 'POST',
        url: $form.attr('action'),

        success: function (response) {
            $form.parent().children('span').text('Updated at ' + response.updatedAt)
        }
    })
});


$("form#activate-vacancy > div > label > input").on('change', function(event){
    event.preventDefault();

    var action = $(this).closest('form#activate-vacancy').attr('action')
    var checkbox = $(this)


    $.ajax({
        type: 'POST',
        url: action,

        success: function (response) {
            var cardHeader = checkbox.parents('div.card.my-4')

            if (response.active) {
                checkbox.closest('label').contents().last().replaceWith(' Deactivate')
                cardHeader.children('div.card-header').children('span.text-muted').text('Updated at ' + response.updatedAt)
            } else {
                checkbox.closest('label').contents().last().replaceWith(' Activate')
                cardHeader.children('div.card-header').children('span.text-muted').text('Not active')
            }

        }
    })
});

$('a.favorites-btn').click(function (event) {
    event.preventDefault();

    url = $(this).attr('href');
    link = $(this)

    if (!link.children('i').hasClass('fav-star')) {
        link.children('i').addClass('fav-star')
        link.contents().last().replaceWith(' Remove from favorites')
    } else {
        link.children('i').removeClass('fav-star')
        link.contents().last().replaceWith(' Add to favorites')
    }

    $.ajax({
        type: 'GET',
        url: url
    });
});
