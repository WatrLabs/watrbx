<?php
use watrlabs\authentication;
$membership = "None";
header("content-type: text/plain; X-Robots-Tag: noindex;charset=UTF-8"); 
 if (isset($_COOKIE["_ROBLOSECURITY"])) {
	
	global $currentuser;
	$userinfo = $currentuser;
	if($userinfo == null){
		$username = "Player1";
		$id = 1;
		$membership = $userinfo->membership;
	} else {
		$username = $userinfo->username;
		$id = $userinfo->id;
	}
} else {
	$username = "Player1";
	$id = 1;
}


ob_start();
?>

-- Prepended to Edit.lua and Visit.lua and Studio.lua and PlaySolo.lua--

if true then
    pcall(function() game:SetPlaceID(0) end)
else
    if 0 > 0 then
        pcall(function() game:SetPlaceID(0) end)
    end
end

visit = game:GetService("Visit")

local message = Instance.new("Message")
message.Parent = workspace
message.archivable = false

game:GetService("ScriptInformationProvider"):SetAssetUrl("https://www.watrbx.wtf/Asset/")
game:GetService("ContentProvider"):SetThreadPool(16)
pcall(function() game:GetService("InsertService"):SetFreeModelUrl("https://www.watrbx.wtf/Game/Tools/InsertAsset.ashx?type=fm&q=%s&pg=%d&rs=%d") end) -- Used for free model search (insert tool)
pcall(function() game:GetService("InsertService"):SetFreeDecalUrl("https://www.watrbx.wtf/Game/Tools/InsertAsset.ashx?type=fd&q=%s&pg=%d&rs=%d") end) -- Used for free decal search (insert tool)

settings().Diagnostics:LegacyScriptMode()

game:GetService("InsertService"):SetBaseSetsUrl("https://www.watrbx.wtf/Game/Tools/InsertAsset.ashx?nsets=10&type=base")
game:GetService("InsertService"):SetUserSetsUrl("https://www.watrbx.wtf/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=")
game:GetService("InsertService"):SetCollectionUrl("https://www.watrbx.wtf/Game/Tools/InsertAsset.ashx?sid=")
game:GetService("InsertService"):SetAssetUrl("https://www.watrbx.wtf/Asset/?id=")
game:GetService("InsertService"):SetAssetVersionUrl("https://www.watrbx.wtf/Asset/?assetversionid=")

pcall(function() game:GetService("SocialService"):SetFriendUrl("https://www.watrbx.wtf/Game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=&userid=") end)
pcall(function() game:GetService("SocialService"):SetBestFriendUrl("https://www.watrbx.wtf/Game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=&userid=") end)
pcall(function() game:GetService("SocialService"):SetGroupUrl("https://www.watrbx.wtf/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=&groupid=") end)
pcall(function() game:SetCreatorID(0, Enum.CreatorType.User) end)

pcall(function() game:SetScreenshotInfo("") end)
pcall(function() game:SetVideoInfo("") end)

-- SingleplayerSharedScript.lua inserted here --

pcall(function() settings().Rendering.EnableFRM = true end)
pcall(function() settings()["Task Scheduler"].PriorityMethod = Enum.PriorityMethod.AccumulatedError end)

game:GetService("ChangeHistoryService"):SetEnabled(false)
pcall(function() game:GetService("Players"):SetBuildUserPermissionsUrl("https://www.watrbx.wtf/Game/BuildActionPermissionCheck.ashx?assetId=0&userId=&isSolo=true") end)

workspace:SetPhysicsThrottleEnabled(true)

local addedBuildTools = false
local screenGui = game:GetService("CoreGui"):FindFirstChild("RobloxGui")

-- This code might move to C++
function characterRessurection(player)
    if player.Character then
        local humanoid = player.Character.Humanoid
        humanoid.Died:connect(function() wait(5) player:LoadCharacter() end)
    end
end
--[[game:GetService("Players").PlayerAdded:connect(function(player)
    characterRessurection(player)
    player.Changed:connect(function(name)
        if name=="Character" then
            characterRessurection(player)
        end
    end)
end)--]]

function doVisit()
    message.Text = "Loading Game"

    message.Text = "Running"
    game:GetService("RunService"):Run()

    message.Text = "Creating Player"
    if 0 == 0 then
        player = game:GetService("Players"):CreateLocalPlayer(1)
    else
        player = game:GetService("Players"):CreateLocalPlayer(<?=$id?>)
        player.Name = [====[<?=$username?>]====]
    end
    player.CharacterAppearance = "https://www.watrbx.wtf/CharacterFetch.aspx?userId=<?=$id?>&placeId=1"
    local propExists, canAutoLoadChar = false
    propExists = pcall(function()  canAutoLoadChar = game.Players.CharacterAutoLoads end)

    if (propExists and canAutoLoadChar) or (not propExists) then
        player:LoadCharacter()
    end

    message.Text = "Setting GUI"
    player:SetSuperSafeChat(false)
    pcall(function() player:SetMembershipType(Enum.MembershipType.<?=$membership?>) end)
    pcall(function() player:SetAccountAge(1) end)


end

success, err = pcall(doVisit)

if not addedBuildTools then

    local playerName = Instance.new("StringValue")
    playerName.Name = "PlayerName"
    playerName.Value = player.Name
    playerName.RobloxLocked = true
    playerName.Parent = screenGui

    local BuildToolsScriptID = -1

    pcall(function() 
        --if game.CoreGui.Version == 1 or game.CoreGui.Version == 2 then BuildToolsScriptID = 1179
        --else if game.CoreGui.Version == 7 then BuildToolsScriptID = 1568 end
        game:GetService("ScriptContext"):AddCoreScript(1568,screenGui,"BuildToolsScript") 
    end)
    addedBuildTools = true
end

if success then
    message.Parent = nil
else
    print(err)
    if 0 == 0 then
        pcall(function() visit:SetUploadUrl("") end)
    end
    wait(5)
    message.Text = "Error on visit: " .. err
    if true then
        game:HttpPost("https://www.watrbx.wtf/Error/Lua.ashx?", "Visit.lua: " .. err)
    end
end
<?php
$data = "\r\n" . ob_get_clean();
$key = file_get_contents("../storage/PrivateNut.pem");
openssl_sign($data, $sig, $key, OPENSSL_ALGO_SHA1);
echo "--rbxsig%" . base64_encode($sig) . "%" . $data;
?>