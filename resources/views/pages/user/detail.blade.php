@extends('layouts/app')
@section('title','Shop Admin - '.$title)
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">{{ __('pages.user.detail') }} - {{ $info -> name ?? null }}</h4>
            </div>
            <div class="content">
                <form>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control border-input" disabled="" placeholder="Company" value="Creative Code Inc.">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" class="form-control border-input" placeholder="Username" value="michael23">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Department</label>
                                <input type="email" class="form-control border-input" placeholder="Email">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop