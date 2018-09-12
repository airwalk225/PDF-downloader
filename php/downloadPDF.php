<?php
require __DIR__ . '/vendor/autoload.php';

use Goutte\Client;

$downloadLinks = array(
  'FOLDER' => 'LINK',
);
$downloaded = array();

$client = new Client();

foreach ($downloadLinks AS $folder => $link) {
  $crawler = $client->request('GET', $link);
  $crawler->filter('FILTER')->each(function ($node) use ($folder, &$downloaded) {
    $name = '/download/'.$folder.'/'.preg_replace('!\s+!', '-', trim($node->text()));
    if (!file_exists($name)) {
      $downloaded[$folder][] = preg_replace('!\s+!', '-', trim($node->text()));
      $client = new \GuzzleHttp\Client();
    	$client->get(
        $node->attr('href'),
        [
          'save_to' => $name,
        ]
      );
    }
  });
}

print_r($downloaded);
?>
