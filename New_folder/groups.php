<?php
       
       require_once ('/home/content/24/9456524/html/php_files/connect.php');
       session_start();
       if (isset($_SESSION['teeckle_user'])) {
       
     $date = date("d,m,Y H:i:s");
     $sql = "UPDATE sessions SET upd = ? WHERE ip = ?";
      
      try {
          $conn = new PDO('mysql:host='.$host.';dbname='.$dbn, $DBusername,$DBpassword);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn -> prepare($sql); 
          $stmt->execute(array($date,$_SERVER['REMOTE_ADDR']));
     }
     catch (PDOException $e) {
          die ($e->getMessage());
     }
     $userreg = $_SESSION['teeckle_user'];
}
else {
     
      $sql = "DELETE FROM sessions WHERE ip = ?";
      
      try {
      
          $conn = new PDO('mysql:host='.$host.';dbname='.$dbn, $DBusername,$DBpassword);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn -> prepare($sql); 
          $stmt->execute(array($_SERVER['REMOTE_ADDR']));
          header ('Location: /index.php');
            exit;
     }
     catch (PDOException $e) {
          die ($e->getMessage());
     }

     }
     $userdef = htmlentities($_SESSION['teeckle_user']);
     

     if (isset($_POST['visited'])) {
          $userdef = htmlentities($_POST['visited']);
     }
     
     $sql = "SELECT thumbnail FROM pic_table WHERE defaultpic = 1 AND user = ?";
     
     try {
          $conn = new PDO('mysql:host='.$host.';dbname='.$dbn, $DBusername, $DBpassword);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn -> prepare($sql);
          $stmt->execute(array($userdef));
          $result = $stmt -> fetch();
     }
     catch (PDOException $e) {
          die ($e);
     }
     
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8" />
    <title>
    Teeckle.me Groups
    </title>
    <link rel="stylesheet" href="/cssfiles/ProfilePage.css" type="text/css" id="change"/>
    <link href="/cssfiles/template.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/cssfiles/jqueryui.css" type="text/css"/>
    <link rel="stylesheet" href="/cssfiles/groupstyle.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/js_files/jquery_crop/css/imgareaselect-default.css" />
    <link rel="stylesheet" href="/cssfiles/creategstyle.css" type="text/css"/>
    <script src="/js_files/jquery.js" type="text/javascript">
    </script>
    <script src="/js_files/jqueryui.js" type="text/javascript">
    </script>
    <script src="/js_files/livequery/jquery.livequery.min.js" type="text/javascript"></script>
    <script>
   
    var curruser = "<?php echo $userreg; ?>";
    $(function () {

         var today = new Date();
         today = today.getFullYear();
         var this_year = today - 18;
         var start = today - 100;
         
		$( "#datepick" ).datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: start + ':' + this_year
		});
		
	     
	});
  </script>
  <script src="/js_files/chat.js" type="text/javascript">
    </script>
    <script src="js_files/groups.js" type="text/javascript"></script>
    
    <style type="text/css">
