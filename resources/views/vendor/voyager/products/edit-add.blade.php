@extends('voyager::master')

@section('page_title', $dataType->display_name_singular)

@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager.generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
            <div class="page-content container-fluid">
                <form class="form-edit-add" role="form" action="@if(!is_null($dataTypeContent->getKey())){{ URL::to('/products/updating-')}}{{$dataTypeContent->getKey()}}@else{{ URL::to('/products/addting') }}@endif" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <?php
                    if(!is_null($dataTypeContent->getKey())) {
                        $id = $dataTypeContent->getKey();
                        $post = DB::table('products')->where('id','=',$dataTypeContent->getKey())->first();
                    }
                ?>
                    <div class="col-md-6">
                        <!-- ### TITLE ### -->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="voyager-character"></i> Phần Header
                                </h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="name">Tiêu đề</label>
                                        <input type="text" class="form-control" id="header-title" name="header_title" placeholder="Title" value="@if(!is_null($dataTypeContent->getKey())){{$post->title}}@endif">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">URL slug</label>
                                        <input type="text" class="form-control" id="header-slug" name="header_slug" placeholder="slug"  value="@if(!is_null($dataTypeContent->getKey())){{$post->slug}}@endif">
                                    </div>
                                </div>
                            </div>
                            <!-- .panel -->
                            <!-- ### EXCERPT ### -->
                            <div class="panel panel-bordered panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Lựa chọn sản phẩm</h3>
                                    <div class="panel-actions">
                                        <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="panel-body__productive">
                                    @if(!is_null($dataTypeContent->getKey()))
                                        <?php $productive = json_decode($post->productive,JSON_BIGINT_AS_STRING); ?>
                                        @if($productive && count($productive) > 0)
                                            @foreach ($productive as $key => $value)
                                                <div class="panel-body__productive__group">
                                                    <i class="voyager-x close-productive" style="font-size:25px;"></i>
                                                    <div class="form-group">
                                                        <img  class="col-md-4" src="{{ filter_var($value['images'], FILTER_VALIDATE_URL) ? $value['images'] : Voyager::image( $value['images'] ) }}" />
                                                        <input type="file" class="form-control" name="productive_images[]" placeholder="address">
                                                    </div>
                                                    <textarea class="form-control" name="productive_excerpt[]">{{ $value['description'] }}</textarea>
                                                    <br>
                                                    <textarea class="form-control" name="productive_color[]">{{ $value['color'] }}</textarea>
                                                    <br>
                                                    <textarea class="form-control" name="productive_contact[]">{{ $value['contact'] }}</textarea>
                                                    <br>
                                                    <textarea class="form-control" name="productive_price[]">{{ $value['price'] }}</textarea>
                                                    <br>
                                                    <input type="hidden" class="form-control" name="productive_images_hidden[]" value={{$value['images']}} placeholder="address">
                                                <br>
                                                </div>
                                            @endforeach
                                        @endif
                                    @else
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="productive_images[]" placeholder="address">
                                        </div>
                                        <textarea class="form-control" name="productive_excerpt[]">Nội dung</textarea>
                                        <br>
                                        <textarea class="form-control" name="productive_color[]">Color</textarea>
                                        <br>
                                        <textarea class="form-control" name="productive_contact[]">Liên hệ</textarea>
                                        <br>
                                        <textarea class="form-control" name="productive_price[]">Giá</textarea>
                                        <br>
                                    @endif
                                    </div>
                                    <a class="btn btn-sm btn-primary pull-right add-productive">Thêm quy trình</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                    <!-- ### DETAILS ### -->
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-clipboard"></i> Category</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Post Category</label>
                                <select class="form-control" name="category_id">
                                    <?php 
                                       $category = DB::table('categories')->get();
                                    ?>
                                    @foreach( $category as $key => $value)
                                        <option @if(!is_null($dataTypeContent->getKey()) && $value->id == $post->category_id ) selected="selected" @endif value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    

                      <!-- ### SEO CONTENT ### -->
                    <div class="panel panel-bordered panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-search"></i>SEO Content</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Description</label>
                                <textarea class="form-control" name="meta_description">@if(!is_null($dataTypeContent->getKey())){!!$post->meta_description!!}@endif</textarea>
                            </div>
                            <div class="form-group">
                                <label for="name">Keywords</label>
                                <textarea class="form-control" name="meta_keywords">@if(!is_null($dataTypeContent->getKey())){!!$post->meta_keywords!!}@endif</textarea>
                            </div>
                        </div>
                    </div>                      
                </div>
                <button type="submit" class="btn btn-primary pull-right"><i class="icon wb-plus-circle"></i> @if(!is_null($dataTypeContent->getKey())) Cap Nhap @else Tao bai moi @endif</button>
                </form>
            </div>
@stop

@section('javascript')
    <script>
        $('document').ready(function () {
            $('#slug').slugify();

        @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
        @endif
        });
    </script>
@stop
