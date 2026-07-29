# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to ensure the best experience when building Laravel applications.

## Foundational Context

This application is a Laravel application and its main Laravel ecosystems package & versions are below. You are an expert with them all. Ensure you abide by these specific packages & versions.

- php - 8.5
- filament/filament (FILAMENT) - v5
- laravel/fortify (FORTIFY) - v1
- laravel/framework (LARAVEL) - v13
- laravel/prompts (PROMPTS) - v0
- livewire/flux (FLUXUI_FREE) - v2
- livewire/livewire (LIVEWIRE) - v4
- larastan/larastan (LARASTAN) - v3
- laravel/boost (BOOST) - v2
- laravel/mcp (MCP) - v0
- laravel/pail (PAIL) - v1
- laravel/pint (PINT) - v1
- laravel/sail (SAIL) - v1
- pestphp/pest (PEST) - v5
- phpunit/phpunit (PHPUNIT) - v13
- tailwindcss (TAILWINDCSS) - v4

## Skills Activation

This project has domain-specific skills available in `**/skills/**`. You MUST activate the relevant skill whenever you work in that domain—don't wait until you're stuck.

## Conventions

- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, and naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts

- Do not create verification scripts or tinker when tests cover that functionality and prove they work. Unit and feature tests are more important.

## Application Structure & Architecture

- Stick to existing directory structure; don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling

- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Documentation Files

- You must only create documentation files if explicitly requested by the user.

## Replies

- Be concise in your explanations - focus on what's important rather than explaining obvious details.

=== boost rules ===

# Laravel Boost

## Tools

- Laravel Boost is an MCP server with tools designed specifically for this application. Prefer Boost tools over manual alternatives like shell commands or file reads.
- Use `database-query` to run read-only queries against the database instead of writing raw SQL in tinker.
- Use `database-schema` to inspect table structure before writing migrations or models.
- Use `get-absolute-url` to resolve the correct scheme, domain, and port for project URLs. Always use this before sharing a URL with the user.
- Use `browser-logs` to read browser logs, errors, and exceptions. Only recent logs are useful, ignore old entries.

## Searching Documentation (IMPORTANT)

- Always use `search-docs` before making code changes. Do not skip this step. It returns version-specific docs based on installed packages automatically.
- Pass a `packages` array to scope results when you know which packages are relevant.
- Use multiple broad, topic-based queries: `['rate limiting', 'routing rate limiting', 'routing']`. Expect the most relevant results first.
- Do not add package names to queries because package info is already shared. Use `test resource table`, not `filament 4 test resource table`.

### Search Syntax

1. Use words for auto-stemmed AND logic: `rate limit` matches both "rate" AND "limit".
2. Use `"quoted phrases"` for exact position matching: `"infinite scroll"` requires adjacent words in order.
3. Combine words and phrases for mixed queries: `middleware "rate limit"`.
4. Use multiple queries for OR logic: `queries=["authentication", "middleware"]`.

## Artisan

- Run Artisan commands directly via the command line (e.g., `php artisan route:list`). Use `php artisan list` to discover available commands and `php artisan [command] --help` to check parameters.
- Inspect routes with `php artisan route:list`. Filter with: `--method=GET`, `--name=users`, `--path=api`, `--except-vendor`, `--only-vendor`.
- Read configuration values using dot notation: `php artisan config:show app.name`, `php artisan config:show database.default`. Or read config files directly from the `config/` directory.

## Tinker

- Execute PHP in app context for debugging and testing code. Do not create models without user approval, prefer tests with factories instead. Prefer existing Artisan commands over custom tinker code.
- Always use single quotes to prevent shell expansion: `php artisan tinker --execute 'Your::code();'`
  - Double quotes for PHP strings inside: `php artisan tinker --execute 'User::where("active", true)->count();'`

=== php rules ===

# PHP

- Always use curly braces for control structures, even for single-line bodies.
- Use PHP 8 constructor property promotion: `public function __construct(public GitHub $github) { }`. Do not leave empty zero-parameter `__construct()` methods unless the constructor is private.
- Use explicit return type declarations and type hints for all method parameters: `function isAccessible(User $user, ?string $path = null): bool`
- Use TitleCase for Enum keys: `FavoritePerson`, `BestLake`, `Monthly`.
- Prefer PHPDoc blocks over inline comments. Only add inline comments for exceptionally complex logic.
- Use array shape type definitions in PHPDoc blocks.

=== deployments rules ===

# Deployment

