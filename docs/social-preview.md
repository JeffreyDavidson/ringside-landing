# Social preview

The homepage's Open Graph and Twitter large-image card use
`source/images/marketing/ringside-social-v1.jpg`. Jigsaw copies this image to
`public/images/marketing/ringside-social-v1.jpg`; both copies are committed.

The image is a 1200 × 630 sRGB JPEG. Its typography, signal red, dark arena,
and copy follow `DESIGN.md` and the homepage. The existing hero photograph,
favicon, and JSON-LD application image remain unchanged.

When replacing the card, use a new versioned filename and update both social
image URLs, the Open Graph dimensions/type, and descriptive alt text in
`source/index.blade.php`. Rebuild Jigsaw and inspect the actual generated
image and metadata before committing. Versioned filenames avoid relying on
an old image URL being refreshed by social crawlers or the CDN.

## Generation record

Created with the built-in image generation tool using the existing
`source/images/marketing/arena.webp` as a visual reference. The result was
resized to 1200 × 630 and exported as a stripped, quality-90 JPEG.

Final prompt:

```text
Use case: ads-marketing.
Create a finished branded social sharing card for Ringside, wrestling promotion management software for independent promoters. Output landscape 1200x630 pixels, aspect ratio 40:21.
Image 1 is a visual reference for the existing website arena photography; use its atmosphere, ring ropes, and red/white spotlight language to maintain brand consistency.
Composition: clean editorial fight-poster confidence, wide social card. Near-black charcoal background (#101112), realistic dark wrestling ring photographed from ringside on the right, subtle red ropes and overhead white spotlights. Strong empty dark space on the left for type; photo must remain subordinate to legibility. Generous 64px safe margins. All text crisp and flat, never perspective distorted.
Typography: heavy condensed upright uppercase Anton-like sans serif for wordmark and headline, neutral Arial-like supporting line. At top left, compact wordmark "RINGSIDE", RING off-white (#f7f7f5), SIDE signal red (#ff4b50), one joined word, no icon. Large dominant two-line headline left aligned: "RUN THE SHOW." in off-white, then "OWN THE STORY." in signal red. Below it, smaller readable off-white sentence "Wrestling promotion management." Bottom left "theringside.app" in muted gray. Exact text only, no other text.
No rounded panels, buttons, fake interface, wrestlers, brand logos, belts, badges, gradients unrelated to the photographic lighting, illustrations, borders, or watermarks. Refined hierarchy and spacing, polished typography, readable when reduced to 600x315.
```
