<?php
    header("Content-type: text/lua");
?>

url = "https://www.watrbx.wtf"

function start(placeId, port, url, universeid)

assetGameUrl = "http://assetgame.watrbx.wtf"

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

if url~=nil then
	-- players service --
	pcall(function() game:GetService("Players"):SetAbuseReportUrl(url .. "/AbuseReport/InGameChatHandler.ashx") end)
	pcall(function() game:GetService("Players"):SetChatFilterUrl(url .. "/Game/ChatFilter.ashx") end)
	-- scriptinformationprovider service --
	pcall(function() game:GetService("ScriptInformationProvider"):SetAssetUrl(url .. "/Asset/") end)
	
	-- contentprovider service --
	pcall(function() game:GetService("ContentProvider"):SetBaseUrl(url .. "/") end)
	
	game:GetService("BadgeService"):SetIsBadgeLegalUrl("")
	game:GetService("InsertService"):SetBaseSetsUrl(assetGameUrl .. "/Game/Tools/InsertAsset.ashx?nsets=10&type=base")
	game:GetService("InsertService"):SetUserSetsUrl(assetGameUrl .. "/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d")
	game:GetService("InsertService"):SetCollectionUrl(assetGameUrl .. "/Game/Tools/InsertAsset.ashx?sid=%d")
	game:GetService("InsertService"):SetAssetUrl(assetGameUrl .. "/Asset/?id=%d")
	game:GetService("InsertService"):SetAssetVersionUrl(assetGameUrl .. "/Asset/?assetversionid=%d")
	
	if not newBadgeUrlEnabled then
		game:GetService("BadgeService"):SetAwardBadgeUrl(assetGameUrl .. "/Game/Badge/AwardBadge.ashx?UserID=%d&BadgeID=%d&PlaceID=%d")
	end

	game:GetService("BadgeService"):SetHasBadgeUrl(assetGameUrl .. "/Game/Badge/HasBadge.ashx?UserID=%d&BadgeID=%d")
	game:GetService("BadgeService"):SetIsBadgeDisabledUrl(assetGameUrl .. "/Game/Badge/IsBadgeDisabled.ashx?BadgeID=%d&PlaceID=%d")

	game:GetService("FriendService"):SetMakeFriendUrl(assetGameUrl .. "/Game/CreateFriend?firstUserId=%d&secondUserId=%d")
	game:GetService("FriendService"):SetBreakFriendUrl(assetGameUrl .. "/Game/BreakFriend?firstUserId=%d&secondUserId=%d")
	game:GetService("FriendService"):SetGetFriendsUrl(assetGameUrl .. "/Game/AreFriends?userId=%d")
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
    	sound.SoundId = "http://www.watrbx.wtf/asset/?id=17"
    	sound.Parent = speaker.Character.Torso
    	sound.Volume = 0.5
    	sound:Play()
        speaker.Character.Humanoid.Health = 0
    end

	if msg == ";raymonf" then
		local sound = Instance.new("Sound")
    	sound.SoundId = "http://www.watrbx.wtf/asset/?id=19"
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

start(<?=$place?>, <?=$port?>, "https://www.watrbx.wtf", <?=$universeid?>)

while wait(30) do
    if #game:GetService("Players"):GetPlayers() == 0 then
        game:HttpGet(url .. "/api/v1/gameserver/end-server?jobid=" .. jobid .. "=" .. apikey)
    end
end