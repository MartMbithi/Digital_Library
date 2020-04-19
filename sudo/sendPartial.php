<?php
        $sm_receiverNo = $_GET['sm_receiverNo'];
        $ret="SELECT * FROM  iL_Librarians WHERE l_number = ?"; 
        $stmt= $mysqli->prepare($ret) ;
        $stmt->bind_param('i', $sm_receiverNo);
        $stmt->execute() ;//ok
        $res=$stmt->get_result();
        while($row=$res->fetch_object())
        {

    ?>
    <div class="uk-modal" id="mailbox_new_message">
        <div class="uk-modal-dialog">
            <button class="uk-modal-close uk-close" type="button"></button>
            <form method ="post">
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Compose Message</h3>
                </div>
                <div class="uk-margin-large-bottom">
                    <label for="mail_new_message">Message</label>
                    <textarea required name="sm_sentMail" id="mail_new_message" cols="30" rows="6" class="md-input"></textarea>
                </div>
                <div class="uk-modal-footer">
                    <a href="#" class="md-icon-btn"><i class="md-icon material-icons">&#xE226;</i></a>
                    <input type="submit" value="Send Mail" class="uk-float-right md-btn md-btn-flat md-btn-flat-primary"/>
                </div>
            </form>
        </div>
    </div>
    <?php }?>