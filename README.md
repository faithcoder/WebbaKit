# WebbaKit

WebbaKit is the companion foundation plugin for the Webba Starter theme. It moves reusable section designs, Elementor widgets, shared templates, and frontend widget assets out of the theme so the theme can stay focused on layout, theme settings, and global presentation.

## What WebbaKit Does

- Adds eight Elementor widgets:
  - Webba Hero
  - Webba Services
  - Webba Booking Form
  - Webba Staff
  - Webba Testimonials
  - Webba FAQ
  - Webba Contact CTA
  - Webba Pricing
- Uses a shared template rendering system so each widget keeps one control schema and swaps design files through the `Design Style` dropdown.
- Keeps Webba Booking compatibility isolated in plugin helpers without writing to Webba Booking settings or database tables.
- Prepares `includes/blocks/` and `assets/blocks/` for future Gutenberg support that can reuse the same design engine.

## Relationship With Webba Starter

- Webba Starter should handle:
  - layout
  - header and footer
  - `theme.json`
  - global theme CSS
  - demo import
  - TGMPA
- WebbaKit should handle:
  - Elementor widgets
  - section designs
  - reusable template files
  - widget CSS and JS
  - future Gutenberg block scaffolding

## Required and Recommended Plugins

- Recommended: Elementor
- Recommended for full booking features: Webba Booking

If Elementor is inactive, WebbaKit will not register widgets and will show an admin notice. If Webba Booking is inactive, the Booking Form widget can show a helpful notice instead of a form.

## How the Style Dropdown Works

Every widget includes a `Design Style` control with:

- `Style 1`
- `Style 2`
- `Style 3`

The widget render method loads:

```text
templates/widgets/{widget-slug}/{design_style}.php
```

If a style file is missing, WebbaKit falls back to `style-1.php`.

## Webba Booking Form Widget

- Supports manual shortcode input
- Defaults to `[webbabooking]`
- Uses `do_shortcode()` for rendering
- Sanitizes the shortcode input with `wp_kses_post()`
- Does not assume service IDs or Webba Booking Pro functionality

## Customizing Colors and Typography

Widget style controls are registered with Elementor selectors so visual changes update in live preview. Widgets expose controls for combinations of:

- colors
- typography
- padding and spacing
- border and radius
- box shadow
- alignment

## Template Override Notes

WebbaKit renders templates through `webbakit_render_template()`, which uses the shared template loader class. Developers can filter the final template path with:

```php
apply_filters( 'webbakit_template_path', $template_path, $template, $args );
```

The loader prevents directory traversal and keeps template resolution inside the plugin templates directory unless a filter intentionally changes the path.

## Security Notes

- All templates are guarded with `ABSPATH` checks
- Output is escaped with WordPress escaping functions
- Booking shortcode input is sanitized before rendering
- No remote assets are loaded
- No direct writes are made to Webba Booking data
- No `eval()` or unsafe template resolution is used

## Future Gutenberg Support

Future versions of WebbaKit may include Gutenberg blocks that use the same shared templates as Elementor widgets.

