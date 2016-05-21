<?php 
include 'header.php';
?>
<div id="login">
<div class="container">
   
        <div class="login-wrapper">
            <div class="header"><h4>Sign In</h4></div>

            <form action="login.php" method="POST"   class="login-form">
            <div class="login-line">
            <label>Login</label>
            <input type="text" name="login" class="form-control">
            </div>
            <div class="clear"> </div>   
            <div class="login-line">
             <label>Password</label>
            <input type="password" name="password" class="form-control">
              </div>
              <div class="clear"></div> 
            <div class="login-line">
            <input type="submit" value="Login">
            </div>
            </form>
        </div>
    
<div>
    </div>   
</body>
</html>

<?php 

 //$users = query(sqlBuildSelect('users')); 

//1. check if form was submitted
if ($_POST['login']) {
//2.   if so, collect the data that user submitted in the form
    $data = [
        'login'=>$_POST['login'],
        'password'=>$_POST['password']
       ];
    pre ($data);
//3.   build and execute a query with the data that the user submitted (login,pw)
    $sql = sqlBuildSelect('users').sqlBuildWhere($data);
    $user = query($sql);
    pre ($user); 
//4.   if the result of the query contains a an active user from the db
    if(!empty($user)&&$user[0]['active'] == 1) {
//5     mark the user session as being logged in
        $_SESSION['login'] = 'yes';//$user[0]['login'];
//5.1   add to user session user login/id
        $_SESSION['user'] = $user[0]['id'];
        $_SESSION['name'] = $user[0]['login'];
//6.     check if user is admin and mark the user session as being an admin session
        $_SESSION['type'] = $user[0]['admin'] == 1 ? 'admin' : 'user';
//6.5   and redirect him back to index
header('Location: index.php');
        
    }
//7.   if the result of the query DOES NOT contain a valid user -  destroy an existing session, if it exists.
   else {
        session_destroy();
        $_SESSION['login']=null;
        $_SESSION['type']=null;
        $_SESSION['user']=null;
        $_SESSION['name']=null;
    }
 print_r($_SESSION);

/* */
}
//8. if the user is not logged in
//8.5  display a login form
//9. if logged in
//9.5  display a sign out button


