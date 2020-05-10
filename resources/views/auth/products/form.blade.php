@extends('auth.layouts.master')

@isset($product)
    @section('title', 'Редактировать товар ' . $product->name)
@else
    @section('title', 'Создать товар')
@endisset

@section('content')

    <div class="col-md-12">
        <div id="main" >
        @isset($product)
            <h1>Редактировать товар <b>{{ $product->name }}</b></h1>
        @else
            <h1>Добавить товар</h1>
        @endisset
        <form method="POST" enctype="multipart/form-data"
              @isset($product)
              action="{{ route('products.update', $product) }}"
              @else
              action="{{ route('products.store') }}"
            @endisset
        >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf

                @error('code')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Код: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="{{old('code',isset($product)? $product->code :null)}}">
                    </div>
                </div>
                <br>
                @error('name')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="{{old('name',isset($product)? $product->name :null)}}">
                    </div>
                </div>
                <br>
                @error('category')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="input-group row">
                    <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                @isset($product)
                                    @if($product->category_id == $category->id)
                                        selected
                                        @endif
                                    @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file" >
                            <label  id="textFile"style="cursor: pointer" for="myFileUpload"  >Выберите файл</label>
                            <input style="display: none; margin:0; padding: 0" id="myFileUpload" type="file" accept=".jpg, .jpeg, .png" name="image" onchange='changeName();'>
                            <script >
                                function changeName() {
                                    console.log("sex");
                                    const imgFile = document.getElementById('myFileUpload').files[0];
                                    $("#textFile").text(imgFile.name);
                                };
                            </script>
                        </label>
                    </div>
                </div>
                <br>
                @error('price')
        <div class=" alert alert-danger"> {{$message}} </div>
        @enderror
                <div class="input-group row">
                    <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" name="price" id="price"
                               value="{{old('price',isset($product)?intval($product->price):null)}}" min="1">

                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary submit"  onclick="hide()">
                        Сохранить
                    </button>

            </div>
        </form>
    </div>
    </div>
@endsection
