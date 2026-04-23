---
name: Mint & Cream Grocery
colors:
  surface: '#f8f9fa'
  surface-dim: '#d9dadb'
  surface-bright: '#f8f9fa'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f3f4f5'
  surface-container: '#edeeef'
  surface-container-high: '#e7e8e9'
  surface-container-highest: '#e1e3e4'
  on-surface: '#191c1d'
  on-surface-variant: '#3f4943'
  inverse-surface: '#2e3132'
  inverse-on-surface: '#f0f1f2'
  outline: '#6f7973'
  outline-variant: '#bec9c2'
  surface-tint: '#1b6b4f'
  primary: '#1b6b4f'
  on-primary: '#ffffff'
  primary-container: '#a7f3d0'
  on-primary-container: '#247156'
  inverse-primary: '#8bd6b4'
  secondary: '#416656'
  on-secondary: '#ffffff'
  secondary-container: '#c3ecd7'
  on-secondary-container: '#476c5b'
  tertiary: '#595f66'
  on-tertiary: '#ffffff'
  tertiary-container: '#dee4ec'
  on-tertiary-container: '#5f666c'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#a6f2cf'
  primary-fixed-dim: '#8bd6b4'
  on-primary-fixed: '#002115'
  on-primary-fixed-variant: '#00513a'
  secondary-fixed: '#c3ecd7'
  secondary-fixed-dim: '#a8cfbc'
  on-secondary-fixed: '#002115'
  on-secondary-fixed-variant: '#294e3f'
  tertiary-fixed: '#dde3eb'
  tertiary-fixed-dim: '#c1c7cf'
  on-tertiary-fixed: '#161c22'
  on-tertiary-fixed-variant: '#41474e'
  background: '#f8f9fa'
  on-background: '#191c1d'
  surface-variant: '#e1e3e4'
typography:
  display-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 48px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: 0.02em
  headline-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 32px
    fontWeight: '600'
    lineHeight: '1.2'
    letterSpacing: 0.01em
  headline-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.3'
    letterSpacing: 0.01em
  body-lg:
    fontFamily: Plus Jakarta Sans
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
    letterSpacing: 0.025em
  body-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
    letterSpacing: 0.025em
  label-md:
    fontFamily: Plus Jakarta Sans
    fontSize: 14px
    fontWeight: '600'
    lineHeight: '1.4'
    letterSpacing: 0.05em
rounded:
  sm: 0.5rem
  DEFAULT: 1rem
  md: 1.5rem
  lg: 2rem
  xl: 3rem
  full: 9999px
spacing:
  unit: 4px
  xs: 0.5rem
  sm: 1rem
  md: 1.5rem
  lg: 2.5rem
  xl: 4rem
  gutter: 1.5rem
  margin: 2rem
---

## Brand & Style

This design system is built on the principles of **Organic Minimalism**, prioritizing a sense of freshness and calm. The personality is approachable and ultra-modern, designed to evoke the feeling of a bright, well-ventilated boutique grocery store.

The visual direction avoids harsh lines and high-contrast transitions. Instead, it utilizes soft, pillow-like shapes and a "tonal-on-tonal" approach. The interface relies on generous whitespace and subtle shifts in hue to guide the user, creating an atmosphere that is friendly, light, and effortlessly healthy.

## Colors

The palette is anchored by "Soft Mint" (#A7F3D0), which serves as the primary action and brand color. This is supported by a "Pale Sage" for secondary accents and structural borders. 

The background is a "Creamy Off-White" (#F9FAFB), providing a softer foundation than pure white to reduce eye strain and enhance the organic feel. Text contrast is kept intentionally moderate—using deep charcoal instead of pure black—to maintain the low-contrast, airy aesthetic.

## Typography

This design system uses **Plus Jakarta Sans** for its friendly, rounded terminals and modern geometric construction. To emphasize the "airy" quality, typography employs generous letter spacing (tracking) across all levels.

Headlines are set with tight line heights but wide letter spacing to feel iconic and clean. Body text is prioritized for legibility with a high line-height-to-font-size ratio, ensuring content feels uncrowded and inviting to read.

## Layout & Spacing

The layout philosophy uses a **fluid-margin grid** that prioritizes negative space over density. A 12-column grid is standard for desktop, but padding within containers is intentionally oversized to create "breathable" content zones.

Spacing follows a 4px base unit, but the system leans heavily on the larger end of the scale (24px+) for container gutters and vertical section spacing. Elements should never feel cramped; if in doubt, increase the padding.

## Elevation & Depth

Depth is achieved through **Ambient Shadows** and **Tonal Layering**. Shadows are extremely diffused, using low-opacity mint or sage tints (e.g., `rgba(167, 243, 208, 0.2)`) instead of grey.

- **Level 0 (Base):** Creamy off-white background.
- **Level 1 (Cards):** Slightly raised with an ultra-soft, wide-spread shadow.
- **Level 2 (Interactive):** Elements like active buttons use a more pronounced but still soft shadow to indicate "pressability."

Avoid hard borders; use subtle 1px sage outlines or slight tonal shifts in the background color to define boundaries.

## Shapes

The shape language is defined by extreme roundedness, mimicking the soft edges found in nature and organic produce. 

Standard components use `rounded-2xl` (1rem / 16px), while larger containers and featured cards use `rounded-3xl` (1.5rem / 24px). Interactive elements like buttons and chips should often be fully pill-shaped to maintain the approachable, friendly aesthetic. These large radii are essential to differentiate the system from traditional, rigid grocery interfaces.

## Components

### Buttons & Inputs
Buttons are oversized and fully rounded (pill-shaped). The primary button uses a solid Soft Mint background with charcoal text. Input fields use a very light sage background with a 24px border radius, ensuring the "squishy" tactile feel is consistent.

### Cards
Grocery item cards should have a `3xl` corner radius. They feature a subtle Level 1 shadow. Images of produce should be clipped with the same rounded corners or presented as high-quality cutouts on the creamy background to enhance the "organic" vibe.

### Chips & Tags
Used for categories (e.g., "Organic", "Gluten-Free"). These should be small, pill-shaped elements with a secondary sage background and slightly darker green text.

### Selection Controls
Checkboxes and radio buttons are transformed into larger, rounded "toggle tiles" where possible. When standard icons are used, they must have rounded ends and a soft stroke weight.

### Additional Elements
- **Quantity Pickers:** Rounded containers with large "+" and "-" hit areas.
- **Progress Bars:** Thick, pill-shaped bars with a soft mint fill and a pale sage track.