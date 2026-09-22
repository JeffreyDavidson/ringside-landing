# Ringside landing site

The Ringside marketing site is built with [Tighten/Jigsaw](https://jigsaw.tighten.com/) and deployed as static HTML by Laravel Forge.

## Local development

Install PHP dependencies and build the site with:

```bash
composer install
npm ci
npm run build
vendor/bin/jigsaw build production
```

The generated site is written to `public/`.

Tailwind 4 is the CSS build entry. Brand tokens live in the `@theme` block at the
top of `source/css/marketing.css`; the Blade markup and section styles are migrating
to Tailwind utilities in focused passes. The generated `source/css/tailwind.css`
file remains checked in so Jigsaw and local static previews have the same output.

The homepage is composed from `source/_layouts/main.blade.php`, section partials
in `source/_sections/`, and small anonymous components in `source/_components/`.
The generated `public/` output remains checked in and should be rebuilt after
source changes.

## Deployment

The repository uses a simplified Gitflow strategy with `main` as the only deployment branch. Work should be completed on a focused branch and merged into `main` through a squash-merged pull request.

Both Forge staging and production deploy from `main` using the checked-in [`deployment/forge.sh`](deployment/forge.sh) script. See [`docs/deployment.md`](docs/deployment.md) for the deployment contract and Cloudflare notes.
