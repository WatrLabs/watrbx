local userId = ...
local baseUrl = "http://www.watrbx.wtf"
local fileExtension = "PNG"
local x, y = 1024, 1024
local ThumbnailGenerator = game:GetService("ThumbnailGenerator")

pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseUrl) end)
game:GetService("ScriptContext").ScriptsDisabled = true

local Player = game.Players:CreateLocalPlayer(0)
Player.CharacterAppearance = ("%s/CharacterFetch.aspx?Id=%d"):format(baseUrl, userId)
Player:LoadCharacter(false)

game:GetService("RunService"):Run()

Player.Character.Animate.Disabled = true 
Player.Character.Torso.Anchored = true

local gear = Player.Backpack:GetChildren()[1] 
if gear then 
    gear.Parent = Player.Character 
        Player.Character.Torso["Right Shoulder"].CurrentAngle = math.rad(90)
end

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true, --[[crop =]] false)

return result, requestedUrls