<?php 
use watrlabs\watrkit\pagebuilder;
use watrlabs\authentication;
$auth = new authentication();
$pagebuilder = new pagebuilder();

$auth->requiresession();
global $currentuser;
$userinfo = $currentuser;

$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=main___7000c43d73500e63554d81258494fa21_m.css');
$pagebuilder->addresource('cssfiles', '/CSS/Base/CSS/FetchCSS?path=page___7a27dc130118fdc2c185a6a1a3db1c2f_m.css');
$pagebuilder->addresource('jsfiles', '/js/f49d858ef181e7cd401d8fcb4245e6e8.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/8220b4ecd0fe4da790391da3fd0b442c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/59e30cf6dc89b69db06bd17fbf8ca97c.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/f3251ed8271ce1271b831073a47b65e3.js.gzip');
$pagebuilder->addresource('jsfiles', '/js/11538f50c384b7e98cc9fdd96e55772d.js.gzip');
$pagebuilder->addresource('jsfiles', '/ScriptResource.axd');
$pagebuilder->addresource('jsfiles', '/js/MicrosoftAjaxWebForms.js');
$pagebuilder->addresource('jsfiles', '/js/MicrosoftAjaxTimer.js');
$pagebuilder->addresource('jsfiles', 'https://ajax.aspnetcdn.com/ajax/4.5.2/1/WebForms.js');
$pagebuilder->addresource('jsfiles', 'https://ajax.aspnetcdn.com/ajax/4.5.2/1/Focus.js');
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
     data-url="/thumbnail/user-avatar?userId=65367932&amp;thumbnailFormatId=124&amp;width=352&amp;height=352" style="width:352px; height:352px;">
    <span class="thumbnail-span" data-3d-url="/avatar-thumbnail-3d/json?userId=65367932"  data-js-files='/js/47e6e85800c4ed3c4eef848c077575a9.js.gzip' ><img alt='Aragorn35016' class='' src='/images/defaultimage.png' /></span>
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
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_HeadSelector" class="ColorChooserRegion" style="background-color:#FFCC99;height:44px;width:44px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 0px; top: 52px; cursor: pointer" onclick="RightArmOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_RightArmSelector" class="ColorChooserRegion" style="background-color:#FFCC99;height:88px;width:40px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 48px; top: 52px; cursor: pointer" onclick="TorsoOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_TorsoSelector" class="ColorChooserRegion" style="background-color:#FFCC99;height:88px;width:88px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 144px; top: 52px; cursor: pointer" onclick="LeftArmOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_LeftArmSelector" class="ColorChooserRegion" style="background-color:#FFCC99;height:88px;width:40px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 48px; top: 146px; cursor: pointer" onclick="RightLegOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_RightLegSelector" class="ColorChooserRegion" style="background-color:#FFCC99;height:88px;width:40px;">
			
                                        
		</div>
                                    </div>
                                    <div style="position: absolute; left: 96px; top: 146px; cursor: pointer" onclick="LeftLegOpen()">
                                        <div id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_LeftLegSelector" class="ColorChooserRegion" style="background-color:#FFCC99;height:88px;width:40px;">
			
                                        
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
                                    
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl00_AttireCategorySelector" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireCategoryRepeater$ctl00$AttireCategorySelector&#39;,&#39;&#39;)">Heads</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl02_AttireCategorySelector" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireCategoryRepeater$ctl02$AttireCategorySelector&#39;,&#39;&#39;)">Faces</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl04_AttireCategorySelector" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireCategoryRepeater$ctl04$AttireCategorySelector&#39;,&#39;&#39;)">Hats</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl06_AttireCategorySelector" class="AttireCategorySelector_Selected" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireCategoryRepeater$ctl06$AttireCategorySelector&#39;,&#39;&#39;)">T-Shirts</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl08_AttireCategorySelector" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireCategoryRepeater$ctl08$AttireCategorySelector&#39;,&#39;&#39;)">Shirts</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl10_AttireCategorySelector" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireCategoryRepeater$ctl10$AttireCategorySelector&#39;,&#39;&#39;)">Pants</a>
                                        
                                            &nbsp;|&nbsp;
                                        
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireCategoryRepeater_ctl12_AttireCategorySelector" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$AttireCategoryRepeater$ctl12$AttireCategorySelector&#39;,&#39;&#39;)">Gear</a>
                                        
                                    <br />
                                    
                                            <a id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_BodyPartCategoryRepeater_ctl00_LinkButton1" class="AttireCategorySelector" href="javascript:__doPostBack(&#39;ctl00$ctl00$cphRoblox$cphMyRobloxContent$BodyPartCategoryRepeater$ctl00$LinkButton1&#39;,&#39;&#39;)">Torsos</a>
                                        
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

                                            $ownedassets = $db->table("ownedassets")->where("userid", $userinfo->id)->get();

                                            foreach ($ownedassets as $assetid){
                                                $assetinfo = $db->table("assets")->where("id", $assetid->assetid)->where("prodcategory", 2)->first();

                                                if($assetinfo !== null){
                                                    $pagebuilder->build_component("avatar_item", ["assetid"=>$assetinfo->id, "action"=>"Wear"]);
                                                }

                                            }

                                        ?>
                                    
                                        </div>
                                    
                                        </div>
                                    
                                <div class="FooterPager">
                                    <span id="ctl00_ctl00_cphRoblox_cphMyRobloxContent_AttireDataPager_Footer"><a disabled="disabled">First</a>&nbsp;<a disabled="disabled">Previous</a>&nbsp;<span>1</span>&nbsp;<a disabled="disabled">Next</a>&nbsp;<a disabled="disabled">Last</a>&nbsp;</span>
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

                                        <?=$pagebuilder->build_component("avatar_item", ["assetid"=>5, "action"=>"Remove"]);?>
                                        
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
        
            <div id="Footer" class="footer-container">
    <div class="FooterNav">
        <a href="/info/Privacy.aspx">Privacy Policy</a>
        &nbsp;|&nbsp;
        <a href="https://corp.roblox.com/advertise-on-roblox" class="roblox-interstitial">Advertise with Us</a>
        &nbsp;|&nbsp;
        <a href="https://corp.roblox.com/press" class="roblox-interstitial">Press</a>
        &nbsp;|&nbsp;
        <a href="https://corp.roblox.com/contact-us" class="roblox-interstitial">Contact Us</a>
        &nbsp;|&nbsp;
            <a href="https://corp.roblox.com/about" class="roblox-interstitial">About Us</a>
&nbsp;|&nbsp;        <a href="https://blog.roblox.com">Blog</a>
        &nbsp;|&nbsp;
            <a href="https://corp.roblox.com/careers" class="roblox-interstitial">Jobs</a>
&nbsp;|&nbsp;        <a href="https://corp.roblox.com/parents" class="roblox-interstitial">Parents</a>
    </div>
    <div class="legal">
            <div class="left">
                <div id="a15b1695-1a5a-49a9-94f0-9cd25ae6c3b2">
    <a href="//privacy.truste.com/privacy-seal/Roblox-Corporation/validation?rid=2428aa2a-f278-4b6d-9095-98c4a2954215" title="TRUSTe Children privacy certification" target="_blank">
        <img style="border: none" src="/images/seal.png" width="133" height="45" alt="TRUSTe Children privacy certification"/>
    </a>
</div>
            </div>
            <div class="right">
                <p class="Legalese">
    ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a href="https://corp.roblox.com/" ref="footer-smallabout" class="roblox-interstitial">ROBLOX Corporation</a>, ©2015. Patents pending.
    ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
    Use of this site signifies your acceptance of the <a href="/info/terms-of-service" ref="footer-terms">Terms and Conditions</a>.
</p>
            </div>
        <div class="clear"></div>
    </div>

</div>
        
        </div></div>
    </div>
    

<div id="usernotifications-data-model"
     class="hidden"
     data-notificationsdomain="https://www.watrbx.xyz/"
     data-notificationstestinterval="5000"
     data-notificationsmaxconnectiontime="43200000">
</div>
        <script type="text/javascript">
            function urchinTracker() { };
            GoogleAnalyticsReplaceUrchinWithGAJS = true;
        </script>
    

    </form>
        <script type="text/javascript">
        var Roblox = Roblox || {};
        Roblox.ChatTemplates = {
            ChatBarTemplate: "chat-bar",
            AbuseReportTemplate: "chat-abuse-report",
            DialogTemplate: "chat-dialog",
            FriendsSelectionTemplate: "chat-friends-selection",
            GroupDialogTemplate: "chat-group-dialog",
            NewGroupTemplate: "chat-new-group",
            DialogMinimizeTemplate: "chat-dialog-minimize"
        };
        Roblox.Chat = {
            SoundFile: "/Chat/sound/chatsound.mp3"
        };
        Roblox.Party = {};
        Roblox.Party.SetGoogleAnalyticsCallback = function () {
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
        };

    </script>


<div id="chat-container" class="chat chat-container"
     ng-modules="robloxApp, chat"
     ng-controller="chatController"
     ng-class="{'collapsed': chatLibrary.chatLayout.collapsed}"
     ng-cloak>
    <!--chatLibrary.deviceType === deviceType.TABLET && ,
                'tablet-inapp': chatLibrary.tabletInApp-->
<div id="chat-data-model"
     class="hidden"
     chat-data
     chat-view-model="chatViewModel"
     chat-library="chatLibrary"
     data-userid="65367932"
     data-domain="watrbx.xyz"
     data-gamespagelink="/games"
     data-chatdomain="https://www.watrbx.xyz"
     data-numberofmembersforpartychrome="6"
     data-avatarheadshotsmultigetlimit="100"
     data-userpresencemultigetlimit="100"
     data-intervalofchangetitleforpartychrome="500"
     data-spinner="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif"
     data-notificationsdomain="https://www.watrbx.xyz/"
     data-devicetype="Computer"
     data-inapp=false
     data-smallerchatenabled=true
     data-cleanpartyfromconversationenabled=false>
</div>
    <div chat-bar></div>
    <script type="text/ng-template" id="chat-bar">
    <div id="chat-main" class="chat-main"
         ng-class="{'chat-main-empty': chatLibrary.chatLayout.chatLandingEnabled}" ng-cloak>
        <div id="chat-header"
             class="chat-windows-header chat-header">
            <div class="chat-header-label"
                 ng-click="toggleChatContainer()">
                <span class="rbx-font-bold chat-header-title">Chat & Party</span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-notification-red"
                      ng-show="chatLibrary.chatLayout.collapsed && chatViewModel.conversationCount > 0"
                      ng-cloak>{{chatViewModel.conversationCount}}</span>
                <span id="chat-group-create"
                      class="rbx-icon-chat-group-create"
                      ng-hide="chatLibrary.chatLayout.collapsed || chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.chatLandingEnabled || chatLibrary.chatLayout.pageDataLoading"
                      ng-click="launchDialog(newGroup.layoutId)"
                      data-toggle="tooltip"
                      title="Add at least 2 people to create chat group"
                      ng-cloak></span>
            </div>
        </div>
        <div id="chat-body"
             class="chat-body"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-if="!chatLibrary.chatLayout.chatLandingEnabled">
            <div class="chat-search"
                 ng-class="{'chat-search-focus': chatLibrary.chatLayout.searchFocus}">
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       ng-model="chatViewModel.searchTerm"
                       ng-focus="chatLibrary.chatLayout.searchFocus = true" />
                <span class="rbx-icon-chat-search"></span>
                <span class="rbx-icon-chat-cancel-search"
                      ng-click="cancelSearch()"></span>
            </div>
            <button id="chat-group-create-btn"
                    type="button"
                    class="btn rbx-btn-control-xs"
                    ng-click="launchDialog(newGroup.layoutId)"
                    title="Add at least 2 people to create chat group"
                    ng-cloak>
                <span>Create Chat Group</span>
            </button>
            <div id="chat-friend-list" class="rbx-scrollbar chat-friend-list" lazy-load>
                <ul id="chat-friends" class="chat-friends">
                    <li ng-repeat="chatUser in chatUserDict | orderList: chatLibrary.chatLayoutIds | filter : {name: chatViewModel.searchTerm}"
                        class="chat-friend">
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.CHAT && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb.Url}}"
                                     class="chat-avatar"
                                     thumbnail="chatLibrary.friendsDict[chatUser.displayUserId].AvatarThumb"
                                     image-retry
                                     ng-if="chatUser.isConversation">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[chatUser.displayUserId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name" ng-if="chatUser.isConversation">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.GROUPCHAT && chatUser.isConversation"
                             class="chat-friend-container chat-friend-groups">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 4"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>

                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PARTY && chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar chat-party-avatar">
                                <span class="rbx-icon-chat-party-avatar"></span>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="chatUser.dialogType === dialogType.PENDINGPARTY  && chatUser.isConversation"
                             class="chat-friend-container chat-pending-party">
                            <div class="chat-friend-avatar">
                                <ul class="chat-avatar-groups">
                                    <li ng-repeat="userId in chatUser.userIds | limitTo : 3"
                                        class="chat-avatar">
                                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                             image-retry>
                                    </li>
                                    <li class="chat-avatar-party-icon">
                                        <span class="rbx-icon-chat-party-avatar"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-sm chat-friend-message party-pending-msg"
                                      ng-if="chatUser.incomingPartyInvite">{{chatUser.pendingPartyMsg}}</span>
                                <span class="rbx-font-sm chat-friend-message"
                                      ng-class="{'rbx-font-bold': chatUser.HasUnreadMessages}"
                                      ng-bind-html="chatUser.DisplayMessage.Content"
                                      ng-if="chatUser.DisplayMessage && !chatUser.incomingPartyInvite"></span>
                            </div>
                        </div>
                        <div ng-click="launchDialog(chatUser.layoutId)"
                             ng-if="!chatUser.isConversation"
                             class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatUser.AvatarThumb.Url}}" class="chat-avatar"
                                     thumbnail="chatUser.AvatarThumb"
                                     image-retry>
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatUser.UserPresenceType]['className']"></div>

                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatUser.name}}</span>
                                <span class="rbx-font-xs chat-friend-message">{{userPresenceTypes[chatUser.UserPresenceType].title}}</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="chat-loading loading-bottom"
                     ng-show="chatLibrary.chatLayout.isChatLoading">
                    <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
                </div>
            </div>
        </div>
        <div id="chat-disconnect"
             class="chat-disconnect"
             ng-show="chatLibrary.chatLayout.errorMaskEnable || chatLibrary.chatLayout.pageDataLoading"
             ng-cloak>
            <p ng-show="chatLibrary.chatLayout.errorMaskEnable">Trying to connect ...</p>
            <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
        </div>
        <div id="chat-empty-list"
             class="chat-disconnect"
             ng-hide="chatLibrary.chatLayout.errorMaskEnable"
             ng-if="chatLibrary.chatLayout.chatLandingEnabled">
            <span class="rbx-icon-chat-friends"></span>
            <p class="rbx-lead">Make friends to start chatting and partying!</p>
        </div>
    </div>
