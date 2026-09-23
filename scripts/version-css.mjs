import { createHash } from 'node:crypto';
import { readdir, readFile, rm, writeFile } from 'node:fs/promises';
import { dirname, join } from 'node:path';
import { fileURLToPath } from 'node:url';

const cssPath = fileURLToPath(new URL('../source/css/tailwind.css', import.meta.url));
const cssDirectory = dirname(cssPath);
const css = await readFile(cssPath);
const version = createHash('sha256').update(css).digest('hex').slice(0, 16);
const versionedPath = join(cssDirectory, `tailwind-${version}.css`);

for (const filename of await readdir(cssDirectory)) {
    if (/^tailwind-[a-f0-9]{16}\.css$/.test(filename) && filename !== `tailwind-${version}.css`) {
        await rm(join(cssDirectory, filename));
    }
}

await writeFile(versionedPath, css);
console.log(`Created ${versionedPath}`);
