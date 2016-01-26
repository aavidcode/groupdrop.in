<div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login To Groupdrop</h4>
            </div>
            <div class="modal-body">
                <form method="post" role="form" id="login" class="login-form fade-in-effect" action="{{ action('Auth\AuthController@postLogin')}}">
                    <div class="errors-container">

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    <div class="form-group">
                        <input type="email" class="form-control required email" name="email" placeholder="Username" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control required" name="password" id="passwd" placeholder="Password" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default  btn-block text-left">
                            <i class="fa fa-lock"></i>
                            Log In
                        </button>
                    </div>

                </form>
                <hr />
                <button type="submit" class="btn btn-primary  btn-block text-left">
                    <i class="fa fa-facebook"></i>
                    Log In With Facebook
                </button>
            </div>
            <div class="modal-footer">
                <p>Not a member yet? <a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a></p>
            </div>
        </div>

    </div>
</div>