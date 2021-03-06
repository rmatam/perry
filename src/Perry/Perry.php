<?php
namespace Perry;

class Perry
{
    /**
     * @var string Version string
     */
    public static $version = "2.0.0";

    /**
     * @param string $url
     * @param null|string $representation
     * @return \Perry\Representation\Base
     */
    public static function fromUrl($url, $representation = null)
    {
        $data = Setup::getInstance()->fetcher->doGetRequest($url, $representation);
        $classname = Tool::parseRepresentationToClass($data->representation);

        return new $classname($data);
    }
}
