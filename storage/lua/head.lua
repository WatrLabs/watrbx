-- Head v1.2.0

local assetId = ...

local assetUrl = "rbxassetid://" .. assetId 
local baseUrl = "http://www.watrbx.wtf/"
local fileExtension = "PNG"
local x, y = 1024, 1024
local mannequinId = 1785197
local ThumbnailGenerator = game:GetService("ThumbnailGenerator")
-- Modules
local CreateExtentsMinMax
local MannequinUtility
local ScaleUtility

pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseUrl) end)
game:GetService("ScriptContext").ScriptsDisabled = true

local objects = game:GetObjects(assetUrl)

local headScaleType
local mannequin


mannequin = game:GetObjects("rbxassetid://".. tostring(mannequinId))[1]
mannequin.Parent = workspace

local function addFaceDecal(head)
	if head:FindFirstChild("face") then
		return
	end

	local face = Instance.new("Decal")
	face.Name = "face"
	face.Texture = "rbxasset://textures/face.png"
	face.Parent = head
end

local function replaceMannequinHeadWithMeshHead()
	for _, obj in pairs(objects) do
		if obj:IsA("Folder") and obj.Name == "R15ArtistIntent" then
			local head = obj.Head
			addFaceDecal(head)
			mannequin.Head:Destroy()
			head.Parent = mannequin
		end
	end
end

local headObject = objects[1]

mannequin.Head.BrickColor = BrickColor.Gray()

if mannequin.Head:FindFirstChild("Mesh") then
	mannequin.Head.Mesh:Destroy()
end
headObject.Parent = mannequin.Head


for _, child in pairs(mannequin:GetChildren()) do
	if child:IsA("BasePart") and child.Name ~= "Head" then
		child:Destroy()
	end
end

local shouldCrop = false
local extentsMinMax

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true, shouldCrop, extentsMinMax)

return result, requestedUrls