<?php
    global $db;
    global $currentuser;
    if(isset($_GET["placeId"])){
        $placeid = (int)$_GET["placeId"];

        $assetinfo = $db->table("assets")->where("id", $placeid)->first();

        if($assetinfo->owner !== $currentuser->id){
            die();
        }
    }
    ob_start();
?>
pcall(function() game:SetPlaceID(<?=$placeid?>) end)

local message = Instance.new("Message")
message.Parent = workspace
message.archivable = false
message.Text = "Loading Place... Please be patient"

game:Load("rbxassetid://<?=$placeid?>")
message:Destroy()

<?php
$data = "\r\n" . ob_get_clean();
$key = file_get_contents("../storage/PrivateNut.pem");
openssl_sign($data, $sig, $key, OPENSSL_ALGO_SHA1);
echo "--rbxsig%" . base64_encode($sig) . "%" . $data;
?>