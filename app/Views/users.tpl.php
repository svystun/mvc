<?php
echo "I am <b>content</b> users.tpl.";
//print_r($rest);
//print_r($request);
//print_r($users);
if($request->delete){
    \App\Models\Users::deleteUserByID($request->delete);
}else {
    echo 'nothing to delete';
}
?>

        <p>
            <a href="/user-create" class="btn btn-success">Create</a>
        </p>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>Role</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) {
                echo '<tr>';
                echo '<td>'. $user['name'] . '</td>';
                echo '<td>'. $user['email'] . '</td>';
                echo '<td>'. $user['role'] . '</td>';
                echo '<td><a class="btn" href="/user?id='.$user['id'].'">Read More</a></td>';
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>

