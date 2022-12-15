<table class="table table-primary table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">FECHA</th>
            <th scope="col">URL</th>
        </tr>
    </thead>
    <tbody>
        <?php
        try{
            foreach($miscontratos as $row){
                echo ''.
                    '<tr>'.
                        '<th scope="row">'.$row["id"].'</th>'.
                        '<td>'.$row["date"].'</td>'.
                        '<td><a target="_blank" href="'.$row["url"].'">documento</a></td>'.
                    '</tr>';
            }
        } catch (Exception $e) {}
        ?>
    </tbody>
</table>