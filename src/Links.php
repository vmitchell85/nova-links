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
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        // Add Links from config file (for backward compatibility with v0.0.1)
        foreach (config('nova-links.links') as $name => $href) {
            $this->add($name, $href);
        }
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
     * Add links to be displayed on Nova sidebar
     *
     * @param string $name Display name of the Link eg: "Tailwind Docs"
     * @param string $href Link location eg: "https://tailwindcss.com/"
     * @param string $target Default option '_self' opens link in same window. Set to '_blank' to open link in new tab.
     * @return $this
     */
    public function add($name, $href, $target = '_self')
    {
        $link = MenuItem::link($name, $href);

        if ($target === '_blank') {
            $link->external();
        }

        $this->links[] = $link;

        return $this;
    }
}
