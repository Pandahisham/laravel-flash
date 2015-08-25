<?php

    namespace Tshafer\Flash;

    use Tshafer\ServiceProvider\ServiceProvider as BaseProvider;

    /**
     * Class ServiceProvider
     *
     * @package Tshafer\Flash
     */
    class ServiceProvider extends BaseProvider
    {

        /**
         * @var string
         */
        protected $packageName = 'flash';

        /**
         *
         */
        public function boot()
        {
            $this->setup( __DIR__ )
                 ->publishConfig()
                 ->publishViews()
                 ->loadViews()
                 ->mergeConfig( 'flash' );
        }

        /**
         *
         */
        public function register()
        {
            $this->app->singleton( 'flash', function () {
                return $this->app->make( FlashNotifier::class );
            } );
        }

        /**
         * @return array
         */
        public function provides()
        {
            return [ 'flash' ];
        }
    }
