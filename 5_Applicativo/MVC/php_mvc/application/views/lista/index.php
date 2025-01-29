<h1>Siamo in lista</h1>

<table style="border: 1px solid">
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user->getUsername()?></td>
        <td><?php echo $user->getPassword()?></td>
        <td><?php echo $user->getCognome()?></td>
    </tr>
    <?php endforeach;?>
</table>
