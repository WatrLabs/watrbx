<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
use watrbx\thumbnails;
use watrbx\catalog;
use watrbx\RBX;
use Cocur\Slugify\Slugify;
$slugify = new Slugify();
$catalog = new catalog();
$rbx = new RBX();
$thumbs = new thumbnails();
$auth = new authentication();
$pagebuilder = new pagebuilder();

$auth->requiresession();

$auth->createcsrf("avatar");

global $currentuser;

$bodycolors = $auth->get_body_colors($currentuser->id);
$userinfo = $currentuser;

$body = $thumbs->get_user_thumb($currentuser->id, "1024x1024", "full");

$assetTypes = array(
    'Image' => 1,
    'TShirt' => 2,
    'Audio' => 3,
    'Mesh' => 4,
    'Lua' => 5,
    'Hat' => 8,
    'Place' => 9,
    'Model' => 10,
    'Shirt' => 11,
    'Pants' => 12,
    'Decal' => 13,
    'Head' => 17,
    'Face' => 18,
    'Gear' => 19,
    'Badge' => 21,
    'Animation' => 24,
    'Torso' => 27,
    'RightArm' => 28,
    'LeftArm' => 29,
    'LeftLeg' => 30,
    'RightLeg' => 31,
    'Package' => 32,
    'GamePass' => 34,
    'Plugin' => 38,
    'MeshPart' => 40,
    'HairAccessory' => 41,
    'FaceAccessory' => 42,
    'NeckAccessory' => 43,
    'ShoulderAccessory' => 44,
    'FrontAccessory' => 45,
    'BackAccessory' => 46,
    'WaistAccessory' => 47,
    'ClimbAnimation' => 48,
    'DeathAnimation' => 49,
    'FallAnimation' => 50,
    'IdleAnimation' => 51,
    'JumpAnimation' => 52,
    'RunAnimation' => 53,
    'SwimAnimation' => 54,
    'WalkAnimation' => 55
);


$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___7a27dc130118fdc2c185a6a1a3db1c2f_m.css');
$pagebuilder->addresource('jsfiles', '/js/f49d858ef181e7cd401d8fcb4245e6e8.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/8220b4ecd0fe4da790391da3fd0b442c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/11538f50c384b7e98cc9fdd96e55772d.js.gzip');
$pagebuilder->addresource('jsfiles', '/ScriptResource.axd');

$pagebuilder->setlegacy(true);
$pagebuilder->set_page_name("Avatar");
$pagebuilder->buildheader();
?>

        
        <div id="BodyWrapper">
            
            <div id="RepositionBody">
                <div id="Body" style='width:970px;'>
                    
    
    
    
    <script type="text/javascript">
        Roblox.Thumbs.Image.prototype._doShowSpinner = Roblox.Thumbs.Image.prototype._showSpinner;
        Roblox.Thumbs.Image.prototype._showSpinner = function () {
            if (typeof (this._userID) !== "undefined") {
                this._spinnerUrl = "/images/Spinners/ajax_loader_blue_300.gif";
            }

            this._doShowSpinner();

            if (typeof (this._userID) !== "undefined") {
                this._spinner.style.height = "300px";
                this._spinner.style.width = "300px";
                this._spinner.style.padding = "26px";
                this._spinner.style.backgroundColor = "#fff";
            }
        };
    </script>
	<style type="text/css">
		#Body  /*Needs to be on the Page to override MasterPage #Body */
		{
			padding: 10px;
		}
	</style>
    <div class="MyRobloxContainer">
        


                <h1>Character Customizer</h1>
                <div class="Column1f left-nav-menu">
                    <h2>
                        <span>Avatar</span>
                    </h2>
                    <div style="height:446px;margin-top: 10px;">
                        <div>
                            

<div id="UserAvatar" class="thumbnail-holder" data-reset-enabled-every-page data-3d-thumbs-enabled 
     data-url="/thumbnail/user-avatar?userId=<?=$currentuser->id?>&amp;thumbnailFormatId=124&amp;width=352&amp;height=352" style="width:352px; height:352px;">
    <span class="thumbnail-span" data-3d-url="/avatar-thumbnail-3d/json?userId=<?=$currentuser->id?>"  data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip' ><img alt='<?=$currentuser->username?>' class='' src='<?=$body?>' /></span>
    <span class="enable-three-dee btn-control btn-control-small"></span>
</div>


                        </div> 
                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_CustomizeCharacterUpdatePanelAvatar">
	
                        <div class="ReDrawAvatar">
                            <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_lblInvalidateThumbnails">Something wrong with your Avatar?</span><br />
                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_cmdInvalidateThumbnails" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$cmdInvalidateThumbnails&#39;,&#39;&#39;)">Click here to re-draw it!</a>
                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_cmdRefreshAllUpdatePanels2" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$cmdRefreshAllUpdatePanels2&#39;,&#39;&#39;)"></a>
                            <script type="text/javascript">
                                var refreshAllUpdatePanels = function() {
                                    __doPostBack("ctl00$ctl00$cphRoblox$cphMyRobloxContent$cmdRefreshAllUpdatePanels2", "");
                                        
                                }
                            </script>
                        </div>
                        
