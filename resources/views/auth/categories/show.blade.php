@extends('auth.layouts.master')

@section('title', 'Категория ' . $category->name)

@section('content')
    <div class="col-md-12">
        <div id="main">
        <h1>Категория Бытовая техника</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td >ID</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>

            <tr>
                <td>Картинка</td>
                <td><img src="{{ Storage::url($category->image) }}"
                         height="180px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
@endsection
