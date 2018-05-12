@extends('layouts/app')
@section('title','Shop Admin - '.$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-plain">
                    <div class="header">
                        <h4 class="title">{{ __('content.user.list') }}</h4>
                        <p class="category">{{ __('content.user.lists.describes') }}</p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover">
                            <tr>
                                <th>{{ __('content.user.lists.id') }}</th>
                                <th>{{ __('content.user.lists.account') }}</th>
                                <th>{{ __('content.user.lists.realname') }}</th>
                                <th>{{ __('content.user.lists.avatar') }}</th>
                                <th>{{ __('content.user.lists.email') }}</th>
                                <th>{{ __('content.user.lists.department') }}</th>
                                <th>{{ __('content.user.lists.position') }}</th>
                                <th>{{ __('content.user.lists.city') }}</th>
                                <th>{{ __('content.handle') }}</th>
                            </tr>
                            @foreach($users as $key)
                                <tr>
                                    <td>{{ $key->id ?? null }}</td>
                                    <td>{{ $key->name ?? null }}</td>
                                    <td>{{ $key->info->firstName ?? null }} {{ $key->info->lastName ?? null }}</td>
                                    <td>
                                        <img src="{{ $key->info->avatar ?? null }}" alt="" class="avatar">
                                    </td>
                                    <td>{{ $key->email ?? null }}</td>
                                    <td>{{ $key->info->department ?? null }}</td>
                                    <td>{{ $key->info->position ?? null  }}</td>
                                    <td>{{ $key->info->country ?? null }} {{ $key->info->city ?? null }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="{{ url('/user/detail',$key->id) }}">{{ __('content.detail') }}</a>
                                        <button class="btn btn-danger btn-sm" data-id="{{ $key->id ?? null }}" data-route="/user/destroy" onclick="destroyUser(this)" @if($key->id == Auth::id()) disabled @endif>{{ __('content.del') }}</button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function destroyUser(object)
        {
            pages.showConfirm({
                title : '{{ __('notices.confirm.attention') }}',
                content : '{{ __('notices.confirm.delete_row') }}',
                success(res)
                {
                    if(res)
                    {
                        pages.onDestroy(object);
                    }
                }
            });
        }
    </script>
@stop