local placeid = %placeid%
pcall(function() game:SetPlaceID(placeid) end)

local message = Instance.new("Message")
message.Parent = workspace
message.archivable = false
message.Text = "Loading Place... Please be patient"

wait(1) -- give studio time to catch up so the message can display

game:Load("rbxassetid://" .. placeid)
message:Destroy()