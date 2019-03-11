<?php

namespace vmitchell85\NovaLinks;

use Laravel\Nova\Nova;
use Laravel\Nova\Tool as BaseTool;

class Links extends BaseTool
{
    /**
     * @var array $links
     */
    protected $links = [];

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
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('nova-links::navigation', ['links' => $this->links]);
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
        $this->links[] = [
            'name' => $name,
            'href' => $href,
            'target' => $target,
        ];

        return $this;
    }
}
