/*Add row event*/
$(document).on('click', '.rowfy-addrow', function() {
    let rowfyable = $(this).closest('table');
    let lastRow = $('.rowadded', rowfyable).clone();
    $('input', lastRow).val('');
    $('.rowadded', rowfyable).append(lastRow);
    $(this).removeClass('rowfy-addrow btn-success').addClass('rowfy-deleterow btn-danger').text('-');
});

/*Delete row event*/
$(document).on('click', '.rowfy-deleterow', function() {
    $(this).closest('.rowadded').remove();
});

/*Initialize all rowfy tables*/
$('.rowfy').each(function() {
    $('.rowadded', this).find('div').each(function() {
        $(this).append("<br><br ><div class='intro-y inline-block custom-width mr-6'><div class='relative'><input class='input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900' id='executive' type='text'><label for='executive' class='label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text'>What form of ID? *</label></div></div><div class='intro-y inline-block custom-width mr-6'><div class='relative'><input class='input border border-gray-400 appearance-none rounded w-full px-3 py-3 pl-4 pt-5 pb-2 focus focus:border-left-blue-900 focus:pt-6 focus:pl-2 focus:outline-none active:pl-2 active:outline-none active:border-left-blue-900' id='IDno' type='text'><label for='IDno' class='label absolute mb-0 -mt-2 pt-4 pl-3 leading-tighter text-gray-400 text-base mt-2 cursor-text'>ID No*</label></div></div><div class='intro-y inline-block float-right border mr-5 p-3 rounded'><i data-feather='plus' id='more_fields' onclick='add_fields();'>Add more</i></div>");
    });
});