</div>
                    </div>
                    <h2 style="margin-top:20px;">
                        <span>Avatar Colors</span>
                    </h2>
                    <div>
                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooser" class="Mannequin">
                            <p>
                                Click a body part to change its color:
                            </p>
                            <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_UpdatePanelBodyColors">
	
                            <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserFrame" class="ColorChooserFrame" style="height:240px;width:194px;text-align:center;">
		
                                <div style="position: relative; margin: 11px 4px; height: 1%;">
                                    <div style="position: absolute; left: 72px; top: 0px; cursor: pointer" onclick="HeadOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_HeadSelector" class="ColorChooserRegion" style="background-color:<?=$auth->convert_body_color($bodycolors["Head"])?>;height:44px;width:44px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 0px; top: 52px; cursor: pointer" onclick="RightArmOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_RightArmSelector" class="ColorChooserRegion" style="background-color:<?=$auth->convert_body_color($bodycolors["RightArm"])?>;height:88px;width:40px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 48px; top: 52px; cursor: pointer" onclick="TorsoOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_TorsoSelector" class="ColorChooserRegion" style="background-color:<?=$auth->convert_body_color($bodycolors["Torso"])?>;height:88px;width:88px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 144px; top: 52px; cursor: pointer" onclick="LeftArmOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_LeftArmSelector" class="ColorChooserRegion" style="background-color:<?=$auth->convert_body_color($bodycolors["LeftArm"])?>;height:88px;width:40px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 48px; top: 146px; cursor: pointer" onclick="RightLegOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_RightLegSelector" class="ColorChooserRegion" style="background-color:<?=$auth->convert_body_color($bodycolors["RightLeg"])?>;height:88px;width:40px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 96px; top: 146px; cursor: pointer" onclick="LeftLegOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_LeftLegSelector" class="ColorChooserRegion" style="background-color:<?=$auth->convert_body_color($bodycolors["LeftLeg"])?>;height:88px;width:40px;">
			
                                        
		</div>
                                    </div>
                                </div>
                            
	</div>
            
                            <div id="PopupRightLeg" class="modalPopup unifiedModal ColorPickerModal simplemodal-data">
                                <div style="height:38px;padding-top:2px;">Choose a Body Color</div>
                                <div class="simplemodal-close"><a class="ImageButton closeBtnCircle_20h" style="left:-36px;"></a></div>
                                <div class="unifiedModalContent ColorPickerContainer">
                                    <table id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors" cellspacing="0" border="0" style="border-width:0px;border-collapse:collapse;">
		<tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl00_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl00$LinkButton1&#39;,&#39;45&#39;)" style="display:inline-block;background-color:#B4D2E4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl01_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl01$LinkButton1&#39;,&#39;1024&#39;)" style="display:inline-block;background-color:#AFDDFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl02_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl02$LinkButton1&#39;,&#39;11&#39;)" style="display:inline-block;background-color:#80BBDC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl03_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl03$LinkButton1&#39;,&#39;102&#39;)" style="display:inline-block;background-color:#6E99CA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl04_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl04$LinkButton1&#39;,&#39;23&#39;)" style="display:inline-block;background-color:#0D69AC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl05_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl05$LinkButton1&#39;,&#39;1010&#39;)" style="display:inline-block;background-color:#0000FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl06_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl06$LinkButton1&#39;,&#39;1012&#39;)" style="display:inline-block;background-color:#2154B9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl07_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl07$LinkButton1&#39;,&#39;1011&#39;)" style="display:inline-block;background-color:#002060;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl08_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl08$LinkButton1&#39;,&#39;1027&#39;)" style="display:inline-block;background-color:#9FF3E9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl09_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl09$LinkButton1&#39;,&#39;1018&#39;)" style="display:inline-block;background-color:#12EED4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl10_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl10$LinkButton1&#39;,&#39;151&#39;)" style="display:inline-block;background-color:#789082;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl11_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl11$LinkButton1&#39;,&#39;1022&#39;)" style="display:inline-block;background-color:#7F8E64;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl12_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl12$LinkButton1&#39;,&#39;135&#39;)" style="display:inline-block;background-color:#74869D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl13_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl13$LinkButton1&#39;,&#39;1019&#39;)" style="display:inline-block;background-color:#00FFFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl14_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl14$LinkButton1&#39;,&#39;1013&#39;)" style="display:inline-block;background-color:#04AFEC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl15_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl15$LinkButton1&#39;,&#39;107&#39;)" style="display:inline-block;background-color:#008F9C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl16_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl16$LinkButton1&#39;,&#39;1028&#39;)" style="display:inline-block;background-color:#CCFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl17_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl17$LinkButton1&#39;,&#39;29&#39;)" style="display:inline-block;background-color:#A1C48C;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl18_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl18$LinkButton1&#39;,&#39;119&#39;)" style="display:inline-block;background-color:#A4BD47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl19_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl19$LinkButton1&#39;,&#39;37&#39;)" style="display:inline-block;background-color:#4B974B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl20_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl20$LinkButton1&#39;,&#39;1021&#39;)" style="display:inline-block;background-color:#3A7D15;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl21_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl21$LinkButton1&#39;,&#39;1020&#39;)" style="display:inline-block;background-color:#00FF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl22_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl22$LinkButton1&#39;,&#39;28&#39;)" style="display:inline-block;background-color:#287F47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl23_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl23$LinkButton1&#39;,&#39;141&#39;)" style="display:inline-block;background-color:#27462D;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl24_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl24$LinkButton1&#39;,&#39;1029&#39;)" style="display:inline-block;background-color:#FFFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl25_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl25$LinkButton1&#39;,&#39;226&#39;)" style="display:inline-block;background-color:#FDEA8D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl26_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl26$LinkButton1&#39;,&#39;1008&#39;)" style="display:inline-block;background-color:#C1BE42;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl27_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl27$LinkButton1&#39;,&#39;24&#39;)" style="display:inline-block;background-color:#F5CD30;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl28_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl28$LinkButton1&#39;,&#39;1017&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl29_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl29$LinkButton1&#39;,&#39;1009&#39;)" style="display:inline-block;background-color:#FFFF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl30_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl30$LinkButton1&#39;,&#39;1005&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl31_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl31$LinkButton1&#39;,&#39;105&#39;)" style="display:inline-block;background-color:#E29B40;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl32_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl32$LinkButton1&#39;,&#39;1025&#39;)" style="display:inline-block;background-color:#FFC9C9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl33_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl33$LinkButton1&#39;,&#39;125&#39;)" style="display:inline-block;background-color:#EAB892;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl34_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl34$LinkButton1&#39;,&#39;101&#39;)" style="display:inline-block;background-color:#DA867A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl35_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl35$LinkButton1&#39;,&#39;1007&#39;)" style="display:inline-block;background-color:#A34B4B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl36_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl36$LinkButton1&#39;,&#39;1016&#39;)" style="display:inline-block;background-color:#FF66CC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl37_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl37$LinkButton1&#39;,&#39;1032&#39;)" style="display:inline-block;background-color:#FF00BF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl38_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl38$LinkButton1&#39;,&#39;1004&#39;)" style="display:inline-block;background-color:#FF0000;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl39_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl39$LinkButton1&#39;,&#39;21&#39;)" style="display:inline-block;background-color:#C4281C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl40_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl40$LinkButton1&#39;,&#39;9&#39;)" style="display:inline-block;background-color:#E8BAC8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl41_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl41$LinkButton1&#39;,&#39;1026&#39;)" style="display:inline-block;background-color:#B1A7FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl42_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl42$LinkButton1&#39;,&#39;1006&#39;)" style="display:inline-block;background-color:#B480FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl43_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl43$LinkButton1&#39;,&#39;153&#39;)" style="display:inline-block;background-color:#957977;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl44_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl44$LinkButton1&#39;,&#39;1023&#39;)" style="display:inline-block;background-color:#8C5B9F;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl45_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl45$LinkButton1&#39;,&#39;1015&#39;)" style="display:inline-block;background-color:#AA00AA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl46_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl46$LinkButton1&#39;,&#39;1031&#39;)" style="display:inline-block;background-color:#6225D1;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl47_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl47$LinkButton1&#39;,&#39;104&#39;)" style="display:inline-block;background-color:#6B327C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl48_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl48$LinkButton1&#39;,&#39;5&#39;)" style="display:inline-block;background-color:#D7C59A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl49_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl49$LinkButton1&#39;,&#39;1030&#39;)" style="display:inline-block;background-color:#FFCC99;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl50_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl50$LinkButton1&#39;,&#39;18&#39;)" style="display:inline-block;background-color:#CC8E69;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl51_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl51$LinkButton1&#39;,&#39;106&#39;)" style="display:inline-block;background-color:#DA8541;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl52_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl52$LinkButton1&#39;,&#39;38&#39;)" style="display:inline-block;background-color:#A05F35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl53_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl53$LinkButton1&#39;,&#39;1014&#39;)" style="display:inline-block;background-color:#AA5500;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl54_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl54$LinkButton1&#39;,&#39;217&#39;)" style="display:inline-block;background-color:#7C5C46;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl55_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl55$LinkButton1&#39;,&#39;192&#39;)" style="display:inline-block;background-color:#694028;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl56_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl56$LinkButton1&#39;,&#39;1001&#39;)" style="display:inline-block;background-color:#F8F8F8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl57_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl57$LinkButton1&#39;,&#39;1&#39;)" style="display:inline-block;background-color:#F2F3F3;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl58_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl58$LinkButton1&#39;,&#39;208&#39;)" style="display:inline-block;background-color:#E5E4DF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl59_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl59$LinkButton1&#39;,&#39;1002&#39;)" style="display:inline-block;background-color:#CDCDCD;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl60_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl60$LinkButton1&#39;,&#39;194&#39;)" style="display:inline-block;background-color:#A3A2A5;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl61_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl61$LinkButton1&#39;,&#39;199&#39;)" style="display:inline-block;background-color:#635F62;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl62_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl62$LinkButton1&#39;,&#39;26&#39;)" style="display:inline-block;background-color:#1B2A35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightLeg_DataListColors_ctl63_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightLeg$DataListColors$ctl63$LinkButton1&#39;,&#39;1003&#39;)" style="display:inline-block;background-color:#111111;height:40px;width:40px;">

			</div>
    </td>
		</tr>
	</table>
                                </div>
                            </div>
                            <div id="PopupLeftLeg" class="modalPopup unifiedModal ColorPickerModal simplemodal-data">
                                <div style="height:38px;padding-top:2px;">Choose a Body Color</div>
                                <div class="simplemodal-close"><a class="ImageButton closeBtnCircle_20h" style="left:-36px;"></a></div>
                                <div class="unifiedModalContent ColorPickerContainer">
                                    <table id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors" cellspacing="0" border="0" style="border-width:0px;border-collapse:collapse;">
		<tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl00_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl00$LinkButton1&#39;,&#39;45&#39;)" style="display:inline-block;background-color:#B4D2E4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl01_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl01$LinkButton1&#39;,&#39;1024&#39;)" style="display:inline-block;background-color:#AFDDFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl02_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl02$LinkButton1&#39;,&#39;11&#39;)" style="display:inline-block;background-color:#80BBDC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl03_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl03$LinkButton1&#39;,&#39;102&#39;)" style="display:inline-block;background-color:#6E99CA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl04_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl04$LinkButton1&#39;,&#39;23&#39;)" style="display:inline-block;background-color:#0D69AC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl05_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl05$LinkButton1&#39;,&#39;1010&#39;)" style="display:inline-block;background-color:#0000FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl06_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl06$LinkButton1&#39;,&#39;1012&#39;)" style="display:inline-block;background-color:#2154B9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl07_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl07$LinkButton1&#39;,&#39;1011&#39;)" style="display:inline-block;background-color:#002060;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl08_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl08$LinkButton1&#39;,&#39;1027&#39;)" style="display:inline-block;background-color:#9FF3E9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl09_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl09$LinkButton1&#39;,&#39;1018&#39;)" style="display:inline-block;background-color:#12EED4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl10_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl10$LinkButton1&#39;,&#39;151&#39;)" style="display:inline-block;background-color:#789082;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl11_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl11$LinkButton1&#39;,&#39;1022&#39;)" style="display:inline-block;background-color:#7F8E64;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl12_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl12$LinkButton1&#39;,&#39;135&#39;)" style="display:inline-block;background-color:#74869D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl13_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl13$LinkButton1&#39;,&#39;1019&#39;)" style="display:inline-block;background-color:#00FFFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl14_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl14$LinkButton1&#39;,&#39;1013&#39;)" style="display:inline-block;background-color:#04AFEC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl15_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl15$LinkButton1&#39;,&#39;107&#39;)" style="display:inline-block;background-color:#008F9C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl16_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl16$LinkButton1&#39;,&#39;1028&#39;)" style="display:inline-block;background-color:#CCFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl17_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl17$LinkButton1&#39;,&#39;29&#39;)" style="display:inline-block;background-color:#A1C48C;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl18_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl18$LinkButton1&#39;,&#39;119&#39;)" style="display:inline-block;background-color:#A4BD47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl19_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl19$LinkButton1&#39;,&#39;37&#39;)" style="display:inline-block;background-color:#4B974B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl20_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl20$LinkButton1&#39;,&#39;1021&#39;)" style="display:inline-block;background-color:#3A7D15;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl21_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl21$LinkButton1&#39;,&#39;1020&#39;)" style="display:inline-block;background-color:#00FF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl22_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl22$LinkButton1&#39;,&#39;28&#39;)" style="display:inline-block;background-color:#287F47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl23_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl23$LinkButton1&#39;,&#39;141&#39;)" style="display:inline-block;background-color:#27462D;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl24_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl24$LinkButton1&#39;,&#39;1029&#39;)" style="display:inline-block;background-color:#FFFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl25_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl25$LinkButton1&#39;,&#39;226&#39;)" style="display:inline-block;background-color:#FDEA8D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl26_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl26$LinkButton1&#39;,&#39;1008&#39;)" style="display:inline-block;background-color:#C1BE42;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl27_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl27$LinkButton1&#39;,&#39;24&#39;)" style="display:inline-block;background-color:#F5CD30;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl28_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl28$LinkButton1&#39;,&#39;1017&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl29_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl29$LinkButton1&#39;,&#39;1009&#39;)" style="display:inline-block;background-color:#FFFF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl30_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl30$LinkButton1&#39;,&#39;1005&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl31_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl31$LinkButton1&#39;,&#39;105&#39;)" style="display:inline-block;background-color:#E29B40;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl32_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl32$LinkButton1&#39;,&#39;1025&#39;)" style="display:inline-block;background-color:#FFC9C9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl33_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl33$LinkButton1&#39;,&#39;125&#39;)" style="display:inline-block;background-color:#EAB892;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl34_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl34$LinkButton1&#39;,&#39;101&#39;)" style="display:inline-block;background-color:#DA867A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl35_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl35$LinkButton1&#39;,&#39;1007&#39;)" style="display:inline-block;background-color:#A34B4B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl36_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl36$LinkButton1&#39;,&#39;1016&#39;)" style="display:inline-block;background-color:#FF66CC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl37_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl37$LinkButton1&#39;,&#39;1032&#39;)" style="display:inline-block;background-color:#FF00BF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl38_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl38$LinkButton1&#39;,&#39;1004&#39;)" style="display:inline-block;background-color:#FF0000;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl39_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl39$LinkButton1&#39;,&#39;21&#39;)" style="display:inline-block;background-color:#C4281C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl40_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl40$LinkButton1&#39;,&#39;9&#39;)" style="display:inline-block;background-color:#E8BAC8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl41_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl41$LinkButton1&#39;,&#39;1026&#39;)" style="display:inline-block;background-color:#B1A7FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl42_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl42$LinkButton1&#39;,&#39;1006&#39;)" style="display:inline-block;background-color:#B480FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl43_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl43$LinkButton1&#39;,&#39;153&#39;)" style="display:inline-block;background-color:#957977;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl44_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl44$LinkButton1&#39;,&#39;1023&#39;)" style="display:inline-block;background-color:#8C5B9F;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl45_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl45$LinkButton1&#39;,&#39;1015&#39;)" style="display:inline-block;background-color:#AA00AA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl46_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl46$LinkButton1&#39;,&#39;1031&#39;)" style="display:inline-block;background-color:#6225D1;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl47_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl47$LinkButton1&#39;,&#39;104&#39;)" style="display:inline-block;background-color:#6B327C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl48_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl48$LinkButton1&#39;,&#39;5&#39;)" style="display:inline-block;background-color:#D7C59A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl49_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl49$LinkButton1&#39;,&#39;1030&#39;)" style="display:inline-block;background-color:#FFCC99;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl50_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl50$LinkButton1&#39;,&#39;18&#39;)" style="display:inline-block;background-color:#CC8E69;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl51_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl51$LinkButton1&#39;,&#39;106&#39;)" style="display:inline-block;background-color:#DA8541;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl52_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl52$LinkButton1&#39;,&#39;38&#39;)" style="display:inline-block;background-color:#A05F35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl53_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl53$LinkButton1&#39;,&#39;1014&#39;)" style="display:inline-block;background-color:#AA5500;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl54_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl54$LinkButton1&#39;,&#39;217&#39;)" style="display:inline-block;background-color:#7C5C46;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl55_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl55$LinkButton1&#39;,&#39;192&#39;)" style="display:inline-block;background-color:#694028;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl56_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl56$LinkButton1&#39;,&#39;1001&#39;)" style="display:inline-block;background-color:#F8F8F8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl57_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl57$LinkButton1&#39;,&#39;1&#39;)" style="display:inline-block;background-color:#F2F3F3;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl58_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl58$LinkButton1&#39;,&#39;208&#39;)" style="display:inline-block;background-color:#E5E4DF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl59_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl59$LinkButton1&#39;,&#39;1002&#39;)" style="display:inline-block;background-color:#CDCDCD;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl60_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl60$LinkButton1&#39;,&#39;194&#39;)" style="display:inline-block;background-color:#A3A2A5;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl61_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl61$LinkButton1&#39;,&#39;199&#39;)" style="display:inline-block;background-color:#635F62;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl62_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl62$LinkButton1&#39;,&#39;26&#39;)" style="display:inline-block;background-color:#1B2A35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftLeg_DataListColors_ctl63_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftLeg$DataListColors$ctl63$LinkButton1&#39;,&#39;1003&#39;)" style="display:inline-block;background-color:#111111;height:40px;width:40px;">

			</div>
    </td>
		</tr>
	</table>
                                </div>
                            </div>
                            <div id="PopupRightArm" class="modalPopup unifiedModal ColorPickerModal simplemodal-data">
                                <div style="height:38px;padding-top:2px;">Choose a Body Color</div>
                                <div class="simplemodal-close"><a class="ImageButton closeBtnCircle_20h" style="left:-36px;"></a></div>
                                <div class="unifiedModalContent ColorPickerContainer">
                                    <table id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors" cellspacing="0" border="0" style="border-width:0px;border-collapse:collapse;">
		<tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl00_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl00$LinkButton1&#39;,&#39;45&#39;)" style="display:inline-block;background-color:#B4D2E4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl01_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl01$LinkButton1&#39;,&#39;1024&#39;)" style="display:inline-block;background-color:#AFDDFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl02_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl02$LinkButton1&#39;,&#39;11&#39;)" style="display:inline-block;background-color:#80BBDC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl03_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl03$LinkButton1&#39;,&#39;102&#39;)" style="display:inline-block;background-color:#6E99CA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl04_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl04$LinkButton1&#39;,&#39;23&#39;)" style="display:inline-block;background-color:#0D69AC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl05_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl05$LinkButton1&#39;,&#39;1010&#39;)" style="display:inline-block;background-color:#0000FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl06_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl06$LinkButton1&#39;,&#39;1012&#39;)" style="display:inline-block;background-color:#2154B9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl07_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl07$LinkButton1&#39;,&#39;1011&#39;)" style="display:inline-block;background-color:#002060;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl08_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl08$LinkButton1&#39;,&#39;1027&#39;)" style="display:inline-block;background-color:#9FF3E9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl09_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl09$LinkButton1&#39;,&#39;1018&#39;)" style="display:inline-block;background-color:#12EED4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl10_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl10$LinkButton1&#39;,&#39;151&#39;)" style="display:inline-block;background-color:#789082;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl11_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl11$LinkButton1&#39;,&#39;1022&#39;)" style="display:inline-block;background-color:#7F8E64;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl12_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl12$LinkButton1&#39;,&#39;135&#39;)" style="display:inline-block;background-color:#74869D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl13_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl13$LinkButton1&#39;,&#39;1019&#39;)" style="display:inline-block;background-color:#00FFFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl14_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl14$LinkButton1&#39;,&#39;1013&#39;)" style="display:inline-block;background-color:#04AFEC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl15_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl15$LinkButton1&#39;,&#39;107&#39;)" style="display:inline-block;background-color:#008F9C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl16_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl16$LinkButton1&#39;,&#39;1028&#39;)" style="display:inline-block;background-color:#CCFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl17_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl17$LinkButton1&#39;,&#39;29&#39;)" style="display:inline-block;background-color:#A1C48C;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl18_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl18$LinkButton1&#39;,&#39;119&#39;)" style="display:inline-block;background-color:#A4BD47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl19_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl19$LinkButton1&#39;,&#39;37&#39;)" style="display:inline-block;background-color:#4B974B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl20_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl20$LinkButton1&#39;,&#39;1021&#39;)" style="display:inline-block;background-color:#3A7D15;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl21_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl21$LinkButton1&#39;,&#39;1020&#39;)" style="display:inline-block;background-color:#00FF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl22_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl22$LinkButton1&#39;,&#39;28&#39;)" style="display:inline-block;background-color:#287F47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl23_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl23$LinkButton1&#39;,&#39;141&#39;)" style="display:inline-block;background-color:#27462D;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl24_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl24$LinkButton1&#39;,&#39;1029&#39;)" style="display:inline-block;background-color:#FFFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl25_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl25$LinkButton1&#39;,&#39;226&#39;)" style="display:inline-block;background-color:#FDEA8D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl26_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl26$LinkButton1&#39;,&#39;1008&#39;)" style="display:inline-block;background-color:#C1BE42;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl27_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl27$LinkButton1&#39;,&#39;24&#39;)" style="display:inline-block;background-color:#F5CD30;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl28_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl28$LinkButton1&#39;,&#39;1017&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl29_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl29$LinkButton1&#39;,&#39;1009&#39;)" style="display:inline-block;background-color:#FFFF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl30_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl30$LinkButton1&#39;,&#39;1005&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl31_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl31$LinkButton1&#39;,&#39;105&#39;)" style="display:inline-block;background-color:#E29B40;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl32_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl32$LinkButton1&#39;,&#39;1025&#39;)" style="display:inline-block;background-color:#FFC9C9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl33_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl33$LinkButton1&#39;,&#39;125&#39;)" style="display:inline-block;background-color:#EAB892;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl34_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl34$LinkButton1&#39;,&#39;101&#39;)" style="display:inline-block;background-color:#DA867A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl35_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl35$LinkButton1&#39;,&#39;1007&#39;)" style="display:inline-block;background-color:#A34B4B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl36_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl36$LinkButton1&#39;,&#39;1016&#39;)" style="display:inline-block;background-color:#FF66CC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl37_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl37$LinkButton1&#39;,&#39;1032&#39;)" style="display:inline-block;background-color:#FF00BF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl38_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl38$LinkButton1&#39;,&#39;1004&#39;)" style="display:inline-block;background-color:#FF0000;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl39_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl39$LinkButton1&#39;,&#39;21&#39;)" style="display:inline-block;background-color:#C4281C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl40_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl40$LinkButton1&#39;,&#39;9&#39;)" style="display:inline-block;background-color:#E8BAC8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl41_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl41$LinkButton1&#39;,&#39;1026&#39;)" style="display:inline-block;background-color:#B1A7FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl42_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl42$LinkButton1&#39;,&#39;1006&#39;)" style="display:inline-block;background-color:#B480FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl43_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl43$LinkButton1&#39;,&#39;153&#39;)" style="display:inline-block;background-color:#957977;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl44_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl44$LinkButton1&#39;,&#39;1023&#39;)" style="display:inline-block;background-color:#8C5B9F;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl45_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl45$LinkButton1&#39;,&#39;1015&#39;)" style="display:inline-block;background-color:#AA00AA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl46_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl46$LinkButton1&#39;,&#39;1031&#39;)" style="display:inline-block;background-color:#6225D1;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl47_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl47$LinkButton1&#39;,&#39;104&#39;)" style="display:inline-block;background-color:#6B327C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl48_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl48$LinkButton1&#39;,&#39;5&#39;)" style="display:inline-block;background-color:#D7C59A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl49_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl49$LinkButton1&#39;,&#39;1030&#39;)" style="display:inline-block;background-color:#FFCC99;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl50_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl50$LinkButton1&#39;,&#39;18&#39;)" style="display:inline-block;background-color:#CC8E69;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl51_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl51$LinkButton1&#39;,&#39;106&#39;)" style="display:inline-block;background-color:#DA8541;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl52_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl52$LinkButton1&#39;,&#39;38&#39;)" style="display:inline-block;background-color:#A05F35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl53_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl53$LinkButton1&#39;,&#39;1014&#39;)" style="display:inline-block;background-color:#AA5500;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl54_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl54$LinkButton1&#39;,&#39;217&#39;)" style="display:inline-block;background-color:#7C5C46;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl55_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl55$LinkButton1&#39;,&#39;192&#39;)" style="display:inline-block;background-color:#694028;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl56_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl56$LinkButton1&#39;,&#39;1001&#39;)" style="display:inline-block;background-color:#F8F8F8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl57_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl57$LinkButton1&#39;,&#39;1&#39;)" style="display:inline-block;background-color:#F2F3F3;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl58_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl58$LinkButton1&#39;,&#39;208&#39;)" style="display:inline-block;background-color:#E5E4DF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl59_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl59$LinkButton1&#39;,&#39;1002&#39;)" style="display:inline-block;background-color:#CDCDCD;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl60_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl60$LinkButton1&#39;,&#39;194&#39;)" style="display:inline-block;background-color:#A3A2A5;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl61_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl61$LinkButton1&#39;,&#39;199&#39;)" style="display:inline-block;background-color:#635F62;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl62_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl62$LinkButton1&#39;,&#39;26&#39;)" style="display:inline-block;background-color:#1B2A35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserRightArm_DataListColors_ctl63_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserRightArm$DataListColors$ctl63$LinkButton1&#39;,&#39;1003&#39;)" style="display:inline-block;background-color:#111111;height:40px;width:40px;">

			</div>
    </td>
		</tr>
	</table>
                                </div>
                            </div>
                            <div id="PopupLeftArm" class="modalPopup unifiedModal ColorPickerModal simplemodal-data">
                                <div style="height:38px;padding-top:2px;">Choose a Body Color</div>
                                <div class="simplemodal-close"><a class="ImageButton closeBtnCircle_20h" style="left:-36px;"></a></div>
                                <div class="unifiedModalContent ColorPickerContainer">
                                    <table id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors" cellspacing="0" border="0" style="border-width:0px;border-collapse:collapse;">
		<tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl00_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl00$LinkButton1&#39;,&#39;45&#39;)" style="display:inline-block;background-color:#B4D2E4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl01_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl01$LinkButton1&#39;,&#39;1024&#39;)" style="display:inline-block;background-color:#AFDDFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl02_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl02$LinkButton1&#39;,&#39;11&#39;)" style="display:inline-block;background-color:#80BBDC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl03_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl03$LinkButton1&#39;,&#39;102&#39;)" style="display:inline-block;background-color:#6E99CA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl04_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl04$LinkButton1&#39;,&#39;23&#39;)" style="display:inline-block;background-color:#0D69AC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl05_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl05$LinkButton1&#39;,&#39;1010&#39;)" style="display:inline-block;background-color:#0000FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl06_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl06$LinkButton1&#39;,&#39;1012&#39;)" style="display:inline-block;background-color:#2154B9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl07_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl07$LinkButton1&#39;,&#39;1011&#39;)" style="display:inline-block;background-color:#002060;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl08_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl08$LinkButton1&#39;,&#39;1027&#39;)" style="display:inline-block;background-color:#9FF3E9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl09_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl09$LinkButton1&#39;,&#39;1018&#39;)" style="display:inline-block;background-color:#12EED4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl10_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl10$LinkButton1&#39;,&#39;151&#39;)" style="display:inline-block;background-color:#789082;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl11_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl11$LinkButton1&#39;,&#39;1022&#39;)" style="display:inline-block;background-color:#7F8E64;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl12_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl12$LinkButton1&#39;,&#39;135&#39;)" style="display:inline-block;background-color:#74869D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl13_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl13$LinkButton1&#39;,&#39;1019&#39;)" style="display:inline-block;background-color:#00FFFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl14_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl14$LinkButton1&#39;,&#39;1013&#39;)" style="display:inline-block;background-color:#04AFEC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl15_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl15$LinkButton1&#39;,&#39;107&#39;)" style="display:inline-block;background-color:#008F9C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl16_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl16$LinkButton1&#39;,&#39;1028&#39;)" style="display:inline-block;background-color:#CCFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl17_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl17$LinkButton1&#39;,&#39;29&#39;)" style="display:inline-block;background-color:#A1C48C;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl18_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl18$LinkButton1&#39;,&#39;119&#39;)" style="display:inline-block;background-color:#A4BD47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl19_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl19$LinkButton1&#39;,&#39;37&#39;)" style="display:inline-block;background-color:#4B974B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl20_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl20$LinkButton1&#39;,&#39;1021&#39;)" style="display:inline-block;background-color:#3A7D15;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl21_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl21$LinkButton1&#39;,&#39;1020&#39;)" style="display:inline-block;background-color:#00FF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl22_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl22$LinkButton1&#39;,&#39;28&#39;)" style="display:inline-block;background-color:#287F47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl23_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl23$LinkButton1&#39;,&#39;141&#39;)" style="display:inline-block;background-color:#27462D;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl24_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl24$LinkButton1&#39;,&#39;1029&#39;)" style="display:inline-block;background-color:#FFFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl25_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl25$LinkButton1&#39;,&#39;226&#39;)" style="display:inline-block;background-color:#FDEA8D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl26_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl26$LinkButton1&#39;,&#39;1008&#39;)" style="display:inline-block;background-color:#C1BE42;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl27_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl27$LinkButton1&#39;,&#39;24&#39;)" style="display:inline-block;background-color:#F5CD30;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl28_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl28$LinkButton1&#39;,&#39;1017&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl29_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl29$LinkButton1&#39;,&#39;1009&#39;)" style="display:inline-block;background-color:#FFFF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl30_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl30$LinkButton1&#39;,&#39;1005&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl31_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl31$LinkButton1&#39;,&#39;105&#39;)" style="display:inline-block;background-color:#E29B40;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl32_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl32$LinkButton1&#39;,&#39;1025&#39;)" style="display:inline-block;background-color:#FFC9C9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl33_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl33$LinkButton1&#39;,&#39;125&#39;)" style="display:inline-block;background-color:#EAB892;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl34_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl34$LinkButton1&#39;,&#39;101&#39;)" style="display:inline-block;background-color:#DA867A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl35_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl35$LinkButton1&#39;,&#39;1007&#39;)" style="display:inline-block;background-color:#A34B4B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl36_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl36$LinkButton1&#39;,&#39;1016&#39;)" style="display:inline-block;background-color:#FF66CC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl37_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl37$LinkButton1&#39;,&#39;1032&#39;)" style="display:inline-block;background-color:#FF00BF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl38_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl38$LinkButton1&#39;,&#39;1004&#39;)" style="display:inline-block;background-color:#FF0000;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl39_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl39$LinkButton1&#39;,&#39;21&#39;)" style="display:inline-block;background-color:#C4281C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl40_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl40$LinkButton1&#39;,&#39;9&#39;)" style="display:inline-block;background-color:#E8BAC8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl41_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl41$LinkButton1&#39;,&#39;1026&#39;)" style="display:inline-block;background-color:#B1A7FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl42_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl42$LinkButton1&#39;,&#39;1006&#39;)" style="display:inline-block;background-color:#B480FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl43_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl43$LinkButton1&#39;,&#39;153&#39;)" style="display:inline-block;background-color:#957977;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl44_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl44$LinkButton1&#39;,&#39;1023&#39;)" style="display:inline-block;background-color:#8C5B9F;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl45_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl45$LinkButton1&#39;,&#39;1015&#39;)" style="display:inline-block;background-color:#AA00AA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl46_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl46$LinkButton1&#39;,&#39;1031&#39;)" style="display:inline-block;background-color:#6225D1;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl47_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl47$LinkButton1&#39;,&#39;104&#39;)" style="display:inline-block;background-color:#6B327C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl48_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl48$LinkButton1&#39;,&#39;5&#39;)" style="display:inline-block;background-color:#D7C59A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl49_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl49$LinkButton1&#39;,&#39;1030&#39;)" style="display:inline-block;background-color:#FFCC99;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl50_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl50$LinkButton1&#39;,&#39;18&#39;)" style="display:inline-block;background-color:#CC8E69;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl51_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl51$LinkButton1&#39;,&#39;106&#39;)" style="display:inline-block;background-color:#DA8541;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl52_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl52$LinkButton1&#39;,&#39;38&#39;)" style="display:inline-block;background-color:#A05F35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl53_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl53$LinkButton1&#39;,&#39;1014&#39;)" style="display:inline-block;background-color:#AA5500;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl54_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl54$LinkButton1&#39;,&#39;217&#39;)" style="display:inline-block;background-color:#7C5C46;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl55_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl55$LinkButton1&#39;,&#39;192&#39;)" style="display:inline-block;background-color:#694028;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl56_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl56$LinkButton1&#39;,&#39;1001&#39;)" style="display:inline-block;background-color:#F8F8F8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl57_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl57$LinkButton1&#39;,&#39;1&#39;)" style="display:inline-block;background-color:#F2F3F3;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl58_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl58$LinkButton1&#39;,&#39;208&#39;)" style="display:inline-block;background-color:#E5E4DF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl59_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl59$LinkButton1&#39;,&#39;1002&#39;)" style="display:inline-block;background-color:#CDCDCD;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl60_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl60$LinkButton1&#39;,&#39;194&#39;)" style="display:inline-block;background-color:#A3A2A5;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl61_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl61$LinkButton1&#39;,&#39;199&#39;)" style="display:inline-block;background-color:#635F62;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl62_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl62$LinkButton1&#39;,&#39;26&#39;)" style="display:inline-block;background-color:#1B2A35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserLeftArm_DataListColors_ctl63_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserLeftArm$DataListColors$ctl63$LinkButton1&#39;,&#39;1003&#39;)" style="display:inline-block;background-color:#111111;height:40px;width:40px;">

			</div>
    </td>
		</tr>
	</table>
                                </div>
                            </div>
                            <div id="PopupHead" class="modalPopup unifiedModal ColorPickerModal simplemodal-data">
                                <div style="height:38px;padding-top:2px;">Choose a Body Color</div>
                                <div class="simplemodal-close"><a class="ImageButton closeBtnCircle_20h" style="left:-36px;"></a></div>
                                <div class="unifiedModalContent ColorPickerContainer">
                                    <table id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors" cellspacing="0" border="0" style="border-width:0px;border-collapse:collapse;">
		<tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl00_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl00$LinkButton1&#39;,&#39;45&#39;)" style="display:inline-block;background-color:#B4D2E4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl01_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl01$LinkButton1&#39;,&#39;1024&#39;)" style="display:inline-block;background-color:#AFDDFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl02_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl02$LinkButton1&#39;,&#39;11&#39;)" style="display:inline-block;background-color:#80BBDC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl03_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl03$LinkButton1&#39;,&#39;102&#39;)" style="display:inline-block;background-color:#6E99CA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl04_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl04$LinkButton1&#39;,&#39;23&#39;)" style="display:inline-block;background-color:#0D69AC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl05_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl05$LinkButton1&#39;,&#39;1010&#39;)" style="display:inline-block;background-color:#0000FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl06_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl06$LinkButton1&#39;,&#39;1012&#39;)" style="display:inline-block;background-color:#2154B9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl07_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl07$LinkButton1&#39;,&#39;1011&#39;)" style="display:inline-block;background-color:#002060;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl08_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl08$LinkButton1&#39;,&#39;1027&#39;)" style="display:inline-block;background-color:#9FF3E9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl09_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl09$LinkButton1&#39;,&#39;1018&#39;)" style="display:inline-block;background-color:#12EED4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl10_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl10$LinkButton1&#39;,&#39;151&#39;)" style="display:inline-block;background-color:#789082;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl11_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl11$LinkButton1&#39;,&#39;1022&#39;)" style="display:inline-block;background-color:#7F8E64;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl12_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl12$LinkButton1&#39;,&#39;135&#39;)" style="display:inline-block;background-color:#74869D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl13_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl13$LinkButton1&#39;,&#39;1019&#39;)" style="display:inline-block;background-color:#00FFFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl14_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl14$LinkButton1&#39;,&#39;1013&#39;)" style="display:inline-block;background-color:#04AFEC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl15_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl15$LinkButton1&#39;,&#39;107&#39;)" style="display:inline-block;background-color:#008F9C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl16_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl16$LinkButton1&#39;,&#39;1028&#39;)" style="display:inline-block;background-color:#CCFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl17_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl17$LinkButton1&#39;,&#39;29&#39;)" style="display:inline-block;background-color:#A1C48C;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl18_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl18$LinkButton1&#39;,&#39;119&#39;)" style="display:inline-block;background-color:#A4BD47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl19_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl19$LinkButton1&#39;,&#39;37&#39;)" style="display:inline-block;background-color:#4B974B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl20_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl20$LinkButton1&#39;,&#39;1021&#39;)" style="display:inline-block;background-color:#3A7D15;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl21_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl21$LinkButton1&#39;,&#39;1020&#39;)" style="display:inline-block;background-color:#00FF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl22_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl22$LinkButton1&#39;,&#39;28&#39;)" style="display:inline-block;background-color:#287F47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl23_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl23$LinkButton1&#39;,&#39;141&#39;)" style="display:inline-block;background-color:#27462D;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl24_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl24$LinkButton1&#39;,&#39;1029&#39;)" style="display:inline-block;background-color:#FFFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl25_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl25$LinkButton1&#39;,&#39;226&#39;)" style="display:inline-block;background-color:#FDEA8D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl26_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl26$LinkButton1&#39;,&#39;1008&#39;)" style="display:inline-block;background-color:#C1BE42;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl27_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl27$LinkButton1&#39;,&#39;24&#39;)" style="display:inline-block;background-color:#F5CD30;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl28_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl28$LinkButton1&#39;,&#39;1017&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl29_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl29$LinkButton1&#39;,&#39;1009&#39;)" style="display:inline-block;background-color:#FFFF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl30_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl30$LinkButton1&#39;,&#39;1005&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl31_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl31$LinkButton1&#39;,&#39;105&#39;)" style="display:inline-block;background-color:#E29B40;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl32_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl32$LinkButton1&#39;,&#39;1025&#39;)" style="display:inline-block;background-color:#FFC9C9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl33_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl33$LinkButton1&#39;,&#39;125&#39;)" style="display:inline-block;background-color:#EAB892;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl34_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl34$LinkButton1&#39;,&#39;101&#39;)" style="display:inline-block;background-color:#DA867A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl35_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl35$LinkButton1&#39;,&#39;1007&#39;)" style="display:inline-block;background-color:#A34B4B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl36_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl36$LinkButton1&#39;,&#39;1016&#39;)" style="display:inline-block;background-color:#FF66CC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl37_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl37$LinkButton1&#39;,&#39;1032&#39;)" style="display:inline-block;background-color:#FF00BF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl38_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl38$LinkButton1&#39;,&#39;1004&#39;)" style="display:inline-block;background-color:#FF0000;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl39_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl39$LinkButton1&#39;,&#39;21&#39;)" style="display:inline-block;background-color:#C4281C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl40_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl40$LinkButton1&#39;,&#39;9&#39;)" style="display:inline-block;background-color:#E8BAC8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl41_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl41$LinkButton1&#39;,&#39;1026&#39;)" style="display:inline-block;background-color:#B1A7FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl42_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl42$LinkButton1&#39;,&#39;1006&#39;)" style="display:inline-block;background-color:#B480FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl43_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl43$LinkButton1&#39;,&#39;153&#39;)" style="display:inline-block;background-color:#957977;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl44_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl44$LinkButton1&#39;,&#39;1023&#39;)" style="display:inline-block;background-color:#8C5B9F;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl45_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl45$LinkButton1&#39;,&#39;1015&#39;)" style="display:inline-block;background-color:#AA00AA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl46_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl46$LinkButton1&#39;,&#39;1031&#39;)" style="display:inline-block;background-color:#6225D1;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl47_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl47$LinkButton1&#39;,&#39;104&#39;)" style="display:inline-block;background-color:#6B327C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl48_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl48$LinkButton1&#39;,&#39;5&#39;)" style="display:inline-block;background-color:#D7C59A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl49_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl49$LinkButton1&#39;,&#39;1030&#39;)" style="display:inline-block;background-color:#FFCC99;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl50_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl50$LinkButton1&#39;,&#39;18&#39;)" style="display:inline-block;background-color:#CC8E69;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl51_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl51$LinkButton1&#39;,&#39;106&#39;)" style="display:inline-block;background-color:#DA8541;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl52_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl52$LinkButton1&#39;,&#39;38&#39;)" style="display:inline-block;background-color:#A05F35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl53_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl53$LinkButton1&#39;,&#39;1014&#39;)" style="display:inline-block;background-color:#AA5500;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl54_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl54$LinkButton1&#39;,&#39;217&#39;)" style="display:inline-block;background-color:#7C5C46;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl55_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl55$LinkButton1&#39;,&#39;192&#39;)" style="display:inline-block;background-color:#694028;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl56_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl56$LinkButton1&#39;,&#39;1001&#39;)" style="display:inline-block;background-color:#F8F8F8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl57_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl57$LinkButton1&#39;,&#39;1&#39;)" style="display:inline-block;background-color:#F2F3F3;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl58_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl58$LinkButton1&#39;,&#39;208&#39;)" style="display:inline-block;background-color:#E5E4DF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl59_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl59$LinkButton1&#39;,&#39;1002&#39;)" style="display:inline-block;background-color:#CDCDCD;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl60_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl60$LinkButton1&#39;,&#39;194&#39;)" style="display:inline-block;background-color:#A3A2A5;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl61_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl61$LinkButton1&#39;,&#39;199&#39;)" style="display:inline-block;background-color:#635F62;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl62_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl62$LinkButton1&#39;,&#39;26&#39;)" style="display:inline-block;background-color:#1B2A35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserHead_DataListColors_ctl63_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserHead$DataListColors$ctl63$LinkButton1&#39;,&#39;1003&#39;)" style="display:inline-block;background-color:#111111;height:40px;width:40px;">

			</div>
    </td>
		</tr>
	</table>
                                </div>
                            </div>
                            <div id="PopupTorso" class="modalPopup unifiedModal ColorPickerModal simplemodal-data">
                                <div style="height:38px;padding-top:2px;">Choose a Body Color</div>
                                <div class="simplemodal-close"><a class="ImageButton closeBtnCircle_20h" style="left:-36px;"></a></div>
                                <div class="unifiedModalContent ColorPickerContainer">
                                    <table id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors" cellspacing="0" border="0" style="border-width:0px;border-collapse:collapse;">
		<tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl00_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl00$LinkButton1&#39;,&#39;45&#39;)" style="display:inline-block;background-color:#B4D2E4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl01_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl01$LinkButton1&#39;,&#39;1024&#39;)" style="display:inline-block;background-color:#AFDDFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl02_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl02$LinkButton1&#39;,&#39;11&#39;)" style="display:inline-block;background-color:#80BBDC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl03_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl03$LinkButton1&#39;,&#39;102&#39;)" style="display:inline-block;background-color:#6E99CA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl04_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl04$LinkButton1&#39;,&#39;23&#39;)" style="display:inline-block;background-color:#0D69AC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl05_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl05$LinkButton1&#39;,&#39;1010&#39;)" style="display:inline-block;background-color:#0000FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl06_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl06$LinkButton1&#39;,&#39;1012&#39;)" style="display:inline-block;background-color:#2154B9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl07_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl07$LinkButton1&#39;,&#39;1011&#39;)" style="display:inline-block;background-color:#002060;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl08_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl08$LinkButton1&#39;,&#39;1027&#39;)" style="display:inline-block;background-color:#9FF3E9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl09_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl09$LinkButton1&#39;,&#39;1018&#39;)" style="display:inline-block;background-color:#12EED4;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl10_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl10$LinkButton1&#39;,&#39;151&#39;)" style="display:inline-block;background-color:#789082;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl11_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl11$LinkButton1&#39;,&#39;1022&#39;)" style="display:inline-block;background-color:#7F8E64;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl12_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl12$LinkButton1&#39;,&#39;135&#39;)" style="display:inline-block;background-color:#74869D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl13_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl13$LinkButton1&#39;,&#39;1019&#39;)" style="display:inline-block;background-color:#00FFFF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl14_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl14$LinkButton1&#39;,&#39;1013&#39;)" style="display:inline-block;background-color:#04AFEC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl15_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl15$LinkButton1&#39;,&#39;107&#39;)" style="display:inline-block;background-color:#008F9C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl16_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl16$LinkButton1&#39;,&#39;1028&#39;)" style="display:inline-block;background-color:#CCFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl17_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl17$LinkButton1&#39;,&#39;29&#39;)" style="display:inline-block;background-color:#A1C48C;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl18_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl18$LinkButton1&#39;,&#39;119&#39;)" style="display:inline-block;background-color:#A4BD47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl19_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl19$LinkButton1&#39;,&#39;37&#39;)" style="display:inline-block;background-color:#4B974B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl20_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl20$LinkButton1&#39;,&#39;1021&#39;)" style="display:inline-block;background-color:#3A7D15;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl21_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl21$LinkButton1&#39;,&#39;1020&#39;)" style="display:inline-block;background-color:#00FF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl22_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl22$LinkButton1&#39;,&#39;28&#39;)" style="display:inline-block;background-color:#287F47;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl23_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl23$LinkButton1&#39;,&#39;141&#39;)" style="display:inline-block;background-color:#27462D;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl24_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl24$LinkButton1&#39;,&#39;1029&#39;)" style="display:inline-block;background-color:#FFFFCC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl25_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl25$LinkButton1&#39;,&#39;226&#39;)" style="display:inline-block;background-color:#FDEA8D;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl26_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl26$LinkButton1&#39;,&#39;1008&#39;)" style="display:inline-block;background-color:#C1BE42;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl27_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl27$LinkButton1&#39;,&#39;24&#39;)" style="display:inline-block;background-color:#F5CD30;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl28_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl28$LinkButton1&#39;,&#39;1017&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl29_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl29$LinkButton1&#39;,&#39;1009&#39;)" style="display:inline-block;background-color:#FFFF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl30_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl30$LinkButton1&#39;,&#39;1005&#39;)" style="display:inline-block;background-color:#FFAF00;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl31_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl31$LinkButton1&#39;,&#39;105&#39;)" style="display:inline-block;background-color:#E29B40;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl32_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl32$LinkButton1&#39;,&#39;1025&#39;)" style="display:inline-block;background-color:#FFC9C9;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl33_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl33$LinkButton1&#39;,&#39;125&#39;)" style="display:inline-block;background-color:#EAB892;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl34_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl34$LinkButton1&#39;,&#39;101&#39;)" style="display:inline-block;background-color:#DA867A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl35_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl35$LinkButton1&#39;,&#39;1007&#39;)" style="display:inline-block;background-color:#A34B4B;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl36_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl36$LinkButton1&#39;,&#39;1016&#39;)" style="display:inline-block;background-color:#FF66CC;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl37_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl37$LinkButton1&#39;,&#39;1032&#39;)" style="display:inline-block;background-color:#FF00BF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl38_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl38$LinkButton1&#39;,&#39;1004&#39;)" style="display:inline-block;background-color:#FF0000;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl39_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl39$LinkButton1&#39;,&#39;21&#39;)" style="display:inline-block;background-color:#C4281C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl40_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl40$LinkButton1&#39;,&#39;9&#39;)" style="display:inline-block;background-color:#E8BAC8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl41_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl41$LinkButton1&#39;,&#39;1026&#39;)" style="display:inline-block;background-color:#B1A7FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl42_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl42$LinkButton1&#39;,&#39;1006&#39;)" style="display:inline-block;background-color:#B480FF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl43_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl43$LinkButton1&#39;,&#39;153&#39;)" style="display:inline-block;background-color:#957977;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl44_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl44$LinkButton1&#39;,&#39;1023&#39;)" style="display:inline-block;background-color:#8C5B9F;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl45_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl45$LinkButton1&#39;,&#39;1015&#39;)" style="display:inline-block;background-color:#AA00AA;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl46_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl46$LinkButton1&#39;,&#39;1031&#39;)" style="display:inline-block;background-color:#6225D1;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl47_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl47$LinkButton1&#39;,&#39;104&#39;)" style="display:inline-block;background-color:#6B327C;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl48_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl48$LinkButton1&#39;,&#39;5&#39;)" style="display:inline-block;background-color:#D7C59A;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl49_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl49$LinkButton1&#39;,&#39;1030&#39;)" style="display:inline-block;background-color:#FFCC99;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl50_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl50$LinkButton1&#39;,&#39;18&#39;)" style="display:inline-block;background-color:#CC8E69;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl51_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl51$LinkButton1&#39;,&#39;106&#39;)" style="display:inline-block;background-color:#DA8541;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl52_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl52$LinkButton1&#39;,&#39;38&#39;)" style="display:inline-block;background-color:#A05F35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl53_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl53$LinkButton1&#39;,&#39;1014&#39;)" style="display:inline-block;background-color:#AA5500;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl54_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl54$LinkButton1&#39;,&#39;217&#39;)" style="display:inline-block;background-color:#7C5C46;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl55_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl55$LinkButton1&#39;,&#39;192&#39;)" style="display:inline-block;background-color:#694028;height:40px;width:40px;">

			</div>
    </td>
		</tr><tr>
			<td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl56_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl56$LinkButton1&#39;,&#39;1001&#39;)" style="display:inline-block;background-color:#F8F8F8;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl57_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl57$LinkButton1&#39;,&#39;1&#39;)" style="display:inline-block;background-color:#F2F3F3;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl58_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl58$LinkButton1&#39;,&#39;208&#39;)" style="display:inline-block;background-color:#E5E4DF;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl59_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl59$LinkButton1&#39;,&#39;1002&#39;)" style="display:inline-block;background-color:#CDCDCD;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl60_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl60$LinkButton1&#39;,&#39;194&#39;)" style="display:inline-block;background-color:#A3A2A5;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl61_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl61$LinkButton1&#39;,&#39;199&#39;)" style="display:inline-block;background-color:#635F62;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl62_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl62$LinkButton1&#39;,&#39;26&#39;)" style="display:inline-block;background-color:#1B2A35;height:40px;width:40px;">

			</div>
    </td><td>
        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ColorChooserTorso_DataListColors_ctl63_LinkButton1" class="ColorPickerItem" onclick="__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$ColorChooserTorso$DataListColors$ctl63$LinkButton1&#39;,&#39;1003&#39;)" style="display:inline-block;background-color:#111111;height:40px;width:40px;">

			</div>
    </td>
		</tr>
	</table>
                                </div>
                            </div>
                            <script type="text/javascript">
                                var colorPickerModalProperties = { overlayClose: true, escClose: true, opacity: 0, overlayCss: { backgroundColor: "#000"} };

                                RightLegOpen = function () {
                                    $("#PopupRightLeg").modal(colorPickerModalProperties);
                                };

                                LeftLegOpen = function () {
                                    $("#PopupLeftLeg").modal(colorPickerModalProperties);
                                };

                                RightArmOpen = function () {
                                    $("#PopupRightArm").modal(colorPickerModalProperties);
                                };

                                LeftArmOpen = function () {
                                    $("#PopupLeftArm").modal(colorPickerModalProperties);
                                };

                                HeadOpen = function () {
                                    $("#PopupHead").modal(colorPickerModalProperties);
                                };

                                TorsoOpen = function () {
                                    $("#PopupTorso").modal(colorPickerModalProperties);
                                };
                            </script>
                        
