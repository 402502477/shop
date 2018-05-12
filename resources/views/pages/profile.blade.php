@extends('layouts/app')
@section('title','Shop Admin - '.$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user" id="UserCard">
                    <div class="image">
                        <img src="assets/img/background.jpg" alt="..."/>
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-white" src="" alt="..." id="avatar"/>
                            <h4 class="title"><span id="firstName"></span> <span id="lastName"></span><br/>
                                <a href="#"><small id="contact">@</small></a>
                            </h4>
                        </div>
                        <p class="description text-center aboutMe" id="aboutMe">

                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-xs-5 text-right">
                                <p>{{ __('content.user.department') }} :</p>
                            </div>
                            <div class="col-xs-7">
                                <p id="department"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-5 text-right">
                                <p>{{ __('content.user.position') }} :</p>
                            </div>
                            <div class="col-xs-7">
                                <p id="position"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h4 class="title">Team Members</h4>
                    </div>
                    <div class="content">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        DJ Khaled
                                        <br />
                                        <span class="text-muted"><small>Offline</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-1.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Creative Tim
                                        <br />
                                        <span class="text-success"><small>Available</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="avatar">
                                            <img src="assets/img/faces/face-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        Flume
                                        <br />
                                        <span class="text-danger"><small>Busy</small></span>
                                    </div>

                                    <div class="col-xs-3 text-right">
                                        <btn class="btn btn-sm btn-success btn-icon"><i class="fa fa-envelope"></i></btn>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <form action="{{ url('/profile/edit',$data->id) }}" method="post" id="form" enctype="multipart/form-data" onsubmit="return pages.onAjaxSubmit(this,'json',pages.getProfile,'{{ url('/profile/getProfile') }}');">
                @csrf
                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ __('Basic Profile') }}</h4>
                        </div>
                        <div class="content">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control border-input" placeholder="Username" value="{{ $data->name }}" disabled name="username" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control border-input" placeholder="Email" value="{{ $data->email }}" disabled name="email" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Department</label>
                                        <input type="text" class="form-control border-input" placeholder="Department" value="{{ $info->department ?? null }}" name="department" autocomplete="off">
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Position</label>
                                        <input type="text" class="form-control border-input" placeholder="Position" value="{{ $info->position ?? null }}" name="position" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control border-input" placeholder="First Name" value="{{ $info->firstName ?? null }}" name="firstName" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control border-input" placeholder="Last Name" value="{{ $info->lastName ?? null }}" name="lastName" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control border-input" name="gender" id="gender">
                                            <option value="0" {{ ($info->gender ?? null) == 0 ? 'selected' : null}}>{{ __('content.gender.null') }}</option>
                                            <option value="1" {{ ($info->gender ?? null) == 1 ? 'selected' : null}}>{{ __('content.gender.man') }}</option>
                                            <option value="2" {{ ($info->gender ?? null) == 2 ? 'selected' : null}}>{{ __('content.gender.lady') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="contact">Cell Phone</label>
                                        <input type="text" class="form-control border-input" value="{{ $info->contact ?? null }}" name="contact" id="contact" autocomplete="off" placeholder="Cell Phone">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="birthday">Birthday</label>
                                        <input type="text" class="form-control border-input" value="{{ $info->birthday ?? null }}" name="birthday" id="birthday" autocomplete="off" placeholder="Select your birthday date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <div class="input-group">
                                            <input type="text" value="{{ $info->avatar ?? null }}" class="form-control border-input" name="avatar_text" disabled >
                                            <span class="input-group-addon fileButton">{{ __('content.form.avatar') }}<input type="file" name="avatar" value="null"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control border-input" placeholder="Home Address" value="{{ $info->address ?? null }}" name="address" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control border-input" placeholder="City" value="{{ $info->city ?? null }}" name="city" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input type="text" class="form-control border-input" placeholder="Country" value="{{ $info->country ?? null }}" name="country" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="number" class="form-control border-input" placeholder="ZIP Code" name="postal" value="{{ $info->postal ?? null }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" name="aboutMe">{{ $info->aboutMe ?? null }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        laydate.render({
            elem: '#birthday', //指定元素
            lang: 'en',
            theme: '#68B3C8'
        });
        pages.getProfile('{{ url('/profile/getProfile') }}');
    </script>
@stop