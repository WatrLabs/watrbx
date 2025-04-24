<script id="Functions" type="text/jscript">
    function insertContent(id) {
        try {
            window.external.Insert("http://www.sitetest1.watrbx.xyz/asset/?id=" + id);
        } catch (x) {
            alert("Could not insert the requested item");
        }
    }

    function dragRBX(id) {
        try {
            window.external.StartDrag("http://www.sitetest1.watrbx.xyz/asset/?id=" + id);
        } catch (x) {
            alert("Sorry, could not drag the requested item");
        }
    }

    function clickButton(e, buttonid) {
        var bt = document.getElementById(buttonid);
        if (typeof bt == 'object') {
            if (navigator.appName.indexOf("Netscape") > -1) {
                if (e.keyCode == 13) {
                    bt.click();
                    return false;
                }
            }
            if (navigator.appName.indexOf("Microsoft Internet Explorer") > -1) {
                if (event.keyCode == 13) {
                    bt.click();
                    return false;
                }
            }
        }
    }

    function handleDragStart(event, id) {
        event.dataTransfer.setData('text/plain', id);
        dragRBX(id); 
    }

    function handleClick(id) {
        insertContent(id);
    }
</script>

<style>
    
    body, html {
        padding: 0px;
        margin: 0px;
    }

    * {
        text-align: center;
        font-family: Sans-Serif;
    }

    #item {
        display: inline-block;
        cursor: pointer;
        margin: 5px;
    }

    img {
        width: 100px;
        height: 100px;
    }
    
    #search {
        color: white;
        background-color: #757373;
        padding: 10px;
    }
    
    button {
        height: 30px;
        background-color: white;
    }
    
    #searchbox {
        height: 30px;
    }
    
</style>

<form action="#" method="GET" id="search">
    <input type="text" name="query" id="searchbox">
    <button>Search</button>
</form>

<div id="item" draggable="true" ondragstart="handleDragStart(event, 3)" onclick="handleClick(3)">
    <img src="/raymonf.png" alt="Raymonf Sphere">
    <br>Raymonf Sphere
</div>

<div id="item" draggable="true" ondragstart="handleDragStart(event, 19)" onclick="handleClick(19)">
    <img src="/assets/car.png" alt="Car">
    <br>Car
</div>

<div id="item" draggable="true" ondragstart="handleDragStart(event, 10472779)" onclick="handleClick(10472779)">
    <img src="/assets/BloxyCola.png" alt="Bloxy Cola">
    <br>Bloxy Cola
</div>

<div id="item" draggable="true" ondragstart="handleDragStart(event, 21)" onclick="handleClick(21)">
    <img src="/assets/toolbox/tower.png" alt="watrabi tower">
    <br>watrabi tower
</div>

<div id="item" draggable="true" ondragstart="handleDragStart(event, 22)" onclick="handleClick(22)">
    <img src="/assets/toolbox/tools.png" alt="tools">
    <br>Tools
</div>