</script>
    <div id="dialogs"
         class="dialogs"
         ng-controller="dialogsController">
        <div dialog
             id="{{chatLayoutId}}"
             dialog-data="chatUserDict[chatLayoutId]"
             chat-library="chatLibrary"
             close-dialog="closeDialog(chatLayoutId)"
             send-invite="sendInvite(chatLayoutId)"
             ng-repeat="chatLayoutId in chatLibrary.layoutIdList"></div>
        <script type="text/ng-template" id="chat-abuse-report">
    <div class="dialog-report-container"
         ng-show="dialogLayout.isConfirmationOn">
        <div class="dialog-report-content">
            <h4>Continue to report?</h4>
            <button id="chat-abuse-report-btn"
                    class="rbx-btn-primary-xs"
                    ng-click="abuseReport(null, true)">
                Report
            </button>

            <button class="rbx-btn-control-xs"
                    ng-click="dialogLayout.isConfirmationOn = false">
                Cancel
            </button>
        </div>
    </div>
</script>

        <script type="text/ng-template" id="chat-friends-selection">
    <div class="chat-friends-container">
        <div class="chat-search"
             ng-class="{'group-select-container' : dialogData.selectedUserIds.length > 0}"
             group-select>
            <div class="group-select">
                <ul class="group-select-friends">
                    <li class="rbx-font-sm group-select-friend"
                        ng-repeat="userId in dialogData.selectedUserIds">
                        {{dialogData.selectedUsersDict[userId].Username}}
                        <span class="rbx-icon-chat-cancel-search group-select-cancel" ng-click="selectFriends(userId)"></span>
                    </li>
                </ul>
                <input type="text"
                       placeholder="Search"
                       class="chat-search-input"
                       focus-me="chatLibrary.inApp ? false: true"
                       ng-model="dialogData.searchTerm" />
            </div>
            <button id="friends-selection-btn"
                    class="rbx-btn-secondary-xs friends-invite-btn"
                    ng-disabled="dialogLayout.inviteBtnDisabled"
                    ng-click="sendInvite()">
                Invite
            </button>
        </div>

        <div id="scrollbar_friend_{{dialogData.dialogType}}_{{dialogData.layoutId}}" class="rbx-scrollbar chat-friend-list"
             friends-lazy-load>
            <ul class="chat-friends">
                <li ng-repeat="friend in chatLibrary.friendsDict | orderList: dialogData.friendIds  | filter: {Username: dialogData.searchTerm}"
                    class="chat-friend">
                    <div class="chat-friend-container chat-friend-select"
                         ng-click="selectFriends(friend.Id)">
                        <div class="chat-friend-avatar">
                            <img ng-src="{{friend.AvatarThumb.Url}}"
                                 thumbnail="friend.AvatarThumb"
                                 image-retry
                                 class="chat-avatar">
                            <div class="chat-friend-status" ng-class="userPresenceTypes[friend.UserPresenceType]['className']"></div>
                        </div>
                        <div class="chat-friend-info">
                            <span class="chat-friend-name">{{friend.Username}}</span>
                            <span class="rbx-font-sm chat-friend-message">{{userPresenceTypes[friend.UserPresenceType].title}}</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog">
    <div id="dialog-container" class="dialog-container"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController"
         ng-focus="focusDialog()">
        <div class="dialog-main">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span id="chat-title"
                          class="rbx-font-bold chat-header-title dialog-header-title" 
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType != dialogType.PARTY">
                        <a class="rbx-font-bold"
                           ng-click="linkToProfile($event)"
                           ng-href="{{dialogData.nameLink}}">{{dialogData.name}}</a>
                    </span>
                    <span id="party-title"
                          class="rbx-font-bold chat-header-title dialog-header-title"
                          ng-click="toggleDialogContainer()" 
                          ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.name}}
                    </span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li>
                                <a id="abuse-report"
                                   ng-click="abuseReport(dialogData.userIds[0], false)">Report Abuse</a>
                            </li>
                            <li>
                                <a id="leave-group"
                                   ng-click="leaveGroup()"
                                   ng-if="dialogData.dialogType === dialogType.PARTY">Leave Party</a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER)  || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>

            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && !dialogData.partyInGame">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <div class="rbx-font-sm dialog-message dialog-triangle dialog-message-content"
                             ng-bind-html="message.Content" 
                             ng-hide="message.isSystemMessage"></div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea id="dialog-input"
                          msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>

            <div abuse-report></div>
        </div>
    </div>
