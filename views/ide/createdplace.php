<p id="savingtext">Saving Place</p>
<script>
    window.external.SaveUrl('https://www.watrbx.wtf/api/v1/upload-place?placeId=<?=$assetinsertid?>'); 
    document.getElementById("savingtext").innerText = "Done saving.";
</script>