-- Prepended to Edit.lua and Visit.lua and Studio.lua and PlaySolo.lua--

if true then
	pcall(function() game:SetPlaceID(%placeid%) end)
else
	if %placeid% > 0 then
		pcall(function() game:SetPlaceID(%placeid%) end)
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
game:GetService("InsertService"):SetUserSetsUrl("https://www.watrbx.wtf/Game/Tools/InsertAsset.ashx?nsets=20&type=user&userid=%d")
game:GetService("InsertService"):SetCollectionUrl("https://www.watrbx.wtf/Game/Tools/InsertAsset.ashx?sid=%d")
game:GetService("InsertService"):SetAssetUrl("https://www.watrbx.wtf/Asset/?id=%d")
game:GetService("InsertService"):SetAssetVersionUrl("https://www.watrbx.wtf/Asset/?assetversionid=%d")

pcall(function() game:GetService("SocialService"):SetFriendUrl("https://www.watrbx.wtf/Game/LuaWebService/HandleSocialRequest.ashx?method=IsFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetBestFriendUrl("https://www.watrbx.wtf/Game/LuaWebService/HandleSocialRequest.ashx?method=IsBestFriendsWith&playerid=%d&userid=%d") end)
pcall(function() game:GetService("SocialService"):SetGroupUrl("https://www.watrbx.wtf/Game/LuaWebService/HandleSocialRequest.ashx?method=IsInGroup&playerid=%d&groupid=%d") end)
pcall(function() game:SetCreatorID(0, Enum.CreatorType.User) end)

pcall(function() game:SetScreenshotInfo("") end)
pcall(function() game:SetVideoInfo("") end)

message.Text = "Loading Place. Please wait..." 
coroutine.yield() 
game:Load("https://www.watrbx.wtf/asset/?id=" .. %placeid%) 
message.Parent = nil

game:GetService("ChangeHistoryService"):SetEnabled(true)
visit:SetPing("https://wwww.watrbx.wtf/Game/ClientPresence.ashx?PlaceId=%placeid%&Location=studio", 60)