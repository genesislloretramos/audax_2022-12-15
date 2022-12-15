<table class="table table-primary table-striped">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">NOMBRE</th>
        <th scope="col">EMAIL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">
                <?php echo $_SESSION['usuario_id'];?>
            </th>
            <td>
                <?php echo $_SESSION['usuario_nombre'];?>
            </td>
            <td>
                <?php echo $_SESSION['usuario_email'];?>
            </td>
        </tr>
    </tbody>
</table>
