<!-- Modal HTML -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="avatar">
                            <i class="fa fa-user"></i>
                        </div>
                        <h4 class="modal-title">Medlem</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <form id="login" method="post" class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="user" placeholder="Användarnamn" required="required" id="user">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Lösenord" required="required" id="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block login-btn" name="logga_in" id="logga_in">Logga in</button>
                        </div>
                    </form>
                    <div id="fel" class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
