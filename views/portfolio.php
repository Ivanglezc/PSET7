<iframe width="560" height="315" src="https://www.youtube.com/embed/EFS3T321VUY" frameborder="0" allowfullscreen></iframe>

<h1>You have: </h1> 
<h1 style="color:#0091FF;"><u>$<?= number_format($cash,2) ?></u></h1>
<table class="table table-striped">

    <thead>
        <tr>
            <th style ="color: #0091FF;">Symbol</th>
            <th style ="color: #0091FF;">Name</th>
            <th style ="color: #0091FF;">Shares</th>
            <th style ="color: #0091FF;">Price</th>
            <th style ="color: #0091FF;">Total</th>
        </tr>
    </thead>

    <tbody>
        <?php
	        foreach ($positions as $position)
            {   
                echo("<tr>");
                echo("<td>" . $position["symbol"] . "</td>");
                echo("<td>" . $position["name"] . "</td>");
                echo("<td>" . $position["shares"] . "</td>");
                echo("<td>$" . number_format($position["price"],2) . "</td>");
                echo("<td>$" . number_format($position["total"],2) . "</td>");
                echo("</tr>");
            }
        ?>
    </tbody>
</table>