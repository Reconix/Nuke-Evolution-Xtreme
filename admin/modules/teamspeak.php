<?php
/************************************************************************
 Nuke-Evolution Basic: Enhanced PHP-Nuke Web Portal System
************************************************************************/

/************************************************************************
    Nuke-Evolution: TeamSpeak Server Module Admin Panel
    ======================================================
    Copyright (c) 2007 by DarkForgeGfx Development Team
    Author        : Lonestar
    Version       : 1.0.0
    Date          : 8/18/2007 (dd-mm-yyyy)
    Developer     : Lonestar - www.darkforgegfx.com
    Notes         : TeamSpeak Module
************************************************************************/



global $prefix, $db, $admin_file;



$aid = substr("$aid", 0,25);

$row = $db->sql_fetchrow($db->sql_query("SELECT title, admins FROM ".$prefix."_modules WHERE title='Teamspeak'"));

$row2 = $db->sql_fetchrow($db->sql_query("SELECT name, radminsuper FROM ".$prefix."_authors WHERE aid='$aid'"));

$admins = explode(",", $row['admins']);

$auth_user = 0;

for ($i=0; $i < sizeof($admins); $i++) {

    if ($row2['name'] == "$admins[$i]" AND $row['admins'] != "") {

        $auth_user = 1; 

    }

}



if ($row2['radminsuper'] == 1 || $auth_user == 1) {



include("header.php");

        GraphicAdmin();



                sql_query("CREATE TABLE IF NOT EXISTS $prefix"._teamspeak." 

                (tsip varchar(100) NOT NULL default '', 

                tsport varchar(100) NOT NULL default '', 

                tsqport varchar(50) NOT NULL default '',   

                tsaway varchar(50) NOT NULL default '',

				active varchar(50) NOT NULL default '',

				undock varchar(255) NOT NULL default '',

				forbidden varchar(255) NOT NULL default ''

        ) ENGINE=MyISAM;", $dbi);





$sql9 = "SELECT * FROM ".$prefix."_teamspeak";

$bla = mysql_query($sql9); 

if(mysql_num_rows($bla)==0) 

{

$sql2 = "INSERT INTO ".$prefix."_teamspeak VALUES ('IP/url', '8767', '51234', 'AFK', '1', '1','()[]{}')";



if(!mysql_query($sql2)){  //voer query uit

echo "Can't run Query!!!";

}else{

$id = mysql_insert_id(); 

  print "Teamspeak tables have been added to the database.";

        }

}



if($idup==1 && $setTeamspeak){

$sql = "UPDATE ".$prefix."_teamspeak SET tsip='$tsip', tsport='$tsport', tsqport='$tsqport', tsaway='$tsaway', active='$active', undock='$undock', forbidden='$forbidden'";



 if(!mysql_query($sql)){  //voer query uit

echo "Can't run Query!!!";

}else{

$updated= "Teamspeak server is inserted!!!!";

$new_id = mysql_insert_id(); 

//  print "New id: $new_id\n";

Header("Location: ".$admin_file.".php?op=teamspeak&updated=$updated"); 

}

}else{

OpenTable();

//$datum1= date("Y-m-j H:i:s"); 

$datum1= time();

 //ADD FUNCTION//       

$row = $db->sql_fetchrow($db->sql_query("SELECT * FROM ".$prefix."_teamspeak"));

$tsip =  $row['tsip'];

$tsport = $row['tsport'];

$tsqport = $row['tsqport'];

$tsaway = $row['tsaway'];

$active = $row['active'];

$undock = $row['undock'];

$forbidden = $row['forbidden'];



echo"$updated";

echo"<center>";

echo"<form method=\"post\" action=\"".$admin_file.".php?op=teamspeak\">";

echo"<table border='1'>";

echo"<tr><td>Teamspeak Server IP/url: </td><td><input type=\"text\" name=\"tsip\" value=\"$tsip\">&nbsp;(Can be either an IP or url)</td></tr>";



echo"<tr><td>Teamspeak ServerUDPPort: </td><td><input type=\"text\" name=\"tsport\" value=\"$tsport\">&nbsp;(default 8767)</td></tr>";



echo"<tr><td>Teamspeak serverQueryPort: </td><td><input type=\"text\" name=\"tsqport\" value=\"$tsqport\">&nbsp;(default 51234, must be accessible and usable. check server.ini)</td></tr>\n";



echo"<tr><td>Teamspeak Away Channel: </td><td><input type=\"text\" name=\"tsaway\" value=\"$tsaway\">&nbsp;(If you have a channel that is used for users that are away from there keyboard. If not leave blank.)</td></tr>\n";



echo"<tr><td>Show Only Active Channels: </td><td><select name=\"active\">";

if ($active == '1') {

		echo "<option value=\"1\" selected=\"selected\">"._YES."</option><option value=\"0\">"._NO."</option>\n";

	} else {

		echo "<option value=\"1\">"._YES."</option><option value=\"0\" selected=\"selected\">"._NO."</option>\n";

	}

echo"</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Only Show Channels With Members In)</td></tr>\n";



echo"<tr><td>Use Undock Feature: </td><td><select name=\"undock\">";

if ($undock == '1') {

		echo "<option value=\"1\" selected=\"selected\">"._YES."</option><option value=\"0\">"._NO."</option>\n";

	} else {

		echo "<option value=\"1\">"._YES."</option><option value=\"0\" selected=\"selected\">"._NO."</option>\n";

	}

echo"</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Allows You To Undock Your Teamspeak Into A Popup Window)</td></tr>\n";



echo"<tr><td>Forbidden Username Chars: </td><td><input type=\"text\" name=\"forbidden\" value=\"$forbidden\">&nbsp;(Enter Forbidden Characters Not To BeUsed In Username)</td></tr>\n";

echo "<input type=\"hidden\" name=\"idup\" value=\"1\">";

echo"</table>\n"

."<br><input style=\"font-family : tahoma, verdana;font-size : 8pt;\" type=\"submit\" name=\"setTeamspeak\" value=\"Update Teamspeak SQL\">"

."</form><br><br>";

echo"</center>";

//FORM END

        }

echo"<table width=\"100%\"><tr><td align=right>&copy;&nbsp;<a href=\"www.darkforgegfx.com\">DarkForgegfx.com</a></td></tr></table>"; 

CloseTable();
include("footer.php");
}else{
        include("header.php");
        GraphicAdmin();
        OpenTable();
        echo "<center><b>"._ERROR."</b><br><br>You do not have administration permission for module \"$module_name\"</center>";
        CloseTable();
        include("footer.php");
}
?>