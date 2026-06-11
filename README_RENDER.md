# Deploying this Laravel app to Render

This repository includes a Dockerfile ready for deploying to Render (https://render.com).

Quick steps:

1. Commit and push this branch to GitHub.
2. Create a new Web Service on Render and connect your GitHub repository.
   - Select "Dockerfile" as the Environment.
   - Set the Start Command to empty (the Dockerfile uses `apache2-foreground`).
   - Set the Port to `8080` in the Render service settings.

3. Create a managed MySQL database on Render (or provide external DB credentials).

4. Add Environment Variables in the Render service settings (Settings -> Environment):

```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:REPLACE_WITH_YOUR_APP_KEY
DB_CONNECTION=mysql
DB_HOST=<your-db-host>
DB_PORT=3306
DB_DATABASE=<your-db-name>
DB_USERNAME=<your-db-user>
DB_PASSWORD=<your-db-password>
# other MAIL/REDIS/AWS variables as needed
```

5. If you don't have an `APP_KEY` yet, you can generate one locally and add it to Render settings:
```
php artisan key:generate --show
```

6. Deploy. After the service builds and starts, Render will give you a public URL.

Notes and recommendations:
- This Dockerfile installs PHP extensions commonly used by Laravel. If you need additional extensions, add them to the `apt-get install` line.
- For production, consider using `php-fpm` + `nginx` or a process manager setup. The current setup uses Apache for simplicity.
- Make sure to keep sensitive values out of the repo (`.env` is ignored).
- If you want automatic deploys on push, enable Deploys in the Render service dashboard.

If you want, I can:
- Add a Render `render.yaml` to configure the service and DB from the repo (you'll still need to add secrets), or
- Add a GitHub Actions workflow to build and push a container to a registry and deploy to Render.

Tell me which of the above you want me to add next.
