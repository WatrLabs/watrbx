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

-- Headshot Camera
local FOV = 52.5
local AngleOffsetX = 0
local AngleOffsetY = 0
local AngleOffsetZ = 0

local CameraAngle = Player.Character.Head.CFrame * CFrame.new(AngleOffsetX, AngleOffsetY, AngleOffsetZ)
local CameraPosition = Player.Character.Head.CFrame + Vector3.new(0, 0, 0) + (CFrame.Angles(0, -0.2, 0).lookVector.unit * 3)

local Camera = Instance.new("Camera", Player.Character)
Camera.Name = "ThumbnailCamera"
Camera.CameraType = Enum.CameraType.Scriptable

Camera.CoordinateFrame = CFrame.new(CameraPosition.p, CameraAngle.p)
Camera.FieldOfView = FOV
workspace.CurrentCamera = Camera

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true, --[[crop =]] true)

return result, requestedUrls