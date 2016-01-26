<div id="signupModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">x</button>
                <h4 class="modal-title">Sign Up For Groupdrop</h4>
            </div>
            <div class="modal-body">
                <form method="post" role="form" id="signup" class="login-form fade-in-effect" action="{{ action('Auth\AuthController@postRegister')}}">
                    <div class="errors-container">

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    <div class="form-group">
                        <div class="col-lg-6 no-pad"><input type="text" class="form-control required" name="first_name" placeholder="FirstName" autocomplete="off" /></div>
                        <div class="col-lg-6" style="padding-right:0;"><input type="text" class="form-control required" name="last_name" placeholder="LastName" autocomplete="off" /></div>
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control required email" name="email" placeholder="Email" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control required" name="password" id="passwd" placeholder="Password" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-default  btn-block text-left">
                            <i class="fa fa-lock"></i>
                            SignUp
                        </button>
                    </div>
                </form>
                <p>We will never spam you or sell your email to third parties.</p>
                <hr />
                <button type="submit" class="btn btn-primary  btn-block text-left">
                    <i class="fa fa-facebook"></i>
                    Sign Up With Facebook
                </button>
            </div>
            <div class="modal-footer">
                <p>Already a member? <a href="#" data-toggle="modal" data-target="#loginModal">Login</a></p>
            </div>
        </div>
    </div>
</div>