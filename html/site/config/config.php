<?php


/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

c::set('thumbs.filename', '{safeName}-{hash}-w{width}.{extension}');

c::set('cache',true);
c::set('cachebuster', true);

c::set('languages', array(
  array(
    'code'    => 'de',
    'name'    => 'Deutsch',
    'locale'  => 'de_DE.utf-8',
    'locale_og'  => 'de_DE', // locale for Open Graph (Facebook)
    'default' => true,
    'url'     => '/',
  ),
  array(
    'code'    => 'en',
    'name'    => 'English',
    'locale'  => 'en_US.utf-8',
    'locale_og'  => 'en_US', // locale for Open Graph (Facebook)
    'url'     => '/en',
  ),
));

c::set('timezone','CET');
