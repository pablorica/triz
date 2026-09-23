# Triz Intelligence:  Docker distribution of a Wordpress Project based in Laravel, TailwindCSS and AlpineJS
A clean slate Wordpress application for wordpress.
Based in [sage](https://github.com/roots/sage?tab=readme-ov-file) and in [Nextly](https://github.com/web3templates/nextly-template)

[![version](https://img.shields.io/badge/version-0.6.3-blue.svg)](https://semver.org)


## Staging Server

https://triz.codigo.co.uk/


## Download Database

https://triz.codigo.co.uk/latest.sql.gz


## Download Plugins

https://triz.codigo.co.uk/plugins.tar.gz



## Download Assets


https://triz.codigo.co.uk/uploads.tar.gz


## Docker


[DOCKER.md](docs/DOCKER.md)


## SAGE

The theme is based in Sage 11, which is a powerful WordPress starter theme that uses Laravel Blade templating and Vite for asset management.

[SAGE.md](docs/SAGE.md)


---

## layout

### Breakpoints
  
* `--breakpoint-sm: 600px;  /* Matches Gutenberg small */`
* `--breakpoint-md: 782px;  /*  Matches Gutenberg medium */`
* `--breakpoint-lg: 960px;  /*  Matches Gutenberg large */`
* `--breakpoint-xl: 1280px;`
* `--breakpoint-2xl: 1536px;`
* `--breakpoint-3xl: 1792px;`


### Sizes

- Normalised to 1920px viewport
- Formula: font-size: (target_px / 1920) * 100vw;
  - xs: 12px → 0.625vw
  - sm: 16px → 0.8333vw
  - base: 24px → 1.25vw
  - 30px → 1.5625vw
  - h1: 72px → 3.75vw
  - h2: 36px → 1.875vw
  - 50px → 2.6042vw
  - 7xl (large): 100px → 5.2083vw
  - 130px → 6.7708vw;
  - 200px → 10.4167vw;
  - 300px -> 15.625vw;
  - 1144px → 59.7917vw;


---


## SASS

SASS is deprecated in favour of PostCSS.

### Migrating from SCSS to PostCSS in a WordPress + Vite + Tailwind App

If it was installed SCSS, the recommended approach is to migrate to PostCSS.

The SCSS formatter often throws errors on @apply and other Tailwind CSS directives because they aren’t part of standard SCSS syntax. As a result, many SCSS linters and formatters don’t recognize these directives as valid, even though they work when processed by Tailwind via PostCSS.

To avoid these compatibility issues, it's recommended to migrate from SCSS to PostCSS. PostCSS is Tailwind’s native environment and allows full use of its features—like @apply, @tailwind, and @layer—without conflicting with formatting or compilation tools.

This guide walks you through the process of migrating from SCSS to PostCSS in a WordPress project using Tailwind CSS and Vite.

**The main reasons to aigrate are:**

- Native support for Tailwind directives like `@apply` and `@tailwind`
- Simpler tooling (no need for Sass)
- Better compatibility with PostCSS plugins (e.g., nesting, imports)


### Installation

We strongly recommend to use PostCSS, but if you prefer to use SASS instead, follow these steps:

[SASS.md](https://github.com/pablorica/triz/blob/main/SASS.md)


---

## PostCSS

### 1. Install Required PostCSS Plugins

```bash
docker compose run --rm node sh -lc "npm install -D postcss postcss-import postcss-nested autoprefixer @tailwindcss/postcss"

```

#### 2. Add the PCSS files:

```bash
resources/css/pcss/...
```

### 3. Create `themes/codigo/postcss.config.js`

Create `postcss.config.js` with ESM syntax (ESM stands for ECMAScript Modules, which is a standardized module system in JavaScript. It allows developers to organize code into reusable modules, making it easier to manage dependencies and maintain code.)


```js
import postcssImport from 'postcss-import';
import tailwindcss from '@tailwindcss/postcss';
import autoprefixer from 'autoprefixer';
import nested from 'postcss-nested';

export default {
  plugins: [
    postcssImport(),
    tailwindcss(),
    autoprefixer(),
    nested(),
  ],
};
```

### 4. Update `vite.config.js`

In theory there is nothing to update in the vite config.

Just check that Laravel Vite plugin input array is as follows, (removing any SCSS files if needed)

```js
laravel({
  input: [
    'resources/css/app.css',
    'resources/css/editor.css',
    'resources/js/app.js',
    'resources/js/editor.js',
  ],
  refresh: true,
}),
```

Also remove:
- Any `resources/scss/*.scss` inputs if any
- Any `@scss` aliases from the `resolve.alias` section


### 5. Fix Imports and Syntax in `.pcss` Files

PostCSS does **not support SCSS `@use`** or `//` comments.

#### In the .pcss files, replace any SCSS imports with PostCSS imports:
```diff
    // SCSS-style --> PostCSS-style
-   @use "blocks/header";
+   @import "./blocks/header.pcss";
```

Also, replace all `// comments` with `/* comments */`.

### 6. Import .pcss files in the styles

Ensure each `.pcss` file is included in the `resources/css/app.css` file:

```css
...
/* PCSS files */
/* Assets */
@import "./pcss/assets/globals.pcss";

/* Layout */
@import "./pcss/layout/header.pcss";
...
```


### 7. Run Vite Dev Server

```bash
npm run dev
```

Check for build output in `public/build/` and confirm your styles load properly in the browser.


#### Common Issues

| Error | Solution |
|-------|----------|
| `Invalid declaration: '//'` | Use `/* comment */` instead |
| `Cannot apply unknown utility class: text-4lg` | Use valid Tailwind classes like `text-4xl` |
| `module is not defined` | Use `export default {}` in `postcss.config.js` |
| `tailwindcss must be imported from @tailwindcss/postcss` | Install and use `@tailwindcss/postcss` |


### 8. Cleanup

- Remove unused `.scss` files and aliases (`@scss`) from Vite config (if any)


**You're now using PostCSS with Tailwind in your WordPress + Vite setup** 


---

## Alpine

Alpine is ideal for **small interactive UI elements in server-rendered themes**

* **Lightweight interactivity:** Alpine lets you add small frontend behaviors (menus, modals, accordions, tabs, etc.) directly in your markup without building a full JavaScript application.
* **Minimal overhead:** It’s only ~10kB gzipped and requires almost no setup, which keeps the theme fast and simple.
* **Blade-friendly:** Alpine works very naturally with **Blade templates** in Sage, because logic can live directly in the HTML using attributes (`x-data`, `x-show`, `@click`, etc.).
* **Perfect for progressive enhancement:** It enhances server-rendered pages (WordPress output) rather than replacing them.




These are the libraries for UI behaviour:

```bash
docker compose run --rm node sh -lc "npm install alpinejs \
  @alpinejs/collapse \
  @alpinejs/focus \
  @alpinejs/intersect \
  @alpinejs/persist"

```

These are the **official Alpine plugins** and work perfectly with Sage.

### Collapse

Used for **menus, accordions, dropdowns**.

```html
<div x-data="{ open: false }">
  <button @click="open = !open">Toggle</button>

  <div x-show="open" x-collapse>
    Content
  </div>
</div>
```


### Focus

Great for **modals and accessibility**.

Example: focus trapping.

```html
<div x-data x-trap="open">
```

Useful for:

* modals
* dialogs
* offcanvas menus

### Intersect

Runs logic when element enters viewport.

Perfect for:

* animations
* lazy loading
* counters
* scroll triggers

```html
<div x-intersect="animate = true"></div>
```


### Persist

Stores Alpine state in **localStorage**.

Example:

```html
<div x-data="{ dark: $persist(false) }">
```

Great for:

* dark mode toggle
* remembering menu state



### How Alpine should be initialized in Sage

In Sage 11:

```
resources/js/app.js
```

Example setup:

```javascript
...
import Alpine from 'alpinejs'

import collapse from '@alpinejs/collapse'
import focus from '@alpinejs/focus'
import intersect from '@alpinejs/intersect'
import persist from '@alpinejs/persist'

Alpine.plugin(collapse)
Alpine.plugin(focus)
Alpine.plugin(intersect)
Alpine.plugin(persist)

window.Alpine = Alpine
Alpine.start()
...
```


### Small Sage tip (important)

If you plan to use external JS library , like **Barba.js page transitions**, make sure Alpine **re-initializes after page swaps**.

Otherwise Alpine components inside new pages won't work.

Example:

```javascript
document.addEventListener('barba:after', () => {
  Alpine.initTree(document.body)
})
```

This avoids many Alpine + Barba issues.


### Real-world Sage stack for interactive themes

Typical stack I deploy:

```
Sage 11
Bud
Tailwind
Alpine
Barba
Lenis (smooth scroll)
GSAP (animations)
```

This combo is **extremely powerful and lightweight**.

### Alpine Morph

Used to **diff and morph DOM elements**.

More advanced usage like:

* partial updates
* DOM transitions

Honestly **rare in WordPress projects**. We can  **skip morph** unless doing dynamic DOM swapping.



---


### VUE

**Why Alpine instead of Vue**

Alpine is ideal for small interactive UI elements in server-rendered themes, giving you Vue-like reactivity with much less complexity and weight.

* **No SPA needed:** WordPress themes are typically **server-rendered**, so a full SPA framework like Vue is usually unnecessary.
* **Much simpler:** Alpine avoids component compilation, build complexity, and state management overhead.
* **Better fit for small UI behaviors:** For things like dropdowns, collapses, and modals, Alpine is far quicker to implement.
* **Smaller bundle:** Vue adds significantly more JS and complexity for features that most WordPress themes don’t need.

However, if you have a specific use case that requires Vue’s advanced reactivity, component system, or ecosystem, it can be integrated into Sage with Vite as well:


[VUE.md](https://github.com/pablorica/triz/blob/main/VUE.md)


---


## Adding JS Libraries

### Barba

Barba.js is a popular library for creating smooth page transitions in server-rendered applications. It works by intercepting link clicks and dynamically loading new content without a full page refresh.

To add Barba.js to your Sage theme:

1. Install Barba.js via npm:

```bash
docker compose run --rm node sh -lc "npm install @barba/core"
```
2. Import and initialize Barba in your `resources/js/app.js` file:

```js
import barba from '@barba/core';

barba.init({
  transitions: [
    {
      name: 'fade',
      leave(data) {
        return gsap.to(data.current.container, {
          opacity: 0,
        });
      },
      enter(data) {
        return gsap.from(data.next.container, {
          opacity: 0,
        });
      },
    },
  ],
});
```

### Embla Carousel

*Embla* is a lightweight carousel library that can be used to create sliders and carousels in your theme.

```bash
docker compose run --rm node sh -lc "npm install embla-carousel"
```

2. Import and initialize Embla in your module file:

```js
import EmblaCarousel from 'embla-carousel'

document.querySelectorAll('.embla-carousel').forEach((carousel) => {
  const viewport = carousel.querySelector('.carousel-viewport')

  EmblaCarousel(viewport, {
    loop: true
  })
})
```

You’ll also need the autoplay package installed:

```bash
docker compose run --rm node sh -lc "npm install embla-carousel-autoplay"
```

### Gsap

*GSAP* is a powerful JavaScript library for creating high-performance animations.

```bash
docker compose run --rm node sh -lc "npm install gsap"
```

2. Import and initialize Gsap in your module file:

```js
// typical import
import gsap from "gsap";

// get other plugins:
import ScrollTrigger from "gsap/ScrollTrigger";
import Flip from "gsap/Flip";
import Draggable from "gsap/Draggable";

// or all tools are exported from the "all" file (excluding members-only plugins):
import { gsap, ScrollTrigger, Draggable, MotionPathPlugin } from "gsap/all";

// don't forget to register plugins
gsap.registerPlugin(ScrollTrigger, Draggable, Flip, MotionPathPlugin); 
```


---


## Local Setup: Importing Project Files and Database

### Get Plugins

Navigate to your `wp-content` directory and download the plugins archive:

```bash
cd /triz.localhost/wp-content
wget --user codigo --password triz https://triz.codigo.co.uk/plugins.tar.gz
mv plugins/ .plugins/
tar -xzvf plugins.tar.gz
rm -R .plugins/

```


### Get Media Files

Media files are stored here:

```bash
wget --user codigo --password triz https://triz.codigo.co.uk/uploads.tar.gz
```

### Load Database

1. Navigate to the database folder:

```bash
wget --user codigo --password triz https://triz.codigo.co.uk/latest.sql.gz
```

2. Import the database using MySQL:

Database: latest.sql.gz


```bash
gunzip latest.sql.gz
mysql -u root -p sparemytime_penny < latest.sql
```

**Important!** Set the siteurl and homeurl to `triz.localhost` in the wp-config.php file:

```php
define('WP_HOME', 'http://triz.localhost');
define('WP_SITEURL', 'http://triz.localhost');
```


### Optional: Find & Replace the site URL with WP-CLI

1. Navigate to the project root:

```bash
cd triz.localhost/
```

2. Run a dry-run search and replace:

```bash
wp search-replace 'canvascareers.localhost' 'triz.localhost' --dry-run --allow-root --all-tables
```

3. If everything looks good, run it for real:

```bash
wp search-replace 'canvascareers.localhost' 'triz.localhost' --allow-root --all-tables
# ---> Success: Made 27 replacements..
```


###  Optional: Create a Database Backup

```bash
cd /triz.localhost/wp-content/themes/wp-codigo-ltv/_database

mysqldump -u root -proot triz | gzip > wp-codigo-ltv.sql.gz
```


---



### Deploying 


1. **Build theme assets:**

   ```bash
   npm run build
   ```

2. **Install Composer dependencies (without dev packages):**

   ```bash
   composer install --no-dev --optimize-autoloader
   ```

3. **Upload your theme files:**

   Upload all files and folders in your theme directory **except** the `node_modules` folder to your host.


### Optimisation

Similar to deploying a Laravel app, Acorn supports an `optimize` command that caches your configuration and views. This command should be part of your deployment process:

```bash
wp acorn optimize
```

---

### Server Configuration


### Securing Blade Templates

By default, any file in the theme directory is publicly accessible in WordPress. This includes `*.blade.php` files, which — if accessed directly — can expose your view code as plain text. To avoid this, add a web server rule to block public access to `.blade.php` files.

#### Nginx

If you're using **Nginx**, add this to your site configuration **before the final `location` block**:

```nginx
location ~* \.(blade\.php)$ {
    deny all;
}
```

#### Apache

If you're using **Apache**, add this to your virtual host configuration or `.htaccess` file:

```apache
<FilesMatch ".+\.(blade\.php)$">
    # Apache 2.4
    <IfModule mod_authz_core.c>
        Require all denied
    </IfModule>

    # Apache 2.2
    <IfModule !mod_authz_core.c>
        Order deny,allow
        Deny from all
    </IfModule>
</FilesMatch>
```

**NOTE:** You can find more information about deploying a SAGE theme here

[Deployment](https://roots.io/sage/docs/deployment/)


---


## Required Plugins

* [Advanced Custom Fields](https://www.advancedcustomfields.com/pro/)


---

## Required libraries

* [SAGE](https://github.com/roots/sage?tab=readme-ov-file)
* [Acorn](https://roots.io/acorn/).
* [ACF Composer](https://github.com/Log1x/acf-composer)
* [Sage Directives](https://log1x.github.io/sage-directives-docs/)

---

## Optional libraries

* [Nextly](https://github.com/web3templates/nextly-template)
* [Poet](https://github.com/Log1x/poet)


## Copyright and License

Copyright 2025 Codigo Wordpress Theme released under the [MIT](https://github.com/pablorica/sparemytime/blob/main/LICENSE) license.

## Versioning

We use [SemVer](https://semver.org/) for versioning. For the versions available, [list of tags can be found in this page](https://github.com/pablorica/triz/tags).

### Changelog

[CHANGELOG.md](https://github.com/pablorica/triz/blob/main/CHANGELOG.md)

