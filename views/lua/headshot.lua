game:GetService("ScriptInformationProvider"):SetAssetUrl("http://www.watrbx.xyz/asset/")
game:GetService("InsertService"):SetAssetUrl("http://www.watrbx.xyz/asset/?id=%d")
game:GetService("InsertService"):SetAssetVersionUrl("http://www.watrbx.xyz/Asset/?assetversionid=%d")
game:GetService("ContentProvider"):SetBaseUrl("http://www.watrbx.xyz")

-- do this twice for security
game:GetService("ScriptContext").ScriptsDisabled = true
game:GetService("StarterGui").ShowDevelopmentGui = false
game:GetService("ScriptContext").ScriptsDisabled = true
game:GetService("StarterGui").ShowDevelopmentGui = false

local Player = game.Players:CreateLocalPlayer(0)
Player.CharacterAppearance = ("http://www.watrbx.xyz/CharacterFetch.ashx?id=2"):format(baseUrl, assetId)
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

local result = game:GetService("ThumbnailGenerator"):Click("PNG", 150, 150, false)

return result