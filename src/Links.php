<?php

namespace vmitchell85\NovaLinks;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool as BaseTool;
use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Menu\MenuItem;

class Links extends BaseTool
{
    /**
     * @var string|null $label
     */
    protected $label = null;

    /**
     * @var array<MenuItem> $links
     */
    protected $links = [];

    /**
     * Create a new Tool.
     *
     * @return void
     */
    public function __construct(string $label = null)
    {
        $this->label = $label ?: __('Links');
    }

    /**
     * Build the menu section that contains the navigation links for the tool.
     *
     * @return MenuSection
     */
    public function menu(Request $request)
    {
        return MenuSection::make($this->label, $this->links, 'link');
    }

    /**
     * Add internal link
     *
     * @param string $name
     * @param string $href
     * @param boolean $openInNewTab
     *
     * @return self
     */
    public function addLink(string $name, string $href, bool $openInNewTab = false): self
    {
        return $this->add($name, $href, $openInNewTab);
    }

    /**
     * Add external link
     *
     * @param string $name
     * @param string $href
     * @param boolean $openInNewTab
     *
     * @return self
     */
    public function addExternalLink(string $name, string $href, bool $openInNewTab = false): self
    {
        return $this->add($name, $href, $openInNewTab, true);
    }

    /**
     * Add links to be displayed on Nova sidebar
     *
     * @param string $name
     * @param string $href
     * @param boolean $openInNewTab
     * @param boolean $external
     *
     * @return $this
     */
    private function add(string $name, string $href, bool $openInNewTab, bool $external = false): self
    {
        $link = MenuItem::link($name, $href);

        if ($external) {
            $link->external();
        }

        if ($openInNewTab) {
            $link->openInNewTab();
        }

        $this->links[] = $link;

        return $this;
    }
}
