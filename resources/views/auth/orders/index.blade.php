@extends('auth.layouts.master')

@section('title', 'Заказы')

@section('content')

    <div id="main">
        @if(session()->has('success'))

            <p class="alert alert-success m-auto">{{session()->get('success')}}</p>
        @elseif(session()->has('warning'))
            <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif
    <div class="col-md-12 ">


        @if(Auth::User()->is_admin==true)
            <a class="btn btn-success" type="button"
               href="
               {{route('home')}}

                   ">Покупка</a>
            <a class="btn btn-success" type="button"
               href="

               {{route('homeInd')}}

                   ">Заказы</a>

        @else
            <a class="btn btn-success" type="button"
               href="
               {{route('order.index.person')}}

                   ">Покупка</a>
            <a class="btn btn-success" type="button"
               href="

               {{route('order.indexInd.person')}}

                   ">Заказы</a>

        @endif

        <h1 class="text-center">Покупка</h1>
        @if($orders->total()==0)
            <h2 class="text-center">Пока ничего нет</h2>
            @else
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th class="adaptive-admin-menu">
                    Имя
                </th>
                <th class="adaptive-admin-menu">
                    Телефон
                </th>
                <th class="adaptive-admin-menu">
                    Когда отправлен
                </th>
                <th class="adaptive-admin-menu">
                    Сумма
                </th>
                <th>
                    Статус
                </th>
                <th>

                </th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id}}</td>
                    <td class="adaptive-admin-menu">{{ $order->name }}</td>
                    <td class="adaptive-admin-menu">{{ $order->phone }}</td>
                    <td class="adaptive-admin-menu">{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    @if($order->getFullPrice()!=0)
                    <td class="adaptive-admin-menu"> {{ round( $order->getFullPrice(),2) }}{{ $order->symbol() }}</td>
                    @else

                        @if($order->individual_price==null)
                            <td class="adaptive-admin-menu">0{{ $order->symbol() }}</td>
                        @else
                        <td class="adaptive-admin-menu">{{ round($order->individual_price(),2) }}{{$order->symbol()}}</td>
                        @endif
                        @endif
                    <td>{{ $order->status }} </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a class="btn btn-success" type="button"
                               href="
                                @admin
                               {{route('orders.show',$order)}}
                                   @else
                               {{route('orders.show.person',$order)}}
                               @endadmin
                                   ">Открыть</a>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>


        @endif
{{$orders->links()}}
    </div>
    </div>
@endsection
