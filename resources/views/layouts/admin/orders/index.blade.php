@extends('layouts.admin.index')
@section('title','Dashboard | Orders')
@section('heading','Orders management')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Orders Table</h4>
                    <p class="card-category"> Here You Can Do Operations on Users</p>
                </div>
                @include('alerts.flash')
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">

                            <th>
                                ID
                            </th>

                            <th>
                                Username
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                               Product
                            </th>

                            <th>
                                Comment
                            </th>


                            <th>
                                Controls
                            </th>

                            </thead>
                            <tbody>

                                @if(isset($orders) && $orders->count() > 0)
                                @foreach($orders as $order)
                                <tr>
                                    <td>
                                        {{$order->id}}
                                    </td>
                                    <td>
                                        {{$order->name}}
                                    </td>
                                    <td>
                                        {{$order->email}}
                                    </td>
                                    <td>
                                        {{$order->email}}
                                    </td>

                                    <td>
                                        {{$order->email}}
                                    </td>
                                    <td>
                                      <a href="{{route('admin.delete',$order->id)}}" class="btn btn-danger btn-circle btn-sm">
                                          <i class=" fa fa-trash"></i>
                                      </a>

                                      <a href="" class="btn btn-success btn-circle btn-sm">
                                          <i class="  fa fa-eye"></i>
                                      </a>
                                    </td>

                                </tr>
                                @endforeach
                                @else
                                    <tr> There Is No Orders Yet !</tr>
                                @endif
                            <tr> {{$orders->links()}}</tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>















 @endsection