</script>
        <script type="text/ng-template" id="chat-group-dialog">
    <div class="dialog-container group-dialog"
         ng-class="{'group-has-banner': dialogData.isPartyExisted || dialogData.partyInGame,
                    'dialog-party': dialogData.dialogType == dialogType.PARTY,
                    'collapsed': dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER,
                    'active': dialogLayout.active && !dialogLayout.hasFocus}"
         ng-controller="dialogController">
        <div class="dialog-main" 
             ng-hide="dialogLayout.isConfirmationOn || dialogLayout.lookUpMembers || dialogData.addMoreFriends">
            <div class="chat-windows-header dialog-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-party-label"
                          ng-show="dialogData.dialogType == dialogType.PARTY"
                          title="Party"
                          ng-cloak></span>
                    <span class="rbx-icon-chat-group-label"
                          ng-show="dialogData.dialogType != dialogType.PARTY"
                          title="Group Chat"
                          ng-cloak></span>
                    <span id="party-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.partyName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType == dialogType.PARTY">{{dialogData.partyName}}</span>
                    <span id="group-chat-title"
                          class="rbx-font-bold dialog-header-title"
                          title="{{dialogData.groupName}}"
                          ng-click="toggleDialogContainer()" ng-if="dialogData.dialogType != dialogType.PARTY">{{dialogData.groupName}}</span>
                </div>
                <div class="chat-header-action"
                     chat-setting>
                    <span class="rbx-icon-chat-close"
                          ng-click="closeDialog(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Close"></span>
                    <span class="rbx-icon-chat-setting"
                          data-toggle="popover"
                          data-bind="group-settings-{{dialogData.Id}}"
                          ng-hide="(dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                    <div class="rbx-popover-content" data-toggle="group-settings-{{dialogData.Id}}">
                        <ul class="rbx-dropdown-menu" role="menu">
                            <li><a id="add-friends" ng-click="addFriends()">Add Friends</a></li>
                            <li><a id="view-participants" ng-click="viewParticipants()">View Participants</a></li>
                            <li>
                                <a id="leave-group" ng-click="leaveGroup()" ng-bind="dialogData.dialogType === dialogType.PARTY ? 'Leave Party' : 'Leave Group'"></a>
                            </li>
                        </ul>
                    </div>
                    <span id="create-party"
                          class="rbx-icon-chat-party-label"
                          ng-click="sendInvite(dialogData.layoutId)"
                          data-toggle="tooltip"
                          title="Play Together"
                          ng-hide="dialogData.party || (dialogLayout.collapsed && chatLibrary.deviceType === deviceType.COMPUTER) || chatLibrary.chatLayout.errorMaskEnable"></span>
                </div>
            </div>
            <div id="dialog-member-header"
                 class="dialog-member-header"
                 ng-show="dialogData.isPartyExisted && (!dialogData.partyInGame || dialogData.dialogType === dialogType.PENDINGPARTY)">
                <ul class="group-members">
                    <li class="group-member"
                        title="{{chatLibrary.friendsDict[userId].Username}}{{dialogData.membersDict[userId].statusTooltip}}"
                        ng-repeat="userId in dialogData.userIds | limitTo: dialogLayout.limitMemberDisplay">
                        <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[userId].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-leader': dialogData.membersDict[userId].memberStatus === memberStatus.LEADER,
                                        'group-pending':dialogData.membersDict[userId].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length === (dialogLayout.limitMemberDisplay + 1)"
                        title="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}{{dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].statusTooltip}}"
                        class="group-member">
                        <img ng-src="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb.Url}}"
                             thumbnail="chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].AvatarThumb"
                             image-retry
                             alt="{{chatLibrary.friendsDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].Username}}"
                             class="group-member-avatar"
                             ng-class="{'group-pending': dialogData.membersDict[dialogData.userIds[dialogLayout.limitMemberDisplay]].memberStatus === memberStatus.PENDING}">
                    </li>
                    <li ng-show="dialogData.userIds.length > (dialogLayout.limitMemberDisplay + 1)"
                        ng-click="dialogLayout.lookUpMembers = !dialogLayout.lookUpMembers"
                        class="group-member group-member-plus"
                        ng-cloak>+{{dialogData.userIds.length - dialogLayout.limitMemberDisplay}}</li>
                </ul>
                <a id="find-game"
                   class="rbx-btn-primary-xs"
                   ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.party.LeaderUser.Id === chatLibrary.userId && !chatLibrary.inApp"
                   ng-href="{{chatLibrary.gamesPageLink}}">Find Game</a>
                <a id="join-party"
                   class="rbx-btn-control-xs"
                   ng-hide="dialogData.dialogType === dialogType.PARTY || !dialogData.party"
                   ng-click="joinParty()">
                    Join Party
                </a>
            </div>

            <div id="party-ingame-header"
                 class="party-ingame-header"
                 ng-show="dialogData.dialogType === dialogType.PARTY && dialogData.isPartyExisted && dialogData.partyInGame">
                <img ng-src="{{dialogData.placeThumbnail.Url}}"
                     thumbnail="dialogData.placeThumbnail" image-retry
                     class="party-ingame-thumbnail">
                <div class="party-ingame-label"
                     ng-class="{'party-ingame-member': chatLibrary.userId !== dialogData.party.LeaderUser.Id}">
                    <span class="rbx-font-sm">Playing</span>
                    <span class="rbx-font-sm rbx-font-bold party-ingame-name">{{dialogData.party.GameName}}</span>
                </div>
                <a id="join-game"
                   class="rbx-btn-control-xs"
                   ng-hide="chatLibrary.userId === dialogData.party.LeaderUser.Id"
                   ng-click="joinGame()">
                    Join Game
                </a>
            </div>
            <div id="scrollbar_{{dialogData.dialogType}}_{{dialogData.layoutId}}"
                 class="rbx-scrollbar dialog-body"
                 dialog-lazy-load>
                <ul class="dialog-messages">
                    <li class="dialog-message-container"
                        ng-repeat="message in dialogData.ChatMessages | reverse"
                        ng-class="{'message-inbound': message.SenderUserId != chatLibrary.userId && !message.isSystemMessage,
                                    'system-message': message.isSystemMessage}">
                        <a ng-href="{{chatLibrary.friendsDict[message.SenderUserId].UserProfileLink}}"
                           ng-hide="message.isSystemMessage">
                            <img ng-if="message.SenderUserId != chatLibrary.userId"
                                 ng-src="{{chatLibrary.friendsDict[message.SenderUserId].AvatarThumb.Url}}"
                                 thumbnail="chatLibrary.friendsDict[message.SenderUserId].AvatarThumb"
                                 image-retry
                                 class="dialog-message-avatar">
                        </a>
                        <div class="dialog-message dialog-triangle" 
                             ng-hide="message.isSystemMessage">
                            <span ng-if="chatLibrary.friendsDict[message.SenderUserId] && message.SenderUserId != chatLibrary.userId"
                                  class="rbx-font-xs dialog-message-author">{{chatLibrary.friendsDict[message.SenderUserId].Username}}</span>
                            <span class="rbx-font-sm dialog-message-content" ng-bind-html="message.Content"></span>
                        </div>
                        <div class="rbx-font-xs dialog-sending" ng-show="message.sendingMessage">Sending...</div>
                        <div class="rbx-font-xs rbx-text-danger dialog-sending" ng-show="message.sendMessageHasError"
                             ng-bind="message.error || 'Error'"></div>
                        <span class="system-message-content"
                              ng-show="message.isSystemMessage"
                              ng-bind-html="message.Content"></span>
                    </li>
                </ul>
            </div>
            <div class="chat-loading loading-top"
                 ng-show="dialogLayout.isChatLoading">
                <img ng-src="{{chatLibrary.spinner}}" alt="loading ...">
            </div>
            <div class="dialog-input-container">
                <textarea msd-elastic
                          focus-me="{{dialogLayout.focusMeEnabled}}"
                          ng-focus="toggleDialogFocusStatus(true)"
                          ng-blur="toggleDialogFocusStatus(false)"
                          placeholder="Send a message ..."
                          ng-model="dialogData.messageForSend"
                          key-press-enter="sendMessage()"
                          class="dialog-input"
                          maxlength="{{dialogLayout.limitCharacterCount}}"
                          ng-disabled="chatLibrary.chatLayout.errorMaskEnable"></textarea>
            </div>
        </div>
        <div class="group-members-container"
             ng-show="dialogLayout.lookUpMembers">
            <div class="chat-windows-header">
                <span class="rbx-icon-chat-arrow-left"
                      ng-click="viewParticipants()"></span>
                <span class="rbx-font-bold">Participants</span>
            </div>
            <div id="group-members" class="rbx-scrollbar chat-friend-list"
                <ul class="chat-friends">
                    <li ng-repeat="userId in dialogData.userIds"
                        class="chat-friend">
                        <div class="chat-friend-container">
                            <div class="chat-friend-avatar">
                                <img ng-src="{{chatLibrary.friendsDict[userId].AvatarThumb.Url}}"
                                     thumbnail="chatLibrary.friendsDict[userId].AvatarThumb"
                                     image-retry
                                     class="chat-avatar">
                                <div class="chat-friend-status" ng-class="userPresenceTypes[chatLibrary.friendsDict[userId].UserPresenceType]['className']"></div>
                            </div>
                            <div class="chat-friend-info">
                                <span class="rbx-text-overflow chat-friend-name">{{chatLibrary.friendsDict[userId].Username}}</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.LEADER">Leader</span>
                                <span class="rbx-font-sm rbx-text-notes" ng-show="dialogData.party && dialogData.membersDict[userId].memberStatus == memberStatus.MEMBER">In party</span>
                            </div>
                            <div class="group-member-action">
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.party.LeaderUser.Id && dialogData.dialogType == dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span ng-if="chatLibrary.userId != userId && chatLibrary.userId === dialogData.InitiatorUser.Id && dialogData.dialogType != dialogType.PARTY"
                                      class="rbx-icon-chat-remove"
                                      ng-click="removeMember(userId)"></span>
                                <span class="rbx-icon-chat-report-person"
                                      ng-if="chatLibrary.userId != userId"
                                      ng-click="abuseReport(userId, false)"></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div abuse-report></div>
        <div class="group-friends-container"
             ng-show="dialogData.addMoreFriends">
            <div class="chat-windows-header">
                <div class="chat-header-label">
                    <span class="rbx-icon-chat-arrow-left"
                          ng-click="dialogData.addMoreFriends = false"></span>
                    <span class="rbx-font-bold">Add Friends</span>
                    <span class="rbx-font-bold"
                          ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                        ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                    </span>
                </div>
            </div>
            <div friends-selection></div>
        </div>
    </div>
