<?php

namespace Rap2hpoutre\LaravelLogViewer;

/**
 * Class Level
 * @package Rap2hpoutre\LaravelLogViewer
 */
class Level
{
    /**
     * @var array
     */
    private $levels_classes = [
        'debug'     => 'info',
        'info'      => 'info',
        'notice'    => 'info',
        'processed' => 'info',
        'warning'   => 'warning',
        'failed'    => 'warning',
        'error'     => 'danger',
        'critical'  => 'danger',
        'alert'     => 'danger',
        'emergency' => 'danger',
    ];

    /**
     * @var array
     */
    private $levels_imgs = [
        'debug'     => 'info-circle',
        'info'      => 'info-circle',
        'notice'    => 'info-circle',
        'processed' => 'info-circle',
        'warning'   => 'exclamation-triangle',
        'error'     => 'exclamation-triangle',
        'critical'  => 'exclamation-triangle',
        'alert'     => 'exclamation-triangle',
        'emergency' => 'exclamation-triangle',
        'failed'    => 'exclamation-triangle',
    ];

    /**
     * @return array
     */
    public function all()
    {
        return array_keys($this->levels_imgs);
    }

    /**
     * @param $level
     * @return string
     */
    public function img($level)
    {
        return $this->levels_imgs[$level];
    }

    /**
     * @param $level
     * @return string
     */
    public function cssClass($level)
    {
        return $this->levels_classes[$level];
    }

    public function getLevelsClasses()
    {
        return $this->levels_classes;
    }

    public function getLevelsCounts($logs)
    {
        $counts = [];

        foreach ($this->all() as $level) {
            $counts[$level] = 0;
        }

        foreach ($logs as $log) {
            if (isset($log['level']) && in_array($log['level'], $this->all())) {
                $counts[$log['level']]++;
            }
        }

        return $counts;
    }
}
