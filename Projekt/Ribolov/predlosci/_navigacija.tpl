<nav id="meni">
    <ul>
        {foreach $nav as $link}
            {if $link eq '-'}
             <br/>
            {else}
            <li><a href="{$link}">{$link@key}</a></li>
            {/if}
        {/foreach}
    </ul>
</nav>
    