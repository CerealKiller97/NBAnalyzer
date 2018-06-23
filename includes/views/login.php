<div class="modal fade" id="loginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content">
            <div id="hint" class="modal-header login-color primary-color white-text">
                <h4 class="title login-header">
                    Login</h4>
                 <!-- <div class="lds-css ng-scope">
                    <div  class="lds-rolling"> 
                        <div></div>
                    </div>
                </div>  -->
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
               
                <div class="md-form form-sm mt-4 animated fadeIn">
                    <i class="fa fa-envelope prefix"></i>
                    <label for="email">Your e-mail</label>
                    <input type="text" id="email" name="email" class="form-control">
                    <small id="email-hint" class="form-text"></small>
                </div>

                <div class="md-form form-sm mt-4 animated fadeIn">
                    <i class="fa fa-lock prefix"></i>
                    <label for="password">Your password</label>
                    <input type="password" id="login-password" name="password" class="form-control">
                    <small id="password-hint" class="form-text"></small>
                </div>

                <div class="text-center mt-4 mb-2">
                    <button id="sendBtn" class="btn btn-primary">
                        Login
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- validate -->