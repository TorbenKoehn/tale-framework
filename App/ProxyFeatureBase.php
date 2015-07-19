<?php

namespace Tale\App;

use Tale\App;

abstract class ProxyFeatureBase extends FeatureBase {

    abstract public function getProxiedObject();

    public function __call( $method, array $args = null ) {

        $args = $args ? $args : [];

        return call_user_func_array( [ $this->getProxiedObject(), $method ], $args );
    }

    public function __get( $key ) {

        return $this->getProxiedObject()->{$key};
    }
}