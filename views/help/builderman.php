<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$pagebuilder = new pagebuilder();
$auth = new authentication();
$auth->requiresession();
global $currentuser;
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___693f28640f335d1c8bc50c5a11d7ad3d_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=account.css');
$pagebuilder->addresource('jsfiles', '/js/c5827143734572fa7bd8fcc79c3c126b.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/22f5b93b0e23b69d9c48f68ea3c65fe3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/6385cae49dc708a8f2f93167ad17466d.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/jquery.validate.js');
$pagebuilder->addresource('jsfiles', '/js/jquery.validate.unobtrusive.js');
$pagebuilder->addresource('jsfiles', '/js/GenericModal.js');
$pagebuilder->addresource('jsfiles', '/js/SignupFormValidator.js');
$pagebuilder->addresource('jsfiles', '/js/My/AccountMVC.js?t=5');
$pagebuilder->addresource('jsfiles', '/js/jquery.validate.js');
$pagebuilder->addresource('jsfiles', '/js/AddEmail.js?t=21');
$pagebuilder->addresource('jsfiles', '/js/SuperSafePrivacyIndicator.js');
$pagebuilder->addresource('jsfiles', '/js/GenericConfirmation.js');

$pagebuilder->set_page_name("Account");
$pagebuilder->setlegacy(true);
$pagebuilder->buildheader();

$allthemes = (new \watrbx\themes())->getAllThemes();

if(isset($newblurb)){
  $blurb = $newblurb;
} else {
  $blurb = $currentuser->about;
}

?>


<? $pagebuilder->build_footer(); ?>
