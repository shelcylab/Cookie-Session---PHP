<?php 
session_start();

require_once "CookieSession.php";

if(!$isLoggedIn) {
    header("Location: ./");
}
?>
<style>

body {font-family: Arial, Helvetica, sans-serif;
    align-items: center;
    display: flex;
  justify-content: center;
  flex-direction: row;
    background color:#C8BDC7;
    justify-content: center;}
* {box-sizing: border-box}


.container {
  padding: 16px;
  align-items: center;
  justify-content: center;
  display: flex;
  justify-content: center;
  flex-direction: row;
}


.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 40%;
  border-radius: 5px;
  align-items: center;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.member-dashboard {
    padding: 40px;
    background: #A38CA0;
    color: black;
    border-radius: 4px;
    display: inline-block;
}

.member-dashboard a {
    color: blue;
    text-decoration: none;
}
</style>
<div class="card">
<div class="container">
<div class="member-dashboard">
   Welcome!!! You have Successfully logged in!. <b><a href="logout.php">Logout</a></b>
</div>
</div>
</div>