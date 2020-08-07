@extends('admin.layouts.admin')
@section('content_admin')
    <div class="container-fluid-create">
        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
            <div class="card">
                <div class="col-md-12 d-flex align-items-center justify-content-between justify-content-md-start mb-3 mb-md-0">
                    <div class="d-inline-block">
                        <h5 class="h4 d-inline-block font-weight-400 mb-0 text-white" style="padding-top: 1rem">Добавление товара</h5>
                    </div>
                </div>
                @csrf
                <div class="form-group horizontal-align text-center">
                    <label class="form-control-label mb-0">
                        Основное фото товара
                    </label>
                    <small class="form-text text-muted mb-2 mt-0">
                    </small>
                    <div class="uploader-product" onclick="$('#filePhoto').click()">
                    <span class="vertical-align">
                        Формат картинки .jpg .jpeg .png<br>                    разрешение 256x256, 512x512
                    </span>
                        <img src=""/>
                        <input type="file" name="image_avatar"  id="filePhoto" accept="image/x-png,image/gif,image/jpeg" required/>
                    </div>
                </div>
                <div class="create-card">
                    <div class="form-group">
                        <label class="form-control-label">
                            Наименование товара
                            <label class="red">*</label>
                        </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mb-0">
                            Описание товара
                            <label class="red">*</label>
                        </label>
                        <small class="form-text text-muted mb-2 mt-0">
                            Подробное описание вашего товара
                        </small>

                        <div data-toggle="quill" class="ql-container ql-snow">
                            <textarea class="ql-editor" data-gramm="false" contenteditable="true" name="description" required></textarea>
                            <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                            <div class="ql-tooltip ql-hidden"><a class="ql-preview" target="_blank" href="about:blank"></a>
                                <input type="text"data-formula="e=mc^2"><a class="ql-action"></a><a class="ql-remove"></a></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">
                            Дополнительные свойства товара
                        </label>
                        <div id="parameters">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Параметр
                                        </label>
                                        <input type="text" placeholder="Например Вес" name="parameter[]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-md-8">
                                    <div class="form-group">
                                        <label class="form-control-label">
                                            Значение
                                        </label>
                                        <input type="text" placeholder="Например 13 кг" name="value[]" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 col-md-1">
                            <div class="form-group">
                                <div class="" style="text-align: center;margin-top:5%">
                                    <button class="icon-btn add-btn" type="button" onclick="addParameter()">
                                        <div class="add-icon"></div>
                                        <div class="btn-txt">Добавить</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Стоимость
                                        <label class="red">*</label>
                                    </label>
                                    <input type="text" name="price" placeholder="пример 10900" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion js-accordion">
                        <div class="accordion__item js-accordion-item">
                            <div class="accordion-header js-accordion-header">Дополнительно</div>
                            <div class="accordion-body js-accordion-body">
                                <div class="accordion-body__contents">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">
                                                        Наличие скидки
                                                    </label>
                                                    <small class="form-text text-muted mb-2 mt-0">
                                                        Нажмите на галочку если хотите сделать скидку на даныне товар и заполните все поля
                                                    </small>
                                                    <div class="col-4">
                                                        <div class="custom-control custom-checkbox">
                                                            <input  data-toggle="collapse" href="#discount_collapse" role="button" aria-expanded="false" aria-controls="discount_collapse" type="checkbox" class="custom-control-input" id="discounts" value="discount">
                                                            <label class="custom-control-label form-control-label text-muted" for="discounts">Скидка</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="collapse" id="discount_collapse">
                                                    <label class="form-control-label">
                                                        Процент скидки
                                                    </label>
                                                    <br><br>
                                                    <input type="text" id="discount_text" name="discount" placeholder="в % от товара" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label class="form-control-label">
                                                    Акционный товар
                                                </label>
                                                <small class="form-text text-muted mb-2 mt-0">
                                                    Нажмите на галочку если хотите сделать акцию на даныне товар и заполните все поля
                                                </small>
                                                <div class="col-4">
                                                    <div class="custom-control custom-checkbox">
                                                        <input  data-toggle="collapse" href="#stock_collapse" role="button" aria-expanded="false" aria-controls="stock_collapse" type="checkbox" class="custom-control-input" id="stocks" value="stock">
                                                        <label class="custom-control-label form-control-label text-muted" for="stocks">Акция</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="collapse" id="stock_collapse">
                                                    <label class="form-control-label">
                                                        Условия акции
                                                    </label>
                                                    <br><br>
                                                    <input type="text" id="stock_text" name="stock" placeholder="3 по цене 2" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Выберите категорию товара
                                        <label class="red">*</label>
                                    </label>
                                    <select class="form-control select2" id="category_id" required>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 hide">
                                <div class="form-group">
                                    <label class="form-control-label">
                                        Выберите подкатегорию товара
                                        <label class="red">*</label>
                                    </label>
                                    <select class="form-control select2" id="sub_category_id" name="category_id" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="file-uploader__message-area">
                        <p>Выберите фото для загрузки
                        </p>
                    </div>
                    <div class="file-chooser">
                        <input class="file-chooser__input" name="images_file[]" type="file" required>
                    </div>
                    <div class="text-center">
                        <div class="form-group">
                            <label class="red">*</label> - обязательно для заполнения
                        </div>
                    </div>
                    <input class="file-uploader__submit-button" type="submit" value="Добавить товар">
                </div>
        </form>
    </div>
    <div class="modal fade-scale" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Очень много параметров</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Параметров не может быть больше 10.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-modal" class="btn btn-secondary" data-dismiss="modal">Я понял</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        var imageLoader = document.getElementById('filePhoto');
        imageLoader.addEventListener('change', handleImage, false);

        function handleImage(e) {
            var reader = new FileReader();
            reader.onload = function (event) {

                $('.uploader-product img').attr('src',event.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        }
        $('#discounts').change(function () {
            if($(this).prop('checked')==false){
                $('#discount_text').prop('disabled',true);
                $(this).prop('checked',false)
            }else{
                $('#discount_text').prop('disabled',false)
                $(this).prop('checked',true)
            }
        });
        $('#stocks').change(function () {
            if($(this).prop('checked')==false){
                $('#stock_text').prop('disabled',true);
                $(this).prop('checked',false)
            }else{
                $('#stock_text').prop('disabled',false)
                $(this).prop('checked',true)
            }
        });
        var accordion = (function(){

            var $accordion = $('.js-accordion');
            var $accordion_header = $accordion.find('.js-accordion-header');
            var $accordion_item = $('.js-accordion-item');

            var settings = {
                speed: 400,
                oneOpen: false
            };

            return {
                init: function($settings) {
                    $accordion_header.on('click', function() {
                        accordion.toggle($(this));
                    });

                    $.extend(settings, $settings);

                    if(settings.oneOpen && $('.js-accordion-item.active').length > 1) {
                        $('.js-accordion-item.active:not(:first)').removeClass('active');
                    }

                    $('.js-accordion-item.active').find('> .js-accordion-body').show();
                },
                toggle: function($this) {

                    if(settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
                        $this.closest('.js-accordion')
                            .find('> .js-accordion-item')
                            .removeClass('active')
                            .find('.js-accordion-body')
                            .slideUp()
                    }
                    $this.closest('.js-accordion-item').toggleClass('active');
                    $this.next().stop().slideToggle(settings.speed);
                }
            }
        })();

        $(document).ready(function(){
            accordion.init({ speed: 300, oneOpen: true });
        });
        (function( $ ) {

            $.fn.uploader = function( options ) {
                var settings = $.extend({
                    MessageAreaText: "Выберите фото товара",
                    MessageAreaTextWithFiles: "Список выбранных фото:",
                    DefaultErrorMessage: "Невозможно загрузить данный файл",
                    BadTypeErrorMessage: "В данный момент нет доступа к этому файлу.",
                    acceptedFileTypes: ['jpg', 'jpeg', 'png']
                }, options );

                var uploadId = 1;
                $('.file-uploader__message-area p').text(options.MessageAreaText || settings.MessageAreaText);
                var fileList = $('<ul class="file-list"></ul>');
                var hiddenInputs = $('<div class="hidden-inputs hidden"></div>');
                $('.file-uploader__message-area').after(fileList);
                $('.file-list').after(hiddenInputs);
                $('.file-chooser__input').on('change', function(){
                    var file = $('.file-chooser__input').val();
                    var fileName = (file.match(/([^\\\/]+)$/)[0]);
                    $('.file-chooser').removeClass('error');
                    $('.error-message').remove();
                    var check = checkFile(fileName);
                    if(check === "valid") {
                        $('.hidden-inputs').append($('.file-chooser__input'));
                        $('.file-chooser').append($('.file-chooser__input').clone({ withDataAndEvents: true}));
                        $('.file-list').append('<li style="display: none;"><span class="file-list__name">' + fileName + '</span><button class="removal-button" data-uploadid="'+ uploadId +'"></button></li>');
                        $('.file-list').find("li:last").show(800);
                        $('.removal-button').on('click', function(e){
                            e.preventDefault();

                            //remove the corresponding hidden input
                            $('.hidden-inputs input[data-uploadid="'+ $(this).data('uploadid') +'"]').remove();
                            $(this).parent().hide("puff").delay(10).queue(function(){$(this).remove();});

                            if($('.file-list li').length === 0) {
                                $('.file-uploader__message-area').text(options.MessageAreaText || settings.MessageAreaText);
                            }
                        });
                        $('.hidden-inputs .file-chooser__input').removeClass('file-chooser__input').attr('data-uploadId', uploadId);
                        $('.file-uploader__message-area').text(options.MessageAreaTextWithFiles || settings.MessageAreaTextWithFiles);

                        uploadId++;

                    } else {
                        //indicate that the file is not ok
                        $('.file-chooser').addClass("error");
                        var errorText = options.DefaultErrorMessage || settings.DefaultErrorMessage;

                        if(check === "badFileName") {
                            errorText = options.BadTypeErrorMessage || settings.BadTypeErrorMessage;
                        }

                        $('.file-chooser__input').after('<p class="error-message">'+ errorText +'</p>');
                    }
                });

                var checkFile = function(fileName) {
                    var accepted          = "invalid",
                        acceptedFileTypes = this.acceptedFileTypes || settings.acceptedFileTypes,
                        regex;

                    for ( var i = 0; i < acceptedFileTypes.length; i++ ) {
                        regex = new RegExp("\\." + acceptedFileTypes[i] + "$", "i");

                        if ( regex.test(fileName) ) {
                            accepted = "valid";
                            break;
                        } else {
                            accepted = "badFileName";
                        }
                    }

                    return accepted;
                };
            };
        }( jQuery ));

        //init
        $(document).ready(function(){
            $('.fileUploader').uploader({
                MessageAreaText: "Загрузите дополнительные фото вышего товара."
            });
        });
        function addParameter() {
            let el = $('.new-parameter');
            if(el.length<10) {
                var handleTemplate = $('#entry-template').html();
                var compiledTemplate = Handlebars.compile(handleTemplate);
                var html = compiledTemplate();
                $('#parameters').append(html);
                $('.added').show('slow');
                $('.added1').show('fast');
            }else{
                $('.modal').modal('show');
                $('.modal').css('opacity','1');
                $('.modal').css('transform','scale(1)');
            }
        }
      function deleteThis(button) {
             button.parentNode.parentNode.parentNode.parentNode.remove();
         }
        $("#category_id").select2({
            placeholder: "Выберите категории...",
            allowClear: true,
            ajax: {
                url: '{{route('admin.select.categories')}}',
                dataType: 'json',
                method: 'POST',
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                delay: 250,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
            }
        });
        $('#category_id').on('select2:select', function (e) {
            parent_id = $(this).select2('val');
            $("#sub_category_id").select2({
                placeholder: "Выберите категории...",
                allowClear: true,
                ajax: {
                    url: '{{route('admin.select.sub_categories')}}',
                    dataType: 'json',
                    data: 'parent_id='+parent_id,
                    method: 'POST',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    },
                }
            });
        });
    </script>
    <script id="entry-template" type="text/x-handlebars-template">
        <div class="row new-parameter">
        <div class="col-12 col-md-4 added" style="display: none">
        <div class="form-group">
        <label class="form-control-label">
        Параметр
        </label>
        <input type="text" name="parameter[]" class="form-control" required>
    </div>
    </div>
    <div class="col-12 col-md-7 added" style="padding-right: 0; display: none">
        <div class="form-group">
        <label class="form-control-label">
        Значение
        </label>
        <input type="text" name="value[]" class="form-control" required>
    </div>
    </div>
    <div class="erase added1" style="display: none">
        <ul>
        <li><button type="button" onclick="deleteThis(this)"><i class="fa fa-times" aria-hidden="true"></i></button></li>
    </ul>
    </div>
    </div>
    </script>
@endpush
