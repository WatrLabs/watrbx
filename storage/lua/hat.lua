-- Hat v1.1.0

local assetId = ...

local assetUrl = "rbxassetid://" .. assetId 
local baseUrl = "http://www.watrbx.wtf"
local fileExtension = "PNG"
local x, y = 1024, 1024

local ThumbnailGenerator = game:GetService("ThumbnailGenerator")

pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseUrl) end)
game:GetService("ScriptContext").ScriptsDisabled = true

local accoutrement = game:GetObjects(assetUrl)[1]

local handle

accoutrement.Parent = workspace
local focusParts = {}
local extentsMinMax

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true, --[[crop =]] false)
return result