@extends('layouts.admin.index')
@section('title','Dashboard | Users')
@section('heading','Users management')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Users Table</h4>
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
                                Name
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Joined at
                            </th>

                            <th>
                                Controls
                            </th>

                            </thead>
                            <tbody>

                                @if(isset($users) && $users->count() > 0)
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->created_at->format('Dd-Mm-Y')}}
                                    </td>
                                    <td>
                                      <a href="{{route('admin.delete',$user->id)}}" class="btn btn-danger btn-circle btn-sm">
                                          <i class=" fa fa-trash"></i>
                                      </a>

                                      <a href="" class="btn btn-success btn-circle btn-sm">
                                          <i class="  fa fa-eye"></i>
                                      </a>
                                    </td>

                                </tr>
                                @endforeach
                                @else
                                    <tr> There Is No Users Yet !</tr>
                                @endif
                            <tr> {{$users->links()}}</tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>















 @endsection
