<?php
    include baseurl . "/conn.php";
    if (isset($id)) {
        $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $username = htmlentities($user["username"]);
            $bio = htmlentities($user["bio"]);
            # might remove this later - Czech 12:33 PM, 12/2/24
            
            // why not juse do $user["username"] as defining more variables just takes more ram (not like it matters that much anyways) - watrabi
            if ($user["banned"] > 0) {
                die("This user is banned");
            }
        } else {
            header("Location: /404");
            die();
        }
    } else {
        header("Location: /404");
        die();
    }
    
    use watergames\pagebuilder;
    $pagebuilder = new pagebuilder;
    $pagebuilder->set_page_name($username . "'s profile");
    $pagebuilder->addmetatag("og:title", $user["username"]);
    $pagebuilder->addmetatag("og:description", $user["bio"]);
    $pagebuilder->buildheader();

?>
    <div id="main" style="display: flex;">
        <div id="userprofile">
			<div id="userbreh">
				<h2 style="word-wrap: break-word;">  <?=$username?> </h2>
				<div id="avi">
					<img width="250px" src="/assets/user.png">
				</div>
				<div id="userbio">
					<p> <?=$bio?> </p>
				</div>
				<?php 
				if (isset($_COOKIE["watrbxcookie"])) {?>
				    <!-- logged in users only !--->
				    <hr id="profile-sep">
				    <div id="options">
					<a href="#" class="yeee"> Send Friend Request </a>
				    </div>
				<?}?>
			</div>
		</div>
    </div>
<? $pagebuilder->get_snippet("footer"); ?>