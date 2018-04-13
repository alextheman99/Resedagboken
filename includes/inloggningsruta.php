<?php
/**
* Inloggningsrutan som rullar ned
*
* PHP version 5
* @category   Webbtjänst
* @author     Karim Ryde <karye.webb@gmail.com>
* @license    PHP CC
* @link
*/
?>

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
                    <div class="modal-body">
                        <form action="min_sida.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="anamn" placeholder="Användarnamn" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="losen" placeholder="Lösenord" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block login-btn" name="logga_in">Logga in</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#">Glömt lösenordet?</a>
                    </div>
                </div>
            </div>
        </div>
