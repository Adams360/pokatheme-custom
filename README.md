# PokaTheme Custom Child Theme

Welcome to the PokaTheme Custom Child Theme! This specialized child theme is crafted with an emphasis on clean design and best coding practices, utilizing SASS for dynamic styling. The theme's aesthetics and performance align with the highest standards.

## Prerequisites

Before diving in, please ensure the following prerequisites are met:

- A functioning WordPress installation
- Node.js & npm (required for SASS compilation)

## Installation

Follow these simple steps to get the theme up and running:

1. **Download the Theme**: Clone or download the repository into your WordPress themes directory (usually located at `wp-content/themes/`).

2. **Activate the Theme**: Navigate to "Appearance" -> "Themes" within your WordPress admin panel, and activate the "PokaTheme Child Theme".

3. **Install Node Dependencies**: Open a terminal window, change to the theme's directory, and run the following command:
   ```bash
   npm install

## Watching and Compiling Sass

If you're planning to make styling changes, follow these steps to set up the Sass watcher for active compilation:

1. **Navigate to Project Folder**: Open your terminal and switch to the project's root directory (pokatheme-custom-child).
2. **Start Watching Sass**: Start the Sass watcher by executing:
   ```bash
   npm run watch

This command will initiate the watcher, monitoring the Sass files in the ./assets/src/scss/ directory and automatically compiling any changes to CSS in the ./assets/public/css/ directory.