- Laravel can be deployed using [Laravel Cloud](https://cloud.laravel.com/), which is the fastest way to deploy and scale production Laravel applications.

=== tests rules ===

# Test Enforcement

- Every change must be programmatically tested. Write a new test or update an existing test, then run the affected tests to make sure they pass.
- Run the minimum number of tests needed to ensure code quality and speed. Use `php artisan test --compact` with a specific filename or filter.

=== laravel/core rules ===

# Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using `php artisan list` and check their parameters with `php artisan [command] --help`.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Model Creation

- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `php artisan make:model --help` to check the available options.

## APIs & Eloquent Resources

- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

## URL Generation

- When generating links to other pages, prefer named routes and the `route()` function.

## Testing

- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

## Vite Error

- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.

=== livewire/core rules ===

# Livewire

- Livewire allow to build dynamic, reactive interfaces in PHP without writing JavaScript.
- You can use Alpine.js for client-side interactions instead of JavaScript frameworks.
- Keep state server-side so the UI reflects it. Validate and authorize in actions as you would in HTTP requests.

=== pint/core rules ===

# Laravel Pint Code Formatter

- If you have modified any PHP files, you must run `vendor/bin/pint --dirty --format agent` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test --format agent`, simply run `vendor/bin/pint --format agent` to fix any formatting issues.

=== pest/core rules ===

## Pest

- This project uses Pest for testing. Create tests: `php artisan make:test --pest {name}`.
- The `{name}` argument should not include the test suite directory. Use `php artisan make:test --pest SomeFeatureTest` instead of `php artisan make:test --pest Feature/SomeFeatureTest`.
- Run tests: `php artisan test --compact` or filter: `php artisan test --compact --filter=testName`.
- Do NOT delete tests without approval.

</laravel-boost-guidelines>

## Project Overview

This app is a from-scratch Laravel + Filament rewrite of **queen-transport.com**, a WordPress theme for a luxury car-rental business ("Queen Transport", Surabaya/Jawa Timur). The `wordpress/` directory at the repo root is the **original WordPress theme, kept only as a design/content reference** — it is not built or executed as part of this app. It has its own `wordpress/CLAUDE.md` with a local instruction: read structure/markup from the PHP templates' class names, not from its CSS files, unless explicitly asked.

The rewrite's goal: everything content-editable in WordPress admin (custom post types, options, popups) becomes a Filament resource/page at `/admin`, and every public template becomes a Blade view fed by Eloquent models instead of `WP_Query`.

## Commands

- `composer setup` — first-time project setup (install, `.env`, key, migrate, npm build).
- `composer dev` — runs `php artisan dev` (serve + queue + vite concurrently) for local development.
- `npm run dev` / `npm run build` — Vite dev server / production build. **Two separate Vite entry pairs exist** (see Frontend Architecture below) — a change to either CSS/JS entry requires a rebuild or the dev server running, or Blade's `@vite(...)` throws `Unable to locate file in Vite manifest`.
- `composer lint` / `composer lint:check` — Pint format / check (also see the Boost pint rule above for the `--dirty --format agent` variant used mid-session).
- `composer types:check` — Larastan/PHPStan static analysis.
- `composer test` — full CI gate: config clear → lint:check → types:check → `artisan test`. Prefer `php artisan test --compact --filter=...` for iterating on a single test per the Boost Pest rule.
- `php artisan storage:link` — required once per environment; all uploaded media (Filament `FileUpload`) is served from the `public` disk via this symlink.

## Architecture

**Two front ends share one Laravel app:**
- **Public marketing site** (`/`, `/armada`, `/blog`, …) — plain Blade + Tailwind, dark "Queen Transport" theme (purple/cyan gradients on near-black), no Livewire/Alpine framework beyond the FAQ accordion.
- **Admin CMS** (`/admin`) — Filament v5 panel (`App\Providers\Filament\AdminPanelProvider`) using Flux/Livewire. Registration is intentionally disabled (`Features::registration()` removed from `config/fortify.php`); there is no public sign-up.

**Frontend build has two independent entry pairs** (`vite.config.js`):
- `resources/css/app.css` + `resources/js/app.js` — Filament/Flux admin theme (its own `--color-accent` Tailwind token, unrelated to the public theme).
- `resources/css/public.css` + `resources/js/public.js` — the public site's design tokens (`--color-bg`, `--color-primary`, `--color-accent`, `--gradient-cta`, `--radius-*`, etc., ported from the WordPress theme's `src/input.css`). Any new public page must `@vite(['resources/css/public.css', 'resources/js/public.js'])`, not `app.css`.

**Public layout & view namespaces**: `resources/views/layouts/public.blade.php` is the shared shell (header/nav/WA-float-button/footer, SEO meta/OG tags). It's rendered via `<x-layouts::public>` — note the `::` namespace syntax, not dot syntax. `layouts` and `pages` are registered as Livewire component namespaces in `config/livewire.php` (`component_namespaces`), which is what makes `x-layouts::public`, `x-layouts::auth`, `pages::settings.profile` resolve to `resources/views/layouts/*` and `resources/views/pages/*`.

**Domain models**, each with a matching Filament resource under `app/Filament/Resources/`:
- `Armada` — the vehicle fleet (public: `/armada`, `/armada/{slug}`). Route-bound by `slug`.
- `Galeri` — photo/video gallery items shown on the homepage.
- `Pelanggan` — customer testimonials (name, jabatan/instansi, kutipan, 1–5 star rating).
- `Post` + `Category` + `Tag` — the blog/CMS. **Permalink is `/blog/{year}/{month}/{slug}`, WordPress-style — `slug` is intentionally NOT unique in the database**; uniqueness comes from the year/month/slug combination (see `BlogController::show` and `Post::getUrlAttribute()`). SEO fields (`meta_title`, `meta_description`, `og_image`) fall back to `title`/`excerpt`/`featured_image` via the `seo_title`/`seo_description`/`seo_image` accessors on the model.
- `Setting` — a single-row (`Setting::current()`, id=1) key/value-style settings record for site-wide media (currently the homepage hero video and "perawatan rutin" video), edited via the custom Filament page `App\Filament\Pages\ManageSettings`.

**File uploads**: the app's default filesystem disk is `local` (not web-accessible), so every Filament `FileUpload`/`ImageColumn` **must explicitly call `->disk('public')`**, and Blade views must render URLs via `Storage::disk('public')->url($path)` (not the bare `Storage::url()` helper, which uses the default disk).

**WhatsApp CTAs**: `App\Support\WhatsApp::link(string $message = '')` builds `wa.me` links from `config('site.php')` (`whatsapp_number`, brand name). Used throughout public views instead of hardcoding phone numbers/links.

**Config**: `config/site.php` holds brand/tagline/WhatsApp number/Instagram URL (env-overridable via `SITE_*`), read by both the public layout and the `WhatsApp` helper.
