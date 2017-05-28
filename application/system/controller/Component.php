<?php

namespace app\system\controller;

use think\Controller;
use think\Db;

class Component extends Controller
{


    public function uploader ()
    {

        $file = request()->file( 'file' );

        $info = $file->move( ROOT_PATH . 'public' . DS . 'uploads' );
        if ( $info ) {
            $data = [
                'name'       => input( 'post.name' ) ,
                'filename'   => $info->getFilename() ,
                'path'       => 'uploads/' . $info->getSaveName() ,
                'extension'  => $info->getExtension() ,
                'createtime' => time() ,
                'size'       => $info->getSize() ,
            ];
            Db::name('attachment')->insert($data);

            echo json_encode( [ 'valid' => 1 , 'message' => HD_ROOT . 'uploads/' . $info->getSaveName() ] );
        }
        else {

            echo json_encode( [ 'valid' => 0 , 'message' => $file->getError() ] );
        }
    }


    public function filesLists ()
    {
        $db   = Db::name( 'attachment' )->whereIn( 'extension' , explode( ',' , strtolower( input( "post.extensions" ) ) ) )->order( 'id desc' );
        $Res  = $db->paginate( 32 );
        $data = [ ];
        if ( $Res->toArray() ) {
            //dump($Res->toArray());die;
            foreach ( $Res as $k => $v ) {
                $data[ $k ][ 'createtime' ] = date( 'Y/m/d' , $v[ 'createtime' ] );
                $data[ $k ][ 'size' ]       = $v[ 'size' ];
                $data[ $k ][ 'url' ]        = HD_ROOT . $v[ 'path' ];
                $data[ $k ][ 'path' ]       = HD_ROOT . $v[ 'path' ];
                $data[ $k ][ 'name' ]       = $v[ 'name' ];
            }
        }
        echo json_encode( [ 'data' => $data , 'page' => $Res->render() ?:'' ] );
    }
}
