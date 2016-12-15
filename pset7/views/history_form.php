<table class="table table-striped">
    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if(isset($history))
            {   echo 'test';     
                foreach($history as $historys)
                {
                    print("<tr>");
                    print("<td>" . $historys["transaction"] . "</td>");
                    print("<td>" . $historys["datetime"] . "</td>");
                    print("<td>" . $historys["symbol"] . "</td>");
                    print("<td>" . $historys["shares"] . "</td>");
                    print("<td>" . $historys["price"] . "</td>");
                    print("</tr>\n");
                }
            }
        ?>
    </tbody>
</table>