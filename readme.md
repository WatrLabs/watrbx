# watrbx 2015/2016
a march 2016 roblox private server

(it says 2015/2016 because some pages are taken from dec 2015)

# in dev
obviously in development

if you'd like to contribute that'd be nice

# setup
**this project uses the fileinfo php extension, make sure to install it**

copy .env.example and rename it to .env (fill it out)

run `composer install` (we use a lot of composer packages)

**make sure you add the schema in schema.sql** (no migration system yet, sorry)

and make sure you add this to your nginx config
```
location / {  
	try_files $uri $uri/ /index.php$is_args$query_string;  
} 
```
apache will be done one day

> [!CAUTION]
> help will not be given setting this up, what you see is what you get. (if there are any issues with the code itself support will be provided but thats it)