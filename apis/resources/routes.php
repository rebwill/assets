<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use JsonPDO\JsonPDO;

return function($api){

	//get all cohorts and its replits
	$api->get('/profile/{profile_slug}', function (Request $request, Response $response, array $args) use ($api) {
		
		$templatesPDO = new JsonPDO('_templates/','{}',false);
		$replits = $templatesPDO->getJsonByName($args['profile_url']);
		if(!$replits) throw new Exception('Invalid profile: '.$args['profile_url'], 400);
		
	    return $response->withJson($replits);
	});

	return $api;
};