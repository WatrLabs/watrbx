-- Gear v1.0.3

local assetUrl = "rbxassetid://%assetid%"
local baseUrl = "http://www.watrbx.wtf"
local fileExtension = "PNG"
local x, y = %x%, %y%
local ThumbnailGenerator = game:GetService("ThumbnailGenerator")

pcall(function() game:GetService("ContentProvider"):SetBaseUrl(baseUrl) end)
game:GetService("ScriptContext").ScriptsDisabled = true

for _, object in pairs(game:GetObjects(assetUrl)) do
	object.Parent = workspace
end

local result, requestedUrls = ThumbnailGenerator:Click(fileExtension, x, y, --[[hideSky = ]] true, --[[crop =]] true)

return result, requestedUrls