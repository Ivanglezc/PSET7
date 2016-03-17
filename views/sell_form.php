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
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Sell
            </button>
        </div>
    </fieldset>
</form>

<div>
    <a href="/index.php">go back</a>
</div>
