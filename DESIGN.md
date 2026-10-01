---
name: Ringside
description: A sharp, editorial wrestling operations system built for independent promoters.
colors:
  signal: "#ff4b50"
  red: "#cb2028"
  red-deep: "#a61920"
  surface: "#101112"
  surface-header: "#09090a"
  surface-hero: "#060607"
  surface-hover: "#161719"
  text: "#f7f7f5"
  muted: "#bfc0c3"
  line: "#363638"
  signal-soft: "#ff8588"
typography:
  display:
    fontFamily: "Anton, Arial Narrow, Arial, sans-serif"
    fontSize: "clamp(3.2rem, 7.5vw, 7rem)"
    fontWeight: 400
    lineHeight: 1.13
    letterSpacing: "-0.015em"
  headline:
    fontFamily: "Anton, Arial Narrow, Arial, sans-serif"
    fontSize: "clamp(2.6rem, 4.5vw, 4.5rem)"
    fontWeight: 400
    lineHeight: 1.1
    letterSpacing: "-0.015em"
  body:
    fontFamily: "Arial, Helvetica, sans-serif"
    fontSize: "1.125rem"
    fontWeight: 400
    lineHeight: 1.75
  label:
    fontFamily: "Arial, Helvetica, sans-serif"
    fontSize: "0.75rem"
    fontWeight: 700
    lineHeight: 1.2
    letterSpacing: "0.08em"
rounded:
  none: "0"
  pill: "999px"
spacing:
  xs: "0.5rem"
  sm: "0.75rem"
  md: "1rem"
  lg: "1.5rem"
  xl: "2rem"
  section: "clamp(4rem, 7vw, 7rem)"
components:
  button-primary:
    backgroundColor: "{colors.red}"
    textColor: "{colors.text}"
    rounded: "{rounded.none}"
    padding: "0.875rem 1.75rem"
    height: "56px"
  button-outline:
    backgroundColor: "transparent"
    textColor: "{colors.text}"
    rounded: "{rounded.none}"
    padding: "0.875rem 1.75rem"
    height: "56px"
  feature-badge:
    backgroundColor: "transparent"
    textColor: "{colors.signal-soft}"
    rounded: "{rounded.pill}"
    padding: "0.45rem 0.9rem"
---

# Design System: Ringside

## Overview

**Creative North Star: “The Backstage Ledger.”**

Ringside should feel like the system that keeps a live wrestling promotion in control: direct, physical, editorial, and built around the work behind the bell. The interface uses a dark arena surface, compressed display type, hard horizontal rules, and a single hot red signal. It should have the confidence of a fight poster and the clarity of a well-run production sheet.

The standalone marketing site and the app’s public marketing surface share this system. The landing project implements it with static HTML and CSS; the app implements it with Blade, Tailwind, and the same semantic tokens. Content and calls to action may differ by context, but the visual decisions should stay aligned.

**Key Characteristics:**

- Dark, near-black surfaces with restrained tonal contrast.
- Anton uppercase display type paired with plain Arial body copy.
- Signal red used sparingly for action, emphasis, and the wordmark.
- Sharp rectangular controls and thin rules; pills are reserved for badges.
- Documentary wrestling imagery with strong crops and a readable scrim.

## Colors

The palette is deliberately narrow. Red carries action and emphasis; neutral gray carries structure and reading.

### Primary