</script>

        <div dialog
             id="{{newGroup.layoutId}}"
             dialog-data="newGroup"
             chat-library="chatLibrary"
             close-dialog="closeDialog('newGroup')"
             send-invite="sendInvite(newGroup.layoutId)"
             ng-if="newGroup"></div>
        <script type="text/ng-template" id="chat-new-group">
    <div class="dialog-container group-create-container"
         ng-controller="friendsController">
        <div class="chat-windows-header">
            <div class="chat-header-title">
                <span class="rbx-font-bold">{{dialogLayout.title}}</span>
                <span class="rbx-font-bold"
                      ng-class="{'group-overload': dialogLayout.isMembersOverloaded}">
                    ({{(dialogData.numberOfSelected)}}/{{chatLibrary.quotaOfPartyMembers}})
                </span>
            </div>
            <div class="chat-header-action">
                <span class="rbx-icon-chat-close"
                      ng-click="closeDialog(dialogData.layoutId)"
                      data-toggle="tooltip"
                      title="Close"></span>
            </div>
        </div>
        <div friends-selection></div>
    </div>
</script>
        <script type="text/ng-template" id="chat-dialog-minimize">
    <div id="dialogs-minimize-container"
         class="dialogs-minimize-container"
         ng-show="hasMinimizedDialogs"
         data-toggle="popover"
         data-bind="dialogs">
        <span class="rbx-icon-chat-minimize"></span>
        <span class="minimize-count">{{chatLibrary.minimizedDialogIdList.length}}</span>
        <div class="rbx-popover-content" data-toggle="dialogs">
            <ul class="rbx-dropdown-menu minimize-list" role="menu">
                <li ng-repeat="dialogLayoutId in chatLibrary.minimizedDialogIdList"
                    class="minimize-item"
                    id="{{dialogLayoutId}}"
                    minimize-item>
                    <a class="rbx-text-overflow minimize-title">
                        <span>
                            {{chatLibrary.minimizedDialogData[dialogLayoutId].name}}
                        </span>
                    </a>
                    <span class="rbx-icon-chat-cancel-search minimize-close"></span>
                </li>
            </ul>
        </div>
    </div>
