-- Shirt v1.0.2

local assetId = ...

local assetUrl = "rbxassetid://" .. assetId 
local baseUrl = "https://www.watrbx.wtf"
local fileExtension = "PNG"
local x, y = 1024, 1024
local mannequinId = 1785197
local ThumbnailGenerator = game:GetService("ThumbnailGenerator")

pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseUrl) end)
game:GetService("ScriptContext").ScriptsDisabled = true

local mannequin = game:GetObjects("rbxassetid://"..tostring(mannequinId))[1]
mannequin.Parent = workspace

local shirt = game:GetObjects(assetUrl)[1]
shirt.Parent = mannequin

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true)

return result