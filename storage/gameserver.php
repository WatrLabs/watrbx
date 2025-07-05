<?php
    header("Content-type: text/lua");
?>

url = "https://www.watrbx.xyz"

function start(placeId, port, url, universeid)

apikey = "<?=$apikey?>"
jobid = "<?=$jobid?>"

------------------- UTILITY FUNCTIONS --------------------------


function waitForChild(parent, childName)
	while true do
		local child = parent:findFirstChild(childName)
		if child then
			return child
		end
		parent.ChildAdded:wait()
	end
end

-----------------------------------END UTILITY FUNCTIONS -------------------------

-----------------------------------"CUSTOM" SHARED CODE----------------------------------

pcall(function() settings().Network.UseInstancePacketCache = true end)
pcall(function() settings().Network.UsePhysicsPacketCache = true end)
--pcall(function() settings()["Task Scheduler"].PriorityMethod = Enum.PriorityMethod.FIFO end)
pcall(function() settings()["Task Scheduler"].PriorityMethod = Enum.PriorityMethod.AccumulatedError end)
pcall(function () if universeid ~= nil then game:SetUniverseId(universeid) end end)

--settings().Network.PhysicsSend = 1 -- 1==RoundRobin
--settings().Network.PhysicsSend = Enum.PhysicsSendMethod.ErrorComputation2
settings().Network.PhysicsSend = Enum.PhysicsSendMethod.TopNErrors
settings().Network.ExperimentalPhysicsEnabled = true
settings().Network.WaitingForCharacterLogRate = 100
pcall(function() settings().Diagnostics:LegacyScriptMode() end)

-----------------------------------START GAME SHARED SCRIPT------------------------------

local assetId = placeId -- might be able to remove this now
local UserInputService = game:GetService('UserInputService')

local scriptContext = game:GetService('ScriptContext')
pcall(function() scriptContext:AddStarterScript(37801172) end)
scriptContext.ScriptsDisabled = true

game:SetPlaceID(placeId, false)
game:GetService("ChangeHistoryService"):SetEnabled(false)

-- establish this peer as the Server
local ns = game:GetService("NetworkServer")

pcall(function() game:GetService("NetworkServer"):SetIsPlayerAuthenticationRequired(true) end)
pcall(function() game:GetService("ContentProvider"):SetBaseUrl(url .. "/") end)