</script>


        <div id="dialogs-minimize"
             class="dialogs-minimize"
             dialog-minimize
             chat-library="chatLibrary">
        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            // Because of placeLauncher.js, has to add this stupid global "play_placeId"
            $(document).on('Roblox.Chat.PartyInGame', function (event, args) {
                play_placeId = args.placeId;
            });
        });
    </script>

</div>
    
    

    <div id="InstallationInstructions" style="display:none;">
        <div class="ph-installinstructions">
            <div class="ph-modal-header">
                <span class="rbx-icon-close simplemodal-close"></span>
                <h3>Thanks for playing ROBLOX</h3>
            </div>
            <div class="ph-installinstructions-body">
                    <div class="ph-install-step ph-installinstructions-step1-of4">
                        <h1>1</h1>
                        <p class="larger-font-size">Click RobloxPlayerLauncher.exe to run the ROBLOX installer, which just downloaded via your web browser.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/8b0052e4ff81d8e14f19faff2a22fcf7.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step2-of4">
                        <h1>2</h1>
                        <p class="larger-font-size">Click <strong>Run</strong> when prompted by your computer to begin the installation process.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/4a3f96d30df0f7879abde4ed837446c6.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step3-of4">
                        <h1>3</h1>
                        <p class="larger-font-size">Click <strong>Ok</strong> once you've successfully installed ROBLOX.</p>
                        <img width="230" height="180" src="https://images.rbxcdn.com/6e23e4971ee146e719fb1abcb1d67d59.png" />
                    </div>
                    <div class="ph-install-step ph-installinstructions-step4-of4">
                        <h1>4</h1>
                        <p class="larger-font-size">After installation, click <strong>Play</strong> below to join the action!</p>
                        <div class="VisitButton VisitButtonContinuePH">
                            <a class="btn rbx-btn-primary-lg disabled">Play</a>
                        </div>
                    </div>
            </div>
            <div class="rbx-font-sm rbx-text-notes">
                The ROBLOX installer should download shortly. If it doesn’t, <a href="#" onclick="Roblox.ProtocolHandlerClientInterface.startDownload(); return false;">start the download now.</a>
            </div>
        </div>
    </div>
    <div class="InstallInstructionsImage" data-modalwidth="970" style="display:none;"></div>



