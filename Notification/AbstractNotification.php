<?php

/**
 *
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @author:  Sekou KOÏTA <sekou.koita@supinfo.com>
 * @author:  Pichet PUTH <pichet.puth@utt.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\NotificationApiClientBundle\Notification;

abstract class AbstractNotification
{
    protected $notifierAlias;

    /**
     * Set notifier alias
     *
     * @param string $notifierAlias
     * @return AbstractNotification
     */
    public function setNotifierAlias($notifierAlias)
    {
        $this->notifierAlias = $notifierAlias;

        return $this;
    }

    /**
     * Get notifier alias
     *
     * @return string
     */
    public function getNotifierAlias()
    {
        return $this->notifierAlias;
    }

    /**
     * To array
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            'notifierAlias' => $this->getNotifierAlias(),
            'from'          => self::cleanData($this->getDataFrom()),
            'to'            => self::cleanData($this->getDataTo()),
            'content'       => self::cleanData($this->getDataContent())
        );
    }

    /**
     * Clean data (remove "null" value)
     *
     * @param array $data
     * @return array
     */
    protected static function cleanData($data)
    {
        foreach($data as $k => $v) {
            if (null === $v) {
                unset($data[$k]);
            }
        }

        return $data;
    }

    /**
     * Get data from
     *
     * @return array
     */
    abstract public function getDataFrom();

    /**
     * Get data to
     *
     * @return array
     */
    abstract public function getDataTo();

    /**
     * Get data content
     *
     * @return array
     */
    abstract public function getDataContent();
}
