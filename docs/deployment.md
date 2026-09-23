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
npm ci --no-audit --no-fund
npm run build
vendor/bin/jigsaw build production --quiet

$ACTIVATE_RELEASE()
```

The release helper creates the new zero-downtime release, Composer and npm install the locked dependencies, the build generates Tailwind CSS and a content-hashed stylesheet, Jigsaw generates the site into `public`, and the activation helper switches traffic to the completed release. The hashed stylesheet URL changes with its contents so Cloudflare can cache it without serving an older build.

After changing the deployment script, deploy staging first and verify the generated site before deploying production.

## Waitlist configuration

The waitlist endpoint requires both `RESEND_API_KEY` and an explicit
`RESEND_AUDIENCE_ID`. Production and staging must use different Resend
audiences so test signups cannot enter the production list. Keep both values in
the Forge environment only; never commit them to the repository.

The endpoint ignores submissions that fill its hidden honeypot and limits a
visitor address to 20 valid submissions per hour. Rate-limit state is stored
as HMAC fingerprints in a private, site-specific directory under PHP's system
temporary directory; the raw visitor address is not persisted. When traffic is
proxied through Cloudflare, the endpoint uses `CF-Connecting-IP`; keep the
origin restricted to trusted Cloudflare ingress so that header cannot be
spoofed by direct requests. If rate-limit storage is unavailable, the endpoint
fails closed with a temporary-service response.

Pull requests to `main` run the production asset/site build, PHP syntax checks,
rate-limiter tests, and safe endpoint-response checks through
[`ci.yml`](../.github/workflows/ci.yml). These checks never submit a real email
to Resend.

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
