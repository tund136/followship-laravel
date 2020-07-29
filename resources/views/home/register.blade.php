@extends('layout.main')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="itemise_inner">
                <div class="profile_section_inner login_section">
                    <h2>Create an Account</h2>
                    <form onsubmit="registerUser(event)">
                        <div class="form-row">
                            <label>Full Name</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-row">
                            <label>Username</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-row">
                            <label>Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-row">
                            <button type="submit" class="form_login_action"> Continue </button>
                        </div>
                    </form>
                    <div class="aleady_note">
                        Already have an account ? <a href="{{route('home')}}">Login Here</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('script')
    <script>
        function registerUser(event) {
            event.preventDefault();
            axios.get().then(data => {
                console.log(data);
            });
        }
    </script>
@stop