.classname {
	-moz-box-shadow: 0px 1px 0px 0px #fcf8f2;
	-webkit-box-shadow: 0px 1px 0px 0px #fcf8f2;
	box-shadow: 0px 1px 0px 0px #fcf8f2;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffd58c), color-stop(1, #ffae00) );
	background:-moz-linear-gradient( center top, #ffd58c 5%, #ffae00 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd58c', endColorstr='#ffae00');
	background-color:#ffd58c;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	border:2px solid #eeb44f;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:5px 20px;
	text-decoration:none;
}.classname:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #ffae00), color-stop(1, #ffd58c) );
	background:-moz-linear-gradient( center top, #ffae00 5%, #ffd58c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffae00', endColorstr='#ffd58c');
	background-color:#ffae00;
}.classname:active {
	position:relative;
	top:1px;
}
/* This imageless css button was generated by CSSButtonGenerator.com */

.butt2 {
	-moz-box-shadow: 0px 1px 0px 0px #cae3fc;
	-webkit-box-shadow: 0px 1px 0px 0px #cae3fc;
	box-shadow: 0px 1px 0px 0px #cae3fc;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #2774b8), color-stop(1, #378fe6) );
	background:-moz-linear-gradient( center top, #2774b8 5%, #378fe6 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2774b8', endColorstr='#378fe6');
	background-color:#2774b8;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	border:2px solid #397ec4;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:14px;
	font-weight:bold;
	padding:5px 20px;
	text-decoration:none;
}.butt2:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378fe6), color-stop(1, #2774b8) );
	background:-moz-linear-gradient( center top, #378fe6 5%, #2774b8 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#378fe6', endColorstr='#2774b8');
	background-color:#378fe6;
}.butt2:active {
	position:relative;
	top:1px;
}
/* This imageless css button was generated by CSSButtonGenerator.com */
</style>
  </head>
  <body>
    <div class="top">
  <div class="header">
  <a href="/teeckleProfile.php">
    <img src="/images/Me.png" class="logo" />
    </a>
    <a class="profnav" id="profile"><img src="/images/Profile-Icons-Blue.png" /> </a> 
    <a class="profnav"  id="messages"><img src="/images/Message-Icons.png" /></a><span id="nums"></span>
<a class="profnav" id="contacts"> <img src="/images/book_grey2_icon.png" /> </a><span id="conts"></span> 
<a class="profnav" id="teeckles"><img src="/images/feather.png" /></a>
<span id="teeks"></span>
<a class="profnav" id="search" href="/search.php"><img src="/images/manfi_glass_blue.png" /></a>
    <p class="sections">
      <a href="/groups.php" style="color:#2774b8;"> Groups </a>|
      <a > Teeckle </a>|&nbsp;&nbsp;&nbsp;
      <a href="/php_files/sign_out.php"> Log out </a> 
    </p>
  </div>
  </div>
<p class="section2">
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    
    
    
  </p>
  <div class="chat">
			<div class="chat-lobby">
				<div class="chat-caption">
					<p>Chat Lobby</p>
				</div>
				<div>
					<ul id="friend_list">
						
					</ul>
				</div>
				
			</div>
			<div class="chat-table">
				<div class="person">
				<img id="chat_pic" class="mess"/>
					<span id="chat_name"></span>
                         <span id="close" class="close">x<span>
				</div>
				<ul id="display_mess">
						
				</ul>
				<div id="mess_text">
					
				</div>
			</div>
		</div>
	<div class="wrapper" id="wrapper">
		
		
		<!-- YOUR GROUP -->
		<ul class="your-group">
			<li id="caption">&nbsp;Your Groups
			</li>
			<li>
			<p id="urgroups" class="groupsp">
                 
			</p>
			</li>
		</ul>
		
		<!-- POPULAR GROUP -->
		<ul class="popular-group">
			<li id="caption">
				&nbsp;Popular Groups
			</li>
			<li id="popgroups">
			<p class="groupsp" id="popgroups">
			  
			</p>
			</li>
		</ul>	
		
		<!-- GROUP SETTINGS -->
		<ul class="group-settings" style="list-style-type:none">
			<li id="caption">&nbsp;Group Settings</li>
					<li class="listop"><a id="crgo">Create a group</a></li>
					<li class="listop"><a id="invb">Invite/add people</a></li>
				</ul>
		
		<!-- GROUPS -->
		<ul class="groups">
			<li id="caption">
				&nbsp;New Groups
			</li>
			<li>
			<p class="groupsp" id="newgroups">
			
			</p>
			</li>
		</ul>
		<ul  id="creategroup" style="display:none;width:800px;height:400px;position:absolute;background-color:white">
		<li id="table-caption"> create a new group &nbsp;&nbsp;&nbsp;
		</li>
		<li>
			<form id="createGroupForm" action="#">
			<table id="group_crit">
				<tbody><tr>
					<td>Group Name</td>
					<td><input class="groupName" type="text" name="groupName" id="groupName"></td>
				</tr>
				<tr>
					<td>Description</td>
					<td><textarea name="description" rows="10" cols="30" id="description"></textarea></td>
				</tr>
				<tr>
				     <td>Location</td>
				     <td><select name="country"><option value="United States">United States</option>

<option value="United Kingdom">United Kingdom</option>

<option value="Afghanistan">Afghanistan</option>

<option value="Albania">Albania</option>

<option value="Algeria">Algeria</option>

<option value="American Samoa">American Samoa</option>
				</select>
				     <input name="zip" type="text" style="width: 50px;" maxlength="5"></td>
				</tr>
				<tr>
					<td>Privacy</td>
					<td><input type="radio" name="privacy" value="private">Private &nbsp;
					<input type="radio" name="privacy" value="public">Public</td>
				</tr>
				<tr>
				<td>
				Categories:
				<select name="cat[]">
<option value="academic">academic</option>
<option value="social awareness">social awareness</option>
<option value="cultural">cultural</option>
<option value="religious">religious</option>
<option value="food">food</option>
<option value="comedy">comedy</option>
<option value=""></option>
				</select>
				<a id="add_cat">+</a>
				</td>
				</tr>
			</tbody></table>
			<p align="right">
				<button type="button" class="butt2" id="crg">submit</button>
				<input id="cancel" type="button" value="cancel" />
			</p>
			</form>
			</li>
		</ul>
		<form id="invite_form">
		<ul id="invite">
<li>invite someone</li><li>to: <select name="group" id="group_sel" ></select></li><li>email or username: <input type="text" name="to"></li>
<button type="button" id="invite_it">invite</button></ul>
</form>
	</div>
</body>
</html>
