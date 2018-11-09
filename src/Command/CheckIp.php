<?php namespace Anomaly\IpFilterSecurityCheckExtension\Command;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;

/**
 * Class CheckIp
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class CheckIp
{

    /**
     * Handle the command.
     *
     * @param Request $request
     * @param Repository $config
     */
    public function handle(Request $request, Repository $config)
    {

        /**
         * We only apply this
         * to the control panel.
         */
        if ($request->segment(1) !== 'admin') {
            return;
        }

        /**
         * If we don't have any filterable IP
         * addresses then we have nothing to do.
         */
        if (!$allowed = $config->get('anomaly.extension.ip_filter_security_check::config.allowed_ips', [])) {
            return;
        }

        /**
         * Yay! We're allowed to do this.
         */
        if (in_array($ip = $request->ip(), $allowed)) {
            return;
        }

        abort(403, trans('anomaly.extension.ip_filter_security_check::message.not_allowed', compact('ip')));
    }
}
