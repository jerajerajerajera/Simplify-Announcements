# Simplify Announcements

A [Pelican](https://pelican.dev) plugin for messages to everyone on your panel. An announcement shows as an Info,
Warning or Success bar at the top of every page, from the time you choose until it ends.

- Write, end and delete announcements under **Announcements** in the admin area (root admins only).
- Pick who sees it: everyone, or admins only. Add a button that opens a page of the panel or a link.
- Turn on **Also put in everyone's notifications** to put it in the bell of everyone who sees it, from its start
  until it ends.
- With Simplify's app notifications turned on, **Also send as app notification** sends it to phones and computers
  too. Devices that come online within a day after the start still get it.
- Everyone can unpin a bar. It is then gone for that account and waits in the bell, with a button to pin it again.

It works on its own. With [Simplify](https://github.com/jerajerajerajera/Simplify) installed it also shows up in
Simplify's add-on list.

## Set up

Install the plugin from the [Pelican Hub](https://hub.pelican.dev). Announcements with a later start reach the bell
through Pelican's scheduler (`php artisan schedule:run` every minute), as in Pelican's own installation guide.

## What it stores and sends

- Two tables: `simplify_announcements` and `simplify_announcement_dismissals` (which account unpinned which bar).
- Bell items are Pelican's own database notifications. They are removed when the announcement ends or is deleted.
- App notifications are handed to Simplify (the `simplify.push` event); Simplify sends them. This plugin itself
  calls no outside services. The plugin adds no routes of its own.

## License

Source available, see [LICENSE.md](LICENSE.md). Copyright (c) 2026 Jeroen (jerajerajerajera).
