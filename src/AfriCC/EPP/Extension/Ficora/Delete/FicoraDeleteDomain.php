<?php
namespace AfriCC\EPP\Extension\Ficora\Delete;

use AfriCC\EPP\Frame\Command\Delete\Domain;
use AfriCC\EPP\ObjectSpec;

/**
 * Created by IntelliJ IDEA.
 * User: nikolayyotsov
 * Date: 5/9/17
 * Time: 10:50 AM
 */
class FicoraDeleteDomain extends Domain
{
    protected $extension_xmlns = 'urn:ietf:params:xml:ns:domain-ext-1.0';

    public function setCancel()
    {
        ObjectSpec::$specs += [
            'domain-ext' => [
                'xmlns' => $this->extension_xmlns,
            ],
        ];


        $this->set("//epp:epp/epp:command/epp:extension/domain-ext:delete/domain-ext:cancel");
    }

    public function setSchedule(\DateTime $schedule)
    {
        ObjectSpec::$specs += [
            'domain-ext' => [
                'xmlns' => $this->extension_xmlns,
            ],
        ];

        $value = $schedule->format('Y-m-d').'T00:00:00.0Z';
        $this->set("//epp:epp/epp:command/epp:extension/domain-ext:delete/domain-ext:schedule/domain-ext:delDate", $value);
    }

    public function getExtensionNamespace()
    {
        return $this->extension_xmlns;
    }
}
