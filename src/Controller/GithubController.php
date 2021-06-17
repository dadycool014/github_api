<?php


namespace App\Controller;

use App\Service\Repos;
use Symfony\Component\HttpFoundation\Response;


class GithubController extends AbstractApiController
{

    public function showAction (Repos $repos) : Response
    {

if (!isset($repos->GetRepos()["items"])){
    return $this->respond('Server not responding',Response::HTTP_BAD_REQUEST);
}
        $content = $repos->GetRepos()["items"];

//dd($content);
foreach($content as $value){
if ($value['language'] != null){
    $repo[$value['language']][] =
        array('id'=>$value['id'],
        'name'=>$value['name'],
        'description'=>$value['description'],
        'url'=>$value['url'],
        'language'=>$value['language']) ;


}

}
foreach ($repo as $key => $vl ){

    $res[] =[
        'name' => $key,
        'count' => count($vl),
        'repos' => $vl
    ] ;

}
return $this->respond($res);
    }





}