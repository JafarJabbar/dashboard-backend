$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "Access-Control-Allow-Origin": "*"
        }
    });


    $('#category_change').on('select2:select',function (e){
        let id = e.params.data.id;
        $.ajax({
            url:`${base_url}admin/category/attrs?id=${id}`,
            type:'GET',
            success:(res)=>{
                $('#attributes').empty();
                res.attributes_list.map((item)=>{
                    $('#attributes').append(
                        `<div class="col-md-4 ">
                            <div class="form-group">
                                <label
                                    for="${item.alias}">${item.title}</label>
                                <input
                                    type="text"
                                    id="${item.alias}"
                                    class="form-control"
                                    name="meta_data[${item.alias}]"
                                />
                            </div>
                        </div>`)
                })
            }
        });
    })

    $('.translateValue').focusout(function () {
        var id = $(this).attr('data-id'), value = $(this).val(),
            data = new FormData();
        var target = $(this);
        data.append('value', value);
        data.append('id', id);
        $.ajax({
            url: base_url+'admin/translates/edit',
            type: 'POST',
            dataType: 'JSON',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (response) {
                console.log(response)
                if (response.success) {
                    target.css('background', 'rgba(0,128,0,.2)')
                }else {
                    target.css('background', 'rgba(255,0,0,0.2)')
                }
            },
            error: function (error) {
                console.log(error)
                target.css('background', 'rgba(255,0,0,0.2)')
            }

        })
    })

    $('#menu_type').change(function (e) {
        let formData = new FormData(), content_id = $(this).data('content-id');
        formData.append('menu_type', e.target.value);
        formData.append('content_id', content_id);
        $.ajax({
            url: base_url+'admin/menu/parent',
            type: 'POST',
            dataType: 'JSON',  // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            success: function (response) {
                console.log(response)
                $('#parent_id').empty();
                $('#parent_id').removeAttr('disabled');
                $('#parent_id').append('<option value="0">' + response['text'] + '</option>');
                if (response['parent_menu'].length > 0) {
                    for (var i = 0; i < response['parent_menu'].length; i++) {
                        $('#parent_id').append('<option value=' + response['parent_menu'][i].id + '>' + response['parent_menu'][i].menu_title + '(' + response.menu_type + ')' + '</option>');
                    }
                } else {
                    $('#parent_id').append('<option value="0> ... </option>');
                }

            },
        })
    })

    $('#translate_keyword').focusout(function () {
        $.ajax({
            url: checkTranslate.replace('http://','https://'),
            type: 'POST',
            data: {keyword: event.target.value},
            success: function (response) {
                for (let property in response.translates) {
                    console.log($('#translate_value' + response.translates[property][0].lang))
                    $('#translate_value' + response.translates[property][0].lang).val(response.translates[property][0].value)
                }
            }
        })
    })


    $('.delete-item-button').click(function (event) {
        Swal.fire({
            title: default_delete_title,
            text: default_delete_message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Okay',
            cancelButtonText: 'Cancel'
        }).then(function (result) {
            if (result.isConfirmed) {
                let url = $(event.currentTarget).data('route');
                $.ajax({
                    url: url.replace('http://','https://'),
                    type: 'POST',
                    success: function (response) {
                        if (response.status) {
                            Swal.fire(
                                response.title,
                                response.message,
                                'success')
                                .then(() => {
                                    window.location.reload();
                                });
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function (error) {
                        Swal.fire(
                            'Server error',
                            'Undefined error',
                            'error'
                        );
                    }

                });
            }
        });

    })

    $('.action-item-button').click(function (event) {
        Swal.fire({
            title: default_delete_title,
            text: default_delete_message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Okay',
            cancelButtonText: 'Cancel'
        }).then(function (result) {
            if (result.isConfirmed) {
                let url = $(event.currentTarget).data('route');
                $.ajax({
                    url: url.replace('http://','https://'),
                    type: 'POST',
                    success: function (response) {
                        console.log(response)
                        if (response.success) {
                            Swal.fire(
                                response.title,
                                response.message,
                                'success')
                                .then(() => {
                                    window.location.reload();
                                });
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function (error) {
                        Swal.fire(
                            'Server error',
                            'Undefined error',
                            'error'
                        );
                    }

                });
            }
        });

    })

    $('#search_form').submit(function () {
        event.preventDefault();
        let elements = document.getElementById('search_form').elements, url = ``;
        url = `?`;
        for (let key in elements) {
            if (elements[key].nodeName == 'INPUT' || elements[key].nodeName == 'SELECT') {
                if (elements[key].value && elements[key].value != '' && elements[key].value != 'undefined') {
                    url += `${elements[key].name}=${elements[key].value}&`
                }
            }
        }
        url = url.substring(0, url.length - 1);
        return window.location.href = url;
    });
})
$(function () {

    fileupInstance('thumbnail', 'thumbnail_id', 1)
    fileupInstance('slider', 'slider_id[]', 20)


    // $('#delete-selected').hide();
    // $('input[name="delete_select"]').change(function () {
    //     console.log($('input[name="delete_select"]:checked').length > 0);
    //     if ($('input[name="delete_select"]:checked')) {
    //         $('#delete-selected').show();
    //     }
    // });

    $('#delete-selected').click(function () {
        var route = $(this).data('url');
        Swal.fire({
            title: default_delete_title,
            text: default_delete_message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Okay',
            cancelButtonText: 'Cancel'
        }).then(function (result) {
            if (result.isConfirmed) {
                var checkboxes = $('input[name="delete_select"]:checked');
                var ids = [];
                console.log(checkboxes);
                checkboxes.map(function (index, value) {
                    ids.push($(value).data('id'));
                });
                var data = new FormData();
                data.append('ids', ids);
                data.append('action_type', 'delete');
                var url = route;
                $.ajax({
                    type: 'POST',
                    url:  url.replace('http://','https://'),
                    dataType: 'JSON',  // what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    success: function (response) {
                        console.log(response);
                        if (response.status) {
                            Swal.fire(
                                response.title,
                                response.message,
                                'success')
                                .then(() => {
                                    window.location.reload();
                                });
                        } else {
                            Swal.fire(
                                response.title,
                                response.message,
                                'error'
                            );
                        }
                    },
                    error: function (error) {
                        Swal.fire(
                            error.name,
                            error.message,
                            'error'
                        );
                    }

                });

            }
        });
    });
});

function fileupInstance(input, input_field, file_limit) {
    $.fileup({
        url: base_url+'admin/media/store',
        inputID: input,
        fieldName: 'upload',
        queueID: `${input}-queue`,
        filesLimit: file_limit,
        extraFields: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            store_type: 'media'
        },
        onSuccess: function (response, file_number, file) {
            if (JSON.parse(response).success) {
                $(`#fileup-${input}-${file_number} .fileup-remove`).attr('data-id', JSON.parse(response).id);
                $(`#fileup-${input}-${file_number}`).append(`<input type="hidden" id="thumbnail-input-id" name="${input_field}" value="${JSON.parse(response).id}" />`)
                $(`#fileup-${input}-${file_number} .fileup-remove`).click((event) => {
                    $.ajax({
                        url: base_url+'admin/media/delete',
                        type: 'POST',
                        data: {
                            id: JSON.parse(response).id
                        },
                        success: (res) => {
                            console.log(res)
                            if (res.success) {
                                Swal.fire(
                                    res.title,
                                    res.message,
                                    'success')
                            } else {
                                Swal.fire(
                                    res.title,
                                    res.message,
                                    'error'
                                )
                            }
                        },
                        error: function (error) {
                            Swal.fire(
                                error.name,
                                error.message,
                                'error'
                            )
                        }
                    });
                })
            } else {
                Swal.fire(
                    JSON.parse(response).title,
                    JSON.parse(response).message,
                    'error'
                );
            }
        },
        onError: function (event, file, file_number) {
            Swal.fire(
                '500 Server error',
                'Undefined error. Please try again later!',
                'error'
            )
        },
    });
}

function fileUpRemove(file_number, id, field) {
    $(`#fileup-${field}-${file_number}`).remove();
    $.ajax({
        url: base_url+'admin/media/delete',
        type: 'POST',
        data: {
            id
        },
        success: (res) => {
            console.log(res)
            if (res.success) {
                Swal.fire(
                    res.title,
                    res.message,
                    'success')
            } else {
                Swal.fire(
                    res.title,
                    res.message,
                    'error'
                )
            }
        },
        error: function (error) {
            Swal.fire(
                error.name,
                error.message,
                'error'
            )
        }
    });
}
