$(document).ready(function () {
    // window._token = $('meta[name="csrf-token"]').attr('content')


    $('.select-all').click(function () {
        let $select02 = $(this).parent().siblings('.select02')
        $select02.find('option').prop('selected', 'selected')
        $select02.trigger('change')
    })
    $('.deselect-all').click(function () {
        let $select02 = $(this).parent().siblings('.select02')
        $select02.find('option').prop('selected', '')
        $select02.trigger('change')
    })

    $('.select02').select02()

})
