# Deployment

Ringside is a static Jigsaw site deployed by Laravel Forge. The repository uses a simplified Gitflow strategy:

- `main` is the only deployment branch.
- Feature, fix, refactor, chore, docs, and test branches merge into `main` through squash-merged pull requests.
- Production and staging Forge sites both deploy from `main`.
- Production remains behind Cloudflare; staging may additionally be protected by Cloudflare Access.

## Forge deployment script

Keep the Forge deployment script synchronized with [`deployment/forge.sh`](../deployment/forge.sh):

```bash
$CREATE_RELEASE()

cd $FORGE_RELEASE_DIRECTORY

composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
vendor/bin/jigsaw build production --quiet

$ACTIVATE_RELEASE()
```

The release helper creates the new zero-downtime release, Composer installs the locked production dependencies, Jigsaw generates the site into `public`, and the activation helper switches traffic to the completed release.

After changing the deployment script, deploy staging first and verify the generated site before deploying production.
