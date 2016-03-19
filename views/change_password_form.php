<?php
?>
<body style="background-color:#bfbfbf">
<form action="change_password.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="new_password" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirmation" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Change</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="index.php">go back</a>
</div>