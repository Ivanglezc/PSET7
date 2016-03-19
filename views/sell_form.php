
<body style="background-color:#bfbfbf">
<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option value="Symbol">Symbol</option>
                <?php 
                foreach( $symbols as $symbol)
                {
                    echo '<option value="'.$symbol["symbol"].'">'.$symbol["symbol"].'</option>';
                }
                ?>
            </select>
            </select>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="shareamount" placeholder="No. of Shares" type="int"/>
        </div>        
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                 Sell
            </button>
        </div>
    </fieldset>
</form>

<div>
    <a href="/index.php">go back</a>
</div>
