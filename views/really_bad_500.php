
<!DOCTYPE html>
<html>
<head>
    <title>watrbx maintenance</title>
    <style type="text/css">         
        html {
             height: 100%;
         }
		body {
			background-color: #000;
			background-image: url("/images/img_ohnoes.jpg"); /* /images/ErrorPages/img_ohnoes.jpg */
			background-size: contain;
			background-repeat: no-repeat;
			background-position: center;
			height: auto;
			font-family: 'Source Sans Pro', sans-serif;
			font-size: 18px;
			line-height: 24px;
			text-align: center;
			margin: 0;
            overflow: hidden;
            min-width: 320px;
		}
		
		@media screen and (max-width: 991px){
			body {
			    background-size: cover;
			}
		}
		.header {
			padding: 20px 0;
		}
		
		.header img {
			width: 320px;
			margin: 0 auto;
		}

        @media screen and (max-width: 768px) {
            .header img {
                width: 256px;
            }
        }

        @media screen and (max-width: 480px) {
            body {
                background-position: 39% 50%;
            }

            .header img {
                width: 150px;
            }
        }
		.notification {
			width: auto;
			height: auto;
			padding: 12px 20px;
			margin: 0;
			background-color: #f68802;
			color: #fff;
		}

        
        @media screen and (max-width: 479px) {
            .notification {
                font-size: 14px;
                line-height: 20px;
            }
        }
	</style>
</head>
<body>
<div class="header">
    <!-- image source: /images/ErrorPages/logo_ROBLOX.png -->
    <img src="/images/unnamed.png" alt="Roblox">
</div>
    <div class="content">
        <p class="notification">
            We'll be right back.
        </p>
    </div>

    <script type="text/javascript">
        window.window.setTimeout("window.location = 'http://www.watrbx.xyz/'", 30000);
    </script>
</body>
</html>
