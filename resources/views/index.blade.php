@extends('layout.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="itemise_inner">
                    <div class="profile_section_inner login_section">
                        <h2>Login to continue</h2>
                        @if(\Illuminate\Support\Facades\Session::has('reg_success'))
                            <div class="success_note">
                                {{\Illuminate\Support\Facades\Session::get('reg_success')}}
                            </div>
                        @endif
                        <form>
                            <div class="row"></div>
                            <div class="form-row">
                                <label>Username</label>
                                <input name="username" type="text" class="form-control">
                            </div>
                            <div class="form-row">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="form-row">
                                <button type="submit" class="form_login_action"> Continue</button>
                            </div>
                        </form>
                        <div class="aleady_note">
                            Don't have an account ? <a href="{{route('register')}}">Create one here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
