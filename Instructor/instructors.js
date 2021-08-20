$(function(){


    $('body').on('click', '.addTopics', function(){
        id = $(this).data('module_id');
        title = $(this).data('module_title');
        //console.log(id, title);
        $('#newTopic').modal('show');
        $('.newTopic_title').html(title)
        $('.newTopic_module_id').val(id)
    })
})