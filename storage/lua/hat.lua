-- Hat v1.1.0

local assetUrl = "rbxassetid://%assetid%"
local baseUrl = "http://www.watrbx.xyz"
local fileExtension = "PNG"
local x, y = %x%, %y%

local ThumbnailGenerator = game:GetService("ThumbnailGenerator")

pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseUrl) end)
game:GetService("ScriptContext").ScriptsDisabled = true

local accoutrement = game:GetObjects(assetUrl)[1]

local handle

accoutrement.Parent = workspace
local focusParts = {}
local extentsMinMax

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true, --[[crop =]] true, extentsMinMax)
return result