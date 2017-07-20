<?php
echo "I am <b>content</b> users.tpl.";
//print_r($id);
//print_r($request);
//print_r($currentUser);

?>

        <p>
            <a href="/users" class="btn btn-success">All users</a>
        </p>
        <div>
            <h1>Current User: <?php echo $currentUser[0]['name'] ?> </h1>
            <dl>
                <?php foreach ($currentUser[0] as $key => $value) :?>
                <dt><?php echo $key ?></dt>
                <dd><?php echo $value ?></dd>
                <?php endforeach; ?>
            </dl>
        </div>

<h3>
    <a href="/users?delete=<?php echo $id; ?>" class="btn btn-success">Delete This User</a>
</h3>

