<?php
    use watergames\pagebuilder;
    $pagebuilder = new pagebuilder;
    use watrlabs\authentication;
    $auth = new authentication();
    $pagebuilder->set_page_name("Terms of Service");
    $pagebuilder->buildheader();
?>

<div id="main" style="text-align: justify; width: 50%; margin-left: auto; margin-right: auto;">
    
    <h1>Terms of Service</h1>
    <small>Last Updated 4/21/25</small>
    <p>
        To use our site you must agree to the following.<br>
        <ol>
            <li>No slurs that could be considered offensive</li>
            <li>No exploiting or using cheats inside of the client unless specified otherwise</li>
            <li>No illegal content</li>
            <li>No misuse of our site/service</li>
            <li>You must be 13+</li>
            <li>No content we deem inappropriate (e.g. genitalia)</li>
        </ol>
        
        We may also terminate your account if related off platform events take place that we feel hurts the platform.
        <br><br>
        If you are caught breaking any of these terms, your account will be subject to termination.
    
    </p>
    <small>To appeal any moderation action, please <a href="mailto:watrbxappeal@watrlabs.lol">contact us</a>.</small>
    <br>
    <small>We will also make a notice if our terms are updated.</small>
    
</div>

<? $pagebuilder->get_snippet("footer"); ?>