<div id="pluginObjDiv" style="height:1px;width:1px;visibility:hidden;position: absolute;top: 0;"></div>
<iframe id="downloadInstallerIFrame" style="visibility:hidden;height:0;width:1px;position:absolute"></iframe>

<script type='text/javascript' src='/js/6b9fed5e91a508780b95c302464d62ef.js.gzip'></script>

<script type="text/javascript">
    Roblox.Client._skip = null;
    Roblox.Client._CLSID = '76D50904-6780-4c8b-8986-1A7EE0B1716D';
    Roblox.Client._installHost = 'setup.roblox.com';
    Roblox.Client.ImplementsProxy = true;
    Roblox.Client._silentModeEnabled = true;
    Roblox.Client._bringAppToFrontEnabled = false;
    Roblox.Client._currentPluginVersion = '';
    Roblox.Client._eventStreamLoggingEnabled = true;

        
        Roblox.Client._installSuccess = function() {
            if(GoogleAnalyticsEvents){
                GoogleAnalyticsEvents.ViewVirtual('InstallSuccess');
                GoogleAnalyticsEvents.FireEvent(['Plugin','Install Success']);
                if (Roblox.Client._eventStreamLoggingEnabled && typeof Roblox.GamePlayEvents != "undefined") {
                    Roblox.GamePlayEvents.SendInstallSuccess(Roblox.Client._launchMode, play_placeId);
                }
            }
        }
        
            
        if ((window.chrome || window.safari) && window.location.hash == '#chromeInstall') {
            window.location.hash = '';
            var continuation = '(' + $.cookie('chromeInstall') + ')';
            play_placeId = $.cookie('chromeInstallPlaceId');
            Roblox.GamePlayEvents.lastContext = $.cookie('chromeInstallLaunchMode');
            $.cookie('chromeInstallPlaceId', null);
            $.cookie('chromeInstallLaunchMode', null);
            $.cookie('chromeInstall', null);
            RobloxLaunch._GoogleAnalyticsCallback = function() { var isInsideRobloxIDE = 'website'; if (Roblox && Roblox.Client && Roblox.Client.isIDE && Roblox.Client.isIDE()) { isInsideRobloxIDE = 'Studio'; };GoogleAnalyticsEvents.FireEvent(['Plugin Location', 'Launch Attempt', isInsideRobloxIDE]);GoogleAnalyticsEvents.FireEvent(['Plugin', 'Launch Attempt', 'Play']);EventTracker.fireEvent('GameLaunchAttempt_Win32', 'GameLaunchAttempt_Win32_Plugin'); if (typeof Roblox.GamePlayEvents != 'undefined') { Roblox.GamePlayEvents.SendClientStartAttempt(null, play_placeId); }  }; 
            Roblox.Client.ResumeTimer(eval(continuation));
        }
        
