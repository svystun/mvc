<?php
echo "I am <b>content</b> users.tpl.";
//print_r($rest);
//print_r($request);
//print_r($users);
if($request->name && $request->email){
     \App\Models\Users::addUser($request->name,$request->email,$request->role);
}
?>

        <p>
            <a href="/users">
                List of users
            </a>
        </p>
<form action="#" method="post">
    <label>Name <input required type="text" name="name" id="name" placeholder="name"></label>
    <label>Email <input required type="email" name="email" id="email" placeholder="email"></label>
    <label>role <input required  type="text" name="role" id="role" placeholder="role"></label>
    <button>ADD NEW USER</button>
</form>

