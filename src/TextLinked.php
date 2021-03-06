<?php

namespace Lednerb\TextLinked;

use Laravel\Nova\Fields\Text;

class TextLinked extends Text
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'text-linked';

    /**
     * The field's component.
     *
     * @param string $uirKey
     * @param string $id
     * @return TextLinked
     */
    public function linkResource(string $uirKey, string $id)
    {
        $url = \Nova::path() . "/resources/{$uirKey}/{$id}";
        return $this->withMeta(['url' => $url]);
    }

    /**
     * The field's component.
     *
     * @param string $url
     * @return TextLinked
     */
    public function url(string $url)
    {
        return $this->withMeta(['url' => $url]);
    }

    /**
     * The field's component.
     *
     * @param \Laravel\Nova\Resource $resource
     * @return TextLinked
     */
    public function link($resource)
    {
        $url = \Nova::path() . "/resources/{$resource->uriKey()}/{$resource->id}";
        return $this->withMeta(['url' => $url]);
    }

    /**
     * Control if the clicked link should open in a new tab/target
     *
     * @param string $target
     * @return TextLinked
     */
    public function openInNewTab(string $target = "_blank")
    {
        return $this->withMeta(['target' => $target]);
    }

    /**
     * Control after which amount of chars the value should be trimmed
     *
     * @param int $chars
     * @return TextLinked
     */
    public function trim(int $chars = 50)
    {
        return $this->withMeta(['trim' => $chars]);
    }

    /**
     * Hide the tooltip if a value is trimmed
     *
     * @param bool $hide
     * @return TextLinked
     */
    public function hideTooltip(bool $hide = true)
    {
        return $this->withMeta(['hideTooltip' => $hide]);
    }
}
