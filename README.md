# Juzt Orbit Theme

**Theme Name:** Juzt Orbit

**Description:** A clean, optimized WordPress theme base built on **Timber/Twig** and powered by **Juzt Studio** for structured page building and **Vite** for blazing-fast development.

## ✨ Key Features

  * **Structured Templates:** Uses a **JSON/Twig architecture** managed entirely through the Juzt Studio Template Builder. Templates are defined for the Front Page, Index, Single Post, and Pages.
  * **Vite Development Ready:** Configured for modern frontend development using **Vite** to handle asset bundling and HMR (Hot Module Replacement).
  * **Modular Sections:** Includes base sections like `main-hero`, `hello-orbit`, and `main-page`, all defined with PHP schemas for dynamic field configuration in the Builder.
  * **Extension Support:** Automatically loads Sections and Twig locations from any active **Juzt Studio Extensions**.
  * **Global Settings:** Integrates the General Settings Editor via `config/settings_schema.php`, pre-configured to handle the `Main Menu` location.
  * **SVG Support:** Includes native functionality to enable SVG file uploads in the WordPress media library.

## ⚡ Requirements

  * **WordPress:** 5.8+
  * **PHP:** 7.4+
  * **Plugin:** [Juzt Studio (Community Version)](https://www.google.com/search?q=https://github.com/juztstack/juzt-studio-community)
  * **Library:** [Timber/Timber](https://upstatement.com/timber/) (Required for Twig rendering)

## 🛠️ Development Setup

Juzt Orbit is configured to use **Vite** for asset compilation during development and production builds.

### 1\. Prerequisites

Ensure you have [Node.js](https://nodejs.org/) and [pnpm](https://pnpm.io/) installed locally.

### 2\. Install Dependencies

Navigate to the theme root directory and install both PHP and Node dependencies:

```bash
# Install Node dependencies (Vite, etc.)
pnpm install
```

### 3\. Run Development Server

Use the following command to start the Vite development server with HMR:

```bash
pnpm dev
```

### 4\. Production Build

To compile and bundle assets for deployment, run:

```bash
pnpm build
```

This will generate optimized CSS and JS files in your theme's assets folder.

## 📁 Theme Structure & Customization

The theme follows a structured approach by separating data (JSON), configuration (PHP Schemas), and presentation (Twig).

### Juzt Studio Configuration

The theme explicitly registers its directories for the Juzt Studio Builder:

```php
add_theme_support('sections-builder', [
    'sections_directory' => 'sections',
    'templates_directory' => 'templates',
    'snippets_directory' => 'snippets',
    'views_sections_directory' => 'views/sections', 
    'schemas_directory' => 'schemas'                
]);
```

### Key Directories

| Directory | Purpose | Example File |
| :--- | :--- | :--- |
| `templates/` | **JSON Data.** Stores all page layout definitions and settings. | `front-page.json` |
| `schemas/` | **PHP Config.** Defines fields and blocks for the Juzt Studio Builder UI. | `main-hero.php` |
| `views/sections/` | **Twig Views.** Contains the reusable Twig files that render the JSON data. | `hello-orbit.twig` |
| `views/snippets/` | **Twig Views.** Contains the reusable Twig files that render the snippet. | `hello-orbit-feature.twig` |
| `views/layouts/` | **Twig Layouts.** Contains global elements like `base.twig`, `header.twig`, and `footer.twig`. |
| `config/` | **Global Settings.** Houses the schema and data for global theme options. | `settings_schema.php` |

## 🔗 Twig Rendering Logic

All major template files (`front-page.php`, `page.php`, `single.php`) load the corresponding JSON template, populate the Timber context, and render `views/templates/index.twig` (or specific Twig files), ensuring all section data is available.

The main rendering logic uses the `order` array to loop through sections and include the correct Twig partial:

```twig
{% for item in order %}
  {% set section_id = sections[item].section_id %}
  
  <section id="{{ item }}" data-section-id="{{ section_id }}">
    {% include [
        "sections/" ~ section_id ~ ".twig",
        section_id ~ "/" ~ section_id ~ ".twig",
        section_id ~ ".twig"
    ] ignore missing with {'section': sections[item] } %}
  </section>
{% endfor %}
```

## 🤝 Contributing

This theme is developed by Jesus Uzcategui and utilizes the Juzt Studio Community plugin. Contributions and improvements are welcome\!

## 📄 License

Juzt Orbit is licensed under the **GNU v2 License**.

-----

\*\*\*\* (Reference to `screenshot.png`)
