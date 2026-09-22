# Ringside landing site

The Ringside marketing site is built with [Tighten/Jigsaw](https://jigsaw.tighten.com/) and deployed as static HTML by Laravel Forge.

## Local development

Install PHP dependencies and build the site with:

```bash
composer install
vendor/bin/jigsaw build production
```

The generated site is written to `public/`.

## Deployment

The repository uses a simplified Gitflow strategy with `main` as the only deployment branch. Work should be completed on a focused branch and merged into `main` through a squash-merged pull request.

Both Forge staging and production deploy from `main` using the checked-in [`deployment/forge.sh`](deployment/forge.sh) script. See [`docs/deployment.md`](docs/deployment.md) for the deployment contract and Cloudflare notes.