</script>


<div id="PlaceLauncherStatusPanel" style="display:none;width:300px"
     data-new-plugin-events-enabled="True"
     data-event-stream-for-plugin-enabled="True"
     data-event-stream-for-protocol-enabled="True"
     data-is-protocol-handler-launch-enabled="True"
     data-is-user-logged-in="True"
     data-os-name="Windows"
     data-protocol-name-for-client="roblox-player"
     data-protocol-name-for-studio="roblox-studio"
     data-protocol-url-includes-launchtime="true"
     data-protocol-detection-enabled="true">
    <div class="modalPopup blueAndWhite PlaceLauncherModal" style="min-height: 160px">
        <div id="Spinner" class="Spinner" style="padding:20px 0;">
            <img src="https://images.rbxcdn.com/e998fb4c03e8c2e30792f2f3436e9416.gif" height="32" width="32" alt="Progress" />
        </div>
        <div id="status" style="min-height:40px;text-align:center;margin:5px 20px">
            <div id="Starting" class="PlaceLauncherStatus MadStatusStarting" style="display:block">
                Starting Roblox...
            </div>
            <div id="Waiting" class="PlaceLauncherStatus MadStatusField">Connecting to Players...</div>
            <div id="StatusBackBuffer" class="PlaceLauncherStatus PlaceLauncherStatusBackBuffer MadStatusBackBuffer"></div>
        </div>
        <div style="text-align:center;margin-top:1em">
            <input type="button" class="Button CancelPlaceLauncherButton translate" value="Cancel" />
        </div>
    </div>
</div>
<div id="ProtocolHandlerStartingDialog" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">

        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                ROBLOX is now loading. Get ready to play!
            </p>
            <div class="ph-startingdialog-spinner-row">
                <img src="https://images.rbxcdn.com/4bed93c91f909002b1f17f05c0ce13d1.gif" width="82" height="24" />
            </div>
        </div>
    </div>
</div>
<div id="ProtocolHandlerAreYouInstalled" style="display:none;">
    <div class="modalPopup ph-modal-popup">
        <div class="ph-modal-header">
            <span class="rbx-icon-close simplemodal-close"></span>
        </div>
        <div class="ph-logo-row">
            <img src="/images/Logo/logo_R.svg" width="90" height="90" alt="R" />
        </div>
        <div class="ph-areyouinstalleddialog-content">
            <p class="larger-font-size">
                You're moments away from getting into the game!
            </p>
            <div>
                <button type="button" class="btn rbx-btn-primary-sm" id="ProtocolHandlerInstallButton">
                    Download and Install ROBLOX
                </button>
            </div>
            <div class="rbx-small rbx-text-notes">
                <a href="https://en.help.roblox.com/hc/en-us/articles/204473560" class="rbx-link" target="_blank">Click here for help</a>
            </div>

        </div>
    </div>
</div>
<div id="ProtocolHandlerClickAlwaysAllowed" class="ph-clickalwaysallowed" style="display:none;">
    <p class="larger-font-size">
        <span class="rbx-icon-moreinfo"></span>
        Check <b>Remember my choice</b> and click <img src="https://images.rbxcdn.com/7c8d7a39b4335931221857cca2b5430b.png" alt="Launch Application" />  in the dialog box above to join games faster in the future!
    </p>
