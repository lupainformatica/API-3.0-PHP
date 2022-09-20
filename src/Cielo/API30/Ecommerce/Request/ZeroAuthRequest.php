<?php

namespace Cielo\API30\Ecommerce\Request;

use Cielo\API30\Ecommerce\ZeroAuth;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Merchant;
use Psr\Log\LoggerInterface;

/**
 * Class ZeroAuthRequest
 *
 * @package Cielo\API30\Ecommerce\Request
 */
class ZeroAuthRequest extends AbstractRequest
{
    /**
     * @var Environment $environment
     */
    private $environment;

    /**
     * @var Merchant $merchant
     */
    private $merchant;

    /**
     * ZeroAuthRequest constructor.
     *
     * @param Merchant $merchant
     * @param Environment $environment
     * @param LoggerInterface|null $logger
     */
    public function __construct(Merchant $merchant, Environment $environment, LoggerInterface $logger = null)
    {
        parent::__construct($merchant, $logger);

        $this->merchant    = $merchant;
        $this->environment = $environment;
    }

    /**
     * @inheritdoc
     */
    public function execute($param)
    {
        $url = $this->environment->getApiUrl() . '1/zeroauth/';

        return $this->sendRequest('POST', $url, $param);
    }

    /**
     * @inheritdoc
     */
    protected function unserialize($json)
    {
        return ZeroAuth::fromJson($json);
    }
}
