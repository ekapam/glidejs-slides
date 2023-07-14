# WP Glide.js Slides Shortcode

**WP Glide.js Slides Shortcode** is a custom WordPress plugin that allows you to create sliders and carousels using the popular Glide.js library. It includes a customizable shortcode to easily add slides to your WordPress website.

## Installation

1. Download the plugin and extract the files.
2. Upload the entire `wp-glidejs-slides` directory to your `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage

The plugin provides a shortcode `[glidejs]` which you can add to your WordPress posts or pages to display the slider.

### Shortcode Parameters

The shortcode accepts the following parameters:

- `category`: The category of the slides you want to display (Optional)
- `type`: The type of transition between slides (`slider`, `carousel`) (Optional, default: `slider`)
- `startAt`: The position the slider starts at. (Optional, default: 0)
- `perView`: The number of slides visible per view. (Optional, default: 1)
- `focusAt`: The index of the slide to focus at. (Optional, default: 0)
- `gap`: The gap between slides in pixels. (Optional, default: 10)
- `autoplay`: Time interval for slide change in milliseconds. If `false`, autoplay is off. (Optional, default: `false`)
- `hoverpause`: Pauses the autoplay on hover. (Optional, default: `true`)
- `keyboard`: Allows keyboard navigation. (Optional, default: `true`)

### Example

Here is an example of a shortcode with all parameters:

`[glidejs category="nature" type="carousel" startAt="1" perView="3" focusAt="1" gap="20" autoplay="2000" hoverpause="true" keyboard="true"]`


## Scripts

The plugin uses [Glide.js](https://glidejs.com/) version 3.6.0. It enqueues the necessary scripts and styles only when the shortcode is present on a page.

## Frequently Asked Questions

**How do I create a category?**
Categories can be created in the WordPress admin panel under "Posts > Categories".

**How do I add slides to a category?**
You can add slides to a category when editing a post. On the right side of the editor, there's a box labeled "Categories". Select the category you want the slide to be a part of.

**What size should my images be for the slides?**
For optimal display, your images should be of similar sizes.

## Changelog

1.0

Initial release.

## Author

Ricardo Ambriz [ricardoambriz.com](https://ricardoambriz.com) 

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License

This plugin is licensed under the GPL-2.0+ License.