</div>


    <div id="videoPrerollPanel" style="display:none">
        <div id="videoPrerollTitleDiv">
            Gameplay sponsored by:
        </div>
        <div id="content">
            <video id="contentElement" style="width:0; height:0;" />
        </div>
        <div id="videoPrerollMainDiv"></div>
        <div id="videoPrerollCompanionAd">
            
                <script type="text/javascript">
                    googletag.cmd.push(function () {
                        googletag.defineSlot('/1015347/VideoPreroll', [300, 250], 'videoPrerollCompanionAd')
                            .addService(googletag.companionAds());
                        googletag.enableServices();
                        googletag.display('videoPrerollCompanionAd');
                    });
                </script>
        </div>
        <div id="videoPrerollLoadingDiv">
            Loading <span id="videoPrerollLoadingPercent">0%</span> - <span id="videoPrerollMadStatus" class="MadStatusField">Starting game...</span><span id="videoPrerollMadStatusBackBuffer" class="MadStatusBackBuffer"></span>
            <div id="videoPrerollLoadingBar">
                <div id="videoPrerollLoadingBarCompleted">
                </div>
            </div>
        </div>
        <div id="videoPrerollJoinBC">
            <span>Get more with Builders Club!</span>
            <a href="https://www.roblox.com/premium/membership?ctx=preroll" target="_blank" class="btn-medium btn-primary" id="videoPrerollJoinBCButton">Join Builders Club</a>
        </div>
    </div>   
        <script type="text/javascript" src="//imasdk.googleapis.com/js/sdkloader/ima3.js"></script>
    <script type="text/javascript">
        $(function () {
            var videoPreRollDFP = Roblox.VideoPreRollDFP;
            if (videoPreRollDFP) {
                var customTargeting = Roblox.VideoPreRollDFP.customTargeting;
                videoPreRollDFP.showVideoPreRoll = false;
                videoPreRollDFP.loadingBarMaxTime = 33000;
                videoPreRollDFP.videoLoadingTimeout = 11000;
                videoPreRollDFP.videoPlayingTimeout = 41000;
                videoPreRollDFP.videoLogNote = "";
                videoPreRollDFP.logsEnabled = true;
                videoPreRollDFP.excludedPlaceIds = "32373412";
                videoPreRollDFP.adUnit = "/1015347/VideoPreroll";
                videoPreRollDFP.adTime = 15;
                videoPreRollDFP.isSwfPreloaderEnabled = true;
                videoPreRollDFP.isPrerollShownEveryXMinutesEnabled = true;
                customTargeting.userAge = "36";
                customTargeting.userGender = "Male";
                customTargeting.gameGenres = "";
                customTargeting.environment = "Production";
                customTargeting.adTime = "15";
                customTargeting.PLVU = false;
                $(videoPreRollDFP.checkEligibility);
            }
        });
    </script>                                                     


<div id="GuestModePrompt_BoyGirl" class="Revised GuestModePromptModal" style="display:none;">
    <div class="simplemodal-close">
        <a class="ImageButton closeBtnCircle_20h" style="cursor: pointer; margin-left:455px;top:7px; position:absolute;"></a>
    </div>
    <div class="Title">
        Choose Your Character
    </div>
    <div style="min-height: 275px; background-color: white;">
        <div style="clear:both; height:25px;"></div>

        <div style="text-align: center;">
            <div class="VisitButtonsGuestCharacter VisitButtonBoyGuest" style="float:left; margin-left:45px;"></div>
            <div class="VisitButtonsGuestCharacter VisitButtonGirlGuest" style="float:right; margin-right:45px;"></div>
        </div>
        <div style="clear:both; height:25px;"></div>
        <div class="RevisedFooter">
            <div style="width:200px;margin:10px auto 0 auto;">
                <a href="/?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fmy%2Fcharacter.aspx"><div class="RevisedCharacterSelectSignup"></div></a>
                <a class="HaveAccount" href="https://www.roblox.com/newlogin?returnUrl=http%3A%2F%2Fwww.roblox.com%2Fmy%2Fcharacter.aspx">I have an account</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function checkRobloxInstall() {
             return RobloxLaunch.CheckRobloxInstall('/install/download.aspx');
    }

</script>

<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        //<sl:translate>
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
        //</sl:translate>
    };
</script>  

<div class="ConfirmationModal modalPopup unifiedModal smallModal" data-modal-handle="confirmation" style="display:none;">
    <a class="genericmodal-close ImageButton closeBtnCircle_20h"></a>
    <div class="Title"></div>
    <div class="GenericModalBody">
        <div class="TopBody">
            <div class="ImageContainer roblox-item-image"  data-image-size="small" data-no-overlays data-no-click>
                <img class="GenericModalImage" alt="generic image" />
            </div>
            <div class="Message"></div>
        </div>
        <div class="ConfirmationModalButtonContainer">
            <a href id="roblox-confirm-btn"><span></span></a>
            <a href id="roblox-decline-btn"><span></span></a>
        </div>
        <div class="ConfirmationModalFooter">
        
        </div>  
    </div>   
    <script type="text/javascript">
        Roblox = Roblox || {};
        Roblox.Resources = Roblox.Resources || {};

        //<sl:translate>
        Roblox.Resources.GenericConfirmation = {
            yes: "Yes",
            No: "No",
            Confirm: "Confirm",
            Cancel: "Cancel"
        };
        //</sl:translate>
    </script>
</div>


    
        <script>
            $(function () {
                Roblox.DeveloperConsoleWarning.showWarning();
            });
        </script>
    

    <script type="text/javascript">
        $(function () {
            Roblox.CookieUpgrader.domain = 'roblox.com';
            Roblox.CookieUpgrader.upgrade("GuestData", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
            Roblox.CookieUpgrader.upgrade("RBXSource", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("rbx_acquisition_time", cookie); } });
            Roblox.CookieUpgrader.upgrade("RBXViralAcquisition", { expires: function (cookie) { return Roblox.CookieUpgrader.getExpirationFromCookieValue("time", cookie); } });
                
                Roblox.CookieUpgrader.upgrade("RBXMarketing", { expires: Roblox.CookieUpgrader.thirtyYearsFromNow });
                
                            
                Roblox.CookieUpgrader.upgrade("RBXSessionTracker", { expires: Roblox.CookieUpgrader.fourHoursFromNow });
                
                    });
    </script>
    <script>
        var _comscore = _comscore || [];
        _comscore.push({ c1: "2", c2: "6035605", c3: "", c4: "", c15: "Over13" });

        (function() {
            var s = document.createElement("script"), el = document.getElementsByTagName("script")[0];
            s.async = true;
            s.src = (document.location.protocol == "https:" ? "https://sb" : "https://b") + ".scorecardresearch.com/beacon.js";
            el.parentNode.insertBefore(s, el);
        })();
    </script>
    <noscript>
        <img src="https://b.scorecardresearch.com/p?c1=2&c2=&c3=&c4=&c5=&c6=&c15=&cv=2.0&cj=1"/>
    </noscript>

</body>                
</html>