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

## Waitlist configuration

The waitlist endpoint requires both `RESEND_API_KEY` and an explicit
`RESEND_AUDIENCE_ID`. Production and staging must use different Resend
audiences so test signups cannot enter the production list. Keep both values in
the Forge environment only; never commit them to the repository.

## Launch-readiness checks

Run these checks after a production deployment:

1. Confirm the production homepage returns `200` and includes the current hero.
2. Confirm production is served through Cloudflare and has a valid HTTPS response.
3. Confirm staging returns the expected Cloudflare Access redirect (`302`) when
   checked without an authenticated browser session.
4. Submit one controlled waitlist signup in staging and one in production, then
   verify each contact appears in its matching Resend audience.
5. Confirm the scheduled [marketing-site uptime workflow](../.github/workflows/uptime.yml)
   remains green. It checks the production homepage and the waitlist endpoint's
   safe `OPTIONS` response every 15 minutes.

Do not treat a staging `302` as an outage; staging is intentionally protected by
Cloudflare Access. Use an authenticated browser session for staging UI and
signup verification.
