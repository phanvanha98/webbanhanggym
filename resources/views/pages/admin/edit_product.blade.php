@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
            </header>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">

                <div class="position-center">
                    @foreach($edit_product as $key => $pro)
                    <form role="form" action="{{URL::to('/update-product/'.$pro->id_products)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->product_name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">SL sản phẩm</label>
                            <input type="number" data-validation="product_quantity" data-validation-error-msg="Làm ơn điền số lượng" name="product_quantity" class="form-control" id="convert_slug" value="{{$pro->product_quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="product_slug" class="form-control" id="exampleInputEmail1" value="{{$pro->product_slug}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá bán</label>
                            <input type="number" value="{{$pro->product_price}}" name="product_price" class="form-control price_format" id="exampleInputEmail1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                            <img src="{{URL::to('uploads/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>
                        <style type="text/css">
                            p.cofile {
                                text-align: left;
                                font-size: 16px;
                                margin: 5px 0;
                            }
                        </style>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="product_desc" id="ckeditor2">{{$pro->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="product_content" id="ckeditor3">{{$pro->product_content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach($cate_product as $key => $cate)
                                @if($cate->id_type==$pro->id_type)
                                <option selected value="{{$cate->id_type}}">{{$cate->name}}</option>
                                @else
                                <option value="{{$cate->id_type}}">{{$cate->name}}</option>
                                @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach($brand_product as $key => $brand)
                                @if($brand->id_brand==$pro->id_brand)
                                <option selected value="{{$brand->id_brand}}">{{$brand->brand_name}}</option>
                                @else
                                <option value="{{$brand->id_brand}}">{{$brand->brand_name}}</option>
                                @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="product_status" class="form-control input-sm m-bot15">
                                <option value="0">Hiển thị</option>
                                <option value="1">Ẩn</option>

                            </select>
                        </div>

                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

    </div>
    @endsection