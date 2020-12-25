@extends('layouts.admin.index')
@section('title','Dashboard | Reviews')
@section('heading','Reviews management')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Reviews Table</h4>
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

                                @if(isset($reviews) && $reviews->count() > 0)
                                @foreach($reviews as $review)
                                <tr>
                                    <td>
                                        {{$review->id}}
                                    </td>
                                    <td>
                                        {{$review->user->name}}
                                    </td>
                                    <td>
                                        {{$review->user->email}}
                                    </td>
                                    <td>
                                        {{$review->product->name_en}}
                                    </td>

                                    <td>
                                        {{$review->comment}}
                                    </td>
                                    <td>
                                      <a href="{{route('admin.reviews.delete',$review->id)}}" class="btn btn-danger btn-circle btn-sm">
                                          <i class=" fa fa-trash"></i>
                                      </a>


                                    </td>

                                </tr>
                                @endforeach
                                @else
                                    <tr> There Is No Reviews Yet !</tr>
                                @endif
                            <tr> {{$reviews->links()}}</tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>















 @endsection
