<?PHP
require_once("./functions/membership.php");

$membership = new Membership();

//Provide your site name here
$membership->SetWebsiteName('claire.com');

//Provide the email address where you want to get notifications
$membership->SetAdminEmail('clairechemutai12@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$membership->InitDB(/*hostname*/'localhost',
                      /*username*/'root',
                      /*password*/'root',
                      /*database name*/'book_store',
                      /*table name*/'member');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$membership->SetRandomKey('qSRcVS6DrTzrPvr');

?>