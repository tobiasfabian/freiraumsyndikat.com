<?php
header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename="cal.ics"');
?>
BEGIN:VCALENDAR
VERSION:2.0
PRODID:<?= $site->text ?> Event
METHOD:PUBLISH
BEGIN:VEVENT
UID:<?= $page->uri() ?>@<?= $site->url() ?>

ORGANIZER;CN="<?= $site->title() ?>":MAILTO:<?= $site->email() ?>

LOCATION:<?= $page->veranstaltungsort() ?>\n<?= $page->stadt() ?>

URL:<?= $page->parent()->url() ?>

SUMMARY:<?= $site->title() ?> – <?= $page->title() ?>

CLASS:PUBLIC
DTSTART:<?= $page->date('Ymd\THis') ?>

DTEND:<?= date('Ymd\THis', strtotime('+2 hours', $page->date())) ?>

END:VEVENT
END:VCALENDAR
