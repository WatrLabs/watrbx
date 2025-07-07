-- Pants v1.0.2

local assetUrl = "rbxassetid://%assetid%"
local baseUrl = "http://www.watrbx.wtf"
local fileExtension = "PNG"
local x, y = %x%, %y%
local mannequinId = 1785197

local ThumbnailGenerator = game:GetService("ThumbnailGenerator")

pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseUrl) end)
game:GetService("ScriptContext").ScriptsDisabled = true

local mannequin = game:GetObjects("rbxassetid://"..tostring(mannequinId))[1]
mannequin.Parent = workspace

local pants = game:GetObjects(assetUrl)[1]
pants.Parent = mannequin

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true)

return result