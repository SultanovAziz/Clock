<?php

\clock\Router::addRoute('^product/(?P<alias>[a-z0-9-]+)/?$',['controller' => 'Product','action' => 'view']);

//default routes
\clock\Router::addRoute('^admin$',['controller' => 'Main','action' => 'index','prefix' => 'admin']);
\clock\Router::addRoute('^admin?/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$',['prefix'  => 'admin']);

\clock\Router::addRoute('^$',['controller' => 'Main','action' => 'index']);
\clock\Router::addRoute("^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$");