- **Signal red** (#ff4b50): Small emphasis, highlighted display text, hover states, and the feature badge.
- **Ringside red** (#cb2028): Primary buttons, selection, and the main action color.
- **Deep red** (#a61920): Hover state for primary actions.

### Neutral

- **Canvas** (#101112): Default page background.
- **Header black** (#09090a): Header and navigation surface.
- **Hero black** (#060607): Image-backed hero fallback.
- **Text white** (#f7f7f5): Primary text and button labels.
- **Muted gray** (#bfc0c3): Supporting copy and secondary metadata.
- **Rule gray** (#363638): Dividers, borders, and structural lines.
- **Hover charcoal** (#161719): Outline-button and feature-row hover surface (`surface-hover`).

### Named Rules

**The Signal Rule.** Red is an event marker, not a background color. Use it for the action, the selected emphasis, or a small brand cue; do not flood a section with it.

## Typography

**Display Font:** Anton (with Arial Narrow and Arial fallbacks), served as a Latin-subset WOFF2 with the original TTF as a fallback source.

**Body Font:** Arial (with Helvetica fallback)

**Character:** Anton is compressed, uppercase, and physical. Arial keeps descriptions and controls neutral and readable. Do not introduce a second display face or a decorative script.

### Hierarchy

- **Display** (400, `clamp(3.2rem, 7.5vw, 7rem)`, 1.13): Hero statements and the strongest brand moments.
- **Headline** (400, `clamp(2.6rem, 4.5vw, 4.5rem)`, 1.1): Section titles and major marketing claims.
- **Title** (400, 1.5–2.5rem, 1.1): Feature names, workflow steps, and card titles.
- **Body** (400, 1.125rem, 1.75): Explanations and supporting marketing copy; keep paragraphs readable and short.
- **Label** (700, 0.75rem, 1.2, `0.08em`): Badges, metadata, and small uppercase system labels.

**The Type Contrast Rule.** Let Anton carry the voice and Arial carry the explanation. Never use Anton for long-form copy.

## Layout

Use a centered content rail: `width: min(100% - 6rem, 1280px)`. Full-bleed hero imagery and section backgrounds may extend beyond the rail, while text and controls stay aligned to it.

Sections use generous vertical padding, normally `clamp(4rem, 7vw, 7rem)`. Desktop layouts favor two-column editorial compositions such as `1.25fr 1fr`, with a `6rem` gap when space allows. Section headings use a stacked reading path rather than a split heading/explainer header. The current page narrative is: hero, the event card (booking only people who are cleared to work), roster availability, match-to-title history, FAQ, and founding access. The closing section carries a short first-person founder note (plain text, no card or photo) so a one-builder product has a person behind it. Copy should name what the app actually enforces (contracts, injuries, suspensions, tag-team eligibility, match types and finishes) and never claim behavior that isn't verified in the app. Product proof uses real screenshots of the app, cropped to the data tables (no off-brand action buttons), captured from a demo promotion and captioned as sample data; they live in `source/images/product/`. Don't imply the app shows something it doesn't: it currently shows employment status only, not injuries or suspensions. The roster section's proof is the app refusing to book an injured wrestler (a real validation error), with a narrower crop served to phones so the text stays legible. The hero kicker is the founder line, since a promoter-built product is the strongest trust signal. Additional section partials in `source/_sections/` (capabilities, features, championships, how-it-works, proof, after-the-bell, bridge CTA) are not on the page; they are kept deliberately as design alternatives while the direction is being decided. The roster section may pair editorial outcome rows with one restrained, illustrative roster board so the page feels like a product for promoters rather than a generic feature list. The hero is sized against the viewport so its action row remains visible on desktop. Feature indexes and metadata rows use thin vertical rules, with a signal-red leading cell as a navigation cue. At the mobile breakpoint around `760px`, collapse columns, reduce the page gutter to about `1rem`, preserve the display hierarchy rather than shrinking every element proportionally, and switch the feature index to two columns.

Keep a clear reading path: one dominant statement, one supporting paragraph, and one obvious action per decision area. Use `text-wrap: balance` for display headings and `text-wrap: pretty` for supporting copy.

**Section rhythm.** Heading size and vertical padding follow each section's importance, not a single template:

| Section | Heading | Padding |
| --- | --- | --- |
| Hero | Display | viewport-sized |
| Event card (primary proof) | `clamp(2.8rem, 5.5vw, 5.25rem)` | `clamp(4.5rem, 7vw, 7rem)` |
| Roster (second proof) | `clamp(2.4rem, 4vw, 3.75rem)` | `clamp(4rem, 6vw, 6rem)` |
| History (supporting) | `clamp(2rem, 3vw, 2.75rem)` | `clamp(3rem, 5vw, 4.5rem)` |
| FAQ ("Questions") | `clamp(2rem, 3vw, 2.75rem)` | `clamp(3rem, 5vw, 4.5rem)` |
| Closing ("For the promotion without a front office.") | `clamp(2.6rem, 4.5vw, 4.5rem)` | `clamp(4rem, 7vw, 7rem)` |

Avoid stacking two sections with the same shape (heading, paragraph, ruled list). Supporting points use bold body type, not Anton, and no decorative numbering. Sequences (like booked → result → title record) are a vertical step list on a single rule with small signal-red markers, not three equal columns. Header and button labels never wrap: shorten them at narrow widths instead. Text over photography stays in the scrim's dark side (for example `max-w-[min(56rem,62vw)]` on the history strip) and must measure 4.5:1 against the brightest pixel behind it.

## Elevation & Depth

The system is flat by default. Depth comes from tonal layering, photography, scrims, rules, and spacing rather than floating cards. The only routine shadow is a restrained red glow under the primary hero action (`shadow-ringside-glow`).

Photo-backed sections use the shared scrim utilities in `source/css/marketing.css`, all built from `surface-deep`: `bg-scrim-right` (desktop, left-to-right), `bg-scrim-down` (mobile, full-height photo) and `bg-scrim-fade` (mobile, photo cropped to the top that fades to a solid surface). Keep text over photography at 4.5:1 or better against the brightest pixel behind it; don't add one-off `rgb()` gradients. The event-card preview uses a signal-red top rule and internal dividers instead of a drop shadow. Avoid generic gray drop shadows and glass effects.

## Shapes

Controls are square and decisive: buttons, rows, and panels use no radius. The feature badge is the one recurring pill shape (`999px`) because it behaves as a compact label. Use thin `1px` rules for structure. Focus rings are high-contrast white, `3px`, with a `6px` offset.

## Components

### Wordmark

- Anton, uppercase, tight tracking (`-0.035em`), approximately `2.75rem`.
- The header wordmark links to the top of the page; the footer wordmark is plain text (`<x-wordmark :link="false" />`).
- “RING” uses the primary text color; “SIDE” uses Signal red.
- Keep the wordmark compact and avoid adding an icon beside it.

### Buttons

- **Primary:** Ringside red background, white text, square shape, minimum height `56px`.
- **Outline:** Transparent background, muted-white `1px` border, square shape.
- **Hover:** Deep red for primary; charcoal fill and white border for outline.
- **Icon:** A simple 20px line icon aligned after the label with about `1rem` gap.
- **Focus:** Always preserve the global high-contrast focus ring.

### Hero

- Use a strong wrestling or arena photograph as a full-bleed background.
- Apply a dark left-to-right scrim so the headline remains readable.
- Keep the title to two short lines; highlight only the second line with Signal red.
- Place the badge, title, description, and actions in one vertical reading path.

### Workflow and operations

- The workflow section uses a red-to-deep-red tonal field, thin white rules, and short signal-red rules above the numbered sequence to make the operational path feel like a production board.
- The capabilities preview is an open event-card panel, not a simulated dashboard. A signal-red top rule, match dividers, and a checklist establish hierarchy without card nesting.

### Feature index and rows

- Use thin rule-gray dividers and generous row padding.
- Put the label or title on the left and explanatory text on the right on desktop.
- Use a subtle charcoal hover state; do not turn rows into rounded cards.

### Cards and containers

- Prefer open editorial panels, bordered matrices, and tonal blocks over card piles.
- Use `#101112` or `#0b0c0d` surfaces with `#363638` rules.
- Keep internal padding at the `1.5rem`–`2rem` scale.

### Navigation and forms

- Navigation is compact, text-led, and action-oriented.
- Maintain at least a `44px` hit target for links and compact header actions.
- Inputs use the same dark canvas, thin rules, square shape, and white focus ring.
- Errors should use clear text and the red signal without relying on color alone.

## Do's and Don'ts

### Do:

- **Do** reuse these tokens in both repositories instead of inventing project-specific colors.
- **Do** keep public marketing pages sparse, confident, and easy to scan.
- **Do** use real wrestling imagery with deliberate crops and accessible alternative text.
- **Do** preserve keyboard focus, readable contrast, and 44px minimum interaction targets.
- **Do** let the app dashboard use the same palette and type pairing while increasing density for operational work.

### Don't:

- **Don't** add gradients, glassmorphism, excessive rounded cards, or generic SaaS blue.
- **Don't** use Anton for paragraphs, form values, or dense tables.
- **Don't** make every heading red; red marks action and emphasis.
- **Don't** create a second marketing design system in either repository.
- **Don't** copy marketing-only layout patterns into dense authenticated workflows without adapting their density.
