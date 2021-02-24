# Tiedotustorvi

![Project image](https://raw.githubusercontent.com/blankory/torvi/main/demo.PNG?token=AB5UXYJWXKEGQQNF2S5M5DTAG2BJG)

Tiedotustorvi is a tool created for active members of Blanko ry, to keep their hundreds of members up-to-date with announcements, event information and other happenings. The application sends announcements to Discord, Telegram and email lists - all of this via one click.

## Prerequisites

- [nodejs](https://nodejs.org/en/)
- [npm](https://www.npmjs.com/)
- [PHP 7.4 or greater](https://www.php.net/)
- [Composer](https://getcomposer.org/)

## Setup 

- `npm install`
- `composer install`
- copy `secrets.example.php` to `secrets.php` and fill credentials
- Setup PHP and your favourite web server (such as Apache2 or Nginx) to your favourite environment, and configure document root to point at `src` directory.

### Helper commands for development

SCSS build watcher can be started via `gulp watch`. Style sheets can be generated in production via `gulp sass`.

## Styling

This project uses SCSS for generating style sheets. `npm install` does fetch handy tools (such as `gulp` and it's project-specific dependencies) for generating CSS files easily. 
