# Simplify Announcements

A [Pelican](https://pelican.dev) plugin for messages to everyone on your panel. An announcement shows as an Info,
Warning or Success bar at the top of every page, from the time you choose until it ends.

- Write, end and delete announcements under **Announcements** in the admin area (root admins only).
- Pick who sees it: everyone, or admins only. Add a button that opens a page of the panel or a link.
- Everyone can unpin a bar. It is then gone for that account and waits in the bell, with a button to pin it again.

It works on its own. With [Simplify](https://github.com/jerajerajerajera/Simplify) installed it also shows up in
Simplify's add-on list.

## Set up

Install the plugin from the [Pelican Hub](https://hub.pelican.dev). There is nothing else to set up.

## What it stores and sends

- Two tables: `simplify_announcements` and `simplify_announcement_dismissals` (which account unpinned which bar).
- No outside services. The plugin adds no routes of its own.

## License

Source available, see [LICENSE.md](LICENSE.md). Copyright (c) 2026 Jeroen (jerajerajerajera).
