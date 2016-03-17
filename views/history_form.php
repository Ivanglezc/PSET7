<table class="table table-striped">

    <thead>
        <tr>
            <th style ="color: green;">Type</th>
            <th style ="color: green;">Date and Time</th>
            <th style ="color: green;">Symbol</th>
            <th style ="color: green;">Shares</th>
            <th style ="color: green;">Price</th>
        </tr> 
    </thead>


    <tbody>
    <?php
	    foreach ($table as $row)	
        {   
            echo("<tr>");
            echo("<td>" . $row["transaction"] . "</td>");
            echo("<td>" . date('d/m/y, g:i A',strtotime($row["datetime"])) . "</td>");
            echo("<td>" . $row["symbol"] . "</td>");
            echo("<td>" . $row["shares"] . "</td>");
            echo("<td>$" . number_format($row["price"], 2) . "</td>");
            echo("</tr>");
        }
    ?>
    </tbody>
</table>