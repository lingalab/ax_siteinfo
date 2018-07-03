<?php

namespace Drupal\ax_siteinfo\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

class PageJsonController extends ControllerBase {

  // Display page node as json once siteapi and node type matched
  public function handle($key, $nid) {

	$site_config = \Drupal::config('ax_siteinfo.settings')->get('siteapikey');	
	//load page content from $nid parameter
	$node = \Drupal::entityTypeManager()->getStorage('node')->load($nid);

    if ($key == $site_config  && $key != 'No API Key yet' && $node->getType() == 'page' ) {
      $serializer = \Drupal::service('serializer');		
	  $data = $serializer->serialize(($node), 'json', ['plugin_id' => 'entity']);			
	  //$output['siteapikey'] = $site_config;	
      $output['node'] = json_decode($data);	
      return new JsonResponse($output);	
    }
	else {
      return new JsonResponse('Access Denied');
	}
	
  }

}
