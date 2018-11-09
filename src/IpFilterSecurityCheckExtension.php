<?php namespace Anomaly\IpFilterSecurityCheckExtension;

use Anomaly\IpFilterSecurityCheckExtension\Command\CheckIp;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\Security\SecurityCheckExtension;
use Illuminate\Http\Response;

/**
 * Class IpFilterSecurityCheckExtension
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class IpFilterSecurityCheckExtension extends SecurityCheckExtension
{

    /**
     * This extension provides a simple IP
     * filter security check for admin access.
     *
     * @var null|string
     */
    protected $provides = 'anomaly.module.users::security_check.ip_filter';

    /**
     * Check an HTTP request.
     *
     * @param  UserInterface $user
     * @return bool|Response
     */
    public function check(UserInterface $user = null)
    {
        return $this->dispatch(new CheckIp());
    }

}
