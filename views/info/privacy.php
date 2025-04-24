<?php
    use watergames\pagebuilder;
    $pagebuilder = new pagebuilder;
    use watrlabs\authentication;
    $auth = new authentication();
    $pagebuilder->set_page_name("Privacy Policy");
    $pagebuilder->buildheader();
?>

<div id="main" style="text-align: justify; width: 50%; margin-left: auto; margin-right: auto;">
    
    <h1>Privacy Policy</h1>
    <p>This describes what we do with your data.<br><br>When you visit our site, your ip, the page you visited, your useragent is stored in weblogs to help identify what you're doing<br><br>When you register, we collect the info you provide on the page and store it in our database. A cookie is also stored in your browser to help the site identify who you are. Your password is hashed using bcrypt and stored.<br><br>If you are logged in and visiting our site. Your ip encrypted and stored inside of the database, to help prevent abuse and to help ipban any offending users.<br><br>When you join a game using the client, we store it inside of our database to create the continue section of the home page and to track what you've been doing.</p>
    
</div>

<? $pagebuilder->get_snippet("footer"); ?>