if url~=nil then
	-- players service --
	pcall(function() game:GetService("Players"):SetAbuseReportUrl(url .. "/moderation/AbuseReport/InGameChatHandler") end) --TODO: Implement
	pcall(function() game:GetService("Players"):SetChatFilterUrl(url .. "/Game/ChatFilter.ashx") end) --not even used, just enables filter (lol)
	pcall(function() game:GetService("Players"):SetLoadDataUrl(url .. "/Persistence/GetBlobUrl.ashx?placeId=" .. placeId .. "&userId=%d") end)
	pcall(function() game:GetService("Players"):SetSaveDataUrl(url .. "/Persistence/SetBlob.ashx?placeId=" .. placeId .. "&userId=%d") end)

	-- scriptinformationprovider service --
	pcall(function() game:GetService("ScriptInformationProvider"):SetAssetUrl(url .. "/Asset/") end)
	
	-- contentprovider service --
	pcall(function() game:GetService("ContentProvider"):SetBaseUrl(url .. "/") end)
	
	-- badge service --
	pcall(function() game:GetService("BadgeService"):SetPlaceId(placeId) end)
	pcall(function() game:GetService("BadgeService"):SetAwardBadgeUrl(url .. "/Game/Badge/AwardBadge?UserID=%d&BadgeID=%d&PlaceID=%d") end)
	pcall(function() game:GetService("BadgeService"):SetHasBadgeUrl(url .. "/Game/Badge/HasBadge?UserID=%d&BadgeID=%d") end)
	pcall(function() game:GetService("BadgeService"):SetIsBadgeDisabledUrl(url .. "/Game/Badge/IsBadgeDisabled?BadgeID=%d&PlaceID=%d") end)
	pcall(function() game:GetService("BadgeService"):SetIsBadgeLegalUrl("") end)

	-- social service --
	pcall(function() game:GetService("SocialService"):SetFriendUrl(url .. "/Game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=%d&userid=%d") end)
	pcall(function() game:GetService("SocialService"):SetBestFriendUrl(url .. "/Game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=%d&userid=%d") end)
	pcall(function() game:GetService("SocialService"):SetGroupUrl(url .. "/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)
	pcall(function() game:GetService("SocialService"):SetGroupRankUrl(url .. "/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRank&playerid=%d&groupid=%d") end)
	pcall(function() game:GetService("SocialService"):SetGroupRoleUrl(url .. "/Game/LuaWebService/HandleSocialRequest.ashx?method=GetGroupRole&playerid=%d&groupid=%d") end)

	-- gamepass service --
	pcall(function() game:GetService("GamePassService"):SetPlayerHasPassUrl(url .. "/Game/GamePass/GamePassHandler.ashx?Action=HasPass&UserID=%d&PassID=%d") end)

	-- friends service --
	pcall(function() game:GetService("FriendService"):SetMakeFriendUrl(url .. "/Game/CreateFriend?firstUserId=%d&secondUserId=%d") end)
	pcall(function() game:GetService("FriendService"):SetBreakFriendUrl(url .. "/Game/BreakFriend?firstUserId=%d&secondUserId=%d") end)
	pcall(function() game:GetService("FriendService"):SetGetFriendsUrl(url .. "/Game/AreFriends?userId=%d") end)
	
	-- insert service --
	pcall(function() game:GetService("InsertService"):SetBaseSetsUrl(url .. "/Game/Tools/InsertAsset.ashx?nsets=10&type=base") end)
	pcall(function() game:GetService("InsertService"):SetUserSetsUrl(url .. "/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d") end)
	pcall(function() game:GetService("InsertService"):SetCollectionUrl(url .. "/Game/Tools/InsertAsset.ashx?sid=%d") end)
	pcall(function() game:GetService("InsertService"):SetAssetUrl(url .. "/Asset/?id=%d") end)
	pcall(function() game:GetService("InsertService"):SetAssetVersionUrl(url .. "/Asset/?assetversionid=%d") end)
	
	pcall(function() game:HttpGet(url .. "/game/LoadPlaceInfo.ashx?PlaceId=" .. placeId)() end)
	
	-- pcall(function() 
	--			if access then
	--				game:HttpGet(url .. "/game/PlaceSpecificScript.ashx?PlaceId=" .. placeId .. "&" .. access)()
	--			end
	--		end)
end

pcall(function() game:GetService("NetworkServer"):SetIsPlayerAuthenticationRequired(true) end)
settings().Diagnostics.LuaRamLimit = 0
--settings().Network:SetThroughputSensitivity(0.08, 0.01)
--settings().Network.SendRate = 35
--settings().Network.PhysicsSend = 0  -- 1==RoundRobin


game:GetService("Players").PlayerAdded:connect(function(player)
    print("Player " .. player.userId .. " added")
player.CharacterAdded:connect(function(c)
    game:GetObjects("rbxasset://fonts/characterCameraScript.rbxmx")[1].Parent = c
    game:GetObjects("rbxasset://fonts/characterControlScript.rbxmx")[1].Parent = c
    for i,v in pairs(c:GetChildren()) do
    end
    end)
end)

game:GetService("Players").PlayerRemoving:connect(function(player)
	print("Player " .. player.userId .. " leaving")
end)

if placeId~=nil and url~=nil then
	-- yield so that file load happens in the heartbeat thread
	wait()
	
	-- load the game
	game:Load(url .. "/asset/?id=" .. placeId)
end

-- Now start the connection
ns:Start(port) 


scriptContext:SetTimeout(10)
scriptContext.ScriptsDisabled = false



------------------------------END START GAME SHARED SCRIPT--------------------------
function onChatted(msg, speaker)
    
    source = string.lower(speaker.Name)
    msg = string.lower(msg)
    -- Note: This one is NOT caps sensitive

    if msg == ";ec" then
		local sound = Instance.new("Sound")
    	sound.SoundId = "http://www.watrbx.xyz/asset/?id=17"
    	sound.Parent = speaker.Character.Torso
    	sound.Volume = 0.5
    	sound:Play()
        speaker.Character.Humanoid.Health = 0
    end

	if msg == ";raymonf" then
		local sound = Instance.new("Sound")
    	sound.SoundId = "http://www.watrbx.xyz/asset/?id=19"
    	sound.Parent = speaker.Character.Torso
    	sound.Volume = 0.5
    	sound:Play()
        speaker.Character.Humanoid.Health = 0
    end

    if msg == ";kick" then
	    speaker:Kick("GET OUT!!!!!!!!")
    end

    if msg == ";sit" then
		speaker.Character.Humanoid.Jump = true
		wait(0.1)
        speaker.Character.Humanoid.Sit = true
    end
end

function onPlayerEntered(newPlayer)
        newPlayer.Chatted:connect(function(msg) onChatted(msg, newPlayer) end) 
end
 
game.Players.ChildAdded:connect(onPlayerEntered)


game:GetService("Players").PlayerAdded:connect(function(player)
	print("Player " .. player.userId .. " added")
	pcall(function() game:HttpGet(url .. "/api/v1/gameserver/client-presence?jobid=" .. jobid .. "=" .. apikey .. "=" .. player.userId .. "=connect")() end)
end)

game:GetService("Players").PlayerRemoving:connect(function(player)
	print("Player " .. player.userId .. " leaving")	
	pcall(function() game:HttpGet(url .. "/api/v1/gameserver/client-presence?jobid=" .. jobid .. "=" .. apikey .. "=" .. player.userId .. "=disconnect")() end)
end)


-- StartGame -- 
game:GetService("RunService"):Run()
pcall(function() print(game:HttpGet(url .. "/api/v1/gameserver/mark-active?jobid=" .. jobid .. "=" .. apikey))() end)

end

start(<?=$place?>, <?=$port?>, "https://www.watrbx.xyz", <?=$universeid?>)

while wait(30) do
    if #game:GetService("Players"):GetPlayers() == 0 then
        game:HttpGet(url .. "/api/v1/gameserver/end-server?jobid=" .. jobid .. "=" .. apikey)
    end
end