</div>
                        </div>
                    </div>
                </div> 
                <div class="Column2f">
                    <div class="tab-container">
	                    <div class="tab-active" data-id="tab-wardrobe">Wardrobe</div>
                        
	                    <div data-id="tab-outfits">Outfits</div>
                        
                    </div>
                    <div>
	                    <div id="tab-wardrobe" class="tab-active">
                        <div style="margin-top: 10px;">
                            <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_UpdatePanelWardrobe">
	
                            <div class="CustomizeCharacterContainer">

                                <div class="AttireCategory" style="text-align:center">
                                    
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl00_AttireCategorySelector" <?php if($currentcategory == 17) { echo 'class="AttireCategorySelector_Selected"'; } else { echo 'class="AttireCategorySelector"'; } ?> href="javascript:__doPostBack('viewheads',&#39;&#39;)">Heads</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl02_AttireCategorySelector" <?php if($currentcategory == 18) { echo 'class="AttireCategorySelector_Selected"'; } else { echo 'class="AttireCategorySelector"'; } ?>  href="javascript:__doPostBack('viewfaces',&#39;&#39;)">Faces</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl04_AttireCategorySelector" <?php if($currentcategory == 8) { echo 'class="AttireCategorySelector_Selected"'; } else { echo 'class="AttireCategorySelector"'; } ?> href="javascript:__doPostBack('viewhats',&#39;&#39;)">Hats</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl06_AttireCategorySelector" <?php if($currentcategory == 2) { echo 'class="AttireCategorySelector_Selected"'; } else { echo 'class="AttireCategorySelector"'; } ?> href="javascript:__doPostBack('viewtshirts',&#39;&#39;)">T-Shirts</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl08_AttireCategorySelector" <?php if($currentcategory == 11) { echo 'class="AttireCategorySelector_Selected"'; } else { echo 'class="AttireCategorySelector"'; } ?> href="javascript:__doPostBack('viewshirts',&#39;&#39;)">Shirts</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl10_AttireCategorySelector" <?php if($currentcategory == 12) { echo 'class="AttireCategorySelector_Selected"'; } else { echo 'class="AttireCategorySelector"'; } ?> href="javascript:__doPostBack('viewpants',&#39;&#39;)">Pants</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl12_AttireCategorySelector" <?php if($currentcategory == 19) { echo 'class="AttireCategorySelector_Selected"'; } else { echo 'class="AttireCategorySelector"'; } ?> href="javascript:__doPostBack('viewgear',&#39;&#39;)">Gear</a>
                                        
                                    <br />
                                    
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_BodyPartCategoryRepeater_ctl00_LinkButton1" class="AttireCategorySelector" href="javascript:__doPostBack('viewtorsos',&#39;&#39;)">Torsos</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_BodyPartCategoryRepeater_ctl02_LinkButton1" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$BodyPartCategoryRepeater$ctl02$LinkButton1&#39;,&#39;&#39;)">L Arms</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_BodyPartCategoryRepeater_ctl04_LinkButton1" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$BodyPartCategoryRepeater$ctl04$LinkButton1&#39;,&#39;&#39;)">R Arms</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_BodyPartCategoryRepeater_ctl06_LinkButton1" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$BodyPartCategoryRepeater$ctl06$LinkButton1&#39;,&#39;&#39;)">L Legs</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_BodyPartCategoryRepeater_ctl08_LinkButton1" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$BodyPartCategoryRepeater$ctl08$LinkButton1&#39;,&#39;&#39;)">R Legs</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_BodyPartCategoryRepeater_ctl10_LinkButton1" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$BodyPartCategoryRepeater$ctl10$LinkButton1&#39;,&#39;&#39;)">Packages</a>
                                        
                                    <br />
                                    <b class="create-or-shop"><a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_CatalogHyperLink" href="/catalog/">Shop</a>
                                        
                                     &nbsp;|&nbsp; <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_ContentBuilderHyperLink" href="/My/ContentBuilder.aspx?ContentType=2">Create</a>
                                    
                                    </b>
                                </div>
                                
                                        <div class="AttireContent">
                                            
                                        <div class="TileGroup">
                                            
                                        <?php

                                            global $db;

                                            $currentpage = 0;
                                            $limit = 8;

                                            if(isset($_COOKIE["page"])){
                                                $currentpage = (int)$_COOKIE["page"];
                                            }

                                            $ownedassets = $db->table("ownedassets")->where("userid", $userinfo->id)->get();
                                            
                                            $allassets = [];

                                            foreach ($ownedassets as $assetid){
                                                $assetinfo = $db->table("assets")->where("id", $assetid->assetid)->where("prodcategory", $currentcategory)->first();

                                                if($assetinfo !== null){
                                                    $allassets[] = $assetinfo;
                                                }
                                            }

                                            $allpages = ceil(count($allassets)/$limit);
                                            
                                            $is_split = false;

                                            $offset = $currentpage * $limit;

                                            $allassets = array_slice($allassets, $offset, $limit);

                                            if(count($allassets) > 4){
                                                $is_split = true;
                                                $allassets1 = array_slice($allassets, 0, 4);
                                                $allassets2 = array_slice($allassets, 4, 4);
                                            }
                                            
                                            if($is_split == false){
                                                foreach ($allassets as $assetinfo){
                                                    $iswearing = $db->table("wearingitems")->where("itemid", $assetinfo->id)->where("userid", $currentuser->id)->first();

                                                    if($assetinfo !== null){
                                                        if($iswearing == null){
                                                            $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Wear", "slugify"=>$slugify, "catalog"=>$catalog, "thumbs"=>$thumbs, "rbx"=>$rbx]);
                                                        } else {
                                                            $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Remove", "slugify"=>$slugify, "catalog"=>$catalog, "thumbs"=>$thumbs, "rbx"=>$rbx]);
                                                        }
                                                    }

                                                }
                                            } else {
                                                foreach ($allassets1 as $assetinfo){
                                                    $iswearing = $db->table("wearingitems")->where("itemid", $assetinfo->id)->where("userid", $currentuser->id)->first();

                                                    if($assetinfo !== null){
                                                        if($iswearing == null){
                                                            $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Wear", "slugify"=>$slugify, "catalog"=>$catalog, "thumbs"=>$thumbs, "rbx"=>$rbx]);
                                                        } else {
                                                            $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Remove", "slugify"=>$slugify, "catalog"=>$catalog, "thumbs"=>$thumbs, "rbx"=>$rbx]);
                                                        }
                                                    }

                                                }

                                                echo "</div><div class=\"TileGroup\">";

                                                foreach ($allassets2 as $assetinfo){
                                                    $iswearing = $db->table("wearingitems")->where("itemid", $assetinfo->id)->where("userid", $currentuser->id)->first();

                                                    if($assetinfo !== null){
                                                        if($iswearing == null){
                                                            $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Wear", "slugify"=>$slugify, "catalog"=>$catalog, "thumbs"=>$thumbs, "rbx"=>$rbx]);
                                                        } else {
                                                            $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Remove", "slugify"=>$slugify, "catalog"=>$catalog, "thumbs"=>$thumbs, "rbx"=>$rbx]);
                                                        }
                                                    }

                                                }
                                            }

                                        ?>
                                    
                                        </div>
                                    
                                        </div>
                                    
                                <div class="FooterPager">
                                    <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireDataPager_Footer"><a echo href="javascript:__doPostBack('page-0','')">First</a>&nbsp;<a <? if($currentpage == 0){ echo 'disabled="disabled"'; } else { echo 'href="javascript:__doPostBack(\'page-0\',\'\')"'; } ?>>Previous</a>&nbsp;<span></span>&nbsp;<a href="javascript:__doPostBack('page-+1','')">Next</a>&nbsp;<a <? if($currentpage == 0){ echo 'disabled="disabled"'; } else { echo 'href="javascript:__doPostBack(\'page-last\',\'\')"'; } ?>>Last</a>&nbsp;</span>
                                </div>
                            </div>
                            
</div>
                        </div>
                        </div>
                        
                            <div id="tab-outfits">
                                <div class="validation-summary-valid" data-valmsg-summary="true"><ul><li style="display:none"></li>
</ul></div><input name="__RequestVerificationToken" type="hidden" value="jmZGuE-LqIWXNuPAEGDdkJg9o55btdlBJ0-wGiaSdZaX-QJ07k7j5VnHT2VtuI4eeMKBc0gfJaaXe5_JiPjkpJkAz1wlLWrZaYAUv4_8gWVefsHU0" />
<div id="OutfitsTab" data-isiosapp="false" class="outfits-tab">


    <div class="outfits-banner">
        <div class="outfits-banner-left">
                <h2>Make some outfits!</h2>
                                    <div id="outfits-error" class="outfits-error status-error"></div>
        </div>
        <div class="outfits-banner-right">
            <div id="CreateNewOutfitContainer">
                <a id="CreateNewOutfit" class="text-link ">
                    <span class="btn-control btn-control-large">Create New Outfit</span>
                </a>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    //<sl:translate>
        if (typeof Roblox === "undefined") {
            Roblox = {};
        }
        if (typeof Roblox.Outfits === "undefined") {
            Roblox.Outfits = {};
        }
        Roblox.Outfits.Resources = {
            createTitle: "Create New Outfit",
            createText: "An outfit will be created from your character's current appearance.",
            createConfirm: "Create",
            createCancel: "Cancel",
            outfitNameTextBoxLabel: "Name: ",
            deleteTitle: "Delete Outfit",
            deleteText: "Are you sure you want to delete this outfit?",
	        deleteConfirm: "Delete",
            deleteCancel: "Cancel",
	        updateTitle: "Update Outfit",
	        updateText: "Do you want to update this outfit? This will overwrite the outfit with your character's current appearance.",
	        updateConfirm: "Update Outfit",
	        updateCancel: "Cancel",
	        renameTitle: "Rename Outfit",
	        renameText: "Choose a new name for your outfit.",
	        renameConfirm: "Rename",
            renameCancel: "Cancel"
            }
    //</sl:translate>
    </script>
    <div class="outfits-container">
    </div>
    <div class="outfits-pager">
    </div>
    <div id="ProcessingView" style="display:none">
	    <div class="ProcessingModalBody">
		    <p class="processing-indicator"><img src='/images/ec4e85b0c4396cf753a06fade0a8d8af.gif' alt="Processing..." /></p>
		    <p class="processing-text">Processing...</p>
	    </div>
    </div>


</div>
                            </div>
                        


                   </div>
                    <script type="text/javascript">
                        function switchTabs(nextTabElem) {
                            var currentTab = $('.tab-container div.tab.active');
                            currentTab.removeClass('active');
                            $('#' + currentTab.data('id')).hide();
                            nextTabElem.addClass('active');
                            $('#' + nextTabElem.data('id')).show();
                        }
                        $('div.tab').bind('click', function () {
                            switchTabs($(this));
                        });
                    </script>

                    <div class="divider-top" style="margin-top: 10px; padding-left: 20px;position: relative;left: -20px;"></div>
                    <h2 style="margin-top: 20px;">
                        <span>Currently Wearing</span>
                    </h2>
                    <div style="margin-top: 10px;">
                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_UpdatePanelAccoutrements">
	
                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsPane" class="CustomizeCharacterContainer">
                            
                                    
                                    <div class="TileGroup">

                                    <?php

                                        global $db;

                                        $ownedassets = $db->table("wearingitems")->where("userid", $userinfo->id)->get();

                                        foreach ($ownedassets as $assetid){
                                            $assetinfo = $db->table("assets")->where("id", $assetid->itemid)->first();

                                            if($assetinfo !== null){
                                                $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Remove", "slugify"=>$slugify, "catalog"=>$catalog, "thumbs"=>$thumbs, "rbx"=>$rbx]);
                                            }

                                        }

                                    ?>
                                        
                                    </div>
                                
                                
                            <div class="FooterPager">
                                <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AccoutrementsDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<span>1</span>&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AccoutrementsDataPager_Footer$ctl01$ctl01&#39;,&#39;&#39;)">2</a>&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AccoutrementsDataPager_Footer$ctl02$ctl00&#39;,&#39;&#39;)">Next</a>&nbsp;<a href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AccoutrementsDataPager_Footer$ctl02$ctl01&#39;,&#39;&#39;)">Last</a>&nbsp;</span>
                            </div>
                        </div>
                        
</div>
                    </div>
            </div>
    <br clear="all" />
    </div>

    
    

                    <div style="clear:both"></div>
                </div>
            </div>
        </div> 
        </div>
        
        <? $pagebuilder->build_footer(); ?>