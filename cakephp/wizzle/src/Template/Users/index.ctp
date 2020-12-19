<h1>Users</h1>
<table>
    <tr>
        <th>Name</th>
        <th>Password</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td>
            <?= $user->username ?>
        </td>
        <td>
            <?= $user->password ?>
        </td>

    </tr>
    <?php endforeach; ?>
</table>
<a href="/users/logout/">Logout</a>