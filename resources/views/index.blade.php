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
                        <form id="loginForm" autocomplete="off">
                            <div class="row"></div>
                            <div class="form-row">
                                <label>Username</label>
                                <input id="username-input" name="username" type="text" class="form-control">
                                <div id="username-field"></div>
                            </div>
                            <div class="form-row">
                                <label>Password</label>
                                <input id="password-input" name="password" type="password" class="form-control">
                                <div id="password-field"></div>
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

@section('script')
    <script>
        $(document).on('submit', '#loginForm', function (event) {
            event.preventDefault();
            let data = $(this).serialize();
            axios.post("{{route('loginPost')}}", data).then(data => {
                Notiflix.Loading.Dots('Processing...');
            }).catch(error => {
                printErrorMsg(error.response.data.error);
            });
        });

        function printErrorMsg(msg) {
            if (msg != undefined) {
                var obj = Object.keys(msg);

                processError(msg, obj, 'username', '#username-input', '#username-field');
                processError(msg, obj, 'password', '#password-input', '#password-field');
            }
        }

        function processError(msg, obj, name, input, validation_field) {
            if (jQuery.inArray(name, obj) == '-1') {
                $(input).removeClass('has-error');
                $(validation_field).html('');
            } else {
                $(input).addClass('has-error');
                $(validation_field).html('<div class="error_input">' + msg[name][0] + '</div>');
            }
        }
    </script>
@stop
